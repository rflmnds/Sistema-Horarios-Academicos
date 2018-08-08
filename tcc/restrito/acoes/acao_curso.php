<?php
	require('conexao/conecta.php');

	$nome = $_POST['nome'];
	$hrtotal = $_POST['hrtotal'];
	$nivel = $_POST['nivel'];

	$sql = "INSERT INTO curso(cur_nome,cur_hrtotal,cur_nivel) VALUES ('$nome',$hrtotal,'$nivel')";

	mysqli_query($con,$sql) or die('Falha ao inserir Curso');

	$mensagem = "Curso cadastrado com sucesso";
?>