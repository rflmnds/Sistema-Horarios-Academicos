<?php
	require('conexao/conecta.php');

	$sql = "SELECT * FROM disciplina";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar disciplinas");
?>
<div>
	<form name="form1" method="post">
		<div class="form-group">
			<h3>Disciplinas</h3>
			
			<input type="submit" name="submit" value="Salvar" class="btn btn-default btn-block">
		</div>
	</form>
</div>