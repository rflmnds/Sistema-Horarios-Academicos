<?php
	require('../src/connection/conecta.php');

	$nome = $_POST['nome'];
	
	if(isset($_GET['id'])) {
		$sql = "UPDATE bloco SET blo_desc = '$nome' WHERE blo_cod = " . $_GET['id'];
		mysqli_query($conn,$sql) or die('Falha ao alterar bloco');
		
		$mensagem = "Bloco alterado com sucesso";
	}
	else{
		$sql = "INSERT INTO bloco(blo_desc) VALUES ('$nome')";
		mysqli_query($conn,$sql) or die('Falha ao inserir bloco');

		$mensagem = "Bloco cadastrado com sucesso";
	}
?>
