<?php
	require('connection/conecta.php');

	$sql = "SELECT * FROM turno";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar turnos");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Turno</th>
		<th>Status</th>
		<th>Ações</th>
	</tr>
	<?php
		while($turma = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $turma['turno_cod'];

			echo "<tr>";
			echo "	<td>" . $turma['turno_cod'] . "</td>";
			echo "	<td>" . $turma['turno_desc'] . "</td>";
			echo "	<td>" . $turma['turno_status'] . "</td>";
			echo "	<td>
						<a class='btn btn-secondary' href='?pag=config&id=" . $turma['turno_cod'] . "'>Configurar horário</a>
					</td>";
			echo "</tr>";
		}
	?>
</table>
