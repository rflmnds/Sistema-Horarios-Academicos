<?php
	require('conexao/conecta.php');

	$serie = $_POST['serie'];
	$disciplina = $_POST['disc'];
	$ano = $_POST['ano'];

	$sql = "INSERT INTO oferta(ser_cod, tur_cod, pd_cod, ofe_ano) VALUES ($serie, $id, $disciplina, $ano)";

	mysqli_query($con, $sql) or die('Falha ao ofertar');

	$mensagem = "Ofertado com sucesso";
?>
