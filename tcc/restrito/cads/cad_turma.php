

<div>
	<h1>Adicionar Turma:</h1>
	<form name="form1" method="post">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" class="form-control" placeholder="Nome" required>
		</div>
		<div class="form-group"> 
			<label for="ano">Ano</label>
			<input type="text" name="ano" class="form-control" placeholder="Ano" required>
		</div>
		<div class="form-group">
			<label for="ppc">PPC</label>
			<select name="ppc" class="form-control">
				<option>Selecione ></option>
			</select>
		</div>
		<input type="submit" value="Salvar" class="btn btn-default">
		<input type="button" value="Limpar" class="btn btn-default" onclick="window.location='?pag=cadturma'">
	</form>
</div>