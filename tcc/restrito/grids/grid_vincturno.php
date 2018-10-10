<?php
	require('conexao/conecta.php');

	$sql = "SELECT * FROM serie_turma_has_turno as stt
			INNER JOIN serie_has_turma as st ON stt.st_cod = st.st_cod
			INNER JOIN serie as s ON st.ser_cod = s.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			INNER JOIN turno as tn ON stt.turno_cod = tn.turno_cod
			WHERE s.ser_cod = $ser_cod AND t.tur_cod = $tur_cod";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar turnos vinculados");
?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Turno</th>
		<th>Status</th>
	</tr>
	<?php
		while($turno = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=config&tur=' . $tur_cod . '&ser=' . $ser_cod . "&turno=" . $turno['turno_cod'];

			echo "<tr>";

			echo "	<td>" . $turno['stt_cod'] . "</td>";
			echo "	<td>" . $turno['turno_desc'] .  "</td>";
			echo "	<td>" . $turno['turno_status'] .  "</td>";
			echo "</tr>";
		}
	?>
</table>
