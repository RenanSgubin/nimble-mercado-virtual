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
    <title>Nimble | Alterar Dados</title>
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
						  	Alterar Dados
					  </div>

					
						
						<div id="request-flex-change-data">
							
								<form class="row g-3" method="post" action="changeData">
									
										<div class="col-md-5 divs-col-5">
											 <div style="display: flex;align-items: center;" class="icons-alter-data">
													<i class="far fa-user"></i>
											</div>
												<input type="text" class="form-control inputs-alter-data" value="<?php echo $infoClienteValues['nomecliente']?>" name="data-name">
										</div>
										
										<div class="col-md-5 divs-col-5">
											 <div style="display: flex;align-items: center;" class="icons-alter-data">
													<i class="far fa-envelope"></i>
											</div>
												<input type="email" class="form-control inputs-alter-data" value="<?php echo $infoClienteValues['email']?>" name="data-email">
										</div>
										
										<div class="col-5 divs-col-5">
											<div style="display: flex;align-items: center;" class="icons-alter-data">
													<i class="far fa-address-card"></i>
											</div>
												<input type="text" class="form-control inputs-alter-data" value="<?php echo $infoClienteValues['cpf']?>" name="data-cpf">
										</div>
										
										<div class="col-5 divs-col-5">
												<div style="display: flex;align-items: center;" class="icons-alter-data">
													<i class="fas fa-mobile-alt"></i>
											</div>
												<input type="text" class="form-control inputs-alter-data" value="<?php echo $infoClienteValues['celular']?>" name="data-cellphone" maxlength="9">
										</div>
										
										<div class="col-5 divs-col-5">
												<div style="display: flex;align-items: center;" class="icons-alter-data">
													<i class="far fa-address-card"></i>
											</div>
												<input type="text" class="form-control inputs-alter-data" placeholder="Insira seu RG" value="<?php if($infoClienteValues['rg']!=null){echo $infoClienteValues['rg'];}?>" maxlength="10" name="data-rg" maxlength="10">
										</div>
										
										<div class="col-5 divs-col-5">
												<div style="display: flex;align-items: center;" class="icons-alter-data">
													<i class="fas fa-venus-mars"></i>
											</div>
											<?php if($infoClienteValues['sexo']==null){?>
												<select class="form-control inputs-alter-data" name="data-select-gender">
													<option disabled selected>Sexo</option>
													<option>Masculino</option>
													<option>Feminino</option>
											 </select>
											<?php }else{?>
												<select class="form-control inputs-alter-data" name="data-select-gender">
													<option selected><?php echo $infoClienteValues['sexo'];?></option>
													<option>Masculino</option>
													<option>Feminino</option>
											 </select>
											 <?php }?>
										</div>		
										<button type="submit" class="btn btn-primary" id="save-changes-data">Salvar Dados</button>
								</form>
								
						</div>
					
					</div>
					
		</div>

			<script>
				/*MUDAR COR DO "HISTÓRICO DE PEDIDOS"*/
				document.getElementsByClassName("seventh-icon")[0].style.color = "#ccc7c7";
				document.getElementById("seventh-ul").style.borderRight = "3px solid #e86332";
				document.getElementById("seventh-ul").style.backgroundColor= "#1d1d1d";
				document.getElementById("seventh-ul").style.color = "#ccc7c7";
			</script>
			<script src="../js/changePsw.js" type="text/javascript"></script>
			<script src="https://kit.fontawesome.com/a58bf852ad.js" crossorigin="anonymous"></script>
	</body>
</html>