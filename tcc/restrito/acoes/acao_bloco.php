<?php
	require('conexao/conecta.php');

	$nome = $_POST['nome'];
	
	$sql = "INSERT INTO bloco(blo_desc) VALUES ('$nome')";

	mysqli_query($con,$sql) or die('Falha ao inserir bloco');

	$mensagem = "Bloco cadastrado com sucesso";
?>