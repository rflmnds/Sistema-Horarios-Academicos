<?php
	require('conexao/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	$sql= "SELECT * FROM curso";
	$result = mysqli_query($con, $sql) or die ("Falha ao buscar curso");

	if(isset($_POST['info'])){
	 	require('restrito/acoes/acao_matriz.php');
	}

	$ppc = null;
?>

<div>
	<h1>Cadastrar Matriz Curricular:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="info">Identificação</label>
			<input type="text" name="info" class="form-control" placeholder="Identificação" required>
		</div>
		<div class="form-group">
			<label for="cur" style="display: block">Curso</label>
			<select class="form-control" name="cur" style="float: left;max-width: 80%">
				<?php 
					while($curso = mysqli_fetch_array($result)){
						echo "<option value='" . $curso['cur_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $curso['cur_nome'] . "</option>";
						//}
					}
				?>
			</select>
			<a href="?pag=cadcurso" class="btn btn-default" style="display: block">Cadastrar cursos</a>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadppc'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<h2>Matrizes cadastradas:</h2>
	<?php include('restrito/grids/grid_matriz.php') ?>
</div>