<?php
	require('conexao/conecta.php');

	$desc = $_POST['desc'];
	$horaIni = $_POST['horaIni'];
	$horaFin = $_POST['horaFin'];

	$sql = "SELECT * FROM config_hora WHERE con_desc = $desc AND con_horaini = $horaIni con_horafin = $horaFin turno_cod = $turno_cod";
	$result = mysqli_query($con,$sql) or die('Falha ao configurar horário');
	
	while($config = mysqli_fetch_array($result)){
		$con_cod = $config['con_cod'];
		for($i = 0;$i < 7;$i++){
			$sql = "INSERT INTO horario(con_cod, ds_cod) VALUES ($con_cod, $i)";
		}
	}

	mysqli_query($con,$sql) or die('Falha ao configurar horário');

	$mensagem = "Configuração adicionada com sucesso";
?>
