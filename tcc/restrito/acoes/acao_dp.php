<?php
	require('conexao/conecta.php');

	$professor = $_POST['addProf'];

	$sql = "INSERT INTO professor_has_disciplina(pro_cod, dis_cod) VALUES ($professor, $id)";

	mysqli_query($con, $sql) or die('Falha ao conectar professor à disciplina');

	$mensagem = "Conectado com sucesso";
?>
