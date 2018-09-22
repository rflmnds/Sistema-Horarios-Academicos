<?php
	require('conexao/conecta.php');

	$tur_cod = $_GET['turma'];
	$ds_cod = $_GET['ds'];
	$aula_cod = $_GET['period'];

	$sql = "SELECT * FROM hora_aula as ha 
			INNER JOIN dia_semana as ds ON ha.ds_cod = ds.ds_cod
			WHERE ds.ds_cod = $ds_cod AND ha.aula_period = $aula_cod";
	$result = mysqli_query($con, $sql);

	$aula = mysqli_fetch_array($result);
	$period = $aula['aula_period'];
	$dsNome = $aula['ds_nome'];

	$sql = "SELECT * FROM turma WHERE tur_cod = $tur_cod";
	$result = mysqli_query($con, $sql);

	$turma = mysqli_fetch_array($result);
	$nomeTurma = $turma['tur_nome'];
?>

<div>
	<?= "<h2>Turma:" . $nomeTurma . " - " . $period . "ª Aula de " . $dsNome . "</h2>" ?>
	<form name="form1" method="post">
		
	</form>
</div>