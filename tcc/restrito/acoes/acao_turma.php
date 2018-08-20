<?php
	require('conexao/conecta.php');

	$nome = $_POST['nome'];
	$ano = $_POST['ano'];
	$ppc = $_POST['ppc'];

	$sql = "INSERT INTO turma(tur_nome, tur_ano, ppc_cod) VALUES ('$nome', $ano, $ppc)";

	mysqli_query($con,$sql) or die('Falha ao cadastrar turma');

	$mensagem = "Turma cadastrada com sucesso";
?>