<?php
	require('conexao/conecta.php');

	$desc = $_POST['desc'];
	$status = $_POST['status'];

	$sql = "INSERT INTO turno(turno_desc, turno_status) VALUES ('$desc', '$status')";

	mysqli_query($con,$sql) or die('Falha ao cadastrar turno');

	$mensagem = "Turno cadastrada com sucesso";
?>