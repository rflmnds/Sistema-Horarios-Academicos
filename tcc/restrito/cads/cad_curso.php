<?php
	require('conexao/conecta.php');

	$mensagem = null;

	$sql = $sql = "SELECT * FROM nivel";
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
		$nivel = $curso['cur_nivel'];
	}
	else{
		$nome = null;
		$carga = null;
		$nivel = null;
	}
?>

<div>
	<h1>Adicionar Curso:</h1>
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
			<label for="nivel">Categoria de Ensino</label>
			<select class="form-control" name="nivel">
				<?php
					while($nivel = mysqli_fetch_array($rNivel)) {
						echo "<option value='" . $nivel['ser_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $nivel['niv_desc'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<a href="?pag=cadnivel" class="btn btn-success">Acrescentar níveis</a>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadcurso'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Cursos:</h2>
	<?php include('restrito/grids/grid_curso.php') ?>
</div>