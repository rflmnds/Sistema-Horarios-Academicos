<?php
	// Conexão com o banco de dados: Dados
	$server = 'localhost';
	$user = 'root';
	$pswd = '';
	$db = 'db_pdt';

	// Conexão com o banco de dados: Instrução SQL
	$con=mysqli_connect($server, $user, $pswd, $db);
	if(mysqli_connect_errno($con)){
		echo 'Falha na conexão com o banco de dados';
	}
?>