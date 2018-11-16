<?php
	require("conexao/conecta.php");

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$novaSenha = $_POST['novaSenha'];
	echo $senha = $_POST['senha'];

	echo $sql = "SELECT * FROM usuario WHERE usu_nome = '" . $_SESSION['usuario'] . "'";
	$result = mysqli_query($con, $sql) or die('Falha no SQL login');
	$usuario = mysqli_fetch_array($result);

	if($senha = $usuario['usu_senha']){
		$sql = "UPDATE usuario SET usu_nome = '$nome', usu_email = '$email', usu_senha = md5('$novaSenha') WHERE pro_cod = " . $_GET['id'];
		mysqli_query($con,$sql) or die('Falha ao alterar informações do usuário');

		session_destroy() or die ("Falha no logout");
		header("location: ?pag=login");
	}
	else {
		$_SESSION['erro'] = "Informações inválidas";
	}
?>