<?php
	require('conexao/conecta.php');

	$mensagem = null;

	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_prof.php');
	}

	$ppc = null;
?>

<div>
	<h1>Adicionar Professor:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" class="form-control" placeholder="Nome" required>
		</div>
		<div class="form-group">
			<label for="siape">SIAPE</label>
			<input type="text" name="siape" class="form-control" placeholder="SIAPE" required>
		</div>
		<div class="form-group">
			<label for="formacao">Formação profissional</label>
			<input type="text" name="formacao" class="form-control" placeholder="Formação" required>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadprof'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Professores:</h2>
	<?php include('restrito/grids/grid_prof.php') ?>
</div>