<?php
	require('conexao/conecta.php');

	$sqlAux = "SELECT MAX(dis_cod) FROM disciplina";
	$resultAux = mysqli_query($con, $sqlAux);
	$aux = mysqli_fetch_array($resultAux);
	$aux = $aux[0];

	for($i = 0; $i < $aux; $i++) {
		echo $i . "<br>";
		$j = $i+1;
		echo $teste = "disc" . $j;
		echo $_POST[$teste];
		//if(){}
	}

?>
