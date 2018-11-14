<?php
	require("../../conexao/conecta.php");

	$email = $_POST['email'];
	$senha = $_POST['password'];

	echo $sql = "SELECT * FROM usuario WHERE usu_email = '$email' AND usu_senha = '$senha'";
	$result = mysqli_query($con, $sql) or die('Falha no SQL login');

	session_start();

	if($usuario = mysqli_fetch_array($result)){
		$_SESSION['usuario'] = $usuario['nome'];
		header('location: ?pag=home.php');
	}
	else {
		$_SESSION['erro'] = "Informações inválidas";
		header('location:../../index.php');
	}
?>