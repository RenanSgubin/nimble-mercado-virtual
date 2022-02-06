<?php session_start();
if(!isset($_SESSION["idcliente"])){
	header("location:../conta/login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nimble | Finalizar Compra</title>
	<link rel="shortcut icon" href="../img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@800&display=swap" rel="stylesheet">
</head>
<body>
  <?php 
	include_once("../php/nav.php");
	require_once("../conexao/db.php");
	 ?>
   <div id="container-fc">
     <div id="personal-infos">
      <div id="personal-infos-content">
							<?php
							/*Pegar informações do cliente*/
							$idCliente = $_SESSION["idcliente"];
							$infoCliente = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
							$infoCliente->execute();
						 $infoClienteValues = $infoCliente->fetch(PDO::FETCH_ASSOC);
						
							/*Pegar informações do cliente -> Fetch*/
						 $searchClientIdFetch = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
							$searchClientIdFetch->execute();
							$searchClientIdValueFetch = $searchClientIdFetch->fetch(PDO::FETCH_ASSOC);
							?>
							<i class="fas fa-user"></i><b class="title-personal-infos">Dados Pessoais</b>
									<hr>
							<div class="personal-infos-w-bg">
									<b class="type-infos">Nome: </b><label class="infos"><?php echo $searchClientIdValueFetch['nomecliente']?></label><br>
									<b class="type-infos">Email: </b><label class="infos"><?php echo $searchClientIdValueFetch['email']?></label><br>
									<b class="type-infos">Celular: </b><label class="infos"><?php echo $searchClientIdValueFetch['celular']?></label><br>
									<b class="type-infos">CPF: </b><label class="infos"><?php echo $searchClientIdValueFetch['cpf']?></label><br><br>
							</div><br>
							
							<i class="fas fa-address-card"></i><b class="title-personal-infos">Endereço de Entrega</b>
							<hr>
									<div class="personal-infos-w-bg">
												<b class="type-infos">Estado: </b><label class="infos"><?php echo $searchClientIdValueFetch['estado']?></label><br>
												<b class="type-infos">Cidade: </b><label class="infos"><?php echo $searchClientIdValueFetch['cidade']?></label><br>
												<b class="type-infos">Bairro: </b><label class="infos"><?php echo $searchClientIdValueFetch['bairro']?></label><br>
												<b class="type-infos">Rua: </b><label class="infos"><?php echo 	$searchClientIdValueFetch['rua']?></label><br>
												<b class="type-infos">Número: </b><label class="infos"><?php echo 	$searchClientIdValueFetch['numero']?></label><br><br>
									</div>
							</div>
     </div>
    
        <div id="content-products-shipping">
            <div id="shipping-type">
                <div id="shipping-type-content">
                    <i class="fas fa-truck"></i><b class="title-personal-infos">Metódo de Envio<hr></b>

                <button type="submit" name="shipping-type-sedex" class="shipping-type-submit-class" id="sedex-submit" onclick="changeColorOne()">
                            <div class="check-icon-div" id="check-icon-div-id"><i class="fas fa-check"></i></div>
                            <div class="shipping-op-left">
                                    Sedex<br>Prazo de Entrega:<br><b>3 dias úteis</b>
                                    <b class="shipping-price">R$ 49,90</b>
                            </div>
                </button><br><br>

                <button type="submit" name="shipping-type-fedex" class="shipping-type-submit-class" id="fedex-radio" onclick="changeColorTwo()">
                        <div class="check-icon-div"><i class="fas fa-check"></i></div>
                            <div class="shipping-op-left">
                                        Fedex<br>Prazo de Entrega:<br><b>7 dias úteis</b>
                                        <b class="shipping-price">R$ 27,90</b>
                            </div>
                </button>
                </div>
             </div><br>
             
             
             <div id="products-client">
                 <div id="products-client-content">
                     <?php
                        $prods_client = $_pdo->prepare("SELECT * FROM carrinho WHERE id_cliente = '$idCliente'");
                        $prods_client->execute();
                        $prods_client_fetchAll = $prods_client->fetchAll(PDO::FETCH_ASSOC);
								
																								/*TOTAL*/
																							 $subTotalSum = $_pdo->prepare("SELECT SUM(subtotal) calc_subtotal from carrinho WHERE id_cliente = '$idClienteAux'");
																								$subTotalSum->execute();
																								$subTotalSumResult = $subTotalSum->fetch(PDO::FETCH_ASSOC);
                                
                                
                        foreach($prods_client_fetchAll as $prods_client_fetchAll_fe){
                     ?>
                    <div id="flex-content-prod">
                     <div id="img-w-unity">
                         <img src="../upload/<?php echo $prods_client_fetchAll_fe['imagem_produto_carrinho']?>" id="img-prod-final">
                         <div id="unity-gray-black"><?php echo $prods_client_fetchAll_fe['unidades']?><br></div>
                     </div>
                     <div style="display: flex;align-items: center;margin-left: 2.5%;">
                         <?php echo $prods_client_fetchAll_fe['nome_produto_carrinho']?><br>
                         
                          R$ <?php echo number_format($prods_client_fetchAll_fe['subtotal'], 2,',','.');?><br>
                     </div>
                    </div>
                    <hr>
                     <?php }?>
                 </div>
             </div>
        </div>
         <br>
    
     <div id="payment">
     	<div id="payment-content">
     		<i class="fas fa-money-bill-alt"></i><b class="title-personal-infos">Pagamento</b><hr>
								<div id="credit-card">
										<div id="card">
												<div id="credit-card-front">
													<div id="credit-card-front-content">
														<div id="payment-method-type">
																<img src="../img/d0d0d0.jpg" id="payment-method-type-img">
														</div>
														<div id="credit-card-above-img">
															<div id="credit-card-above-img-content"><img src="../img/card-chip.png"></div>
														</div>
														<div id="credit-card-numbers">
															<b id="first-f-numbers">****</b>&nbsp;
															<b id="second-f-numbers">****</b>&nbsp;
															<b id="third-f-numbers">****</b>&nbsp;
															<b id="fourth-f-numbers">****</b>&nbsp;
														</div><br>
														<div id="credit-card-owner"><b id="owner-b">NOME COMPLETO</b> <b id="validity">Valid Thru<br><b id="month-b">00</b>/<b id="year-b">00</b></b></div>
														</div>
												</div>
											<div id="credit-card-back">
												<div id="black-bar"></div><br><br><br>
												<div id="div-white-bar-w-security-code">
													<div id="white-bar"></div>
													<b id="security-code-card">***</b>
												</div>
												<div id="img-w-text">
														<img src="../img/card-chip.png" id="chip-img">
														<b>
																Lorem ipsum dolor sit amet, consectetur adipiscing elit<br>
																Fusce velit ante, consectetur sit amet elementum a tempus<br>
																Nulla id quam quis orci consectetur vestibulum at a erat<br>
																Curabitur ligula nisi, lobortis sed pharetra eget porttitor<br>
														</b>
												</div>
											</div>
										</div>
								</div>
								<br>
								<b id="flag-select">Selecione uma Bandeira</b>
								<div id="payment-methods-icons">
									<div class="bg-icon"><img src="../img/mc_vrt_pos.svg" class="payment-icons" onclick="masterCardChange()"></div>
									<div class="bg-icon"><img src="../img/visa-icon.png" class="payment-icons" onclick="visaChange()"></div>
									<div class="bg-icon"><img src="../img/hipercard.svg" class="payment-icons" onclick="hiperCardChange()"></div>
									<div class="bg-icon"><img src="../img/elo_payment_method_card_icon_142740.svg" class="payment-icons" onclick="eloChange()"></div>
									<div class="bg-icon"><img src="../img/nubank-logo.svg" class="payment-icons" onclick="nubankChange()"></div>
								</div>
								
								
								<label for="card-number-input" class="labels-fc">Número do Cartão</label><br>
								<div class="col-md-10 align-flex">
									<i class="far fa-credit-card i-icons-absolute"></i>
									<input type="text" class="form-control" name="card-number-input" maxlength="16" onkeypress="changeCardNumber()" onkeyup="changeCardNumber()" id="id-card-number" onfocus="cardNumberVerify()" onblur="cardNumberVerify()">
							 </div><br>
							 
							 
							 <label for="card-month-input" class="labels-fc">Mês</label>
								<div class="col-md-10 align-flex">
									<i class="far fa-calendar-alt i-icons-absolute"></i>
									<select class="form-control select-month-year" name="card-month-input" id="month-select-value" onclick="changeMonth()">
										<option>00</option>
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>05</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>
							 </div><br>
							 
							 
							 <label for="card-year-input" class="labels-fc">Ano</label><br>
								<div class="col-md-10 align-flex">
									<i class="far fa-calendar-alt i-icons-absolute"></i>
									<select class="form-control select-month-year" name="card-year-input" id="year-select-value" onclick="changeYear()">
										<option>00</option>
										<option>21</option>
										<option>22</option>
										<option>23</option>
										<option>24</option>
										<option>25</option>
										<option>26</option>
										<option>27</option>
										<option>28</option>
										<option>29</option>
										<option>30</option>
										<option>31</option>
										<option>32</option>
									</select>
							 </div><br>
							 
							 <label for="card-holder-input" class="labels-fc">Nome Completo do Titular</label><br>
								<div class="col-md-10 align-flex">
									<i class="far fa-credit-card i-icons-absolute"></i><input type="text" class="form-control" name="card-holder-input" id="holder-input-id" onkeyup="changeHolderName()" onkeypress="changeHolderName()" onfocus="holderCardVerify()" onblur="holderCardVerify()">
								</div><br>
								
								<label for="card-security-code-input" class="labels-fc">Código de Segurança</label><br>
								<div class="col-md-10 align-flex">
									<i class="fas fa-lock i-icons-absolute"></i><input type="text" class="form-control" name="card-security-code-input" maxlength="3" id="security-code-id" onkeyup="changeSecurityCode()" onkeypress="changeSecurityCode()" onfocus="onFocusRotate()" onblur="onBlurNotRotate()">
							 </div>		
							 <br><br><br>
						 	 <hr>
						 		 <div id="total-last-stage">
												<label style="font-size: 1rem;">Total: &nbsp;</label>
												<b>
														<?php echo "R$ ".number_format($subTotalSumResult["calc_subtotal"], 2, ',','.');?>
												</b>
						 		 </div>
						 	 <hr>
							 	 <form method="post" action="removeUnity">
												<button id="complete-buy" type="submit">
														Finalizar Pedido
												</button>	
							 	 </form>
							 	 <br><br> 
     	</div>
     </div>
   </div>
    
    
    
    
    
    
   
   <?php include_once("../php/infossite.php");?> 
   <!--Trocar atributos dos botões no clique-->
  	<script>
		function changeColorOne(){
			document.getElementsByClassName("shipping-type-submit-class")[0].style.outline = "1px solid #82CB6F";
			document.getElementsByClassName("shipping-type-submit-class")[0].style.boxShadow = "4px 4px 0px -1px #82CB6F";
			
			document.getElementsByClassName("shipping-type-submit-class")[1].style.outline = "0";
			document.getElementsByClassName("shipping-type-submit-class")[1].style.boxShadow = "none";
			
			document.getElementsByClassName("check-icon-div")[0].style.backgroundColor = "#82CB6F";
			document.getElementsByClassName("check-icon-div")[1].style.backgroundColor = "#c7c7c7";
		}
				
				
		function changeColorTwo(){
			document.getElementsByClassName("shipping-type-submit-class")[1].style.outline = "1px solid #82CB6F";
			document.getElementsByClassName("shipping-type-submit-class")[1].style.boxShadow = "4px 4px 0px -1px #82CB6F";
			
			document.getElementsByClassName("shipping-type-submit-class")[0].style.outline = "0";
			document.getElementsByClassName("shipping-type-submit-class")[0].style.boxShadow = "none";
			
			document.getElementsByClassName("check-icon-div")[1].style.backgroundColor = "#82CB6F";
			document.getElementsByClassName("check-icon-div")[0].style.backgroundColor = "#c7c7c7";
		}
			</script>
			<script src="../js/creditCard.js" type="text/javascript"></script>
</body>
</html>