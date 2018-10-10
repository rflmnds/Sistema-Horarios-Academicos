<?php
	require('conexao/conecta.php');

	$turno = $_POST['turno'];

	$sql = "INSERT INTO serie_turma_has_turno(ser_cod, tur_cod, turno_cod) VALUES ($ser_cod, $tur_cod, $turno)";

	mysqli_query($con, $sql) or die('Falha ao conectar professor à disciplina');

	$mensagem = "Conectado com sucesso";
?>