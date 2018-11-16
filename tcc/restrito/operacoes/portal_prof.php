<?php
	require('conexao/conecta.php');

	$pro_cod = $_SESSION['professor'];

	$sql = "SELECT * FROM usuario as u 
			INNER JOIN professor as p ON u.pro_cod = p.pro_cod
			WHERE u.pro_cod = $pro_cod";
	$result = mysqli_query($con, $sql) or die ('Falha ao buscar usuário');
	$professor = mysqli_fetch_array($result);

	$sqlPD = "SELECT * FROM disciplina as d
			INNER JOIN professor_has_disciplina as pd  ON d.dis_cod = pd.dis_cod
			INNER JOIN professor as p ON  pd.pro_cod = p.pro_cod
			WHERE p.pro_cod = $pro_cod";
	$resultPD = mysqli_query($con, $sqlPD) or die("Falha ao buscar disciplinas do professor");

	$sqlHR = "SELECT * FROM aula as a
			INNER JOIN horario as h ON a.hor_cod = h.hor_cod
			INNER JOIN dia_semana as ds ON h.ds_cod = ds.ds_cod		
			INNER JOIN config_hora as ch ON h.con_cod = ch.con_cod
			INNER JOIN oferta as o ON a.ofe_cod = o.ofe_cod
			INNER JOIN serie_has_turma as st ON o.st_cod = st.st_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			INNER JOIN serie as s ON st.ser_cod = s.ser_cod
			INNER JOIN serie_turma_has_turno as stt ON stt.st_cod = st.st_cod
			INNER JOIN turno as tn ON stt.turno_cod = tn.turno_cod
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod
			INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
			WHERE p.pro_cod = " . $pro_cod . " ORDER BY h.ds_cod ";
	$scriptHR = mysqli_query($con, $sqlHR) or die('Falha ao buscar horário de turma');
?>

<div>
	<h2>Professor <b class="text-info"><?= $professor['pro_nome'] ?></b></h2>
	<div class="row">
		<div class="col col-sm-6">
			<h4>Informações Profissionais:</h4>
			<table class="table table-hover">
				<tr>
					<th>Nome</th>
					<td><?= $professor['pro_nome'] ?></td>
				</tr>
				<tr>
					<th>SIAPE</th>
					<td><?= $professor['pro_siape'] ?></td>
				</tr>
				<tr>
					<th>Formação</th>
					<td><?= $professor['pro_formacao'] ?></td>
				</tr>
			</table>
		</div>
		<div class="col col-sm-6">
			<h4>Informações de usuário:</h4>
			<table class="table table-hover">
				<tr>
					<th>Nome de usuário</th>
					<td><?= $professor['usu_nome'] ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?= $professor['usu_email'] ?></td>
				</tr>
			</table>
			<?= "<a class='btn btn-sm btn-default' href='?pag=changeuser&id=$pro_cod'>Editar informações de usuário</a>" ?>
		</div>
	</div>
	<div class="row">
	<a class="btn btn-lg btn-info" data-toggle="collapse" href="#disciplinas" role="button" aria-expanded="false" aria-controls="disciplinas">
		Disciplinas 
	    <span class="glyphicon glyphicon-chevron-down"></span>
	</a>
	<a class="btn btn-lg btn-info" data-toggle="collapse" href="#horarios" role="button" aria-expanded="false" aria-controls="horarios">
		Horários de aulas 
	    <span class="glyphicon glyphicon-chevron-down"></span>
	</a>
		<div class="collapse" id="disciplinas">
			<table class="table table-hover">
				<h4>Disciplinas</h4>
				<?php
					while($disciplinaProf = mysqli_fetch_array($resultPD)){
						echo "<tr>";
						echo "	<th>" . $disciplinaProf['dis_nome'] . "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
		<div class="collapse" id="horarios">
			<table class="table table-hover">
				<h4>Horário</h4>
				<tr>
					<th>Dia da Semana</th>
					<th>Horário de início</th>
					<th>Horário de término</th>
					<th>Turma</th>
					<th>Disciplina</th>
				</tr>
				<?php
					while($horario = mysqli_fetch_array($scriptHR)){
						echo "<tr>";
						echo "	<td> " . $horario['ds_nome'] . "</td>";
						echo "	<td> " . $horario['con_horaini'] . "</td>";
						echo "	<td> " . $horario['con_horafin'] . "</td>";
					 	echo "	<td> " . $horario['tur_nome'] ."</td>";
					 	echo "	<td> " . $horario['dis_nome'] ."</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</div>