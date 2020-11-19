<!DOCTYPE html>
<?php
require 'config.php';
?>
<html>
	<head>
		<title>Sistema básico de Cadastro</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
	<body class="container" style="margin-top: 50px">
		
		<a href="adicionar.php">
		<input class="btn btn-primary" type="submit" name="adicionarUsuario" value="Inserir novo usuário"></a>
		<table class="table table-hover">

			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>

			<?php
				$sql = "SELECT * FROM usuarios ORDER BY id ASC";
				$sql = $pdo->query($sql);
				if ($sql->rowCount()>0){
					foreach ($sql->fetchall() as $usuario) {
						echo '<tr>';
						echo "<td>".$usuario['id']."</td>";
						echo "<td>".$usuario['nome']."</td>";
						echo "<td>".$usuario['telefone']."</td>";
						echo "<td>".$usuario['email']."</td>";
						echo '<td><a href="editar.php?id='.$usuario['id'].'"><button type="button" class="btn btn-success">Editar</button></a><a href="deletar.php?id='.$usuario['id'].'"><button type="button" class="btn btn-danger">Deletar</button></a></td>';
						echo '</tr>';
					}
				} 
			?>

		</table>

		<?php 
			if (isset($_GET["editou"]) && $_GET["editou"] == true){
				echo "usuário editado com sucesso";
			} 
			if (isset($_GET["incluido"]) && $_GET["incluido"] == true){
				echo "usuário incluído com sucesso";
			} 
			if (isset($_GET["deletado"]) && $_GET["deletado"] == true){
				echo "usuário deletado com sucesso";
			} 
		?>

	</body>
</html>