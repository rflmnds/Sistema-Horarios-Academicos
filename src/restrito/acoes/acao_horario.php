<?php
	require('../src/connection/conecta.php');

	$desc = $_POST['desc'];
	$horaIni = $_POST['horaIni'];
	$horaFin = $_POST['horaFin'];

	$sql = "SELECT * FROM config_hora 
				WHERE con_desc = '$desc' 
				AND con_horaini = '$horaIni' 
				AND con_horafin = '$horaFin' 
				AND turno_cod = $turno_cod";
	$result = mysqli_query($conn, $sql) or die('Falha ao configurar horário (Buscar informações)');
	
	while($config = mysqli_fetch_array($result)){
		$con_cod = $config['con_cod'];
		for($i = 1;$i <= 7;$i++){
			$sql = "INSERT INTO horario(con_cod, ds_cod) VALUES ($con_cod, $i)";
			mysqli_query($conn, $sql) or die('Falha ao configurar horário (Adicionar hora à grade)');
		}
	}

	$mensagem = "Configuração adicionada com sucesso";
?>
