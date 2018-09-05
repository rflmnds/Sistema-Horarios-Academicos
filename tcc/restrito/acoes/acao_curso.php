<?php
	require('conexao/conecta.php');

	$nome = $_POST['nome'];
	$hrtotal = $_POST['hrtotal'];
	$nivel = $_POST['nivel'];

	if(isset($_GET['id'])) {
		$sql = "UPDATE curso SET cur_nome = '$nome', cur_hrtotal = $hrtotal, cur_nivel = '$nivel' WHERE cur_cod = " . $_GET['id'];
		mysqli_query($con,$sql) or die('Falha ao alterar Produto');
		
		$mensagem = "Curso alterado com sucesso";
	}
	else {
		$sql = "INSERT INTO curso(cur_nome, cur_hrtotal, cur_nivel) VALUES ('$nome',$hrtotal,'$nivel')";
		mysqli_query($con,$sql) or die('Falha ao inserir Curso');

		$mensagem = "Curso cadastrado com sucesso";
	}
?>