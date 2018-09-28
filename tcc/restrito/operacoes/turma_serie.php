<?php
	require('conexao/conecta.php');

	$id = $_GET['id'];
	$mensagem = null;
	
	$sql = "SELECT * FROM turma WHERE tur_cod = $id";
	$result1 = mysqli_query($con, $sql) or die("Falha ao buscar a turma");
	$turma = mysqli_fetch_array($result1);
	$tur_nome = $turma['tur_nome'];
	$matriz = $turma['ppc_cod'];

	$sql = "SELECT * FROM serie";
	$result2 = mysqli_query($con, $sql) or die("Falha ao buscar serie");

	$sql = "SELECT * FROM serie_has_turma WHERE tur_cod = $id";
	$result3 = mysqli_query($con, $sql) or die("Falha ao verificar se já está vinculado");

	if(isset($_POST['submit'])) {
		include('restrito/acoes/acao_ts.php');
	}

?>


<div>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="serie">Série</label>
			<select name="serie" class="form-control">
				<?php
					while($serie = mysqli_fetch_array($result2)) {
						if($serie['ppc_cod'] == $matriz){
							echo "<option value='" . $serie['ser_cod'];
								// if(isset($_GET['id'])){
								// 	if($ppc['cur_cod'] == $curso['cur_cod']){
								// 		echo "' selected>" . $curso['cur_nome'] . "</option>";
								// 	}
								// 	else{
								// 		echo "'>" . $curso['cur_nome'] . "</option>";
								// 	}
								// }
								// else{
									echo "'>" . $serie['ser_ano'] . "</option>";
								//}
						}
					}
				?>
			</select>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default" name="submit">
	</form>

	<h2>Séries vinculadas à "<?= $tur_nome ?></h2>
	<?php include('restrito/grids/grid_ts.php') ?>
</div>