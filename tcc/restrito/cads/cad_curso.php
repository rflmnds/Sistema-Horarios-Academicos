<?php
	require('conexao/conecta.php');

	$mensagem = null;

	$sql = $sql = "SELECT niv_cod, niv_desc FROM nivel ORDER BY niv_desc";
	$rNivel = mysqli_query($con,$sql) or die('Falha ao buscar nivel');

	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_curso.php');
	}

	if(isset($_GET['id'])){
		require('conexao/conecta.php');

		$sql = "SELECT * FROM curso where cur_cod = " . $_GET['id'];
		$result = mysqli_query($con,$sql) or die('Falha ao buscar curso');
		$curso = mysqli_fetch_array($result);

		$nome = $curso['cur_nome'];
		$carga = $curso['cur_hrtotal'];
		$nivel = $curso['niv_cod'];
	}
	else{
		$nome = null;
		$carga = null;
		$nivel = null;
	}
?>

<div>
	<h1>Cadastrar Curso:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome do Curso</label>
			<input type="text" name="nome" class="form-control" value="<?= $nome ?>" placeholder="Nome do Curso" required>
		</div>
		<div class="form-group">
			<label for="hrtotal">Carga Horária Total</label>
			<input type="text" name="hrtotal" class="form-control" value="<?= $carga ?>" placeholder="Carga Horária" required>
		</div>
		<div class="form-group">
			<label for="nivel" style="display: block">Categoria de Ensino</label>
			<select class="form-control" name="nivel" style="max-width: 80%; float: left">
				<?php
					while($nivel = mysqli_fetch_array($rNivel)) {
						echo "<option value='" . $nivel['niv_cod'];
						if(isset($_GET['id'])){
							if($curso['niv_cod'] == $nivel['niv_cod']){
								echo "' selected>" . $nivel['niv_desc'] . "</option>";
							}
							else{
								echo "'>" . $nivel['niv_desc'] . "</option>";
							}
						}
						else{
							echo "'>" . $nivel['niv_desc'] . "</option>";
						}
					}
				?>
			</select>
			<a href="?pag=cadnivel" class="btn btn-default" style="display: block;">Acrescentar níveis</a>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadcurso'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Cursos cadastrados:</h2>
	<?php include('restrito/grids/grid_curso.php') ?>
</div>