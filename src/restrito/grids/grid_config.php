<?php
	require('../src/connection/conecta.php');

	$id = $_GET['id'];

	$turno_cod = $_GET['id'];
	$sql = "SELECT * FROM turno WHERE turno_cod = $turno_cod";
	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar turno");

	$turno = mysqli_fetch_array($result);
	$desc = $turno['turno_desc'];

	$sql = "SELECT c.con_cod, c.con_horaini, c.con_horafin, c.con_desc FROM config_hora as c
			INNER JOIN turno as t ON c.turno_cod = t.turno_cod
			WHERE t.turno_cod = $id
			ORDER BY c.con_horaini";
	$result1 = mysqli_query($conn,  $sql) or die("Falha ao buscar séries vinculadas");
?>
<div>
	<h2>Configuração de horários do turno "<?= $desc ?>"</h2>
	<table class="table table-hover">
		<tr>
			<th>Início</th>
			<th>Fim</th>
			<th>Descrição</th>
			<th>Ações</th>
		</tr>
		<?php
			while($config = mysqli_fetch_array($result1)){
				$con_cod = $config['con_cod'];
				$url = "?pag=addconfig&turno=$turno_cod&config=$con_cod";

				echo "<tr>";
				echo "	<td>" . $config['con_horaini'] . "</td>";
				echo "	<td>" . $config['con_horafin'] . "</td>";
				echo "	<td>" . $config['con_desc'] . "</td>";
				echo "	<td><a href='$url'class='btn btn-warning'>Editar</a></td>";
				echo "</tr>";
			}
		?>
	</table>
	<a href="?pag=addconfig&turno=<?=$id ?>" class="btn btn-default">Adicionar configuração</a>
</div>
