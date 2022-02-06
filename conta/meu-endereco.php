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
    <title>Nimble | Meu Endereço</title>
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
							Alterar Endereço
					</div>

					
						
						<div id="request-flex-adress">
							
							<div id="adress-infos">
								<b><?php echo $infoClienteValues['nomecliente'];?></b><br>
							<label id="road"><?php echo $infoClienteValues['rua']?></label>, 
							<label id="number"><?php echo $infoClienteValues['numero'];?></label><br>
							<label id="district"><?php echo $infoClienteValues['bairro']?></label>-
							<label id="city"><?php echo $infoClienteValues['cidade']?></label>/<label id="state"><?php echo $infoClienteValues['estado']?></label><br>
							CEP:<br>
							
							<form method="post" action="changeCep">
								<input type="text" id="change-cep" name="change-cep-name" value="<?php echo $infoClienteValues['cep'];?>" maxlength="8" onblur="changeAdress()">
									<button type="submit" id="save-changes">Salvar Alteração</button>
									
										<div style="display:none;">
											<input type="text" name="receive-road" id="receive-road-id">
											<input type="text" name="receive-district" id="receive-district-id">
											<input type="text" name="receive-city" id="receive-city-id">
											<input type="text" name="receive-state" id="receive-state-id">
									 </div>
							</form>
							
							</div>
	
				
						</div>
					
					</div>
					
		</div>

	   
	   <?php include_once("footerConta.php");?>
			<script>			
				/*MUDAR COR DO "HISTÓRICO DE PEDIDOS"*/
				document.getElementsByClassName("third-icon")[0].style.color = "#ccc7c7";
				document.getElementById("third-ul").style.borderRight = "3px solid #e86332";
				document.getElementById("third-ul").style.backgroundColor= "#1d1d1d";
				document.getElementById("third-ul").style.color = "#ccc7c7";
			</script>
			<script src="../js/changeAdress.js" type="text/javascript"></script>
	</body>
</html>