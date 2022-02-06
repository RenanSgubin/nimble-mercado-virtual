<?php session_start();
if(!isset($_SESSION["idcliente"])){
	header("location:../conta/login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nimble | Carrinho</title>
	<link rel="shortcut icon" href="../img/favicon.png"/>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	 <link type="text/css" rel="stylesheet" href="../css/carrinho.css">
	 <link rel="preconnect" href="https://fonts.gstatic.com">
	 <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
			<?php include_once("../php/nav.php");?>
			 <div id="container-bag">		 
				<?php 
					require_once("../conexao/db.php");
					$idClienteAux = $_SESSION["idcliente"];
					
					$searchClientId = $_pdo->prepare("SELECT * FROM carrinho WHERE id_cliente = '$idClienteAux'");
					$searchClientId->execute();
					$searchClientIdValue = $searchClientId->fetchAll(PDO::FETCH_ASSOC);
	
					if(!$searchClientIdValue){
											echo "
											<div style='width: 100%;text-align: center; font-size: 1.2rem;color:black;margin-top: 2.5%;font-family: 'Poppins',sans-serif;'>
											<img src='../img/no-products-icon.svg' id='id-no-products-icon' style='width: 25%;'><br><br>Sua sacola está vazia! Que tal adicionar alguns?
											</div>";
					}
						else{
						
					
					foreach($searchClientIdValue as $result){
									
					?>
		<div id="info-products">
							<img src="../upload/<?php echo $result['imagem_produto_carrinho'];?>" id="bag-prod-image">
							<div id="div-infos">
								<?php echo $result['nome_produto_carrinho'];?><br>
							 <?php 		
								 $searchClientIdFetch = $_pdo->prepare("SELECT * FROM carrinho WHERE id_cliente = $idClienteAux");
								 $searchClientIdFetch->execute();
								 $searchClientIdValueFetch = $searchClientIdFetch->fetch(PDO::FETCH_ASSOC);

								 $nomeProdutoCarrinhoAux = $result['nome_produto_carrinho'];
								 $searchProduto = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = '$nomeProdutoCarrinhoAux'");
									$searchProduto->execute();
									$searchProdutoValue = $searchProduto->fetch(PDO::FETCH_ASSOC);

								 $AuxOferta = $result['preco_unidade'] / 100 * $searchProdutoValue['qnt_oferta'];
								 $offer = $searchProdutoValue['oferta'] == 'Sim' ? number_format($result['preco_unidade']- $AuxOferta,2,',','.'): number_format($result['preco_unidade'],2,',','.');
							 	echo "<label style='font-size: 17px;' id='label-price'>R$ $offer</label>"."<br>";


								 $resultNameProdSL = $result['nome_produto_carrinho'];
								 $searchNameProd = $_pdo->prepare("SELECT * FROM carrinho WHERE id_cliente = '$idClienteAux' AND nome_produto_carrinho = '$resultNameProdSL'");
								 $searchNameProd->execute();
								 $searchNameProdValue = $searchNameProd->fetch(PDO::FETCH_ASSOC);
								 $valueNameProd = $searchNameProdValue['unidades'];
							
							
									/*SUBTOTAL, CALCULO DAORA, PRECISA ALTERAR O PRECO UNIDADE PRA $offer*/
									$subTotal = $_pdo->prepare("SELECT * FROM carrinho WHERE nome_produto_carrinho = '$resultNameProdSL' ");
									$subTotal->execute();
									$subTotalFetch = $subTotal->fetch(PDO::FETCH_ASSOC);
						
						
								/*Comando para calcular o subtotal*/
								$subTotalSum = $_pdo->prepare("SELECT SUM(subtotal) calc_subtotal from carrinho WHERE id_cliente = '$idClienteAux'");
								$subTotalSum->execute();
								$subTotalSumResult = $subTotalSum->fetch(PDO::FETCH_ASSOC);
									
							
								 $unity = $searchProdutoValue['Quantidade_Estoque_Produto'] > 0 ? "Em estoque" : "Indisponível";
								 echo $unity."<br>";
						?>
						   <label style="color: black;">ID: <?php echo $searchProdutoValue['id_produto']?></label><br>
						   <label>Quantidade:</label><br>

								<div class="btn-group" role="group" aria-label="Basic mixed styles example" id="div-basic-mixed-styles">
										 <a href="addprod?q=<?php echo $result['nome_produto_carrinho'];?>">
													<button type="submit" class="submit-qnt" name="name-button-qnt-add" id="add-prod">+</button>
											</a>
									<input type="number" name="qnt-prod-name" value="<?php echo $valueNameProd;?>" id="id-input-qnt" onkeyup="subTotal()" onkeypress="subTotal()">
										 <a href="removeprod?q=<?php echo $result['nome_produto_carrinho'];?>">
													<button type="submit" class="submit-qnt" name="name-button-qnt-remove" id="remove-prod">-</button>
											</a>
							 </div>
									
										
											
											
									
									<label id="sub-total">Subtotal: R$ <?php echo number_format($subTotalFetch['subtotal'],2,',','.');?><b id="label-result-subtotal"></b></label>
									<a id="link-exclude-from-car" href="removeFromCar.php?np=<?php echo $result['nome_produto_carrinho']?>">
									<img src="../img/trash-2.svg" style="width: 25px; height: auto;"></a>
					</div>
	 </div><?php }?>
				<div id="finish-buy">
						<div id="container-finish-buy">
								<b id="text-finish-buy">Finalizar Compra</b>
								<hr>
								Subtotal: <b id="b-price-subtotal"><?php echo "R$ ".number_format($subTotalSumResult["calc_subtotal"], 2, ',','.');?></b><br><br>
								Frete:<br><br>
								<input type="radio" id="first-op" name="shipping-options" onclick="calculaTotal('78,90')" checked>
								<label for="first-op">Via Sedex (R$ 78,90)</label><br>
								
								<input type="radio" id="second-op" name="shipping-options" onclick="calculaTotal('23,76')">
								<label for="second-op">Via Correios (R$ 23,76)</label><br>
								
								<input type="radio" id="third-op" name="shipping-options" onclick="calculaTotal('16,45')">
								<label for="third-op">Via Transportadora (R$ 16,45)</label><br><br>
						</div>
							 <div id="subtotal-div">
									<hr>
									<b>Total:</b> <b id="b-price-total"><?php echo "R$ ".number_format($subTotalSumResult["calc_subtotal"], 2, ',','.');?></b><hr>
									<label for="name-input-coupon">Cupom de Desconto</label>
									<input type="text" id="input-coupon" name="name-input-coupon">
							 </div>
						<button type="submit" id="button-finish-buy"><a href="finalizarCompra" id="next-link">Continuar</a></button>
				</div>
</div><?php }?>
<?php include_once("../conta/footerConta.php");?>
</body>
</html>

