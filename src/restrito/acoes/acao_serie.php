<?php
	require('../src/connection/conecta.php');

	$modulo = $_POST['modulo'];
	$ano = $_POST['ano'];
	$matriz = $_POST['matriz'];

	$sql = "INSERT INTO serie(ser_modulo, ser_ano, mat_cod) VALUES ('$modulo', $ano, $matriz)";

	mysqli_query($conn,  $sql) or die('Falha ao cadastrar série');

	$mensagem = "Série cadastrado com sucesso";
?>