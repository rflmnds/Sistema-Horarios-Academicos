<?php
	require('../src/connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	$tur_cod = $_GET['tur'];
	$ser_cod = $_GET['ser'];

	$sql = "SELECT * FROM serie as s
			INNER JOIN serie_has_turma as st ON s.ser_cod = st.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			WHERE t.tur_cod = $tur_cod AND s.ser_cod = $ser_cod"; 
	$result1 = mysqli_query($conn,  $sql);
	$serie = mysqli_fetch_array($result1);
	$st_cod = $serie['st_cod'];
	$modulo = $serie['ser_modulo'];
	$turma = $serie['tur_nome'];

	$sql = "SELECT * FROM professor_has_disciplina as pd 
			INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
			INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod ";
	$result2 = mysqli_query($conn,  $sql);

	if(isset($_POST['submit'])){
		require('restrito/acoes/acao_oferta.php');
	}	

	$url = "?pag=turmaserie&id=" . $tur_cod;
?>

<div>
	<h2>Ofertar disciplina para turma "<?= $turma  . " Série: " . $modulo?>":</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="disc">Disciplina</label>
			<select name="disc" id="disc" class="form-control">
				<?php 
					while($disciplina = mysqli_fetch_array($result2)) {
						echo "<option value='" . $disciplina['pd_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $disciplina['dis_nome'] . " - Professor: " . $disciplina['pro_nome'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="ano">Ano de Oferta</label>
			<input type="text" name="ano" class="form-control" placeholder="Ano" required>
		</div>
		<input type="submit" value="Salvar" name="submit" class="btn btn-primary">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=oferta">
	</form>
	<p class="text-success"><?= $mensagem ?></p>
	
	<a href='<?= $url ?>' class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

	<h2>Disciplinas ofertadas de "<?= $turma . " - " . $modulo ?>"</h2>
	<?php include('restrito/grids/grid_oferta.php') ?>
</div>