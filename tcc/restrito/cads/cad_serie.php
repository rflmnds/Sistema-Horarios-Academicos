<?php
	require('conexao/conecta.php');

	$mensagem = null;

	$sql= "SELECT * FROM ppc as p INNER JOIN curso as c ON p.cur_cod = c.cur_cod";
	$result = mysqli_query($con, $sql) or die ("Falha ao buscar ppc");
	
	if(isset($_POST['ano'])){
	 	require('restrito/acoes/acao_serie.php');
	}

	$ppc = null;
?>

<div>
	<h1>Adicionar Série:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="ano">Ano</label>
			<input type="text" name="ano" class="form-control" placeholder="Ano" required>
		</div>
		<div class="form-group">
			<label for="ppc">PPC</label>
			<select name="ppc" class="form-control">
				<?php 
					while($ppc = mysqli_fetch_array($result)) {
						echo "<option value='" . $ppc['ppc_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $ppc['ppc_info'] . " - Curso: " . $ppc['cur_nome'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadserie'">
	</form>
	
	<p class="text-success"><?= $mensagem ?></p>


</div>