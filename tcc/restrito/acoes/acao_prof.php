<?php
	require('conexao/conecta.php');

	$nome = $_POST['nome'];
	$siape = $_POST['siape'];
	$formacao = $_POST['formacao'];
	
	if(isset($_GET['id'])) {
		$sql = "UPDATE professor SET pro_nome = '$nome', pro_siape = $siape, pro_formacao = '$formacao' WHERE pro_cod = " . $_GET['id'];
		mysqli_query($con,$sql) or die('Falha ao alterar Produto');
		
		$mensagem = "Professor alterado com sucesso";
	}
	else{
		$sql = "INSERT INTO professor(pro_nome, pro_siape, pro_formacao) VALUES ('$nome', $siape, '$formacao')";
		mysqli_query($con,$sql) or die('Falha ao inserir professor');
	
		$mensagem = "Professor cadastrado com sucesso";
	}
?>