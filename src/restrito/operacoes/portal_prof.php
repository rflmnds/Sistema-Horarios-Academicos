<?php
	require('connection/conecta.php');

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

	$sqlPJ = "SELECT * FROM projeto as p
			INNER JOIN professor as pr ON p.pro_cod = pr.pro_cod
			WHERE p.pro_cod = " . $pro_cod;
	$scriptPJ = mysqli_query($con, $sqlPJ) or die('Falha ao buscar projetos do professor');

	$tipoUsuario = $_SESSION['tipoUsuario'];

	$sql1 = "SELECT ch.con_horaini, ch.con_cod, ch.con_desc FROM config_hora as ch
			INNER JOIN turno as tn ON ch.turno_cod = tn.turno_cod
			INNER JOIN horario as h ON ch.con_cod = h.con_cod
			INNER JOIN dia_semana as ds ON h.ds_cod = ds.ds_cod
			GROUP BY ch.con_horaini, ch.con_cod, ch.con_desc
			ORDER BY ch.con_horaini";
	$script1 = mysqli_query($con, $sql1);

	$turma = mysqli_fetch_array($script1);
	mysqli_data_seek($script1, 0);

	$qtd_rows = mysqli_num_rows($script1);

	$sql2 = "SELECT * FROM aula as a
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
			WHERE p.pro_cod = " . $pro_cod . " ORDER BY h.ds_cod ";
	$script2 = mysqli_query($con, $sql2) or die('Falha ao buscar horário de aulas');

	$sql3 = "SELECT * FROM projeto as p
 			INNER JOIN hora_projeto as hp ON p.proj_cod = hp.proj_cod
			INNER JOIN horario as h ON hp.hor_cod = h.hor_cod
			INNER JOIN config_hora as ch ON h.con_cod = ch.con_cod
			INNER JOIN dia_semana as ds ON h.ds_cod = ds.ds_cod
			INNER JOIN professor as pr ON p.pro_cod = pr.pro_cod
			WHERE p.pro_cod = " . $pro_cod . " ORDER BY h.ds_cod ";
	$script3 = mysqli_query($con, $sql3) or die('Falha ao buscar horário de projetos');

	$qtd = mysqli_num_rows($script2);

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
					while($disciplinaProf = mysqli_fetch_array($resultPD)){
						echo "<tr>";
						echo "	<th>" . $disciplinaProf['dis_nome'] . "</td>";
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
					while($projetoProf = mysqli_fetch_array($scriptPJ)){
						echo "<tr>";
						echo "	<th>Projeto nº " . $projetoProf['proj_numero'] . "</th>";
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
					while($linha= mysqli_fetch_array($script1)){
						$i++;
						echo "<tr>";
						echo "<td>";
						echo $linha["con_horaini"];
						echo "</td>";
						for($j = 1; $j <= 7; $j++){
						 	$urlp = "?pag=addproj&prof=" . $pro_cod .  "&ds=" . $j . "&period=" .  $linha['con_cod'];
						 	$urla = "?pag=addativ" . "&ds=" . $j . "&period=" .  $linha['con_cod'];
							echo "<td style='text-align: center'>";
							$count = 0;
							if($qtd >= 1){
								while($hAula = mysqli_fetch_array($script2)){
									if($hAula['con_cod'] == $linha['con_cod'] &&  $hAula['ds_cod'] == $j){
										if($tipoUsuario == 1){
											$aula = $url . "&id=" . $hAula['aula_cod'];
											echo "<a href='$aula' class='btn btn-outline-info'>" . $hAula['dis_nome'] . "</a>";
										}
										else{
											echo "<p>". $hAula['dis_nome'] . "</p>";
										}
										$count++;
										break;
									}
								}
								while($hProjeto = mysqli_fetch_array($script3)){
									if($hProjeto['con_cod'] == $linha['con_cod'] &&  $hProjeto['ds_cod'] == $j){
										if($tipoUsuario == 1){
											$proj = $urlp . "&id=" . $hProjeto['aula_cod'];
											echo "<a href='$proj' class='btn btn-outline-info'>Projeto nº " . $hProjeto['proj_numero'] . "</a>";
										}
										else{
											echo "<p>Projeto nº " . $hProjeto['proj_numero'] . "</p>";
										}
										$count++;
										break;
									}
								}
								if($linha['con_desc'] == 'Intervalo'){
									echo "<p>--Intervalo--</p>";
								}
								else if($count==0){
									if($tipoUsuario == 2 || $tipoUsuario == 3){
										echo 	"<div class='btn-group' role='group'>
													<button id='add' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
														Adicionar
													</button>
													<div class='dropdown-menu' aria-labelledby='add'>
														<a href='$urlp' class='dropdown-item'>Projeto</a>
														<a href='$urla' class='dropdown-item'>Apoio/Manutenção</a>
													</div>
												</div>";
									}
									else {
										echo "...";
									}
								}
							}
							else if($linha['con_desc'] == 'Intervalo'){
								echo "<p>--Intervalo--</p>";
							}
							else{
								if($tipoUsuario == 2 || $tipoUsuario == 3){
										echo 	"<div class='btn-group' role='group'>
													<button id='add' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
														Adicionar
													</button>
													<div class='dropdown-menu' aria-labelledby='add'>
														<a href='$url' class='dropdown-item'>Projeto</a>
														<a href='$url' class='dropdown-item'>Apoio/Manutenção</a>
													</div>
												</div>";
									}
								else {
									echo "...";
								}
							}
							mysqli_data_seek($script2, 0);
							mysqli_data_seek($script3, 0);
							echo "</td>";
						}
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</div>