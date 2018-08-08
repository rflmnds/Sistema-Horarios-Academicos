<?php
	require('conexao/conecta.php');

	$mensagem = null;

	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_bloco.php');
	}

	$ppc = null;
?>


<div>
	<h1>Adicionar Sala:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" class="form-control" placeholder="Nome do Bloco" required> 
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadbloco'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Disciplinas:</h2>
	<?php include('restrito/grids/grid_bloco.php') ?>
</div>