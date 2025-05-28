<?php
	require("connection/conecta.php");

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	try{
        $stmt = $conn->prepare('SELECT * FROM usuario WHERE usu_email = :email AND usu_senha = :senha');

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', md5($senha));
        
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario){
            $_SESSION['usuario'] = $usuario['usu_nome'];
            $_SESSION['tipoUsuario'] = $usuario['tu_cod'];
            $_SESSION['professor'] = $usuario['pro_cod'];
            header('location: ?pag=home');
        }
        else{
            $_SESSION['erro'] = "Informações inválidas";
		    header('location: ?pag=login');   
        }   
    }
    catch(PDOException $e){
        echo 'Erro: ' . $e->getMessage();  
        
    }
?>