<?php
	require('conexao/conecta.php');

	$status = $_POST['status'];
	$sala = $_POST['sala'];
	$disciplina = $_POST['disciplina'];

	echo $sql = "INSERT INTO horario(hor_status, sal_cod, aula_cod, ofe_cod) VALUES ('$status', $sala, $aula_cod, $disciplina)";

	mysqli_query($con, $sql) or die('Falha ao conectar horário');

	$mensagem = "Conectado com sucesso";
?>
