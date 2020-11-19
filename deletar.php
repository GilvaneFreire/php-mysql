<!DOCTYPE html>
<?php
require 'config.php';
?>
<html>
	<head>
		<title>Deletar usuário</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
    <style>
        body{
            width: 300px;
            margin-top: 50px;
        }
    </style>
	<body class="container">
        <form class="form-horizontal" method="POST">
            Deletar usuário?<br>
            
                <input type="submit" class="btn btn-danger" name="Deletar" value="Deletar usuário">
            <br><br>
        </form>

		<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
				<a href="index.php"><button type="submit" class="btn btn-default">Voltar</button></a>
            </div>
        </div>
<?php
require 'config.php';

if (isset($_POST["Deletar"])){
    $id = $_GET["id"];
    
    $pdo->beginTransaction();
        try{
            $sql = "DELETE FROM usuarios WHERE id = ".$id."";
            $sql = $pdo->query($sql);
            $pdo->commit();
            header('location: index.php?deletado=true');

            }catch(PDOException $e){
                echo "Falhou: ".$e->getMessage();
            }
	
}

?>

</body>
</html>