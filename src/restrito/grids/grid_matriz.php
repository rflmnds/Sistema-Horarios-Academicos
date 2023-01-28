<?php
	require('connection/conecta.php');

	$sql = "SELECT * FROM matriz";
	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar matrizes");
?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Identificação da matriz curricular</th>
		<th>Ações</th>
	</tr>
	<?php
		while($matriz = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $matriz['mat_cod'];

			echo "<tr>";

			echo "	<td>" . $matriz['mat_cod'] . "</td>";
			echo "	<td>" . $matriz['mat_info'] . "</td>";
			echo "	<td><a class='btn btn-warning' href='$url'>Editar</a></td>";
			echo "</tr>";
		}
	?>
</table>