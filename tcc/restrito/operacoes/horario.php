<?php
	require('conexao/conecta.php');

	$sql = "SELECT t.tur_cod, t.tur_nome FROM oferta as o 
		INNER JOIN serie_has_turma as st ON o.ser_cod = st.ser_cod
		INNER JOIN turma as t ON st.tur_cod = t.tur_cod
		GROUP BY  t.tur_cod, t.tur_nome";
	$result = mysqli_query($con, $sql) or die('Falha');

	$sql1 = "SELECT s.ser_cod, s.ser_modulo FROM oferta as o 
		INNER JOIN serie_has_turma as st ON o.ser_cod = st.ser_cod
		INNER JOIN serie as s ON st.ser_cod = s.ser_cod
		GROUP BY s.ser_cod, s.ser_modulo";
	$result1 = mysqli_query($con, $sql1) or die('Falha');
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
		<div class="form-group">
			<select name="serie" id="serie" class="form-control">
				<option value="0">Selecione a Série</option>
				<?php 
					while($serie = mysqli_fetch_array($result1)) {
						echo "<option value='" . $serie['ser_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						else{*/
							echo "'>Série: " . $serie['ser_modulo'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<button id="buscar">Buscar</button>
	</form>

	<p id="horario">Tabela de horários</p>
</div>