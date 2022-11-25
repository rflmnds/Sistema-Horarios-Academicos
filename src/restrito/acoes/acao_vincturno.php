<?php
	require('connection/conecta.php');
	
	$turno = $_POST['turno'];

	$sql = "SELECT * FROM serie_has_turma WHERE ser_cod = $ser_cod AND tur_cod = $tur_cod";
	$result = mysqli_query($con, $sql);
	$serie = mysqli_fetch_array($result);
	$st_cod = $serie['st_cod'];

	$sql = "SELECT * FROM serie_turma_has_turno WHERE st_cod = $ser_cod AND turno_cod = $turno";
	$result1 = mysqli_query($con, $sql);
	$rows = mysqli_num_rows($result1);

	if($rows == 0){
		$sql = "INSERT INTO serie_turma_has_turno(st_cod, stt_status,  turno_cod) VALUES ($st_cod, 'Ativo', $turno)";

		mysqli_query($con, $sql) or die('Falha ao vincular turno');

		$mensagem = "Conectado com sucesso";
	}
	else{
		$mensagem = "Já há um vínculo entre a turma, série e turno selecionados";
	}
?>
