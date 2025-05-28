<?php
	$mensagem = null;

	include('restrito/operacoes/valida.php');

	if(isset($_POST['desc'])){
	 	require('restrito/acoes/acao_nivel.php');
	}

	if(isset($_GET['id'])){
		require('../src/connection/conecta.php');

		$sql = "SELECT * FROM nivel where niv_cod = " . $_GET['id'];
		$result = mysqli_query($conn, $sql) or die('Falha ao buscar nivel');
		$nivel = mysqli_fetch_array($result);

		$desc = $nivel['niv_desc'];
	}
	else{
		$desc = null;
	}
?>

<div>
	<h1>Acrescentar Nível de Ensino:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="desc">Nível</label>
			<input type="text" name="desc" class="form-control" value="<?= $desc ?>" placeholder="Nível de Ensino" required>
		</div>
		<div class="form-group">
			<input type="submit" value="Salvar" class="btn btn-primary">
			<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadnivel'">
		</div>
		<div class="form-group">
			<a href='?pag=cadcurso' class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
		</div>
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Níveis Ofertados:</h2>
	<?php include('restrito/grids/grid_nivel.php') ?>
</div>