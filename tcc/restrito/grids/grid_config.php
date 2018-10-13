<?php
	require('conexao/conecta.php');

	$id = $_GET['id'];

	$sql = "SELECT * FROM config_hora as c
			INNER JOIN turno as t ON c.turno_cod = t.turno_cod
			WHERE t.turno_cod = $id";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar séries vinculadas");
	$turno = mysqli_fetch_array($result);
	$desc = $turno['turno_desc'];
	mysqli_data_seek($result, 0);
?>
<div>
	<h2>Configuração de horários do turno <?= $desc ?></h2>
	<table class="table table-hover">
		<tr>
			<th>Código</th>
			<th>Início</th>
			<th>Fim</th>
			<th>Descrição</th>
			<th>Ações</th>
		</tr>
		<?php
			while($serie = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "	<td>" . $serie['ser_cod'] . "</td>";
				echo "	<td>" . $serie['ser_modulo'] . " - " . $serie['ser_ano'] . "</td>";
				echo "	<td>
							<a href='$url1'class='btn btn-success'>Ofertar disciplinas</a>
							<a href='$url2'class='btn btn-success'>Vincular à turno</a>
						</td>";
				echo "</tr>";
			}
		?>
	</table>
	<a href="?pag=addconfig&turno=<?=$id ?>" class="btn btn-default">Adicionar configuração</a>
</div>