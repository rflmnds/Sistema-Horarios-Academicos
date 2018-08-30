<?php
	require('conexao/conecta.php');

	$id = $_GET['id'];
	$mensagem = null;
	
	$sql = "SELECT * FROM serie";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar serie");

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
					while($serie = mysqli_fetch_array($result)) {
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
				?>
			</select>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default" name="submit">
	</form>
</div>