<?php
	require('conexao/conecta.php');

	$mensagem1 = null;
	$mensagem2 = null;

	$status = $_POST['status'];
	$sala = $_POST['sala'];
	$disciplina = $_POST['disciplina'];

	$sql = "SELECT * FROM oferta as o
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			WHERE o.ofe_cod = $disciplina";
	$result1 = mysqli_query($con, $sql);
	$getProf = mysqli_fetch_array($result1);
	$pro_cod = $getProf['pro_cod'];

	$sql = "SELECT * FROM aula as a 
			INNER JOIN oferta as o ON a.ofe_cod = o.ofe_cod 
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			WHERE a.hor_cod = $hor_cod";
	$result2 = mysqli_query($con, $sql);
	$check = 0;

	while($valida1 = mysqli_fetch_array($result2)){ 
		if(isset($_GET['id'])){
			if($valida1['aula_cod'] != $_GET['id']){
				if($valida1['pro_cod'] == $pro_cod){
					$check++;
					$mensagem1 = "Professor está em aula nesse horário";
				}
				if($valida1['sal_cod'] == $sala){
					$check++;
					$mensagem2 = "Sala está em uso nesse horário";
				}
			}
		}
		else{
			if($valida1['pro_cod'] == $pro_cod){
					$check++;
					$mensagem1 = "Professor está em aula nesse horário";
				}
				if($valida1['sal_cod'] == $sala){
					$check++;
					$mensagem2 = "Sala está em uso nesse horário";
				}
		}
	}

	if($check == 0){
		if(isset($_GET['id'])){
			$sql = "UPDATE aula SET aula_status = '$status', sal_cod = $sala, hor_cod = $hor_cod, ofe_cod = $disciplina WHERE aula_cod = " . $_GET['id'];
			mysqli_query($con,$sql) or die('Falha ao alterar aula');
			$mensagem = "Aula alterado com sucesso";
		}
		else{
			$sql = "INSERT INTO aula(aula_status, sal_cod, hor_cod, ofe_cod) VALUES ('$status', $sala, $hor_cod, $disciplina)";
			mysqli_query($con, $sql) or die('Falha ao adicionar aula');
			$mensagem = "Aula adicionada com sucesso";
		}
	}
	else{
		echo "<script type='text/javascript'>alert('Erro de validação: $mensagem1 $mensagem2');</script>";
	}
?>
