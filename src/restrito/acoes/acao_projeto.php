<?php
	require('../src/connection/conecta.php');

	$tipo = $_POST['tipo'];
	$numero = $_POST['numero'];
	$status = $_POST['status'];

	if(isset($_POST['dataIni'])){
		$dataIni = $_POST['dataIni'];
		if($dataIni == ""){
			$dataIni = "null";
		}
	}
	if(isset($_POST['dataFim'])){
		$dataFim = $_POST['dataFim'];
		if($dataFim == ""){
			$dataFim = "null";
		}
	}

	$sql = "INSERT INTO projeto(tp_cod, pro_cod, proj_status, proj_numero, proj_data_ini, proj_data_fim) VALUES ($tipo, $pro_cod, '$status', $numero, $dataIni, $dataFim)";

	mysqli_query($conn, $sql) or die('Falha ao criar projeto');

	$mensagem = "Projeto criado com sucesso";
?>