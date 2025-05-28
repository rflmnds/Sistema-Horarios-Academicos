<?php
	require('../src/connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$tur_cod = $_GET['turma'];
	$ds_cod = $_GET['ds'];
	$con_cod = $_GET['period'];

	$mensagem = null;

	$sql = "SELECT * FROM horario as h 
			INNER JOIN dia_semana as ds ON h.ds_cod = ds.ds_cod
			INNER JOIN config_hora as c ON h.con_cod = c.con_cod
			WHERE ds.ds_cod = $ds_cod AND h.con_cod = $con_cod";
	$rHorario = mysqli_query($conn,  $sql)or die("Falha ao buscar horário de aula");

	$horario = mysqli_fetch_array($rHorario);
	$hor_cod = $horario['hor_cod'];

	if($hor_cod == null){
		$sql = "INSERT INTO horario(con_cod, ds_cod) VALUES ($con_cod, $ds_cod)";
		mysqli_query($conn,  $sql) or die("Falha ao cadastrar Período");
		header('Refresh:0');
	}

	$period = $horario['con_cod'];
	$dsNome = $horario['ds_nome'];

	$sql = "SELECT * FROM turma WHERE tur_cod = $tur_cod";
	$rTurma = mysqli_query($conn,  $sql)or die("Falha ao buscar turma");

	$turma = mysqli_fetch_array($rTurma);
	$nomeTurma = $turma['tur_nome'];

	$sql = "SELECT * FROM sala";
	$rSala = mysqli_query($conn,  $sql)or die("Falha ao buscar salas");

	$sql = "SELECT * FROM oferta as o 
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			INNER JOIN disciplina as d on pd.dis_cod = d.dis_cod
			INNER JOIN professor as p on pd.pro_cod = p.pro_cod
			INNER JOIN serie_has_turma as st ON o.st_cod = st.st_cod
			WHERE st.tur_cod = $tur_cod";
	$rDisciplina = mysqli_query($conn,  $sql)or die("Falha ao buscar disciplinas");

	if(isset($_GET['id'])){
		$sql = "SELECT * FROM aula where aula_cod = " . $_GET['id'];
		$result1 = mysqli_query($conn,  $sql) or die('Falha ao buscar curso');
		$aula = mysqli_fetch_array($result1);
	}

	if(isset($_POST['submit'])){
		require('restrito/acoes/acao_aula.php');
	}
?>

<div>
	<?= "<h2>Turma: " . $nomeTurma . " - " . $period . "ª Aula de " . $dsNome . "</h2>" ?>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="disciplina">Disciplina</label>
			<select name="disciplina" class="form-control">
				<?php
					while($disciplina = mysqli_fetch_array($rDisciplina)) {
						echo "<option value='" . $disciplina['ofe_cod'];
						if(isset($_GET['id'])){
							if($aula['ofe_cod'] == $disciplina['ofe_cod']){
								echo "' selected>Disciplina: " . $disciplina['dis_nome'] . " - Professor: " . $disciplina['pro_nome'] . "</option>";
							}
							else{
								echo "'>Disciplina: " . $disciplina['dis_nome'] . " - Professor: " . $disciplina['pro_nome'] . "</option>";
							}
						}
						else{
							echo "'>Disciplina: " . $disciplina['dis_nome'] . " - Professor: " . $disciplina['pro_nome'] . "</option>";
						}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="sala">Sala</label>
			<select name="sala" class="form-control">
				<?php
					while($sala = mysqli_fetch_array($rSala)) {
						echo "<option value='" . $sala['sal_cod'];
						if(isset($_GET['id'])){
							if($aula['sal_cod'] == $sala['sal_cod']){
								echo "' selected>" . $sala['sal_desc'] . "</option>";
							}
							else{
								echo "'>" . $sala['sal_desc'] . "</option>";
							}
						}
						else{
							echo "'>" . $sala['sal_desc'] . "</option>";
						}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<select name="status" class="form-control" required>
				<?php
					if(isset($_GET['id'])){
						if($aula['aula_status'] == 'Ativo'){
							echo "<option value='Ativo' selected>Ativo</option>";
							echo "<option value='Inativo'>Inativo</option>";
						}
						else{
							echo "<option value='Ativo'>Ativo</option>";
							echo "<option value='Inativo' selected>Inativo</option>";
						}
					}
					else{
						echo "<option value='Ativo'>Ativo</option>";
						echo "<option value='Inativo'>Inativo</option>";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Salvar" name="submit" class="btn btn-primary">
			<p class="text-success"><?= $mensagem ?></p>
		</div>
		<div class="form-group">
			<a href='?pag=horario' class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
		</div>
	</form>
</div>