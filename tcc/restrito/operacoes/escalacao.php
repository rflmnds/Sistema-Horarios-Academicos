<?php
	require('conexao/conecta.php');

	$idjogo = $_GET['jogo'];
	$sql = "SELECT * FROM jogador j 
			INNER JOIN escalacao_has_jogador ej ON j.joga_id = ej.joga_id
			INNER JOIN escalacao e ON ej.esc_id = e.esc_id
			INNER JOIN jogo_has_selecao js ON e.jog_id = js.jog_id
			INNER JOIN selecao s ON js.sel_id = s.sel_id
			WHERE j.sel_id = " .  $_GET['sel'] . " AND s.sel_id = " .  $_GET['sel'];
	$result = mysqli_query($con, $sql) or die("Falha ao buscar jogo");
	$result0 = mysqli_query($con, $sql) or die("Falha ao buscar jogo");
	$result1 = mysqli_query($con, $sql) or die("Falha ao buscar jogo");
	$dados = mysqli_fetch_array($result0);

	$idesc = $dados['esc_id'];
	$selecao = $dados['sel_nome'];
?>
<?="<h1>Jogo " . $idjogo . " - Escalação "  . $selecao . ":</h1>"?>
<table class="table table-hover">
	<tr>
		<th colspan="2">Jogador</th>
	</tr>
	<?php
		echo "<tr>";
		$jogador = mysqli_fetch_array($result1);
		$check = $jogador['joga_id'];
		while($linha = mysqli_fetch_array($result)){
			$url = '?pag=addjogador&jogo=' . $_GET['jogo'] . '&sel=' . $_GET['sel'] . "&esc=" . $idesc . "&jogador=" . $linha['joga_id'];
			echo "<tr><td>" . $linha['joga_nome'] . "</td>";
			echo "<td>
					<a class='btn btn-success' href='$url'>Alterar Jogador</a>
				</td></tr>";
		}
		$url = '?pag=addjogador&jogo=' . $_GET['jogo'] . "&sel=" . $_GET['sel'] . "&esc=" . $idesc;
		echo "<td colspan='2'><a class='btn btn-success' href='$url'>Adicionar Jogador</a></td>";
		echo "</tr>";
	?>
</table>
<p><a href="<?="?pag=jogo"?>" class="btn btn-lg btn-primary btn-block" >< Voltar</a></p>

