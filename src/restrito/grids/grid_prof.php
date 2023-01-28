<?php
	require('connection/conecta.php');

	$sql = "SELECT * FROM professor";
	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar professor");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Nome</th>
		<th>Formação</th>
		<th>Ações</th>
	</tr>
	<?php
		while($professor = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $professor['pro_cod'];

			echo "<tr>";
			echo "	<td>" . $professor['pro_cod'] . "</td>";
			echo "	<td>" . $professor['pro_nome'] . "</td>";
			echo "	<td>" . $professor['pro_formacao'] . "</td>";
			echo "	<td>
						<a class='btn btn-warning' href='$url'>Editar</a>
						<a class='btn btn-info' href='?pag=profdisc&id=" . $professor['pro_cod'] . "'>Disciplinas</a>
					</td>";
			echo "</tr>";
		}
	?>
</table>