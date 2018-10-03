<?php
	require('conexao/conecta.php');

	$id = $_GET['id'];

	$sql = "SELECT * FROM serie_has_turma as st
			INNER JOIN serie as s ON st.ser_cod = s.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			WHERE s.ser_cod = $id";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar disciplinas");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Série</th>
		<th>Ações</th>
	</tr>
	<?php
		while($serie = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=oferta&tur=' . $id . '&ser=' . $serie['ser_cod'];

			echo "<tr>";

			echo "	<td>" . $serie['ser_cod'] . "</td>";
			echo "	<td>" . $serie['ser_ano'] . "</td>";
			echo "	<td><a href='$url'class='btn btn-success'>Ofertar disciplinas</a></td>";
			echo "</tr>";
		}
	?>
</table>
