<?php
	require('conexao/conecta.php');

	$sql = "SELECT * FROM serie as s 
			INNER JOIN matriz as m ON s.mat_cod = m.mat_cod
			INNER JOIN curso as c ON m.cur_cod = c.cur_cod";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar turmas");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Módulo</th>
		<th>Ano</th>
		<th>Matriz Curricular</th>
	</tr>
	<?php
		while($turma = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $turma['ser_cod'];

			echo "<tr>";
			echo "	<td>" . $turma['ser_cod'] . "</td>";
			echo "	<td>" . $turma['ser_modulo'] . "</td>";
			echo "	<td>" . $turma['ser_ano'] . "</td>";
			echo "	<td>" . $turma['mat_info'] . "</td>";
			echo "</tr>";
		}
	?>
</table>
