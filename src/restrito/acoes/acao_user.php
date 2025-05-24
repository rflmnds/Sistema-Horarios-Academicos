<?php
	require('connection/conecta.php');

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$tipo = $_POST['tipo'];
	$prof = $_POST['prof'];

	if(isset($_GET['id'])) {
		try{
			$stmt = $conn->prepare("UPDATE usuario SET usu_nome = :nome, usu_email = :email, usu_senha = :senha, tu_cod = :tipo, pro_cod = :prof WHERE usu_cod = :idUser");
		
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':senha', md5($senha));
			$stmt->bindValue(':tipo', $tipo);
			$stmt->bindValue(':prof', $prof);
			$stmt->bindValue(':idUser',$_GET['id']);

			$stmt->execute();
			
			// Retorna a mensagem de sucesso
			$mensagem = "Usuário alterado com sucesso";
		}
		catch(PDOException $e){
			echo 'Erro: ' . $e->getMessage();
		}
	}
	else {
		try{
			$stmt = $conn->prepare('INSERT INTO usuario (usu_nome, usu_email, usu_senha, tu_cod, pro_cod) VALUES (:nome, :email, md5(:senha), :tipo, :prof)');
			
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':senha', md5($senha));
			$stmt->bindValue(':tipo', $tipo);
			$stmt->bindValue(':prof', $prof);

			$stmt->execute();
			// Retorna a mensagem de sucesso
			$mensagem = 'Usuário cadastrado com sucesso';
		}
		catch(PDOException $e){
			echo 'Erro: ' . $e->getMessage();
		}
	}
?>