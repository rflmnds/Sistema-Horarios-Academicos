<?php
	require('../src/connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	$sql= "SELECT * FROM matriz as m INNER JOIN curso as c ON m.cur_cod = c.cur_cod";
	$result = mysqli_query($conn,  $sql) or die ("Falha ao buscar matriz");
	
	if(isset($_POST['ano'])){
	 	require('restrito/acoes/acao_serie.php');
	}
?>

<div>
	<h1>Cadastrar Série:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="modulo">Módulo</label>
			<input type="text" name="modulo" class="form-control" placeholder="Módulo" required>
		</div>
		<div class="form-group">
			<label for="ano">Ano</label>
			<input type="text" name="ano" class="form-control" placeholder="Ano" required>
		</div>
		<div class="form-group">
			<label for="matriz" style="display: block">Matriz</label>
			<select name="matriz" class="form-control" style="float: left; max-width: 80%">
				<?php 
					while($matriz = mysqli_fetch_array($result)) {
						echo "<option value='" . $matriz['mat_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $matriz['mat_info'] . " - Curso: " . $matriz['cur_nome'] . "</option>";
						//}
					}
				?>
			</select>
			<a href="?pag=cadmatriz" class="btn btn-default" style="display: block;">Cadastrar matriz</a>
		</div>
		<input type="submit" value="Salvar" class="btn btn-primary">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadserie'">
	</form>
	
	<p class="text-success"><?= $mensagem ?></p>

	<h2>Séries cadastradas:</h2>
	<?php include('restrito/grids/grid_serie.php') ?>
</div>