<?php session_start();
if(!isset($_SESSION["idcliente"])){
	header("location:../conta/login");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimble | Senha</title>
	   <link rel="shortcut icon" href="../img/favicon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../css/myAccount.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	</head>
	<body>
	  <?php include_once("headerConta.php");?>
	  <?php
				$idCliente = $_SESSION["idcliente"];
				$infoCliente = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
				$infoCliente->execute();
				$infoClienteValues = $infoCliente->fetch(PDO::FETCH_ASSOC);
		
			?>
	  <div id="container-my-account">
	   
					<div id="nav-conta">
								<?php include_once("navConta.php");?>
					</div>

					<div id="align-top-hist">
					  <div id="personal-infos-title">
						  	Alterar Senha
					  </div>

					
						
						<div id="request-flex-change-psw">
							
							<form method="post" action="changePsw" id="form-change-psw">
								<div class="flex-img-w-input">
									<div class="lock-icon"><img src="../img/lock.svg"></div>
									<input type="password" id="change-password-id" name="change-password" placeholder="Nova senha" onkeypress="changePassword()" onkeyup="changePassword()">
								</div>
								
									<br>
									
								<div class="flex-img-w-input">
									<div class="lock-icon"><img src="../img/lock.svg"></div>
										<input type="password" id="confirm-change-password-id" name="change-password" placeholder="Confirmar nova senha" onkeypress="changePassword()" onkeyup="changePassword()">
								</div>
								<label id="alert-dif-psw"></label><br><br>
								<b>Sua senha deve conter:</b><br>
								<label id="req-1">Mínimo de 8 caracteres</label><br>
								<label id="req-2">Ao menos 1 Letra</label><br>
								<label id="req-3">Ao menos 1 Número</label><br>
							 <label id="req-4">Ao menos 1 Caractere Especial</label>
							 <br><br>
							 <button type="submit" id="save-changes-psw">Salvar senha</button>
							</form>
						</div>
					
					</div>
					
		</div>

			<script>
				/*MUDAR COR DO "HISTÓRICO DE PEDIDOS"*/
				document.getElementsByClassName("fourth-icon")[0].style.color = "#ccc7c7";
				document.getElementById("fourth-ul").style.borderRight = "3px solid #e86332";
				document.getElementById("fourth-ul").style.backgroundColor= "#1d1d1d";
				document.getElementById("fourth-ul").style.color = "#ccc7c7";
			</script>
			<script src="../js/changePsw.js" type="text/javascript"></script>
	</body>
</html>