<?php
	require('conexao/conecta.php');

	$sql = "SELECT * FROM serie as s 
			INNER JOIN ppc as p ON s.ppc_cod = p.ppc_cod
			INNER JOIN curso as c ON p.cur_cod = c.cur_cod";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar serie");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Curso</th>
		<th>Ano</th>
		<th>PPC</th>
		<th>Ações</th>
	</tr>
	<?php
		while($serie = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $serie['ser_cod'];

			echo "<tr>";

			echo "	<td>" . $serie['ser_cod'] . "</td>";
			echo "	<td>" . $serie['cur_nome'] . "</td>";
			echo "	<td>" . $serie['ser_ano'] . "</td>";
			echo "	<td>" . $serie['ppc_info'] . "</td>";
			echo "	<td>	
						<a class='btn btn-warning' href='$url'>Informações</a>
						<a class='btn btn-success' href='?pag=discprof&id=" . $serie['ser_cod'] . "'>Oferta</a>
					</td>";
			echo "</tr>";
		}
	?>
</table>
