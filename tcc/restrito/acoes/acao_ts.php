<?php
	require('conexao/conecta.php');

	$serie = $_POST['serie'];

	$sql = "INSERT INTO serie_has_turma(ser_cod, tur_cod) VALUES ($serie, $id)";

	mysqli_query($con, $sql) or die('Falha ao conectar professor à disciplina');

	$mensagem = "Conectado com sucesso";
?>
