<?php
	require('conexao/conecta.php');

	$id = $_GET['id'];

	$sqlS = "SELECT * FROM serie as s 
			INNER JOIN serie_has_turma as st ON s.ser_cod = st.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			WHERE t.tur_cod = $id";
	$resultS = mysqli_query($con, $sqlS);

	$sqlCount = "SELECT COUNT(s.ser_cod) FROM serie as s 
			INNER JOIN serie_has_turma as st ON s.ser_cod = st.ser_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			WHERE t.tur_cod = $id";
	$resultCount = mysqli_query($con, $sqlCount);

	$sqlD = "SELECT * FROM professor_has_disciplina as pd 
			INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
			INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod ";
	$resultD = mysqli_query($con, $sqlD);
?>

<div>
	<h2>Oferta:</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<table class="table">
			<?php
					while($serie = mysqli_fetch_array($resultS)){
						$count = mysqli_fetch_array($resultCount);
						$count[0];
						if($count[0] == 0){
							echo "<tr><td><h4 class='text-danger'>Turma não vinculada à nenhuma série</h4></td></tr>";
						}
						else{
							echo "<tr>";
							echo "	<th>Série:</th>";
							echo "	<th>" . $serie['ser_ano'] . "</th>";
							echo "</tr>";
						}
				}
			?>
			</table>
			</select>
		</div>
		<div class="form-group">
			<label for="disc">Disciplina</label>
			<select name="disc" id="disc" class="form-control" multiple>
				<?php 
					while($disciplina = mysqli_fetch_array($resultD)) {
						echo "<option value='" . $disciplina['pd_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $disciplina['dis_nome'] . " - Professor: " . $disciplina['pro_nome'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Adicionar" class="btn btn-default" name="add" id="add">
		</div>
		<table class="table table-hover">
			<tr id="added">
			<tr>
		</table>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=oferta">
	</form>
</div>