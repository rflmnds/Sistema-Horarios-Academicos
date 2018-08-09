<?php
	require('conexao/conecta.php');

	$sql = "SELECT * FROM disciplina";
	$result = mysqli_query($con, $sql) or die("Falha ao buscar disciplinas");
?>
<div>
	<form name="form1" method="post">
		<div class="form-group">
			<h3>Disciplinas</h3>
			<table class="table table-hover">
			<tr>
				<th>Código</th>
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
					echo "	<td>" . $disciplina['dis_nome'] . "</td>";
					echo "	<td>" . $disciplina['dis_carga'] . "</td>";
					echo "	<td>
								<label class='checkbox-inline'>
									<input type='checkbox' name='disc" . $disciplina['dis_cod'] . "' class='checkbox'>Adicionar
								</label>
							</td>";
					echo "</tr>";
				}
			?>
			</table>
			<input type="submit" name="submit" value="Salvar" class="btn btn-default btn-block">

			<?php
				if(isset($_POST['submit'])){
					include('restrito/acoes/acao_pd.php');
				}
			?>
		</div>
	</form>
</div>