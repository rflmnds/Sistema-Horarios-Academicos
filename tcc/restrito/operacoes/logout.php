<?php
	session_start();
	session_destroy() or die ("Falha no logout");
	header("location: ../../?pag=login");
?>