<?php
	require('../../conexao/conecta.php');

	$turma = $_POST['turma'];

	$sql = "SELECT * FROM horario as h
			INNER JOIN hora_aula as ha ON h.aula_cod = ha.aula_cod
			INNER JOIN oferta as o ON h.ofe_cod = o.ofe_cod
			INNER JOIN serie_has_turma as st ON o.ser_cod = st.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod
			INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
			WHERE t.tur_cod = " . $turma . " ORDER BY ha.ds_cod ";
	$script = mysqli_query($con, $sql) or die('Falha ao buscar horário de turma');
	$qtd = mysqli_num_rows($script);
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
		for($i = 1; $i <= 2; $i++){
			echo "<tr>";
			for($j = 1; $j <= 7; $j++){
				$url = "?pag=addaula&turma=" . $turma . "&ds=" . $j . "&period=" . $i;
				echo "<td>";
				$count = 0;
				if($qtd >= 1){
					while($horario = mysqli_fetch_array($script)){
						if($horario['aula_period'] == $i &&  $horario['ds_cod'] == $j){
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
				mysqli_data_seek($script, 0);
				echo "</td>";
			}
			echo "</tr>";
		}
	?>
</table>