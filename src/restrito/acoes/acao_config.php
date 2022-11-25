<?php
	require('connection/conecta.php');

	$desc = $_POST['desc'];
	$horaIni = $_POST['horaIni'];
	$horaFin = $_POST['horaFin'];

	$sql = "INSERT INTO config_hora(con_desc, con_horaini, con_horafin, turno_cod) VALUES ('$desc', '$horaIni', '$horaFin', $turno_cod)";

	mysqli_query($con,$sql) or die('Falha ao configurar horário(Cadastro de hora)');

	$mensagem = "Configuração adicionada com sucesso";
?>
