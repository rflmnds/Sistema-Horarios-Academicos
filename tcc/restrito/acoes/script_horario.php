<?php
	require('../../conexao/conecta.php');

	$turma = $_POST['turma'];

	$sql1 = "SELECT * FROM serie_has_turma WHERE tur_cod = " . $turma;
	$script1 = mysqli_query($con, $sql1) or die('Falha ao buscar horário de turma');

	$rows = mysqli_fetch_array($script1);
	$qtd_rows = $rows['st_qtd'];
	
	$sql2 = "SELECT * FROM aula as a
			INNER JOIN horario as h ON a.hor_cod = h.hor_cod
			INNER JOIN oferta as o ON a.ofe_cod = o.ofe_cod
			INNER JOIN serie_has_turma as st ON o.ser_cod = st.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod
			INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
			WHERE t.tur_cod = " . $turma . " ORDER BY h.ds_cod ";
	$script2 = mysqli_query($con, $sql2) or die('Falha ao buscar horário de turma');

	$qtd = mysqli_num_rows($script2);
?>

<table class="table table-hover">
	<tr>
		<th>Domingo</th>
		<th>Segunda</th>
		<th>Terça</th>
		<th>Quarta</th>
		<th>Quinta</th>
		<th>Sexta</th>
		<th>Sábado</th>
	</tr>
	<?php
		for($i = 1; $i <= $qtd_rows; $i++){
			echo "<tr>";
			for($j = 1; $j <= 7; $j++){
				$url = "?pag=addaula&turma=" . $turma . "&ds=" . $j . "&period=" . $i;
				echo "<td>";
				$count = 0;
				if($qtd >= 1){
					while($horario = mysqli_fetch_array($script2)){
						if($horario['hor_periodo'] == $i &&  $horario['ds_cod'] == $j){
							echo $horario['dis_nome'];
							$count = 1;
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