<?php
	require('connection/conecta.php');
	include('restrito/operacoes/valida.php');

	try{
		$stmt = $conn->query("SELECT * FROM usuario as u INNER JOIN tipo_usuario as tu ON u.tu_cod = tu.tu_cod");
	}
	catch(PDOException $e){
		echo 'Erro: ' . $e->getMessage();  
	}

?>
<div>
	<h2>Usuários do sistema:</h2>
	<table class="table table-hover">
		<tr>
			<th>Nome de usuário</th>
			<th>Email</th>
			<th>Categoria</th>
			<th>Ações</th>
		</tr>
		<?php
			foreach($stmt as $user){
				$id = $user['usu_cod'];
				$url = "?pag=caduser&id=$id";

				echo "<tr>";
				echo "	<td>" . $user['usu_nome'] . "</td>";
				echo "	<td>" . $user['usu_email'] . "</td>";
				echo "	<td>" . $user['tu_desc'] . "</td>";
				echo "	<td><a href='$url'class='btn btn-success'>Editar</a></td>";
				echo "</tr>";
			}
		?>
	</table>
	<a href="?pag=caduser" class="btn btn-default">Cadastrar usuário</a>
</div>
