<!DOCTYPE html>
<?php
require 'config.php';
	
	$id = $_GET["id"];
	$sql = "SELECT * FROM usuarios WHERE id = '".$id."'";
	$sql = $pdo->query($sql);
		if ($sql->rowCount()>0){
			foreach ($sql->fetchall() as $usuario) {
				$nome_ = $usuario['nome'];
				$telefone_ = $usuario['telefone'];
				$email_ = $usuario['email'];
	}}
			 
?>
<html>
	<head>
		<title>Editar usuário</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
	
	<body class="container" style="margin-top: 50px">
		<form class="form-horizontal" method="POST">
			<div class="form-group">
				<label class="control-label col-sm-2" for="nome">Nome:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nome" name="nome" placeholder="nome" value="<?= $nome_?>">
				</div>
			</div>
			<div class="form-group">
					<label class="control-label col-sm-2" for="telefone">Telefone:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone" value="<?= $telefone_?>">
				</div>
			</div>
			<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
				<div class="col-sm-10">
					<input type="mail" class="form-control" id="email" name="email" placeholder="email" value="<?= $email_?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Alterar dados do usuário</button>
				</div>
			</div>
		</form>

		<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
				<a href="index.php"><button type="submit" class="btn btn-default">Voltar</button></a>
            </div>
        </div>

		<?php
			require 'config.php';

			if (isset($_POST["nome"])){
				if (!empty($_POST["nome"]) && !empty($_POST["telefone"]) && !empty($_POST["email"])){

					$nome = addslashes($_POST["nome"]);
					$telefone = addslashes($_POST["telefone"]);
					$email = addslashes($_POST["email"]);
					$id = $_GET["id"];

					try{

						$sql = "UPDATE usuarios set nome = '".$nome."', telefone = '".$telefone."', email = '".$email."' WHERE id = '".$id."'";
						$sql = $pdo->query($sql);
						echo "Usuário atualizado: ".$id;
						header('location: index.php?editou=true');

					}catch(PDOException $e){
						echo "Falhou: ".$e->getMessage();
					}
				}else{
					echo "Você precisa preencher todos os campos!";
				}
			}

		?>
	
</body>
</html>