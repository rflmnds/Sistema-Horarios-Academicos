<?php
	require('conexao/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	$sql = "SELECT * FROM serie as s 
			INNER JOIN matriz as m ON s.mat_cod = m.mat_cod
			INNER JOIN curso as c ON m.cur_cod = c.cur_cod";
	$result = mysqli_query($con, $sql) or die ("Falha ao buscar Série");
	
	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_disc.php');
	}
?>

<div>
	<h1>Cadastro de Disciplina:</h1>
	<form name="form1" id="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" class="form-control" placeholder="Nome" required>
		</div>
		<div class="form-group">
			<label for="carga">Carga horaria</label>
			<input type="text" name="carga" class="form-control" placeholder="Carga Horária" required>
		</div>
		<div class="form-group">
			<label for="serie">Curso e Série</label>
			<select name="serie" class="form-control">
				<?php
					while($serie = mysqli_fetch_array($result)) {
						echo "<option value='" . $serie['ser_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>Curso: " . $serie['cur_nome'] . " - Ano: " . $serie['ser_ano'] . " - Matriz Curricular: " . $serie['mat_info'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="ementa">Ementa </label>
			<textarea name="ementa" form="form1" class="form-control" id="ementa" required></textarea>
		</div>
		<div class="form-group">
			<label for="referencias">Referencias</label>
			<textarea name="referencias" form="form1" class="form-control" id="referencias"  required></textarea> 
		</div>
		<input type="submit" value="Salvar" class="btn btn-primary">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=caddisc'">
	</form>
	
	<p class="text-success"><?= $mensagem ?></p>

	<h2>Disciplinas:</h2>
	<?php include('restrito/grids/grid_disc.php') ?>
</div>