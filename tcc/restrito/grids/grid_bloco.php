<?php
	require('conexao/conecta.php');

	$sql = "SELECT * FROM bloco";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar disciplinas");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Nome do bloco local</th>
		<th>Ações</th>
	</tr>
	<?php
		while($bloco = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $bloco['blo_cod'];

			echo "<tr>";

			echo "	<td>" . $bloco['blo_cod'] . "</td>";
			echo "	<td>" . $bloco['blo_desc'] . "</td>";
			echo "	<td><a class='btn btn-warning' href='$url'>Editar</a></td>";
			echo "</tr>";
		}
	?>
</table>