<?php
	require('connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	$sqlBloco = "SELECT * FROM bloco";
	$resultBloco = mysqli_query($con, $sqlBloco) or die ("Falha ao buscar Blocos");

	$sqlDisc = "SELECT * FROM disciplina";
	$resultDisc = mysqli_query($con, $sqlDisc) or die ("Falha ao buscar Disciplinas");
	
	if(isset($_POST['desc'])){
	 	require('restrito/acoes/acao_sala.php');
	}

	$ppc = null;
?>

<div>
	<h1>Cadastrar Sala:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="desc">Sala</label>
			<input type="text" name="desc" class="form-control" placeholder="Sala" required>
		</div>
		<div class="form-group">
			<label for="bloco" style="display: block">Bloco</label>
			<select class="form-control" name="bloco" style="float: left; max-width: 80%">
				<?php
					while($bloco = mysqli_fetch_array($resultBloco)) {
						echo "<option value='" . $bloco['blo_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $bloco['blo_desc'] . "</option>";
						//}
					}
				?>
			</select>
			<a href="?pag=cadbloco" class="btn btn-default" style="display: block">Cadastrar bloco</a>
		</div>
		<div class="form-group">
			<label for="disciplina">Disciplina (Para salas temáticas)</label>
			<select class="form-control" name="disciplina">
				<option value="0">Nenhuma</option>
				<?php
					while($disciplina = mysqli_fetch_array($resultDisc)) {
						echo "<option value='" . $disciplina['dis_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $disciplina['dis_nome'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<input type="submit" value="Salvar" class="btn btn-primary">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadsala'">
	</form>
</div>