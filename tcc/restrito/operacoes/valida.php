<?php
	if(!isset($_SESSION['usuario'])){
		$_SESSION['erro'] = "O Administrador deve fazer login para acessar essa página.";
		header("location: ?pag=login");
	}
	if($_SESSION['tipoUsuario'] != 1 && $_SESSION['tipoUsuario'] != 3){
		$_SESSION['erro'] = "Apenas o Administrador ou o Coordenador pode acessar essa página";
		header("location: ?pag=erro");
	}
?>