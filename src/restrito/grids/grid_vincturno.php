<?php
	require('connection/conecta.php');

	$sql = "SELECT * FROM serie_turma_has_turno as stt
			INNER JOIN serie_has_turma as st ON stt.st_cod = st.st_cod
			INNER JOIN serie as s ON st.ser_cod = s.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			INNER JOIN turno as tn ON stt.turno_cod = tn.turno_cod
			WHERE s.ser_cod = $ser_cod AND t.tur_cod = $tur_cod";
	$result1 = mysqli_query($conn,  $sql) or die("Falha ao buscar turnos vinculados");

	$getCod = mysqli_fetch_array($result1);
	$st_cod = $getCod['st_cod']; 

	$link = "?pag=vincturno&tur=" . $tur_cod . "&ser=" . $ser_cod;

	if(isset($_GET['turno'])){
		$turno_cod = $_GET['turno'];

		$sql = "SELECT * FROM serie_turma_has_turno WHERE st_cod = $st_cod AND turno_cod = $turno_cod";
		$result2 = mysqli_query($conn,  $sql)or die('Falha ao buscar status atual do turno');
		$array = mysqli_fetch_array($result2);
		$status = $array['stt_status'];
		$stt_cod = $array['stt_cod'];

		if($status == "Ativo"){
			$sql = "UPDATE serie_turma_has_turno SET stt_status = 'Desativo' WHERE stt_cod = $stt_cod"; 
			mysqli_query($conn,  $sql)or die('Falha ao alterar status atual');
		}
		else{
			$sql = "UPDATE serie_turma_has_turno SET stt_status = 'Ativo' WHERE stt_cod = $stt_cod"; 
			mysqli_query($conn,  $sql)or die('Falha ao alterar status atual');
		}
		header("Location: $link");
	}
?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Turno</th>
		<th>Status</th>
		<th>Ações</th>
	</tr>
	<?php
		mysqli_data_seek($result1, 0);
		while($turno = mysqli_fetch_array($result1)){
			$url = '?pag=vincturno&tur=' . $tur_cod . '&ser=' . $ser_cod . "&turno=" . $turno['turno_cod'];

			echo $turno['stt_status'];
			echo "<tr>";
			echo "	<td>" . $turno['stt_cod'] . "</td>";
			echo "	<td>" . $turno['turno_desc'] .  "</td>";
			echo "	<td>" . $turno['stt_status'] .  "</td>";
			echo "	<td><a class='btn btn-warning' href='$url'>Ativar/Desativar</a></td>";
			echo "</tr>";
		}
	?>
</table>
