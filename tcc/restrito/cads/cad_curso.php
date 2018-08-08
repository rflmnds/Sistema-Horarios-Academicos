<?php
	$mensagem = null;

	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_curso.php');
	}
?>

<div>
	<h1>Adicionar Curso:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome do Curso</label>
			<input type="text" name="nome" class="form-control" placeholder="Nome do Curso" required>
		</div>
		<div class="form-group">
			<label for="hrtotal">Carga Horária Total</label>
			<input type="text" name="hrtotal" class="form-control" placeholder="Carga Horária" required>
		</div>
		<div class="form-group">
			<label for="nivel">Categoria de Ensino</label>
			<select multiple class="form-control" name="nivel">
				<option value="Ensino Superior">Ensino Superior</option>
				<option value="Ensino Médio-Integrado">Ensino Médio-Integrado</option>
				<option value="Ensino à Distância(EaD)">Ensino à Distância(EaD)</option>
				<option value="Pós-Graduação">Pós-Graduação</option>
			</select>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadcurso'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Cursos:</h2>
	<?php include('restrito/grids/grid_curso.php') ?>
</div>