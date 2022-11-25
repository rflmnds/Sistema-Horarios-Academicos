<?php
	require('connection/conecta.php');

	$mensagem = null;
	$pro_cod = $_GET['id'];

	$sql = "SELECT * FROM professor WHERE pro_cod = $pro_cod";
	$resultProf = mysqli_query($con, $sql) or die ('Falha ao buscar professor');
	$professor = mysqli_fetch_array($resultProf);

	$sql = "SELECT * FROM tipo_projeto";
	$resultTipo = mysqli_query($con, $sql) or die ('Falha ao buscar tipos de projeto');

	if(isset($_POST['submit'])){
	 	require('restrito/acoes/acao_projeto.php');
	}

	$numero = null;
	$dataIni = null;
	$dataFim = null;

	$url = '?pag=portalprof&id=' . $_GET['id'];
?>

<div>
	<h2>Cadastro de projeto</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="tipo">Tipo</label>
			<select name="tipo" class="form-control" required>
				<?php
					while($tipo = mysqli_fetch_array($resultTipo)) {
						echo "<option value='" . $tipo['tp_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $tipo['tp_nome'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="nome">Número</label>
			<input type="text" name="numero" class="form-control" value="<?= $numero ?>" placeholder="Número do Projeto" required>
		</div>
		<div class="form-group">
			<label for="hrtotal">Status atual</label>
			<select name="status" class="form-control" required>
				<option value="Ativo">Ativo</option>
				<option value="Inativo">Inativo</option>
			</select>
		</div>
		<div class="form-group">
			<label for="hrtotal">Data de início</label>
			<input type="date" name="dataIni" class="form-control" value="<?= $dataIni ?>">
		</div>
		<div class="form-group">
			<label for="hrtotal">Data de finalização</label>
			<input type="date" name="dataFim" class="form-control" value="<?= $dataFim ?>">
		</div>
		
		<input type="submit" name="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='<?= $url ?>'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<a href='<?= $url ?>' class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
</div>