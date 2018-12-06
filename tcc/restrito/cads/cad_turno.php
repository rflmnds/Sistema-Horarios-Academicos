<?php
	require('conexao/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	if(isset($_POST['submit'])){
	 	require('restrito/acoes/acao_turno.php');
	}
?>

<div>
	<h1>Adicionar Turno:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="desc">Turno</label>
			<input type="text" name="desc" class="form-control" placeholder="Turno" required>
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<select name="status" class="form-control">
				<option value="Ativo">Ativo</option>
				<option value="Inativo">Inativo</option>
			</select>
		</div>
		<input type="submit" value="Salvar" name="submit" class="btn btn-primary">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadturma'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Turnos cadastrados:</h2>
	<?php include('restrito/grids/grid_turno.php') ?>
</div>