<?php
	require('conexao/conecta.php');

	$id = $_GET['id'];
	$mensagem = null;
	
	$sqlPD = "SELECT * FROM disciplina as d
			INNER JOIN professor_has_disciplina as pd  ON d.dis_cod = pd.dis_cod
			INNER JOIN professor as p ON  pd.pro_cod = p.pro_cod
			WHERE d.dis_cod=$id";
	$resultPD = mysqli_query($con, $sqlPD) or die("Falha ao buscar disciplinas do professor");

	$sql = "SELECT * FROM disciplina WHERE dis_cod = " . $id;
	$result = mysqli_query($con, $sql) or die("Falha ao buscar nome da disciplina");
	$disciplina = mysqli_fetch_array($result);

	$sqlAdd = "SELECT * FROM professor";
	$resultAdd = mysqli_query($con, $sqlAdd) or die("Falha ao buscar disciplinas");

	if(isset($_POST['submit'])) {
		include('restrito/acoes/acao_dp.php');
	}

?>
<div>
	<h3>Professores da disciplina "<?= $disciplina['dis_nome'] ?>"</h3>
		<table class="table table-hover">
			<tr>
				<th>Professores</th>
			</tr>
			<?php
				while($profDisciplina = mysqli_fetch_array($resultPD)){
					echo "<tr>";
					echo "	<td>" . $profDisciplina['pro_nome'] . "</td>";
					echo "</tr>";
				}
			?>
		</table>
	<form name="form1" method="post">
		<h4>Adicionar disciplina:</h4>
		<div class="form-group">
			<select name="addProf" class="form-control">
				<?php
					while($professor = mysqli_fetch_array($resultAdd)) {
						echo "<option value='" . $professor['pro_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $professor['pro_nome'] . "</option>";
						//}
					}
				?>
			</select>		
		</div>
		<input type="submit" name="submit" value="Salvar" class="btn btn-default">

	</form>

	<p class="text-success"><?= $mensagem ?></p>

</div>