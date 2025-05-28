<?php
	require('../src/connection/conecta.php');
	include('restrito/operacoes/valida.php');

	$id = $_GET['id'];
	$mensagem = null;
	
	$sqlPD = "SELECT * FROM disciplina as d
			INNER JOIN professor_has_disciplina as pd  ON d.dis_cod = pd.dis_cod
			INNER JOIN professor as p ON  pd.pro_cod = p.pro_cod
			WHERE d.dis_cod=$id";
	$resultPD = mysqli_query($conn,  $sqlPD) or die("Falha ao buscar disciplinas do professor");

	$sql = "SELECT * FROM disciplina WHERE dis_cod = " . $id;
	$result = mysqli_query($conn,  $sql) or die("Falha ao buscar disciplina selecionada");
	$disciplina = mysqli_fetch_array($result);

	$sqlAdd = "SELECT * FROM professor";
	$resultAdd = mysqli_query($conn,  $sqlAdd) or die("Falha ao buscar professor");

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
		<h4>Conectar disciplina ao professor:</h4>
		<div class="form-group">
			<select name="addProf" class="form-control" style="float: left;max-width: 80%">
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
			<a href="?pag=cadprof" class="btn btn-default" style="display: block">Cadastrar professor</a>		
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Salvar" class="btn btn-primary">
		</div>
		<div class="form-group">
			<a href='?pag=caddisc' class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
		</div>
	</form>

	<p class="text-success"><?= $mensagem ?></p>

</div>