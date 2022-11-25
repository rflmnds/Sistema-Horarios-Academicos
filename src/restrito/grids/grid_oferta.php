<?php
	require('connection/conecta.php');

	$tur_cod = $_GET['tur'];
	$ser_cod = $_GET['ser'];

	$sql = "SELECT * FROM oferta as o 
			INNER JOIN serie_has_turma as st ON o.st_cod = st.st_cod
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			WHERE st.ser_cod = $ser_cod AND st.tur_cod = $tur_cod";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar disciplinas ofertadas");
?>

<table class="table table-hover">
	<tr>
		<th>Professor</th>
		<th>Disciplina</th>
	</tr>
	<?php
		while($serie = mysqli_fetch_array($result)){
			$pd_cod = $serie['pd_cod'];
			$sql = "SELECT * FROM professor_has_disciplina as pd
					INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
					INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod
					WHERE pd.pd_cod = $pd_cod";			
			$result1 = mysqli_query($con, $sql);
			$linha = mysqli_fetch_array($result1);

			echo "<tr>";
			echo "	<td>" . $linha['pro_nome'] . "</td>";
			echo "	<td>" . $linha['dis_nome'] . "</td>";
			echo "</tr>";
		}
	?>
</table>
