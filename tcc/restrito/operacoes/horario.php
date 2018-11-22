<?php
	require('conexao/conecta.php');	
	$sql = "SELECT stt.stt_cod, stt.stt_status, t.tur_nome, s.ser_cod, tn.turno_desc, s.ser_modulo FROM oferta as o 
		INNER JOIN serie_has_turma as st ON o.st_cod = st.st_cod
		INNER JOIN turma as t ON st.tur_cod = t.tur_cod
		INNER JOIN serie as s ON st.ser_cod = s.ser_cod
		INNER JOIN serie_turma_has_turno as stt ON stt.st_cod = st.st_cod
		INNER JOIN turno as tn ON stt.turno_cod = tn.turno_cod 
		WHERE stt.stt_status = 'Ativo'
		GROUP by stt.stt_cod, stt.stt_status, t.tur_nome, s.ser_cod, tn.turno_desc, s.ser_modulo";
	$result = mysqli_query($con, $sql) or die('Falha');

	$tipoUsuario = null;

	if(isset($_SESSION['usuario'])){
		$tipoUsuario = $_SESSION['tipoUsuario'];
	}
?>

<div>
	<h2>Horário de aulas:</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<select name="tipoUsuario" id="tipoUsuario" hidden="true" >
				<option value= "<?= $tipoUsuario ?>" selected></option>
			</select>
			<select name="turma" id="turma" class="form-control">
				<option value="0">Selecione a Turma - Série - Turno</option>
				<?php 
					while($tst = mysqli_fetch_array($result)) {
						echo "<option value='" . $tst['stt_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						else{*/
							echo "'>Turma: " . $tst['tur_nome'] . " - Série: " . $tst['ser_modulo'] . " - Turno: " . $tst['turno_desc'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<!-- <button id="buscar" class="bt">Buscar</button> -->
	</form>

	<p id="horario">Tabela de horários</p>
</div>
