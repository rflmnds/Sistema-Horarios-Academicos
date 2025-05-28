<?php
	require('../src/connection/conecta.php');

	$serie = $_POST['serie'];

	$sql = "SELECT * FROM serie_has_turma WHERE ser_cod = $serie AND tur_cod = $id";
	$result = mysqli_query($conn,  $sql);
	$rows = mysqli_num_rows($result);

	if($rows == 0){
		$sql = "INSERT INTO serie_has_turma(ser_cod, tur_cod) VALUES ($serie, $id)";
	
		mysqli_query($conn,  $sql) or die('Falha ao conectar professor à disciplina');
	
		$mensagem = "Conectado com sucesso";
	}
	else{
		$mensagem = "Já há um vínculo entre a turma e a série selecionados";
	}
?>
