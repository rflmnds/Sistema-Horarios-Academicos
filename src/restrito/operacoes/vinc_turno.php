<?php
	require('connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$tur_cod = $_GET['tur'];
	$ser_cod = $_GET['ser'];
	$mensagem = null;
	
	$sql = "SELECT * FROM serie as s 
			INNER JOIN serie_has_turma as st ON s.ser_cod = st.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			WHERE t.tur_cod = $tur_cod AND s.ser_cod = $ser_cod";
	$result1 = mysqli_query($conn,  $sql) or die("Falha ao buscar a turma");
	$serie = mysqli_fetch_array($result1);
	$modulo = $serie['ser_modulo'];
	$ano = $serie['ser_ano'];
	$turma = $serie['tur_nome'];

	$sql = "SELECT * FROM turno";
	$result2 = mysqli_query($conn,  $sql) or die("Falha ao buscar turno");

	$sql = "SELECT * FROM serie_has_turma WHERE tur_cod = $tur_cod";
	$result3 = mysqli_query($conn,  $sql) or die("Falha ao verificar se já está vinculado");

	if(isset($_POST['submit'])) {
		include('restrito/acoes/acao_vincturno.php');
	}

	$url = "?pag=turmaserie&id=" . $tur_cod;
?>

<div>
	<h2>Vincular turno para turma "<?= $turma  . " Série: " . $modulo?>":</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="turno">Turno</label>
			<select name="turno" class="form-control">
				<?php
					while($turno = mysqli_fetch_array($result2)) {
						echo "<option value='" . $turno['turno_cod'];
							// if(isset($_GET['id'])){
							// 	if($ppc['cur_cod'] == $curso['cur_cod']){
							// 		echo "' selected>" . $curso['cur_nome'] . "</option>";
							// 	}
							// 	else{
							// 		echo "'>" . $curso['cur_nome'] . "</option>";
							// 	}
							// }
							// else{
								echo "'>" . $turno['turno_desc'] . " - " . $turno['turno_status'] ."</option>";
							//}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Salvar" class="btn btn-primary" name="submit">
		</div>
	</form>

	<a href='<?= $url ?>' class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

	<h2>Turnos de "<?= $turma . " Série: " . $modulo?>"</h2>
	<?php include('restrito/grids/grid_vincturno.php') ?>
</div>