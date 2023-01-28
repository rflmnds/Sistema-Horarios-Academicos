<?php
	require('connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$mensagem = null;

	$sql = "SELECT * FROM tipo_usuario";
	$rNivel = mysqli_query($conn, $sql) or die('Falha ao buscar nivel');

	$sql = "SELECT * FROM professor";
	$rProf = mysqli_query($conn,  $sql) or die("Falha ao buscar professor");

	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_user.php');
	}

	if(isset($_GET['id'])){
		require('connection/conecta.php');

		$sql = "SELECT * FROM usuario where usu_cod = " . $_GET['id'];
		$result = mysqli_query($conn, $sql) or die('Falha ao buscar usuário');
		$user = mysqli_fetch_array($result);

		$nome = $user['usu_nome'];
		$email = $user['usu_email'];
		$senha = $user['usu_senha'];
		$tu_cod = $user['tu_cod'];
	}
	else{
		$nome = null;
		$email = null;
		$senha = null;
		$tu_cod = null;
	}
?>

<div>
	<h3>Cadastrar Usuário:</h3>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome de Usuário</label>
			<input type="text" name="nome" class="form-control" value="<?= $nome ?>" placeholder="Nome do Usuário" required>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" class="form-control" value="<?= $email ?>" placeholder="Email" required>
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<div class="input-group">
				<input type="password" name="senha" id="senha" class="form-control" value="<?= $senha ?>" placeholder="Senha" required>
				<div class="input-group-addon">
					<span id="toggle_view_senha" class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="tipo">Tipo de Usuário</label>
			<select class="form-control" name="tipo">
				<?php
					while($tipo = mysqli_fetch_array($rNivel)) {
						echo "<option value='" . $tipo['tu_cod'];
						if(isset($_GET['id'])){
							if($user['tu_cod'] == $tipo['tu_cod']){
								echo "' selected>" . $tipo['tu_desc'] . "</option>";
							}
							else{
								echo "'>" . $tipo['tu_desc'] . "</option>";
							}
						}
						else{
							echo "'>" . $tipo['tu_desc'] . "</option>";
						}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="prof">Professor</label>
			<select class="form-control" name="prof">
				<option value="null">Nenhum</option>
				<?php
					while($prof = mysqli_fetch_array($rProf)) {
						echo "<option value='" . $prof['pro_cod'];
						if(isset($_GET['id'])){
							if($user['pro_cod'] == $prof['pro_cod']){
								echo "' selected>" . $prof['pro_nome'] . "</option>";
							}
							else{
								echo "'>" . $prof['pro_nome'] . "</option>";
							}
						}
						else{
							echo "'>" . $prof['pro_nome'] . "</option>";
						}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Salvar" class="btn btn-primary">
			<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadcurso'">
		</div>
		<div class="form-group">
			<a href='?pag=users' class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
	</form>

	<p class="text-success"><?= $mensagem ?></p>
</div>