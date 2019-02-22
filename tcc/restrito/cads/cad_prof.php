<?php
	require('conexao/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_prof.php');
	}

	if(isset($_GET['id'])){
		require('conexao/conecta.php');

		$sql = "SELECT * FROM professor where pro_cod = " . $_GET['id'];
		$result = mysqli_query($con,$sql) or die('Falha ao buscar bloco');
		$professor = mysqli_fetch_array($result);

		$nome = $professor['pro_nome'];
		$siape = $professor['pro_siape'];
		$formacao = $professor['pro_formacao'];
	}
	else{
		$nome = null;
		$siape = null;
		$formacao = null;
	}
?>

<div>
	<h1>Cadastrar Professor:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" class="form-control" value="<?= $nome ?>" placeholder="Nome" required>
		</div>
		<div class="form-group">
			<label for="siape">SIAPE</label>
			<input type="text" name="siape" class="form-control" value="<?= $siape ?>" placeholder="SIAPE" required>
		</div>
		<div class="form-group">
			<label for="formacao">Formação profissional</label>
			<input type="text" name="formacao" class="form-control" value="<?= $formacao ?>" placeholder="Formação" required>
		</div>
		<input type="submit" value="Salvar" class="btn btn-primary">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadprof'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Professores:</h2>
	<?php include('restrito/grids/grid_prof.php') ?>
</div>