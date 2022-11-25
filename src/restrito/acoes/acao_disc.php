<?php
	require('connection/conecta.php');

	$nome = $_POST['nome'];
	$carga = $_POST['carga'];
	$ementa = $_POST['ementa'];
	$referencias = $_POST['referencias'];
	$serie = $_POST['serie'];

	$sql = "INSERT INTO disciplina(dis_nome, dis_carga, dis_ementa, dis_referencias, ser_cod) VALUES ('$nome', $carga, '$ementa', '$referencias', $serie)";

	mysqli_query($con,$sql) or die('Falha ao inserir Disciplina');

	$mensagem = "Disciplina cadastrado com sucesso";
?>