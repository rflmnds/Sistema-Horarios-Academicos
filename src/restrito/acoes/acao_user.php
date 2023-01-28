<?php
	require('connection/conecta.php');

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$tipo = $_POST['tipo'];
	$prof = $_POST['prof'];

	if(isset($_GET['id'])) {
		$sql = "UPDATE usuario SET usu_nome = '$nome', usu_email = '$email', usu_senha = md5('$senha'), tu_cod = $tipo, pro_cod = $prof WHERE usu_cod = " . $_GET['id'];
		mysqli_query($conn, $sql) or die('Falha ao alterar informações do usuário');
		
		$mensagem = "Informações do usuário alteradas com sucesso";
	}
	else {
		$sql = "INSERT INTO usuario(usu_nome, usu_email, usu_senha, tu_cod, pro_cod) VALUES ('$nome', '$email', md5('$senha'),  $tipo, $prof)";
		mysqli_query($conn, $sql) or die('Falha ao cadastrar usuário');

		$mensagem = "Usuário cadastrado com sucesso";
	}
?>