<?php
	require('conexao/conecta.php');

	$info = $_POST['info'];
	$curso = $_POST['cur'];

	$sql = "INSERT INTO ppc(ppc_info, cur_cod) VALUES ('$info', $curso)";

	mysqli_query($con,$sql) or die('Falha ao cadastrar matriz curricular');

	$mensagem = "Matriz cadastrado com sucesso";
?>