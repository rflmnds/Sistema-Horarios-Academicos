<?php
	require('conexao/conecta.php');

	$ano = $_POST['ano'];
	$ppc = $_POST['ppc'];

	$sql = "INSERT INTO serie(ser_ano,ppc_cod) VALUES ($ano, $ppc)";

	mysqli_query($con,$sql) or die('Falha ao cadastrar série');

	$mensagem = "Série cadastrado com sucesso";
?>