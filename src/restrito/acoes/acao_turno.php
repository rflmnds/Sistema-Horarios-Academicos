<?php
	require('../src/connection/conecta.php');

	$desc = $_POST['desc'];
	$status = $_POST['status'];

	$sql = "INSERT INTO turno(turno_desc, turno_status) VALUES ('$desc', '$status')";

	mysqli_query($conn, $sql) or die('Falha ao cadastrar turno');

	$mensagem = "Turno cadastrada com sucesso";
?>