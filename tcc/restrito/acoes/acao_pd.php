<?php
	require('conexao/conecta.php');

	$disciplina = $_POST['addDisciplina'];

	$sql = "INSERT INTO professor_has_disciplina(pro_cod, dis_cod) VALUES ($id, $disciplina)";

	mysqli_query($con, $sql) or die('Falha ao conectar professor à disciplina');

	$mensagem = "Conectado com sucesso";
?>
