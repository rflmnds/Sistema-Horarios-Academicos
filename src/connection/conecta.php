<?php
	// Conexão com o banco de dados: Dados
	$server = 'localhost';
	$user = 'root';
	$pswd = '';
	$db = 'db_pdt';

	// Conexão com o banco de dados: Instrução SQL
	$conn = mysqli_connect($server, $user, $pswd, $db) or die ('Falha ao conectar no banco de dados');
?>
