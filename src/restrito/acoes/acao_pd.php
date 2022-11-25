<?php
	require('connection/conecta.php');

	$disciplina = $_POST['addDisciplina'];

	$sql = "SELECT * FROM professor_has_disciplina WHERE pro_cod = $id AND dis_cod = $disciplina";
	$result = mysqli_query($con, $sql);
	$rows = mysqli_num_rows($result);

	if($rows == 0){
		$sql = "INSERT INTO professor_has_disciplina(pro_cod, dis_cod) VALUES ($id, $disciplina)";
	
		mysqli_query($con, $sql) or die('Falha ao conectar professor à disciplina');
	
		header('Refresh:0');
	
		$mensagem = "Conectado com sucesso";
	}
	else{
		$mensagem = "Já há um vínculo entre o professor e a disciplna selecionados";
	}
?>
