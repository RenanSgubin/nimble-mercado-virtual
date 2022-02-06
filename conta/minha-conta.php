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
    <title>Nimble | Minha Conta</title>
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

					<div id="align-top">
						<div id="personal-infos-title">
								Dados Pessoais
						</div>

					<div id="personal-infos">
						
							<div class="center">
									<div class="div-order">
										<b>Nome Completo</b><br>
										<?php echo $infoClienteValues['nomecliente'];?>
									</div>

									<div class="div-order">
										<b>Celular</b><br>
										<?php echo $infoClienteValues['celular'];?>
									</div>

									<div class="div-order" style="margin-top: 2%;">
										<b>CPF</b><br>
										<label id="three-dig"></label>.<label id="six-dig"></label>.<label id="nine-dig"></label>-<label id="eleven-dig"></label>
										
									</div>

									<div class="div-order" style="margin-top: 2%;">
										<b>Email</b><br>
										<?php echo $infoClienteValues['email'];?>
									</div>
							</div>
							
					</div>

					<div id="adress-title">
						Endereço
					</div>

					<div id="adress">
						<div class="center">
									<div class="div-order">
										<b>CEP</b><br>
										<?php echo $infoClienteValues['cep'];?>
									</div>

									<div class="div-order">
										<b>Estado</b><br>
										<?php echo $infoClienteValues['estado'];?>
									</div>

									<div class="div-order" style="margin-top: 2%;">
										<b>Cidade</b><br>
										<?php echo $infoClienteValues['cidade'];?>
									</div>

									<div class="div-order" style="margin-top: 2%;">
										<b>Bairro</b><br>
										<?php echo $infoClienteValues['bairro'];?>
									</div>
									
									<div class="div-order" style="margin-top: 2%;">
										<b>Rua</b><br>
										<?php echo $infoClienteValues['rua'];?>
									</div>
									
									<div class="div-order" style="margin-top: 2%;">
										<b>Número</b><br>
										<?php echo $infoClienteValues['numero'];?>
									</div>
							</div>
					 </div>
					</div>
			
	   </div>
	   
	   <?php include_once("footerConta.php");?>
			<script>
				
				
				
				/*COLOCAR PONTUAÇÃO NO CPF*/
				function replaceCpf(){
					var cpf  = "<?php echo $infoClienteValues['cpf'];?>";
					var cpf1 = cpf.substring(0,3);
					var cpf2 = cpf.substring(3,6);
					var cpf3 = cpf.substring(6,9);
					var cpf4 = cpf.substring(9,11);

					document.getElementById("three-dig").innerHTML = cpf1;
					document.getElementById("six-dig").innerHTML = cpf2;
					document.getElementById("nine-dig").innerHTML = cpf3;
					document.getElementById("eleven-dig").innerHTML = cpf4;
				}
				window.onload = function(){replaceCpf()};
				
				
				
				/*MUDAR COR DO "CONTA"*/
				document.getElementsByClassName("first-icon")[0].style.color = "#ccc7c7";
				document.getElementById("first-ul").style.borderRight = "3px solid #e86332";
				document.getElementById("first-ul").style.backgroundColor= "#1d1d1d";
				document.getElementById("first-ul").style.color = "#ccc7c7";
			</script>
	</body>
</html>