<?php
session_start();
require_once("../conexao/db.php");

$name = trim($_POST['namenome']);
$celph = trim($_POST['namecelular']);
$cpf = trim($_POST['namecpf']);
$email = trim($_POST['nameemail']);
$psw = trim(password_hash($_POST['namesenha'], PASSWORD_ARGON2I));
$cep = trim($_POST['namecep']);
$number = trim($_POST['namenumero']);
$city = $_POST['namecidade'];
$district = $_POST['namebairro'];
$road = $_POST['namerua'];
$state = $_POST['nameestado'];

if(isset($name) && isset($celph) && isset($cpf) && isset($email) && isset($psw) && isset($cep) && isset($number) && isset($city) && isset($district) && isset($road) && isset($state)){
			$formControl = $_pdo->prepare("SELECT * FROM clientes");
			$formControl->execute();
			$_resultFormControl = $formControl->fetch(PDO::FETCH_ASSOC);

			if($celph == $_resultFormControl['celular']){
					include_once("../php/nav.php");
					echo "Esse celular já está registrado no sistema."."<br>";
					include_once("../php/infossite.php");
			}
			if($cpf == $_resultFormControl['cpf']){
				include_once("../php/nav.php");
				echo "Esse CPF já está registrado no sistema."."<br>";
				include_once("../php/infossite.php");
			}
			if($email == $_resultFormControl['email']){
				include_once("../php/nav.php");
				echo "Esse email já está registrado no sistema."."<br>";
				include_once("../php/infossite.php");
			}
			if($celph != $_resultFormControl['celular'] && $cpf != $_resultFormControl['cpf'] && $email != $_resultFormControl['email']){
				$registerInsert = $_pdo->prepare("INSERT INTO clientes (nomecliente,celular,cpf, email, senha, cep, numero, cidade, bairro, rua, estado) VALUES (:name, :cellphone, :cpf, :email, :psw, :cep, :number, :city, :district, :road, :state)");

				$registerInsert->bindValue(":name",$name);
				$registerInsert->bindValue(":cellphone",$celph);
				$registerInsert->bindValue(":cpf",$cpf);
				$registerInsert->bindValue(":email",$email);
				$registerInsert->bindValue(":psw",$psw);
				$registerInsert->bindValue(":cep",$cep);
				$registerInsert->bindValue(":number",$number);
				$registerInsert->bindValue(":city",$city);
				$registerInsert->bindValue(":district",$district);
				$registerInsert->bindValue(":road",$road);
				$registerInsert->bindValue(":state",$state);

				$registerInsert->execute();
				
				header("location:../php/homep");
			}

}if(!isset($name) || !isset($celph) || !isset($cpf) || !isset($email) || !isset($psw) || !isset($cep) || !isset($number) || !isset($city) || !isset($district) || !isset($road) || !isset($state)){
	 echo "Dados inseridos inválidos.";
		
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	Document</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@300;400&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/nav.css">
    <script src="https://kit.fontawesome.com/92f64e9681.js" crossorigin="anonymous"></script>
    <script src="../js/linkeffects.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     
	<style>
				body{
					 text-align: center;
					 color: red;
				}
	</style>
</head>
<body>
	
</body>
</html>


