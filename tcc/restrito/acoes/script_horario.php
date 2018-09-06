<?php
	require('../../conexao/conecta.php');

	$turma = $_POST['turma'];

	$sql = "SELECT * FROM horario as h
	INNER JOIN oferta as o ON h.ofe_cod = o.ofe_cod
	INNER JOIN serie_has_turma as st ON o.ser_cod = st.ser_cod
	INNER JOIN turma as t ON st.tur_cod = t.tur_cod
	WHERE ofe_cod = " . $turma;
	$script = mysqli_query($con, $sql);
?>

<table class="table table-hover">
	<th>Domingo</th>
	<th>Segunda</th>
	<th>Terça</th>
	<th>Quarta</th>
	<th>Quinta</th>
	<th>Sexta</th>
	<th>Sábado</th>
</table>

<?php

?>