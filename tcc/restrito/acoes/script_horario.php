<?php
	require('../../conexao/conecta.php');

	$stt_cod = $_POST['turma'];
	$sql1 = "SELECT * FROM config_hora as ch
			INNER JOIN turno as tn ON ch.turno_cod = tn.turno_cod
			INNER JOIN serie_turma_has_turno as stt ON stt.turno_cod = tn.turno_cod
			WHERE stt.stt_cod = $stt_cod";
	$script1 = mysqli_query($con, $sql1);
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
			WHERE t.tur_cod = " . $stt_cod . " ORDER BY h.ds_cod ";
	$script2 = mysqli_query($con, $sql2) or die('Falha ao buscar horário de turma');

	$qtd = mysqli_num_rows($script2);
?>

<table class="table table-hover">
	<tr>
		<th>Horário</th>
		<th>Domingo</th>
		<th>Segunda</th>
		<th>Terça</th>
		<th>Quarta</th>
		<th>Quinta</th>
		<th>Sexta</th>
		<th>Sábado</th>
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
			 $url = "?pag=addaula&turma=" . $stt_cod . "&ds=" . $j . "&period=" .  $linha['con_cod'];
				echo "<td>";
				$count = 0;
				if($qtd >= 1){
					while($horario = mysqli_fetch_array($script2)){
						if($horario['con_cod'] == $linha['con_cod'] &&  $horario['ds_cod'] == $j){
							echo $horario['dis_nome'];
							$count++;
							break;
						}
					}
					if ($count==0){
							echo " <a href='$url' class='btn btn-default'>Adicionar aula</a>";
					}
				}
				else{
					echo "<a href='$url' class='btn btn-default'>Adicionar aula</a>";
				}
				mysqli_data_seek($script2, 0);
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
</table>