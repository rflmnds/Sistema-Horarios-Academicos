<?php
	require('connection/conecta.php');

	$sql = "SELECT * FROM disciplina as d
			INNER JOIN serie as s ON d.ser_cod = s.ser_cod
			INNER JOIN matriz as m ON s.mat_cod = m.mat_cod
			INNER JOIN curso as c ON m.cur_cod = c.cur_cod";
	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar disciplinas");
?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Curso</th>
		<th>Disciplina</th>
		<th>Carga Horária</th>
		<th>Ações</th>
	</tr>
	<?php
		while($disciplina = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $disciplina['dis_cod'];

			echo "<tr>";
			echo "	<td>" . $disciplina['dis_cod'] . "</td>";
			echo "	<td>" . $disciplina['cur_nome'] . "</td>";
			echo "	<td>" . $disciplina['dis_nome'] . "</td>";
			echo "	<td>" . $disciplina['dis_carga'] . "</td>";
			echo "	<td>	
						<a class='btn btn-warning' href='$url'>Informações</a>
						<a class='btn btn-info' href='?pag=discprof&id=" . $disciplina['dis_cod'] . "'>Professores</a>
					</td>";
			echo "</tr>";
		}
	?>
</table>
