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
    <title>Nimble | Histórico de Pedidos</title>
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
							Histórico de Pedidos
					 </div>

					
						<?php
							$getRequests = $_pdo->prepare("SELECT * FROM pedidos WHERE id_cliente_pedido = '$idCliente'");;
							$getRequests->execute();
							$getRequestsFetchAll = $getRequests->fetchAll(PDO::FETCH_ASSOC);
						
						if(!$getRequestsFetchAll){echo 
							"<div id='request-flex-no-orders'>
									<div id='requests-div-main'>
												<div id='no-orders'>Você ainda não possui nenhum pedido!</div>
									</div>
							</div>";}
						?>
						<div id="request-flex">
						<?php
						foreach($getRequestsFetchAll as $getRequestsFetchAllFC){
							
						?>
							<div id="requests-div-main">
								<img src="../upload/<?php echo $getRequestsFetchAllFC['imagem_produto_pedido'];?>" id="request-img">
								<label id="name-request"><?php echo $getRequestsFetchAllFC['nome_produto_pedido'];?></label>
								<b><?php echo "Unidades: ".$getRequestsFetchAllFC['quantidade_produto_pedido'];?></b>
									<b><?php echo "Pedido feito em: ".date('d/m/Y', strtotime($getRequestsFetchAllFC['data_pedido']));?></b>
						 </div>
						<?php }?>
						</div>
					
					</div>
		</div>

	   
	

			<script>			
				/*MUDAR COR DO "HISTÓRICO DE PEDIDOS"*/
				document.getElementsByClassName("second-icon")[0].style.color = "#ccc7c7";
				document.getElementById("second-ul").style.borderRight = "3px solid #e86332";
				document.getElementById("second-ul").style.backgroundColor= "#1d1d1d";
				document.getElementById("second-ul").style.color = "#ccc7c7";
			</script>
	</body>
</html>