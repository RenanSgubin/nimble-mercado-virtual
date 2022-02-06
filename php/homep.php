<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimble | A melhor loja de equipamentos eletrônicos</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="fontisto/css/fontisto.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <?php include_once("nav.php");?>
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/carousel_firstimg.png" class="d-block w-100" alt="..." id="first-img-carousel">
    </div>

    <div class="carousel-item">
      <img src="../img/carousel_secondimg.jpg" class="d-block w-100" alt="...">
    </div>

    <div class="carousel-item">
      <img src="../img/carousel_thirdimg.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>

 <br>
 <div id="container-offers">
  <div id="offers">OFERTAS</div><br>
    <div class="content-infos" data-aos="fade-up">
    	 <?php
			date_default_timezone_set('America/Sao_Paulo');
			require_once("../conexao/db.php");
			$datetime =  date('Y-m-d');
				$_timeoffer = $_pdo->prepare("UPDATE produtos SET oferta='Não' WHERE tempo_oferta <= '$datetime'");
				$_desc0 = $_pdo->prepare("UPDATE produtos SET qnt_oferta = '0' WHERE oferta = 'Não'");
				$_timeoffer->execute();
				$_desc0->execute();

			$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE oferta = 'Sim' ORDER BY qnt_oferta DESC LIMIT 50");
			$_offer->execute();
			$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
			$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);


			foreach($_resultset as $_line){
				$_linkprod = $_line['Nome_Produto'];
				$_teste = $_line['tempo_oferta'];
			?>

						<button class="idbestseller">
                <?php
				    if(isset($_SESSION["autenticado"])){
                            $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);
																						?>
                                            <a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
                                                                <i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
                                            </a>
                                <?php
                                            foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

                                            if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
                                    ?>

                                <a id="wishes-list-a" href="#">
                                                <i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
                                </a>
                    <?php }?>
              <?php }?>
      <?php }?>


							<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
								<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
						<div class="nome1-bestseller">
						 <h5><?php echo $_line['Nome_Produto']?></h5><br>
						 <div id="div-star-img">
							<img src="../img/star_yellow.png" id="star1">
							<img src="../img/star_yellow.png" id="star2">
							<img src="../img/star_yellow.png" id="star3">
							<img src="../img/star_yellow.png" id="star4">
							<img src="../img/star_yellow.png" id="star5">
							 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
						 </div>
						 <?php if($_line['oferta']=="Sim"){?>
						 <div id="qnt-oferta-style">
						 		<h4>
										<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
						 		</h4>
						 </div>
						 <?php }else{return null;} ?>
						 <div id="flex-precos">
							 <h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>

							 <h2 id="preco-offer">
								R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
							 </h2>
						 </div>
						 <div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
								 R$ <?php
				      $vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
				      echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
								?>
								 a vista com desconto boleto ou
							 <?php
								$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

								$precojurosaux = $precojuros / 5;
								if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
								$precojurosaux = $precojuros / 10;
								if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
								$precojurosaux = $precojuros / 15;
								if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
								$precojurosaux = $precojuros / 20;
								if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
								$precojurosaux = $precojuros / 25;
								if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
								$precojurosaux = $precojuros / 30;
								if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

								$precojurosaux = $precojuros / 35;
								if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

							 ?>
							</div>
						</div>
					</a>
		</button><?php }?>
    </div>
  </div>

       <!--************************** Inicio Carrousel - Card *******************************-->
			<br><br>
		<div class="glider-contain multiple">
							<div id="best-sellers-title">Mais vendidos</div>
								<div class="glider">
												<?php
												$_offer = $_pdo->prepare("SELECT * FROM produtos ORDER BY qnt_vendas DESC LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
													$_linkprod = $_line['Nome_Produto'];
												?>

								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

								  </div>
										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										</div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
	 		</div>
	</div>
			<br>

				<div class="glider-contain multiple">
					<div id="offers">Mais Bem Avaliados</div>
								<div class="glider2">
												<?php
												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE aval_media > 0 ORDER BY aval_media DESC LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
													$_linkprod = $_line['Nome_Produto'];
												?>

								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

								  </div>
										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
	 		</div>
	</div><br><br>
      <!-- ******************************* Fim Carousel *********************************-->
      <!-- ******************************* Fim Carousel *********************************-->

<div id="categories-nav-container">
	<div id="offers">Navegue por Categorias</div><br>
   <div id="content-navegation-categories">
   	  <div class="categorie">
   	  	 <div id="categorie-content">
   	  	 	<img src="../img/iconmonstr-computer.svg" class="categorie-image"><br><br>
   	  	   Monitores
   	  	 </div>
   	  </div>
   	  <div class="categorie">
   	  	 <div id="categorie-content">
   	  	 	<img src="../img/iconmonstr-gamepad-17.svg" class="categorie-image"><br><br>
   	  	   Consoles
   	  	 </div>
   	  </div>
   	  <div class="categorie">
   	  	 <div id="categorie-content">
   	  	 	<img src="../img/iconmonstr-tablet-1.svg" class="categorie-image"><br><br>
   	  	   Tablets
   	  	 </div>
   	  </div>
   	  <div class="categorie">
   	  	 <div id="categorie-content">
   	  	 	<img src="../img/iconmonstr-computer-7.svg" class="categorie-image"><br><br>
   	  	   Computadores
   	  	 </div>
   	  </div>
   	  <div class="categorie">
   	  	 <div id="categorie-content">
   	  	 	<img src="../img/iconmonstr-laptop-6.svg" class="categorie-image"><br><br>
   	  	   Notebooks
   	  	 </div>
   	  </div>
   	  <div class="categorie">
   	  	 <div id="categorie-content">
   	  	 	<img src="../img/iconmonstr-gamepad-3.svg" class="categorie-image"><br><br>
   	  	   Jogos
   	  	 </div>
   	  </div>
   	  <div class="categorie">
   	  	 <div id="categorie-content">
   	  	 	<img src="../img/chair-icon.svg" class="categorie-image"><br><br>
   	  	   Cadeiras
   	  	 </div>
   	  </div>
   </div>
</div><br><br>

   <!--RECOMENDAÇÕES-->
   <?php if(isset($_SESSION["autenticado"])){
      $idCliente = $_SESSION["idcliente"];
      ?>
      <div class="glider-contain multiple">
					<div id="offers">Recomendados para você</div><br>
								<div class="glider3">
												<?php
	           $infoCliente = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
												$infoCliente->execute();
												$infoClienteValues = $infoCliente->fetch(PDO::FETCH_ASSOC);

	      /*CAROUSEL RECOMENDAÇÃO MONITOR*/
	      if
							(
							$infoClienteValues["qnt_cliques_monitor"] > $infoClienteValues["qnt_cliques_console"] && $infoClienteValues["qnt_cliques_monitor"] > $infoClienteValues["qnt_cliques_tablet"] && $infoClienteValues["qnt_cliques_monitor"] > $infoClienteValues["qnt_cliques_computador"] &&
							$infoClienteValues["qnt_cliques_monitor"] > $infoClienteValues["qnt_cliques_notebook"] &&
							$infoClienteValues["qnt_cliques_monitor"] > $infoClienteValues["qnt_cliques_cadeira"] &&
							$infoClienteValues["qnt_cliques_monitor"] > $infoClienteValues["qnt_cliques_jogo"]
							){
							$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Monitor' LIMIT 16");
							$_offer->execute();
							$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
						 $_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
							foreach($_resultset as $_line){
							$_linkprod = $_line['Nome_Produto'];
							?>
          		<button class="idbestseller">
															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);
																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																			<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>

											<h4>
												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												</div>
						      <?php }else{?><div id="null"></div><?php }?>
											</h4>

										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>
				<?php }?>

						<?php
								/*CAROUSEL RECOMENDAÇÃO CONSOLE*/
							if(isset($_SESSION["autenticado"])){?>

							<?php
	      if
							(
							$infoClienteValues["qnt_cliques_console"] > $infoClienteValues["qnt_cliques_monitor"] && $infoClienteValues["qnt_cliques_console"] > $infoClienteValues["qnt_cliques_tablet"] && $infoClienteValues["qnt_cliques_console"] > $infoClienteValues["qnt_cliques_computador"] &&
							$infoClienteValues["qnt_cliques_console"] > $infoClienteValues["qnt_cliques_notebook"] &&
							$infoClienteValues["qnt_cliques_console"] > $infoClienteValues["qnt_cliques_cadeira"] &&
							$infoClienteValues["qnt_cliques_console"] > $infoClienteValues["qnt_cliques_jogo"]
							){
							$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Console' LIMIT 16");
							$_offer->execute();
							$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
						 $_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
							foreach($_resultset as $_line){
							$_linkprod = $_line['Nome_Produto'];
							?>
          		<button class="idbestseller">
															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);
																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																			<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>

											<h4>
												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												</div>
						      <?php }else{?><div id="null"></div><?php }?>
											</h4>

										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
	   <?php }?>


					 <?php
								/*CAROUSEL RECOMENDAÇÃO TABLET*/
	      if
							(
							$infoClienteValues["qnt_cliques_tablet"] > $infoClienteValues["qnt_cliques_monitor"] && $infoClienteValues["qnt_cliques_tablet"] > $infoClienteValues["qnt_cliques_console"] && $infoClienteValues["qnt_cliques_tablet"] > $infoClienteValues["qnt_cliques_computador"] &&
							$infoClienteValues["qnt_cliques_tablet"] > $infoClienteValues["qnt_cliques_notebook"] &&
							$infoClienteValues["qnt_cliques_tablet"] > $infoClienteValues["qnt_cliques_cadeira"] &&
							$infoClienteValues["qnt_cliques_tablet"] > $infoClienteValues["qnt_cliques_jogo"]
							){
							$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Tablet' LIMIT 16");
							$_offer->execute();
							$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
						 $_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
							foreach($_resultset as $_line){
							$_linkprod = $_line['Nome_Produto'];
							?>
          		<button class="idbestseller">
															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);
																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																			<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>

											<h4>
												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												</div>
						      <?php }else{?><div id="null"></div><?php }?>
											</h4>

										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>


							<?php
								/*CAROUSEL RECOMENDAÇÃO COMPUTADOR*/
	      if
							(
							$infoClienteValues["qnt_cliques_computador"] > $infoClienteValues["qnt_cliques_monitor"] && $infoClienteValues["qnt_cliques_computador"] > $infoClienteValues["qnt_cliques_console"] && $infoClienteValues["qnt_cliques_computador"] > $infoClienteValues["qnt_cliques_tablet"] &&
							$infoClienteValues["qnt_cliques_computador"] > $infoClienteValues["qnt_cliques_notebook"] &&
							$infoClienteValues["qnt_cliques_computador"] > $infoClienteValues["qnt_cliques_cadeira"] &&
							$infoClienteValues["qnt_cliques_computador"] > $infoClienteValues["qnt_cliques_jogo"]
							){
							$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Computador' LIMIT 16");
							$_offer->execute();
							$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
						 $_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
							foreach($_resultset as $_line){
							$_linkprod = $_line['Nome_Produto'];
							?>
          		<button class="idbestseller">
															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);
																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																			<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>

											<h4>
												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												</div>
						      <?php }else{?><div id="null"></div><?php }?>
											</h4>

										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>



					<?php
								/*CAROUSEL RECOMENDAÇÃO NOTEBOOK*/
	      if
							(
							$infoClienteValues["qnt_cliques_notebook"] > $infoClienteValues["qnt_cliques_monitor"] && $infoClienteValues["qnt_cliques_notebook"] > $infoClienteValues["qnt_cliques_console"] && $infoClienteValues["qnt_cliques_notebook"] > $infoClienteValues["qnt_cliques_tablet"] &&
							$infoClienteValues["qnt_cliques_notebook"] > $infoClienteValues["qnt_cliques_computador"] &&
							$infoClienteValues["qnt_cliques_notebook"] > $infoClienteValues["qnt_cliques_cadeira"] &&
							$infoClienteValues["qnt_cliques_notebook"] > $infoClienteValues["qnt_cliques_jogo"]
							){
							$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Notebook' LIMIT 16");
							$_offer->execute();
							$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
						 $_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
							foreach($_resultset as $_line){
							$_linkprod = $_line['Nome_Produto'];
							?>
          		<button class="idbestseller">
															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);
																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																			<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>

											<h4>
												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												</div>
						      <?php }else{?><div id="null"></div><?php }?>
											</h4>

										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>



					<?php
								/*CAROUSEL RECOMENDAÇÃO CADEIRA*/
	      if
							(
							$infoClienteValues["qnt_cliques_cadeira"] > $infoClienteValues["qnt_cliques_monitor"] && $infoClienteValues["qnt_cliques_cadeira"] > $infoClienteValues["qnt_cliques_console"] && $infoClienteValues["qnt_cliques_cadeira"] > $infoClienteValues["qnt_cliques_tablet"] &&
							$infoClienteValues["qnt_cliques_cadeira"] > $infoClienteValues["qnt_cliques_computador"] &&
							$infoClienteValues["qnt_cliques_cadeira"] > $infoClienteValues["qnt_cliques_notebook"] &&
							$infoClienteValues["qnt_cliques_cadeira"] > $infoClienteValues["qnt_cliques_jogo"]
							){
							$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Cadeira' LIMIT 16");
							$_offer->execute();
							$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
						 $_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
							foreach($_resultset as $_line){
							$_linkprod = $_line['Nome_Produto'];
							?>
          		<button class="idbestseller">
															<?php
																			if(isset($idCliente)){
																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																			<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>

											<h4>
												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												</div>
						      <?php }else{?><div id="null"></div><?php }?>
											</h4>

										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>


						<?php
								/*CAROUSEL RECOMENDAÇÃO JOGO*/
	      if
							(
							$infoClienteValues["qnt_cliques_jogo"] > $infoClienteValues["qnt_cliques_monitor"] && $infoClienteValues["qnt_cliques_jogo"] > $infoClienteValues["qnt_cliques_console"] && $infoClienteValues["qnt_cliques_jogo"] > $infoClienteValues["qnt_cliques_tablet"] &&
							$infoClienteValues["qnt_cliques_jogo"] > $infoClienteValues["qnt_cliques_computador"] &&
							$infoClienteValues["qnt_cliques_jogo"] > $infoClienteValues["qnt_cliques_notebook"] &&
							$infoClienteValues["qnt_cliques_jogo"] > $infoClienteValues["qnt_cliques_cadeira"]
							){
							$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Jogo' LIMIT 16");
							$_offer->execute();
							$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
						 $_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
							foreach($_resultset as $_line){
							$_linkprod = $_line['Nome_Produto'];
							?>
          		<button class="idbestseller">
															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);
																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																			<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>

											<h4>
												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>
											</h4>

										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>
	 		</div>
			<?php }?>

	</div>






   <!--COMEÇO DOS CAROUSELS BASEADO NA ÚLTIMA VISITA-->
    <!--************************** Inicio Carrousel - Card *******************************-->
			<br><br>
			<?php if(isset($_SESSION["autenticado"])){?>
			    <div class="glider-contain multiple">
					<div id="offers">Baseados na Sua Última Visita</div>
								<div class="glider4">
												<?php
									   $infoCliente = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
												$infoCliente->execute();
												$infoClienteValues = $infoCliente->fetch(PDO::FETCH_ASSOC);

									/*ULTIMA VISITA: MONITOR*/
									   if($infoClienteValues["ultima_visita_monitor"] == "1"){

												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Monitor' LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
												$_linkprod = $_line['Nome_Produto'];
											?>
								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

									</div>
									<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
									</div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>


					<?php
							/*ULTIMA VISITA: CONSOLE*/
									   if($infoClienteValues["ultima_visita_console"] == "1"){

												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Console' LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
												$_linkprod = $_line['Nome_Produto'];
											?>
								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

									</div>
										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>



					<?php
							/*ULTIMA VISITA: TABLET*/
									   if($infoClienteValues["ultima_visita_tablet"] == "1"){

												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Tablet' LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
												$_linkprod = $_line['Nome_Produto'];
											?>
								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

									</div>
										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>



					<?php
							/*ULTIMA VISITA: COMPUTADOR*/
									   if($infoClienteValues["ultima_visita_computador"] == "1"){

												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Computador' LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
												$_linkprod = $_line['Nome_Produto'];
											?>
								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

									</div>
										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>



						<?php
							/*ULTIMA VISITA: NOTEBOOK*/
									   if($infoClienteValues["ultima_visita_notebook"] == "1"){

												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Notebook' LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
												$_linkprod = $_line['Nome_Produto'];
											?>
								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

									</div>
										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>



					<?php
							/*ULTIMA VISITA: JOGO*/
									   if($infoClienteValues["ultima_visita_jogo"] == "1"){

												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Jogo' LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
												$_linkprod = $_line['Nome_Produto'];
											?>
								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){
                                                                                $idCliente = $_SESSION["idcliente"];
                            $_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
                            $_getAllWishes->execute();
                            $_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

									</div>
										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>



					<?php
							/*ULTIMA VISITA: CADEIRA*/
									   if($infoClienteValues["ultima_visita_cadeira"] == "1"){

												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Cadeira' LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												foreach($_resultset as $_line){
												$_linkprod = $_line['Nome_Produto'];
											?>
								<button class="idbestseller">

															<?php
																			if(isset($idCliente)){

																?>
																	<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>">
																						<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
																	</a>
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){
															?>

														<a id="wishes-list-a" href="#">
																		<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
														</a>
													<?php }?>
									<?php }?>
								<?php }?>
										<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">
											<img src="../upload/<?php echo $_line['Imagem_Produto']?>">
									<div class="nome1-bestseller">
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id="div-star-img">
										<img src="../img/star_yellow.png" id="star1">
										<img src="../img/star_yellow.png" id="star2">
										<img src="../img/star_yellow.png" id="star3">
										<img src="../img/star_yellow.png" id="star4">
										<img src="../img/star_yellow.png" id="star5">
											 <b><?php echo "(".$_line['qnt_aval'].")";?></b>
										</div>
										<div id="qnt-oferta-style">

												<?php if($_line['oferta']=="Sim"){?>
													<div id="qnt-oferta-style">
														<div id="qnt-oferta-style">
																<h4>
																	<b><?php echo $_line['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
														</div>
												 </div>
						      <?php }else{?><div id="null"></div><?php }?>

									</div>
										<div id="flex-precos">
											<?php if($_line["oferta"] == "Sim"){?>
													<h2 id="preco">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
													<h2 id="preco-offer">
															R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
													</h2>
											<?php }else{?>
											<h2 id="preco-offer">R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>
											<?php }?>
										 </div>
										<div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?>
												a vista com desconto boleto ou
											<?php
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo "5x de R$ ". number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo "10x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo "15x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo "20x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo "25x de R$ ".number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo "30x de R$". number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo "35x de R$ ".number_format($precojurosaux, 2, ',','.');}

											?>
										</div><br><br>
									</div>
								</a>
							</button>
						<?php }?>
					<?php }?>
	 		</div>
	</div>
<?php }?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php include_once("infossite.php")?>
								<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
						  </script>
						  <script src="../js/glider.min.js"></script>
						  <script>
															new Glider(document.querySelector('.glider'),{
																			slidesToScroll: 'auto',
																			draggable: true,
																			slidesToShow: 4.5,
																			arrows:{
																															prev: '.glider-prev',
																															next: '.glider-next'
																			},
																			animationDuration: 6000,
																			responsive:[
																							{
																								breakpoint: 950,
																											settings: {
																																			slidesToShow: 4.5
																											}


																							}
																			],
																			responsive:[
																							{
																								breakpoint: 1500,
																											settings: {
																																			slidesToShow: 5.5,
																											}


																							}
																			]
															});
								</script>
								<script>
                        new Glider(document.querySelector('.glider2'),{
                            slidesToScroll: 'auto',
                            draggable: true,
																												slidesToShow: 4.5,
                            arrows:{
                                        prev: '.glider-prev',
                                        next: '.glider-next'
                            },
                            animationDuration: 6000,
                            responsive:[
                                {
                                 breakpoint: 950,
                                    settings: {
                                            slidesToShow: 4.5
                                    }


                                }
                            ],
                            responsive:[
                                {
                                 breakpoint: 1500,
                                    settings: {
                                            slidesToShow: 5.5,
                                    }


                                }
                            ]
                        });


								</script>
								<script>
															new Glider(document.querySelector('.glider3'),{
																			slidesToScroll: 'auto',
																			draggable: true,
																			slidesToShow: 4.5,
																			arrows:{
																															prev: '.glider-prev',
																															next: '.glider-next'
																			},
																			animationDuration: 6000,
																			responsive:[
																							{
																								breakpoint: 950,
																											settings: {
																																			slidesToShow: 4.5
																											}


																							}
																			],
																			responsive:[
																							{
																								breakpoint: 1500,
																											settings: {
																																			slidesToShow: 5.5,
																											}


																							}
																			]
															});
								</script>
								<script>
															new Glider(document.querySelector('.glider4'),{
																			slidesToScroll: 'auto',
																			draggable: true,
																			slidesToShow: 4.5,
																			arrows:{
																															prev: '.glider-prev',
																															next: '.glider-next'
																			},
																			animationDuration: 6000,
																			responsive:[
																							{
																								breakpoint: 950,
																											settings: {
																																			slidesToShow: 4.5
																											}


																							}
																			],
																			responsive:[
																							{
																								breakpoint: 1500,
																											settings: {
																																			slidesToShow: 5.5,
																											}


																							}
																			]
															});
								</script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	  <script>
	  AOS.init();
	 </script>
  </body>
</html>
