<?php
	require('conexao/conecta.php');

	$status = $_POST['status'];
	$sala = $_POST['sala'];
	$disciplina = $_POST['disciplina'];

	$sql = "INSERT INTO aula(aula_status, sal_cod, hor_cod, ofe_cod) VALUES ('$status', $sala, $hor_cod, $disciplina)";

	mysqli_query($con, $sql) or die('Falha ao conectar horário');

	$mensagem = "Conectado com sucesso";
?>
