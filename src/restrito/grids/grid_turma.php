<?php
	require('connection/conecta.php');

	$sql = "SELECT * FROM turma as t 
			INNER JOIN matriz as m ON t.mat_cod = m.mat_cod
			INNER JOIN curso as c ON m.cur_cod = c.cur_cod";
	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar turmas");

?>

<table class="table table-hover">
	<tr>
		<th>Código</th>
		<th>Turma</th>
		<th>Curso</th>
		<th>Ano de Entrada</th>
		<th>Matriz Curricular</th>
		<th>Ações</th>
	</tr>
	<?php
		while($turma = mysqli_fetch_array($result)){
			$pag = $_GET['pag'];
			$url = '?pag=' . $pag . '&id=' . $turma['tur_cod'];

			echo "<tr>";
			echo "	<td>" . $turma['tur_cod'] . "</td>";
			echo "	<td>" . $turma['tur_nome'] . "</td>";
			echo "	<td>" . $turma['cur_nome'] . "</td>";
			echo "	<td>" . $turma['tur_ano'] . "</td>";
			echo "	<td>" . $turma['mat_info'] . "</td>";
			echo "	<td>
						<a class='btn btn-default' href='?pag=turmaserie&id=" . $turma['tur_cod'] . "'>Vincular à série</a>
					</td>";
			echo "</tr>";
		}
	?>
</table>
