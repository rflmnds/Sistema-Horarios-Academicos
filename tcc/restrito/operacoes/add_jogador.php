<?php
	$mensagem = null;

	require('conexao/conecta.php');

	$sql0 = "SELECT * FROM jogador";
	$result0 = mysqli_query($con, $sql0) or die ('Falha ao buscar seleção');

	if(isset($_POST['jogador'])){
		require('restrito/acoes/acao_add_selecao.php');
	}

	if(isset($_GET['jogador'])){
		require('conexao/conecta.php');

		$sql = "SELECT * FROM jogador WHERE joga_id = " . $_GET['jogador'];
		$result = mysqli_query($con, $sql) or die ('Falha ao buscar jogo');
		$jogador = mysqli_fetch_array($result);

		$nome = $jogador['sel_nome'];
	}
	else{
		$nome = null;
	}
?>

<div>
	<h1>Adicionar Jogador:</h1>
	<form method="post">
		<div class="form-group">	
			<label for="jogador">Jogador:</label>
			<select name="jogador" class="form-control">
				<?php
					$url0 = '?pag=addsel&jogo=' . $_GET['jogo'] . '&sel=' . $_GET['sel'];
					while($joga = mysqli_fetch_array($result0)){
						echo "<option value='" . $joga['sel_id'];
						if(isset($_GET['jogador'])){
							if($jogador['joga_id'] == $joga['joga_id']){
								echo "' selected>" . $joga['joga_nome'] . "</option>";
							}
							else{
								echo "'>" . $joga['joga_nome'] . "</option>";
							}
						}
						else{
							echo "'>" . $joga['joga_nome'] . "</option>";
						}
					}
				?>
			</select>
		</div>

		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='<?=$url0?>'">
	</form>

	<p class="text-success"><?= $mensagem ?></p>
	<p><a href="<?="?pag=escalacao&jogo" . $_GET['jogo'] . "&sel=" . $_GET['sel']?>" class="btn btn-lg btn-primary btn-block" >< Voltar</a>
</div>