<?php
	require('connection/conecta.php');

	$nome = $_POST['nome'];
	$ano = $_POST['ano'];
	$matriz = $_POST['matriz'];

	$sql = "INSERT INTO turma(tur_nome, tur_ano, mat_cod) VALUES ('$nome', $ano, $matriz)";

	mysqli_query($conn, $sql) or die('Falha ao cadastrar turma');

	$mensagem = "Turma cadastrada com sucesso";
?>