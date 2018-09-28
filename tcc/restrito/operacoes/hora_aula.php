<?php
	require('conexao/conecta.php');

	$tur_cod = $_GET['turma'];
	$ds_cod = $_GET['ds'];
	$aula_period = $_GET['period'];

	$sql = "SELECT * FROM hora_aula as ha 
			INNER JOIN dia_semana as ds ON ha.ds_cod = ds.ds_cod
			WHERE ds.ds_cod = $ds_cod AND ha.aula_period = $aula_period";
	$rAula = mysqli_query($con, $sql)or die("Falha ao buscar horário de aula");

	$aula = mysqli_fetch_array($rAula);
	$aula_cod = $aula['aula_cod'];

	if($aula_cod == null){
		die('Período não cadastrado');
	}

	$period = $aula['aula_period'];
	$dsNome = $aula['ds_nome'];

	$sql = "SELECT * FROM turma WHERE tur_cod = $tur_cod";
	$rTurma = mysqli_query($con, $sql)or die("Falha ao buscar turma");

	$turma = mysqli_fetch_array($rTurma);
	$nomeTurma = $turma['tur_nome'];

	$sql = "SELECT * FROM sala";
	$rSala = mysqli_query($con, $sql)or die("Falha ao buscar salas");

	$sql = "SELECT * FROM oferta as o 
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			INNER JOIN disciplina as d on pd.dis_cod = d.dis_cod
			INNER JOIN professor as p on pd.pro_cod = p.pro_cod
			WHERE o.tur_cod = $tur_cod";
	$rDisciplina = mysqli_query($con, $sql)or die("Falha ao buscar disciplinas");

	if(isset($_POST['submit'])){
		require('restrito/acoes/acao_ha.php');
	}
?>

<div>
	<?= "<h2>Turma:" . $nomeTurma . " - " . $period . "ª Aula de " . $dsNome . "</h2>" ?>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="disciplina">Disciplina</label>
			<select name="disciplina" class="form-control">
				<?php
					while($disciplina = mysqli_fetch_array($rDisciplina)) {
						echo "<option value='" . $disciplina['ofe_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>Disciplina: " . $disciplina['dis_nome'] . " - Professor: " . $disciplina['pro_nome'] . "</option>";
						//}
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
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $sala['sal_desc'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<input type="text" name="status" class="form-control" placeholder="Status" required>
		</div>
		<div class="form-group">
			<input type="submit" value="Salvar" name="submit" class="btn btn-default">
		</div>
		<div class="form-group">
			<input type="button" value="Voltar" onclick="window.location='?pag=horario'" style="width:100%" class="btn btn-default">
		</div>
	</form>
</div>