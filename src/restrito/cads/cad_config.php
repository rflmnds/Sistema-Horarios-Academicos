<?php
	require('connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;
	
	$turno_cod = $_GET['turno'];
	$sql = "SELECT * FROM turno WHERE turno_cod = $turno_cod";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar turno");

	$turno = mysqli_fetch_array($result);
	$desc = $turno['turno_desc'];

	if(isset($_POST['submit'])){
	 	require('restrito/acoes/acao_config.php');
	 	require('restrito/acoes/acao_horario.php');
	}
	$url = "?pag=config&id=" . $turno_cod;
?>

<div>
	<h2>Adicionar configuração para o turno "<?= $desc ?>"</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="desc">Descrição</label>
			<input type="text" name="desc" class="form-control" placeholder="Descrição">
		</div>
		<div class="form-group">
			<label for="horaIni">Hora inicial</label>
			<input type="time" name="horaIni" class="form-control">
		</div>
		<div class="form-group">
			<label for="horaFin">Hora final</label>
			<input type="time" name="horaFin" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Salvar" class="btn btn-primary">
			<p class="text-success"><?= $mensagem ?></p>
		</div>
		<div class="form-group">
			<a href='<?= $url ?>' class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
		</div>
	</form>
</div>