<?php
	require('conexao/conecta.php');

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$tipo = $_POST['tipo'];

	if(isset($_GET['id'])) {
		$sql = "UPDATE usuario SET usu_nome = '$nome', usu_email = '$email', usu_senha = md5('$senha'), tu_cod = $tipo WHERE usu_cod = " . $_GET['id'];
		mysqli_query($con,$sql) or die('Falha ao alterar informações do usuário');
		
		$mensagem = "Informações do usuário alteradas com sucesso";
	}
	else {
		$sql = "INSERT INTO usuario(usu_nome, usu_email, usu_senha, tu_cod) VALUES ('$nome', '$email', md5('$senha'),  $tipo)";
		mysqli_query($con,$sql) or die('Falha ao cadastrar usuário');

		$mensagem = "Usuário cadastrado com sucesso";
	}
?>