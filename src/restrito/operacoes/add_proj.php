<?php
	require('connection/conecta.php');

	$ds_cod = $_GET['ds'];
	$con_cod = $_GET['period'];
	$pro_cod = $_GET['prof'];

	$mensagem = null;

	$sql = "SELECT * FROM horario as h 
			INNER JOIN dia_semana as ds ON h.ds_cod = ds.ds_cod
			INNER JOIN config_hora as c ON h.con_cod = c.con_cod
			WHERE ds.ds_cod = $ds_cod AND h.con_cod = $con_cod";
	$rHorario = mysqli_query($con, $sql)or die("Falha ao buscar horário de aula");

	$horario = mysqli_fetch_array($rHorario);
	$hor_cod = $horario['hor_cod'];

	if($hor_cod == null){
		$sql = "INSERT INTO horario(con_cod, ds_cod) VALUES ($con_cod, $ds_cod)";
		mysqli_query($con, $sql) or die("Falha ao cadastrar Período");
		header('Refresh:0');
	}

	$period = $horario['con_cod'];
	$dsNome = $horario['ds_nome'];

	$sql = "SELECT * FROM projeto WHERE pro_cod = $pro_cod";
	$rProjeto = mysqli_query($con, $sql) or die("Falha ao cadastrar Período");

	if(isset($_GET['id'])){
		$sql = "SELECT * FROM hora_projeto where hp_cod = " . $_GET['id'];
		$result1 = mysqli_query($con, $sql) or die('Falha ao buscar curso');
		$hora = mysqli_fetch_array($result1);
	}

	if(isset($_POST['submit'])){
		require('restrito/acoes/acao_addproj.php');
	}
?>

<div>
	<?= "<h2>Adicionar Projeto ao " . $period . "º Horário de " . $dsNome . "</h2>" ?>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="projeto">Selecionar projeto</label>
			<select name="projeto" class="form-control">
				<?php
					while($projeto = mysqli_fetch_array($rProjeto)) {
						echo "<option value='" . $projeto['proj_cod'];
						if(isset($_GET['id'])){
							if($hora['proj_cod'] == $projeto['proj_cod']){
								echo "' selected>Projeto nº: " . $projeto['proj_numero'] . "</option>";
							}
							else{
								echo "'>Projeto nº: " . $projeto['proj_numero'] . "</option>";
							}
						}
						else{
							echo "'>Projeto nº: " . $projeto['proj_numero'] . "</option>";
						}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Salvar" name="submit" class="btn btn-primary">
			<p class="text-success"><?= $mensagem ?></p>
		</div>
		<div class="form-group">
			<a href='?pag=portalprof&id=<?= $pro_cod ?>' class="btn btn-default"><span class="fas fa-arrow-left"></span> Voltar</a>
		</div>
	</form>
</div>