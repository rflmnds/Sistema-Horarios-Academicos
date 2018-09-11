<?php
	require('../../conexao/conecta.php');

	$turma = $_POST['turma'];

	$sql = "SELECT * FROM horario as h
			INNER JOIN oferta as o ON h.ofe_cod = o.ofe_cod
			INNER JOIN serie_has_turma as st ON o.ser_cod = st.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod
			INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
			WHERE h.ofe_id = " . ($turma+3);
	$script = mysqli_query($con, $sql) or die('Falha ao buscar horário de turma');
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
		while($horario = mysqli_fetch_array($script)){
			echo "<tr>
					<td>" . $horario['dis_nome'] ."</td>
				</tr>";
		}
	?>
</table>

