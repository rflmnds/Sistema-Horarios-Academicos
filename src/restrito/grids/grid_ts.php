<?php
	require('../src/connection/conecta.php');

	$id = $_GET['id'];

	$sql = "SELECT * FROM serie_has_turma as st
			INNER JOIN serie as s ON st.ser_cod = s.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			WHERE t.tur_cod = $id";
	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar séries vinculadas");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Série</th>
		<th>Ações</th>
	</tr>
	<?php
		while($serie = mysqli_fetch_array($result)){
			$url1 = '?pag=oferta&tur=' . $id . '&ser=' . $serie['ser_cod'];
			$url2 = '?pag=vincturno&tur=' . $id . '&ser=' . $serie['ser_cod'];

			echo "<tr>";
			echo "	<td>" . $serie['ser_cod'] . "</td>";
			echo "	<td>" . $serie['ser_modulo'] . " - " . $serie['ser_ano'] . "</td>";
			echo "	<td>
						<a href='$url1'class='btn btn-default'>Ofertar disciplinas</a>
						<a href='$url2'class='btn btn-default'>Vincular à turno</a>
					</td>";
			echo "</tr>";
		}
	?>
</table>
