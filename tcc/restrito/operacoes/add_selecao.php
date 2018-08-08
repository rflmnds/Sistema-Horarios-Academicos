<?php
	$mensagem = null;

	require('conexao/conecta.php');

	$sql0 = "SELECT * FROM selecao";
	$result0 = mysqli_query($con, $sql0) or die ('Falha ao buscar seleção');

	if(isset($_POST['sel1'])){
		require('restrito/acoes/acao_add_selecao.php');
	}

	if(isset($_GET['sel'])){
		require('conexao/conecta.php');

		$sql = "SELECT * FROM selecao WHERE sel_id = " . $_GET['sel'];
		$result = mysqli_query($con, $sql) or die ('Falha ao buscar jogo');
		$selecao = mysqli_fetch_array($result);

		$nome = $selecao['sel_nome'];
	}
	else{
		$nome = null;
	}
?>

<div>
	<h1>Adicionar seleção:</h1>
	<form method="post">
		<div class="form-group">	
			<label for="sel1">Seleção:</label>
			<select name="sel1" class="form-control">
				<?php
					$url0 = '?pag=addsel&jogo=' . $_GET['jogo'] . '&sel=' . $_GET['sel'];
					while($sel = mysqli_fetch_array($result0)){
						echo "<option value='" . $sel['sel_id'];
						if(isset($_GET['sel'])){
							if($selecao['sel_id'] == $sel['sel_id']){
								echo "' selected>" . $sel['sel_nome'] . "</option>";
							}
							else{
								echo "'>" . $sel['sel_nome'] . "</option>";
							}
						}
						else{
							echo "'>" . $sel['sel_nome'] . "</option>";
						}
					}
				?>
			</select>
		</div>

		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='<?=$url0?>'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>
	<p><a href="<?="?pag=jhs&id=" . $_GET['jogo']?>" class="btn btn-lg btn-primary btn-block" >< Voltar</a></p>

</div>