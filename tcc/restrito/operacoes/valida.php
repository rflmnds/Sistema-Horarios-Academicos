<?php
	if(!isset($_SESSION['usuario'])){
		$_SESSION['erro'] = "O Administrador deve fazer login para acessar essa página.";
		header("location: ?pag=login");
	}
	if($_SESSION['tipoUsuario'] != 1){
		$_SESSION['erro'] = "Apenas o Administrador pode acessar essa página";
		header("location: ?pag=erro");
	}
?>