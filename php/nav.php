<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@300;400&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/nav.css">
    <script src="https://kit.fontawesome.com/92f64e9681.js" crossorigin="anonymous"></script>
    <script src="../js/linkeffects.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
  		<div id="header-fixed">
  	<div class="w-100 input-group" id="div-firstHeader">
    <a href="../php/homep"><img src="../img/radtek-white.png" id="market-icon"></a>
    	 <div class="dropdown-categories">
    	 	 <button class="categories-button">Categorias</button><i class="fas fa-angle-down" style="margin-left: 3px;"></i>
								<div class="categories-content" style="">
										<a href="../categoria/monitores">Monitores</a>
										<a href="../categoria/consoles">Consoles</a>
										<a href="../categoria/tablets">Tablets</a>
										<a href="../categoria/computadores">Computadores</a>
										<a href="../categoria/notebooks">Notebooks</a>
										<a href="../categoria/jogos">Jogos</a>
										<a href="../categoria/cadeiras">Cadeiras</a>
										<a href="../categoria/promos">Promoções</a>
										<a href="../categoria/novidades">Lançamentos</a>
								</div>
    	 </div>
									<button class="categories-button lanc-button" style="margin-left: 20px;">
											<a href="../categoria/novidades" id="lanc-link">
														Lançamentos
											</a>
									</button>
       <div class="input-group w-50" id="div-search">
								<form method="get" action="../pesquisa/query" id="form-query">
											<input type="text" class="form-control" placeholder="O que você procura?" aria-label="O que você procura?" aria-describedby="button-addon2" name="search" id="idsearch">
										<button class="btn btn-outline-secondary" type="submit" id="button-addon2"><img src="../img/mg_glass.png" id="lupa_icon"></button>
								</form>
							</div>
   <div class="dropdown-categories dropdown-account">
							<button class="categories-button">
									<img src="../img/user.svg" id="myaccount-icon">
							</button>
								<div class="categories-content">
										<?php if(!isset($_SESSION["autenticado"])){?>
										<a href="../conta/login">Fazer Login</a>
										<a href="../conta/register">Registrar-se</a>
										<?php }?> 

										<?php if(isset($_SESSION["autenticado"])){?>
										<a href="../conta/minha-conta">Minha Conta</a>
										<a href="../conta/logout" onclick="">Sair</a>
										<a href="../conta/historico-de-pedidos">Meus Pedidos</a>
										<?php }?> 
								</div>
				</div>
					<div class="nav2">
						<button id="dropdownMenuButton2" type="button">
							<li>
								<a style="margin: 0 auto;">
								<?php	
									if(isset($_SESSION["autenticado"])){
											require_once("../conexao/db.php");
											$idClienteAux = $_SESSION["idcliente"];
											$searchClientQntProd = $_pdo->prepare("SELECT COUNT(*) FROM carrinho WHERE id_cliente = '$idClienteAux'");
											$searchClientQntProd->execute();
											$searchClientIdValue = $searchClientQntProd->fetch(PDO::FETCH_ASSOC);
											$qntProdValue = $searchClientIdValue["COUNT(*)"];
										
										echo 
											"<div id='car-icon' onclick='hiddenShoppingBagDisplayBlock()'>
														<img src='../img/shopping-bag.svg' id='car-icon-img'>
														<b id='prod-notify'>$qntProdValue</b>
										</div>";
									}else{
										echo "<div id='car-icon' onclick='hiddenShoppingBagDisplayBlock()'>
														<img src='../img/shopping-bag.svg' id='car-icon-img'>
														<b id='prod-notify'></b>
										</div>";
									}
									?>
								</a>
							</li>
						</button>
				 </div>
				 
   </div>
	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid" id="navbarSupportedContent">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		 <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
		<ul class="navbar-nav">
				  <li class="nav-item">
								<a class="nav-link active" aria-current="page" href="../categoria/tablets" id="cel-a"><h6>Tablets</h6>
								</a>	
					 </li>
						<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="../categoria/consoles" id="consoles-a"><h6>Consoles</h6></a>
						</li>

					<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../categoria/notebooks" id="notebooks-a"><h6>Notebooks</h6></a>
					</li>
					<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../categoria/cadeiras" id="chair-a"><h6>Cadeiras</h6></a>
					</li>
					<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../categoria/jogos" id="game-a"><h6>Jogos</h6></a>
					</li>
					<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../categoria/promos" id="promo-a"><h6>Promoções</h6></a>
					</li>
					<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../suporte/faq" id="sup-a"><h6>Suporte</h6></a>
					</li>
			</ul>
		</div>
	   </div>
	</nav>
 </div>
					<div id="hidden-shoppbag" onblur="hiddenShoppingBagDisplayNone()">
					
					<?php 
					require_once("../conexao/db.php");
						if(isset($_SESSION["autenticado"])){
							
								$idClienteAux = $_SESSION["idcliente"];
								$searchClientId = $_pdo->prepare("SELECT * FROM carrinho WHERE id_cliente = '$idClienteAux'");
								$searchClientId->execute();
								$searchClientIdValue = $searchClientId->fetchAll(PDO::FETCH_ASSOC);
							
							/*FETCH*/
								$searchClientIdFetch = $_pdo->prepare("SELECT * FROM carrinho WHERE id_cliente = '$idClienteAux'");
								$searchClientIdFetch->execute();
								$searchClientIdFetchValue = $searchClientId->fetch(PDO::FETCH_ASSOC);
							
							/*TOTAL*/
							 $subTotalSum = $_pdo->prepare("SELECT SUM(subtotal) calc_subtotal from carrinho WHERE id_cliente = '$idClienteAux'");
								$subTotalSum->execute();
								$subTotalSumResult = $subTotalSum->fetch(PDO::FETCH_ASSOC);
								if($searchClientIdValue){	?>
						<div style="width:85%;margin:0 auto;">
							<div id="content-infos">
								<div id="title-w-arrow">
									<b id="title-hidden-shoppbag">PRODUTOS ADICIONADOS A SACOLA DE COMPRAS</b>
										<img src="../img/right-arrow.png" id="right-arrow-loged" onclick="hiddenShoppingBagDisplayNone()">
								</div>
									<br>
								
							<?php
					foreach($searchClientIdValue as $result){
									
					?>								
												<div id="first-div-hidden-shoppbag">
														<img src="../upload/<?php echo $result['imagem_produto_carrinho'];?>" id="img-hidden-shoppbag">
														<b id="name-prod-hidden-shoppbag"><?php echo $result["nome_produto_carrinho"];?></b>
														<b id="unity-prod-hidden-shoppbag">
																<?php echo "Qnt: ".$result["unidades"];?>
																<b><?php echo "R$  ".number_format($result["subtotal"],2,',','.');?></b>
													 </b>
												</div>
									<?php }?>
									</div>
									
									<div id="fixed-div-finish-buy">
											 <div id="total-hidden-shopbag">
										 			<hr>
											 		<label style="font-size: 1rem;">Total</label>: <b><?php echo "R$ ".number_format($subTotalSumResult["calc_subtotal"], 2, ',','.');?></b><br>
											 		<hr>
											 </div>
												<div id="buttons-finish-buy">
													<a href="../carrinho/index"><button type="submit" id="at-car">Ver meu carrinho</button></a>
													<a href="../carrinho/finalizarCompra"><button type="submit" id="finish-shipping">Finalizar Pedido</button></a>
												</div>
										</div>
									<?php } 
									else{
											echo "<div id='title-w-arrow'>
									<b id='title-hidden-shoppbag' style='margin-right: 5%;'>PRODUTOS ADICIONADOS A SACOLA DE COMPRAS</b>
										<img src='../img/right-arrow.png' id='right-arrow' onclick='hiddenShoppingBagDisplayNone()' style='margin-left: 10%;'>
								</div><label style='position: absolute;left:50%;transform: translateX(-50%);top: 15%;'>Sua sacola está vazia!</label>"."<br>";
									}?>
									<?php }else{echo "<div id='title-w-arrow'>
									<b id='title-hidden-shoppbag' style='margin-right: 5%;'>PRODUTOS ADICIONADOS A SACOLA DE COMPRAS</b>
										<img src='../img/right-arrow.png' id='right-arrow' onclick='hiddenShoppingBagDisplayNone()' style='margin-left: 10%;'>
								</div><label style='margin-top: 15%;color:black;position: absolute;left:50%;transform: translateX(-50%);'>Você precisa estar logado para visualizar sua sacola.</label>";}?>
				</div>
			</div>	
					
					
					<!--SHOPPING BAG ESCONDIDA-->
					<script>
								function hiddenShoppingBagDisplayBlock(){
										document.getElementById("hidden-shoppbag").style.right = "0%";
								}
								function hiddenShoppingBagDisplayNone(){
										var hiddenShoppbag = document.getElementById("hidden-shoppbag").style.right = "-50%";
								}
					</script>
  </body>
</html>