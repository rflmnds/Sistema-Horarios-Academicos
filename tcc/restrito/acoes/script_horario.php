<?php
	require('../../conexao/conecta.php');

	$tipoUsuario = $_POST['tipoUsuario'];
	$stt_cod = $_POST['turma'];

	$sql1 = "SELECT ch.con_cod, ch.con_horaini, st.tur_cod, ch.con_desc FROM config_hora as ch
			INNER JOIN turno as tn ON ch.turno_cod = tn.turno_cod
			INNER JOIN serie_turma_has_turno as stt ON stt.turno_cod = tn.turno_cod
			INNER JOIN serie_has_turma as st ON stt.st_cod = st.st_cod
			WHERE stt.stt_cod = $stt_cod
			ORDER BY ch.con_horaini";
	$script1 = mysqli_query($con, $sql1);

	$turma = mysqli_fetch_array($script1);
	$tur_cod = $turma['tur_cod'];
	mysqli_data_seek($script1, 0);

	$qtd_rows = mysqli_num_rows($script1);

 	$sql2 = "SELECT * FROM aula as a
			INNER JOIN horario as h ON a.hor_cod = h.hor_cod
			INNER JOIN oferta as o ON a.ofe_cod = o.ofe_cod
			INNER JOIN serie_has_turma as st ON o.st_cod = st.st_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			INNER JOIN serie as s ON st.ser_cod = s.ser_cod
			INNER JOIN serie_turma_has_turno as stt ON stt.st_cod = st.st_cod
			INNER JOIN turno as tn ON stt.turno_cod = tn.turno_cod
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod
			INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
			WHERE t.tur_cod = " . $tur_cod . " ORDER BY h.ds_cod ";
	$script2 = mysqli_query($con, $sql2) or die('Falha ao buscar horário de turma');

	$qtd = mysqli_num_rows($script2);
?>

<table class="table table-hover">
	<tr>
		<th>Horário</th>
		<th style="text-align: center;">Domingo</th>
		<th style="text-align: center;">Segunda</th>
		<th style="text-align: center;">Terça</th>
		<th style="text-align: center;">Quarta</th>
		<th style="text-align: center;">Quinta</th>
		<th style="text-align: center;">Sexta</th>
		<th style="text-align: center;">Sábado</th>
	</tr>
	<?php
		$i = 0;
		while($linha= mysqli_fetch_array($script1)){
			$i++;
			echo "<tr>";
			echo "<td>";
			echo $linha["con_horaini"];
			echo "</td>";
			for($j = 1; $j <= 7; $j++){
			 $url = "?pag=addaula&turma=" . $tur_cod . "&ds=" . $j . "&period=" .  $linha['con_cod'];
				echo "<td style='text-align: center'>";
				$count = 0;
				if($qtd >= 1){
					while($horario = mysqli_fetch_array($script2)){
						if($horario['con_cod'] == $linha['con_cod'] &&  $horario['ds_cod'] == $j){
							if($tipoUsuario == 1){
								$aula = $url . "&id=" . $horario['aula_cod'];
								echo "<a href='$aula' class='btn btn-info'>" . $horario['dis_nome'] . " </br> Prof. " . $horario['pro_nome'];
							}
							else{
								echo $horario['dis_nome'] . " </br> Prof. " . $horario['pro_nome'];
							}
							$count++;
							break;
						}
					}
					if($linha['con_desc'] == 'Intervalo'){
						echo "<p>--Intervalo--</p>";
					}
					else if($count==0){
						if($tipoUsuario == 1){
							echo " <a href='$url' class='btn btn-default'>Adicionar aula</a>";
						}
						else {
							echo "...";
						}
					}
				}
				else if($linha['con_desc'] == 'Intervalo'){
					echo "<p>--Intervalo--</p>";
				}
				else{
					if($tipoUsuario == 1){
							echo " <a href='$url' class='btn btn-default'>Adicionar aula</a>";
						}
						else {
							echo "...";
						}
				}
				mysqli_data_seek($script2, 0);
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
</table>