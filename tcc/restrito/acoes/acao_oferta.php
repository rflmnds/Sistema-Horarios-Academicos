<?php
	require('conexao/conecta.php');

	$disciplina = $_POST['disc'];
	$ano = $_POST['ano'];

	$sql = "INSERT INTO oferta(st_cod, pd_cod, ofe_ano) VALUES ($st_cod, $disciplina, $ano)";

	mysqli_query($con, $sql) or die('Falha ao ofertar');

	$mensagem = "Ofertado com sucesso";
?>
