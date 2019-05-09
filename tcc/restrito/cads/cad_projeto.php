<?php
	require('conexao/conecta.php');

	$mensagem = null;

	$sql = "SELECT niv_cod, niv_desc FROM nivel ORDER BY niv_desc";
	$rNivel = mysqli_query($con,$sql) or die('Falha ao buscar nivel');

	$sql = "SELECT * FROM professor WHERE pro_cod =" .  $_GET['id'];
	$result = mysqli_query($con, $sql) or die ('Falha ao buscar usuário');
	$professor = mysqli_fetch_array($result);

	if(isset($_POST['submit'])){
	 	require('restrito/acoes/acao_projeto.php');
	}

	$numero = null;
	$carga = null;
	$nivel = null;

	$url = '?pag=portalprof&id=' . $_GET['id'];
?>

<div>
	<h2>Cadastro de projeto</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Número do projeto</label>
			<input type="text" name="numero" class="form-control" value="<?= $numero ?>" placeholder="Número do Projeto" required>
		</div>
		<div class="form-group">
			<label for="hrtotal">Carga Horária Total</label>
			<input type="text" name="hrtotal" class="form-control" value="<?= $carga ?>" placeholder="Carga Horária" required>
		</div>
		<div class="form-group">
			<label for="hrtotal">Status atual</label>
			<select name="status" class="form-control">
				<option value="Ativo">Ativo</option>
				<option value="Inativo">Inativo</option>
			</select>
		</div>
		
		<input type="submit" name="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadcurso'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<a href='<?= $url ?>' class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
</div>