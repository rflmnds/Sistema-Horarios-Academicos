<?php
	require('connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_bloco.php');
	}

	if(isset($_GET['id'])){
		require('connection/conecta.php');

		$sql = "SELECT * FROM bloco where blo_cod = " . $_GET['id'];
		$result = mysqli_query($conn, $sql) or die('Falha ao buscar bloco');
		$bloco = mysqli_fetch_array($result);

		$desc = $bloco['blo_desc'];
	}
	else{
		$desc = null;
	}
?>


<div>
	<h1>Cadastrar Bloco Local:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" class="form-control" value="<?= $desc ?>" placeholder="Nome do Bloco" required> 
		</div>
		<input type="submit" value="Salvar" class="btn btn-primary">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadbloco'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Blocos Locais cadastrados:</h2>
	<?php include('restrito/grids/grid_bloco.php') ?>
</div>