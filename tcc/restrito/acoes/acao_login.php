<?php
	require("conexao/conecta.php");

	$email = $_POST['email'];
	$senha = $_POST['password'];

	$sql = "SELECT * FROM usuario WHERE usu_email = '$email' AND usu_senha = '$senha'";
	$result = mysqli_query($con, $sql) or die('Falha no SQL login');

	if($usuario = mysqli_fetch_array($result)){
		$_SESSION['usuario'] = $usuario['usu_nome'];
		$_SESSION['tipoUsuario'] = $usuario['tu_cod'];
		header('location: ?pag=home');
	}
	else {
		$_SESSION['erro'] = "Informações inválidas";
		header('location: ?pag=login');
	}
?>