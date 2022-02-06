<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimble | Consoles</title>
	<link rel="shortcut icon" href="../img/favicon.png"/>
				<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../css/query.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="fontisto/css/fontisto.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
  <?php include "../php/nav.php"?>
   <div id="container-categories">
    <div class="content-filter-categories">
							 <div class="div-w-bg">
								  <b class="filter-type">Núcleos</b><br><br>
								  <a href="#">1 Núcleos</a>&nbsp;&nbsp;
								  <a href="#">2 Núcleos</a><br>
								  <a href="#">3 Núcleos</a>&nbsp;&nbsp;
								  <a href="#">4 Núcleos</a><br>
								  <a href="#">5 Núcleos</a>&nbsp;&nbsp;
								  <a href="#">6 Núcleos</a><br>
								  <a href="#">7 Núcleos</a>&nbsp;&nbsp;
								  <a href="#">8+ Núcleos</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Unidades Computacionais</b><br><br>
								  <a href="#">1</a>&nbsp;&nbsp;
								  <a href="#">2</a>&nbsp;&nbsp;
								  <a href="#">3</a>&nbsp;&nbsp;
								  <a href="#">4</a>&nbsp;&nbsp;
								  <a href="#">5</a><br>
								  <a href="#">6</a>&nbsp;&nbsp;
								  <a href="#">7</a>&nbsp;&nbsp;
								  <a href="#">8</a>&nbsp;&nbsp;
								  <a href="#">9</a>&nbsp;&nbsp;
								  <a href="#">10+</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Suporte a HDR</b><br><br>
								  <a href="#">Sim</a><br>
								  <a href="#">Não</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Mídia</b><br><br>
								  <a href="#">Física</a><br>
								  <a href="#">Digital</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Memória RAM</b><br><br>
								  <a href="#">4GB</a><br>
								  <a href="#">8GB</a><br>
								  <a href="#">12GB</a><br>
								  <a href="#">16GB</a><br>
								  <a href="#">32GB</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">HD</b><br><br>
								  <a href="#">500GB</a><br>
								  <a href="#">1TB</a><br>
								  <a href="#">2TB</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tipo de Memória</b><br><br>
								  <a href="#">DDR3</a><br>
								  <a href="#">DDR4</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Peso</b><br><br>
								  <a href="#">2Kg</a><br>
								  <a href="#">2.5Kg</a><br>
								  <a href="#">3Kg</a><br>
								  <a href="#">3.5Kg</a><br>
								  <a href="#">4Kg+</a><br>
							 </div>
							</div>
		<div id="products-container">
   	<?php
					require_once("../conexao/db.php");
					$queryBD = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Console'");
					$queryBD->execute();
					$queryBDResultFetchAll = $queryBD->fetchAll(PDO::FETCH_ASSOC);
					$queryBDResultFetch = $queryBD->fetch(PDO::FETCH_ASSOC);
            
			foreach($queryBDResultFetchAll as $queryBDResultFetchAllFC){
						$_linkprod = $queryBDResultFetchAllFC['Nome_Produto'];
						$_teste = $queryBDResultFetchAllFC['tempo_oferta'];
			?>

						<button class="idbestseller">
      <?php
							if(isset($_SESSION["idcliente"])){		
											$idCliente = $_SESSION["idcliente"];
											$_getAllWishes = $_pdo->prepare("SELECT * FROM lista_desejos WHERE id_cliente_desej = '$idCliente'");
											$_getAllWishes->execute();
											$_getAllWishesFetchAll = $_getAllWishes->fetchAll(PDO::FETCH_ASSOC);
																	?> 
															<a id="wishes-list-a" href="../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $queryBDResultFetchAllFC['Imagem_Produto']?>">
																				<i class="material-icons sixth-icon" style="font-size: 1.8rem;" id="icon-wishes">loyalty</i>
															</a> 
												<?php
															foreach($_getAllWishesFetchAll as $_getAllWishesFetch){if($queryBDResultFetchAllFC['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){ 
													?>

												<a id="wishes-list-a" href="#">
																<i class="material-icons sixth-icon" style="font-size: 1.8rem;color:#e86332" id="icon-wishes">loyalty</i>
												</a> 
										<?php }?>
							<?php }?>
					<?php }?>

                        
							<a href="../inserts/insertClicks?nm=<?php echo $_linkprod?>">                    
								<img src="../upload/<?php echo $queryBDResultFetchAllFC['Imagem_Produto']?>">
						<div class="nome1-bestseller">
						 <h5><?php echo $queryBDResultFetchAllFC['Nome_Produto']?></h5><br>
						 <div id="div-star-img">
							<img src="../img/star_yellow.png" id="star1">
							<img src="../img/star_yellow.png" id="star2">
							<img src="../img/star_yellow.png" id="star3">
							<img src="../img/star_yellow.png" id="star4">
							<img src="../img/star_yellow.png" id="star5">
							 <b><?php echo "(".$queryBDResultFetchAllFC['qnt_aval'].")";?></b>
						 </div>
						 <?php if($queryBDResultFetchAllFC['oferta']=="Sim"){?>
						 <div id="qnt-oferta-style">
						 		<h4>
										<b><?php echo $queryBDResultFetchAllFC['qnt_oferta']?>%</b>&nbsp;OFF
						 		</h4>
						 </div>
						 <?php }else{?><div id="qnt-oferta-style"></div><?php }?>
						 <div id="flex-precos">
							 <h2 id="preco">R$<?php echo number_format($queryBDResultFetchAllFC['Preco_Produto'], 2,',','.');?></h2>
							 
							 <h2 id="preco-offer">
								R$<?php echo number_format($queryBDResultFetchAllFC['Preco_Produto'] - ($queryBDResultFetchAllFC['Preco_Produto'] / 100) * $queryBDResultFetchAllFC['qnt_oferta'], 2,',','.')?>
							 </h2>
						 </div>
						 <div style="font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;">
								 R$ <?php
				      $vistAux = ($queryBDResultFetchAllFC['Preco_Produto'] - ($queryBDResultFetchAllFC['Preco_Produto'] / 100) * $queryBDResultFetchAllFC['qnt_oferta']) / 10;
				      echo number_format($queryBDResultFetchAllFC['Preco_Produto'] - ($queryBDResultFetchAllFC['Preco_Produto'] / 100) * $queryBDResultFetchAllFC['qnt_oferta'] - $vistAux, 2, ',', '.');
								?> 
								 a vista com desconto boleto ou 
							 <?php 
								$precojuros = $queryBDResultFetchAllFC['Preco_Produto'] - ($queryBDResultFetchAllFC['Preco_Produto'] / 100) * $queryBDResultFetchAllFC['qnt_oferta'];
								
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
		<?php include_once("../php/infossite.php")?>
		<script>
		   function changeLinkEffect(){
						document.getElementById("consoles-a").style.borderBottom = "3px solid #e86332";
						document.getElementsByTagName("h6")[1].style.color = "#e86332";
			}
			window.onload = function(){changeLinkEffect();}
		</script>
	</body>
</html>