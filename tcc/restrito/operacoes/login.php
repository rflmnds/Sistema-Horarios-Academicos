<?php
	
?>

<div>
	<form class="form-signin" method="post" action="restrito/acoes/acao_login.php">
        <h3 class="form-signin-heading text-center">Login</h3>
        <div class="form-group">
	        <label for="email" class="sr-only">Email:</label>
	        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
	    </div>
	    <div class="form-group">
	        <label for="password" class="sr-only">Senha:</label>
	        <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
	    </div>
	    <div class="form-group">
        	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
        </div>
    </form>
      <?php
          if(isset($_SESSION['erro'])){
            echo '<p class="text-center alert alert-danger">' . $_SESSION['erro'] . '</p>';
          }
      ?>
</div>