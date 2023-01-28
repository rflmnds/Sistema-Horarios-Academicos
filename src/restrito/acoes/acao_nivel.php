<?php
	require('connection/conecta.php');

	$desc = $_POST['desc'];
	
	if(isset($_GET['id'])) {
		$sql = "UPDATE nivel SET niv_desc = '$desc' WHERE niv_cod = " . $_GET['id'];
		mysqli_query($conn, $sql) or die('Falha ao alterar nivel');
		
		$mensagem = "Nível alterado com sucesso";
	}
	else{
		$sql = "INSERT INTO nivel(niv_desc) VALUES ('$desc')";
		mysqli_query($conn, $sql) or die('Falha ao inserir nivel');

		$mensagem = "Nível cadastrado com sucesso";
	}
?>