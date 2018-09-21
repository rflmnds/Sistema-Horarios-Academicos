<?php
	require('conexao/conecta.php');

	$sql = "SELECT  t.tur_cod, t.tur_nome FROM oferta as o 
		INNER JOIN serie_has_turma as st ON o.ser_cod = st.ser_cod
		INNER JOIN turma as t ON st.tur_cod = t.tur_cod
		GROUP BY  t.tur_cod, t.tur_nome";
	$result = mysqli_query($con, $sql) or die('Falha');
?>

<div>
	<form name="form1" method="post">
		<div class="form-group">
			<select name="turma" id="turma" class="form-control">
				<option value="0">Selecione a Turma</option>
				<?php 
					while($turma = mysqli_fetch_array($result)) {
						echo "<option value='" . $turma['tur_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						else{*/
							echo "'>Turma: " . $turma['tur_nome'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
	</form>

	<p id="horario">Aqui fica a Tabela de horários</p>
</div>