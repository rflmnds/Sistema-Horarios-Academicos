<?php
	require('connection/conecta.php');

	$nome = $_POST['nome'];
	$hrtotal = $_POST['hrtotal'];
	$nivel = $_POST['nivel'];

	if(isset($_GET['id'])) {
		$sql = "UPDATE curso SET cur_nome = '$nome', cur_hrtotal = $hrtotal, niv_cod = $nivel WHERE cur_cod = " . $_GET['id'];
		mysqli_query($con,$sql) or die('Falha ao alterar Produto');
		
		$mensagem = "Curso alterado com sucesso";
	}
	else {
		$sql = "INSERT INTO curso(cur_nome, cur_hrtotal, niv_cod) VALUES ('$nome', $hrtotal, $nivel)";
		mysqli_query($con,$sql) or die('Falha ao inserir Curso');

		$mensagem = "Curso cadastrado com sucesso";
	}
?>