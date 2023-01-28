<?php
	require('connection/conecta.php');

	$mensagem = null;

	if(isset($_POST['nome'])){
	 	require('restrito/acoes/acao_userinfo.php');
	}

	if(isset($_GET['id'])){
		require('connection/conecta.php');

		$sql = "SELECT * FROM usuario where pro_cod = " . $_GET['id'];
		$result = mysqli_query($conn, $sql) or die('Falha ao buscar usuário');
		$user = mysqli_fetch_array($result);

		$nome = $user['usu_nome'];
		$email = $user['usu_email'];
	}
	else{
		$nome = null;
		$email = null;
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
			<label for="senha">Nova Senha</label>
			<div class="input-group">
				<input type="password" name="novaSenha" id="senha" class="form-control" placeholder="Nova Senha" required>
				<div class="input-group-addon">
					<span id="toggle_view_senha" class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="senha">Senha atual</label>
			<div class="input-group">
				<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
				<div class="input-group-addon">
					<span id="toggle_view_senha" class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
				</div>
			</div>
		</div>
		<input type="submit" value="Salvar e Relogar" class="btn btn-primary">
	</form>

	<p class="text-success"><?= $mensagem ?></p>

	<?php
		if(isset($_SESSION['erro'])){
			echo '<p class="text-center alert alert-danger">' . $_SESSION['erro'] . '</p>';
		}
	?>
</div>