<?php
	require('conexao/conecta.php');

	$idjogo = $_GET['id'];
	$sql = "SELECT * FROM jogo_has_selecao js INNER JOIN selecao s ON  js.sel_id = s.sel_id WHERE jog_id = " . $idjogo;
	$result1 = mysqli_query($con, $sql) or die("Falha ao buscar jogo");
	$result2 = mysqli_query($con, $sql) or die("Falha ao buscar jogo");
?>
<?="<h1>Jogo " . $idjogo . ":</h1>"?>
<table class="table table-hover">
	<tr>
		<th colspan="2">Seleção 1</th>
		<th colspan="2">Seleção 2</th>
	</tr>
	<?php
		echo "<tr>";

		$selecao = mysqli_fetch_array($result1);
		$check = $selecao['sel_id'];
		$cont=2;
		if($check == null){
			$url = '?pag=addsel&jogo=' . $_GET['id'];
			echo "<td colspan='2'><a class='btn btn-success' href='$url'>Adicionar/Alterar</a></td>";
			echo "<td colspan='2'><a class='btn btn-success' href='$url'>Adicionar/Alterar</a></td>";
			$cont=0;
		}
		while($linha = mysqli_fetch_array($result2)){
			$url = '?pag=addsel&jogo=' . $linha['jog_id'] . '&sel=' . $linha['sel_id'];
			$esc = '?pag=escalacao&jogo=' . $linha['jog_id'] . '&sel=' . $linha['sel_id'];
			echo "<td>" . $linha['sel_nome'] . "</td>";
			echo "<td>
					<a class='btn btn-success' href='$url'>Adicionar/Alterar</a>
					<a class='btn btn-success' href='$esc'>Escalação</a>
				</td>";
			$cont--;
		}
		if($cont != 0){
			$url2 = '?pag=addsel&jogo=' . $_GET['id'];
			echo "<td colspan='2'><a class='btn btn-success' href='$url2'>Adicionar/Alterar</a></td>";
		}
		echo "</tr>";
	?>
</table>
<p><a href="<?="?pag=jogo"?>" class="btn btn-lg btn-primary btn-block" >< Voltar</a></p>

