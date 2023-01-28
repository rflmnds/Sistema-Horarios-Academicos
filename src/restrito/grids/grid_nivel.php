<?php
	require('connection/conecta.php');

	$sql = "SELECT * FROM nivel";
	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar os níveis de ensino");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Nível de Ensino</th>
		<th>Ações</th>
	</tr>
	<?php
		while($nivel = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $nivel['niv_cod'];

			echo "<tr>";

			echo "	<td>" . $nivel['niv_cod'] . "</td>";
			echo "	<td>" . $nivel['niv_desc'] . "</td>";
			echo "	<td><a class='btn btn-warning' href='$url'>Editar</a></td>";
			echo "</tr>";
		}
	?>
</table>