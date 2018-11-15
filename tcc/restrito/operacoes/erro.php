<div style="padding: 20px"> 
	<?php
	    if(isset($_SESSION['erro'])){
	      echo '<p class="text-center alert alert-danger">' . $_SESSION['erro'] . '</p>';
	    }
	?>
</div>