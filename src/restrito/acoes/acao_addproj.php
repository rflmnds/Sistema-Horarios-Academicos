<?php
	require('connection/conecta.php');

	$mensagem1 = null;
	$mensagem2 = null;

	$proj_cod = $_POST['projeto'];

	if(isset($_GET['id'])){
		$sql = "UPDATE hora_projeto SET proj_cod = $proj_cod, hor_cod = $hor_cod WHERE hp_cod = " . $_GET['id'];
		mysqli_query($conn,$sql) or die('Falha ao alterar horário de projeto');
		$mensagem = "Horário de projeto alterado com sucesso";
	}
	else{
		$sql = "INSERT INTO hora_projeto(proj_cod, hor_cod) VALUES ($proj_cod, $hor_cod)";
		mysqli_query($conn, $sql) or die('Falha ao adicionar horário de projeto');
		$mensagem = "Horário de projeto adicionada com sucesso";
	}
?>
