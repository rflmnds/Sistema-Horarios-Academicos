<?php
	// Conexão com o banco de dados: Dados
	$server = 'localhost';
	$user = 'root';
	$pswd = '';
	$db = 'db_pdt';

	// Conexão com o banco de dados: Instrução SQL
	try{
    $conn = new PDO("mysql:host=$server;dbname=$db,", $user, $pswd);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado ao banco de dados com sucesso";
  } catch(PDOException $e){
    echo 'Falha na conexão com o banco de dados:' . $e->getMessage();
  }
?>