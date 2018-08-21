<div>
	<h2>Oferta:</h2>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="serie">Série</label>
			<select name="serie" class="form-control">
				<?php 
					while($ppc = mysqli_fetch_array($result)) {
						echo "<option value='" . $ppc['ppc_cod'];
						/*if(isset($_GET['id'])){
							if($ppc['cur_cod'] == $curso['cur_cod']){
								echo "' selected>" . $curso['cur_nome'] . "</option>";
							}
							else{
								echo "'>" . $curso['cur_nome'] . "</option>";
							}
						}
						else{*/
							echo "'>" . $ppc['ppc_info'] . " - Curso: " . $ppc['cur_nome'] . "</option>";
						//}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for=""></label>
			<input type="text" name="" class="form-control" placeholder="" required>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadturma'">
	</form>
</div>