<?php
	require('conexao/conecta.php');

	$nome = $_POST['nome'];
	$siape = $_POST['siape'];
	$formacao = $_POST['formacao'];
	
	$sql = "INSERT INTO professor(pro_nome, pro_siape, pro_formacao) VALUES ('$nome', $siape, '$formacao')";

	mysqli_query($con,$sql) or die('Falha ao inserir professor');

	$mensagem = "Professor cadastrado com sucesso";
?>