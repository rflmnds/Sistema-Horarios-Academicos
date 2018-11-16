<?php
	require("conexao/conecta.php");
	
	if(isset($_POST['login'])){
		require("restrito/acoes/acao_login.php");
	}
?>
<div class="row">
	<div class="col col-sm-4"></div>
	<div class="col col-sm-4">
		<form class="form-signin" method="post">
	        <h3 class="form-signin-heading text-center">Login</h3>
	        <div class="form-group" style=" text-align: center">
		        <label for="email" class="sr-only">Email:</label>
		        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
		    </div>
		    <div class="form-group">
				<label for="senha" class="sr-only">Senha:</label>
				<div class="input-group">
					<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
					<div class="input-group-addon">
						<span id="toggle_view_senha" class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
					</div>
				</div>
			</div>
		    <div class="form-group">
	        	<input name="login" class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
	        </div>
	    </form>
	      <?php
	          if(isset($_SESSION['erro'])){
	            echo '<p class="text-center alert alert-danger">' . $_SESSION['erro'] . '</p>';
	          }
	      ?>
	</div>
	<div class="col col-sm-4"></div>
	
</div>