<?php
	require('conexao/conecta.php');

	$info = $_POST['info'];
	$curso = $_POST['curso'];

	if(isset($_GET['id'])) {
		$sql = "UPDATE matriz SET mat_info = '$info', cur_cod = $curso WHERE mat_cod = " . $_GET['id'];
		mysqli_query($con,$sql) or die('Falha ao alterar matriz curricular');
		
		$mensagem = "Matriz alterado com sucesso";
	}
	else {
		$sql = "INSERT INTO matriz(mat_info, cur_cod) VALUES ('$info', $curso)";
		mysqli_query($con,$sql) or die('Falha ao cadastrar matriz curricular');

		$mensagem = "Matriz cadastrado com sucesso";
	}
?>