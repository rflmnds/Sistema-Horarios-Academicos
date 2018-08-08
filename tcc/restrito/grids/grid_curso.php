<?php
	require('conexao/conecta.php');

	$sql = "SELECT * FROM curso";

	$result = mysqli_query($con, $sql) or die("Falha ao buscar cursos");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Nome do Curso</th>
		<th>Categoria de Ensino</th>
		<th>Carga Horária Total</th>
		<th>Ações</th>
	</tr>
	<?php
		while($curso = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $curso['cur_cod'];

			echo "<tr>";
			echo "	<td>" . $curso['cur_cod'] . "</td>";
			echo "	<td>" . $curso['cur_nome'] . "</td>";
			echo "	<td>" . $curso['cur_nivel'] . "</td>";
			echo "	<td>" . $curso['cur_hrtotal'] . "</td>";
			echo "	<td><a class='btn btn-warning' href='$url'>Editar</a></td>";
			echo "</tr>";
		}
	?>
</table>
