<?php
	require('connection/conecta.php');

	$sql = "SELECT * FROM curso as c INNER JOIN nivel as n ON c.niv_cod = n.niv_cod";

	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar cursos");

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
			echo "	<td>" . $curso['niv_desc'] . "</td>";
			echo "	<td>" . $curso['cur_hrtotal'] . "</td>";
			echo "	<td><a class='btn btn-warning' href='$url'>Editar</a></td>";
			echo "</tr>";
		}
	?>
</table>
