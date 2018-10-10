<?php
	require('conexao/conecta.php');

	$tur_cod = $_GET['tur'];
	$ser_cod = $_GET['ser'];
	$mensagem = null;
	
	$sql = "SELECT * FROM serie as S 
			INNER JOIN serie_has_turma as st ON s.ser_cod = st.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			WHERE t.tur_cod = $tur_cod AND s.ser_cod = $ser_cod";
	$result1 = mysqli_query($con, $sql) or die("Falha ao buscar a turma");
	$serie = mysqli_fetch_array($result1);
	$modulo = $serie['ser_modulo'];
	$ano = $serie['ser_ano'];
	$turma = $serie['tur_nome'];

	$sql = "SELECT * FROM turno";
	$result2 = mysqli_query($con, $sql) or die("Falha ao buscar turno");

	$sql = "SELECT * FROM serie_has_turma WHERE tur_cod = $tur_cod";
	$result3 = mysqli_query($con, $sql) or die("Falha ao verificar se já está vinculado");

	if(isset($_POST['submit'])) {
		include('restrito/acoes/acao_vincturno.php');
	}

?>

<div>
	<h2>Vincular turno para turma "<?= $turma  . " Série: " . $modulo?>":</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="turno">Turno</label>
			<select name="turno" class="form-control">
				<?php
					while($turno = mysqli_fetch_array($result2)) {
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
								echo "'>" . $serie['ser_modulo'] . "</option>";
							//}
					}
				?>
			</select>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default" name="submit">
	</form>

	<h2>Turnos de "<?= $turma . " Série: " . $modulo?>"</h2>
	<?php include('restrito/grids/grid_vincturno.php') ?>
</div>