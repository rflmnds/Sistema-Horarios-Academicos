<?php
	require('../src/connection/conecta.php');

	$pro_cod = $_SESSION['professor'];
	$tipoUsuario = $_SESSION['tipoUsuario'];

	try{
		$stmt = $conn->prepare("SELECT * FROM usuario as u 
				INNER JOIN professor as p ON u.pro_cod = p.pro_cod
				WHERE u.pro_cod = :codProf");
		$stmt->bindValue(':codProf', $pro_cod);
		$stmt->execute();
		$professor = $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $conn->prepare("SELECT * FROM disciplina as d
			INNER JOIN professor_has_disciplina as pd  ON d.dis_cod = pd.dis_cod
			INNER JOIN professor as p ON  pd.pro_cod = p.pro_cod
			WHERE p.pro_cod = :codProf");
		$stmt->bindValue(":codProf", $pro_cod);
		$stmt->execute();
		$disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = $conn->prepare("SELECT * FROM projeto as p
			INNER JOIN professor as pr ON p.pro_cod = pr.pro_cod
			WHERE p.pro_cod = :codProf");
		$stmt->bindValue(":codProf", $pro_cod);
		$stmt->execute();
		$projetos = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = $conn->prepare("SELECT ch.con_horaini, ch.con_cod, ch.con_desc FROM config_hora as ch
			INNER JOIN turno as tn ON ch.turno_cod = tn.turno_cod
			INNER JOIN horario as h ON ch.con_cod = h.con_cod
			INNER JOIN dia_semana as ds ON h.ds_cod = ds.ds_cod
			GROUP BY ch.con_horaini, ch.con_cod, ch.con_desc
			ORDER BY ch.con_horaini");
		$stmt->execute();	
		$horario = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$qtd_rows = $stmt->rowCount();
		
		$stmt = $conn->prepare("SELECT * FROM aula as a
			INNER JOIN horario as h ON a.hor_cod = h.hor_cod
			INNER JOIN oferta as o ON a.ofe_cod = o.ofe_cod
			INNER JOIN serie_has_turma as st ON o.st_cod = st.st_cod
			INNER JOIN turma as t ON st.tur_cod = t.tur_cod
			INNER JOIN serie as s ON st.ser_cod = s.ser_cod
			INNER JOIN serie_turma_has_turno as stt ON stt.st_cod = st.st_cod
			INNER JOIN turno as tn ON stt.turno_cod = tn.turno_cod
			INNER JOIN professor_has_disciplina as pd ON o.pd_cod = pd.pd_cod
			INNER JOIN disciplina as d ON pd.dis_cod = d.dis_cod
			INNER JOIN professor as p ON pd.pro_cod = p.pro_cod
			WHERE p.pro_cod = :codProf ORDER BY h.ds_cod ");
		$stmt->bindValue(":codProf", $pro_cod);
		$stmt->execute();
		$aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$qtd = $stmt->rowCount();

		$stmt = $conn->prepare("SELECT * FROM projeto as p
 			INNER JOIN hora_projeto as hp ON p.proj_cod = hp.proj_cod
			INNER JOIN horario as h ON hp.hor_cod = h.hor_cod
			INNER JOIN config_hora as ch ON h.con_cod = ch.con_cod
			INNER JOIN dia_semana as ds ON h.ds_cod = ds.ds_cod
			INNER JOIN professor as pr ON p.pro_cod = pr.pro_cod
			WHERE p.pro_cod = :codProf ORDER BY h.ds_cod ");
		$stmt->bindValue(":codProf", $pro_cod);
		$stmt->execute();
		$projetos = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){
		echo 'Erro: ' . $e->getMessage();
	}
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
		<div class="col">
			<a class="btn btn-info mx" data-toggle="collapse" href="#disciplinas" role="button" aria-expanded="false" aria-controls="disciplinas">
				Disciplinas
			    <i class="fa fa-angle-down"></i>
			</a>
			<a class="btn btn-info mx" data-toggle="collapse" href="#projetos" role="button" aria-expanded="false" aria-controls="horarios">
				Projetos
			    <i class="fa fa-angle-down"></i>
			</a>
			<a class="btn btn-info mx" data-toggle="collapse" href="#horarioprof" role="button" aria-expanded="false" aria-controls="projetos">
				Horário pessoal
			    <i class="fa fa-angle-down"></i>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col collapse my-3" id="disciplinas">
			<table class="table table-hover">
				<h4>Disciplinas</h4>
				<?php
					foreach($disciplinas as $disciplina){
						echo "<tr>";
						echo "	<th>" . $disciplina['dis_nome'] . "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col collapse my-3" id="projetos">
			<table class="table table-hover">
				<h4>Projetos</h4>
				<?php
					foreach($projetos as $projeto){
						echo "<tr>";
						echo "	<th>Projeto nº " . $projeto['proj_numero'] . "</th>";
						echo "</tr>";
					}
				?>
			</table>
			<a class='btn btn-sm btn-default' href='?pag=cadprojeto&id=<?= $pro_cod?>'>Criar Projeto</a>
		</div>
	</div>
	<div class="row">
		<div class="col collapse my-3" id="horarioprof">
			<table class="table table-sm table-hover">
				<h4>Horário</h4>
				<tr>
					<th>Horário</th>
					<th style="text-align: center;">Domingo</th>
					<th style="text-align: center;">Segunda</th>
					<th style="text-align: center;">Terça</th>
					<th style="text-align: center;">Quarta</th>
					<th style="text-align: center;">Quinta</th>
					<th style="text-align: center;">Sexta</th>
					<th style="text-align: center;">Sábado</th>
				</tr>
				<?php
					$i = 0;
					foreach($horario as $hora){
						$i++;
						echo "<tr>";
						echo "<td>";
						echo $hora["con_horaini"];
						echo "</td>";
						for($j = 1; $j <= 7; $j++){
						 	$urlProj = "?pag=addproj&prof=" . $pro_cod .  "&ds=" . $j . "&period=" .  $hora['con_cod'];
						 	$urlAdd = "?pag=addativ" . "&ds=" . $j . "&period=" .  $hora['con_cod'];
							echo "<td style='text-align: center'>";
							$count = 0;
							if($qtd >= 1){
								foreach($aulas as $aula){
									if($aula['con_cod'] == $hora['con_cod'] &&  $aula['ds_cod'] == $j){
										if($tipoUsuario == 1){
											$urlAula = $url . "&id=" . $aula['aula_cod'];
											echo "<a href='$urlAula' class='btn btn-outline-info'>" . $aula['dis_nome'] . "</a>";
										}
										else{
											echo "<p>". $aula['dis_nome'] . "</p>";
										}
										$count++;
										break;
									}
								}
								foreach($projetos as $projeto){
									if($projeto['con_cod'] == $hora['con_cod'] &&  $projeto['ds_cod'] == $j){
										if($tipoUsuario == 1){
											$proj = $urlProj . "&id=" . $projeto['aula_cod'];
											echo "<a href='$proj' class='btn btn-outline-info'>Projeto nº " . $projeto['proj_numero'] . "</a>";
										}
										else{
											echo "<p>Projeto nº " . $projeto['proj_numero'] . "</p>";
										}
										$count++;
										break;
									}
								}
								if($hora['con_desc'] == 'Intervalo'){
									echo "<p>--Intervalo--</p>";
								}
								else if($count==0){
									if($tipoUsuario == 2 || $tipoUsuario == 3){
										echo 	"<div class='btn-group' role='group'>
													<button id='add' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
														Adicionar
													</button>
													<div class='dropdown-menu' aria-labelledby='add'>
														<a href='$urlProj' class='dropdown-item'>Projeto</a>
														<a href='$urlAdd' class='dropdown-item'>Apoio/Manutenção</a>
													</div>
												</div>";
									}
									else {
										echo "...";
									}
								}
							}
							else if($hora['con_desc'] == 'Intervalo'){
								echo "<p>--Intervalo--</p>";
							}
							else{
								if($tipoUsuario == 2 || $tipoUsuario == 3){
										echo 	"<div class='btn-group' role='group'>
													<button id='add' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
														Adicionar
													</button>
													<div class='dropdown-menu' aria-labelledby='add'>
														<a href='$urlProj' class='dropdown-item'>Projeto</a>
														<a href='$urlAdd' class='dropdown-item'>Apoio/Manutenção</a>
													</div>
												</div>";
									}
								else {
									echo "...";
								}
							}
							echo "</td>";
						}
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</div>