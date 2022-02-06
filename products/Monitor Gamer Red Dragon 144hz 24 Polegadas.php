<?php session_start();?>
		<!DOCTYPE html>
		<html>
		 <head>
		 	<title>Monitor Gamer Red Dragon 144hz 24 Polegadas</title>
			 <link rel="stylesheet" type="text/css" href="../css/proddetails.css">
		 <link rel="preconnect" href="https://fonts.gstatic.com">
   <link rel="shortcut icon" href="../img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
    <script src="../js/linkeffects.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@300;400&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/nav.css">
    <script src="https://kit.fontawesome.com/92f64e9681.js" crossorigin="anonymous"></script>
    <script src="../js/imextra.js" type="text/javascript"></script>
	 <link type="text/css" rel="stylesheet" href="../css/infossite.css">
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
		 </head>
		 <body>
		  <?php require_once('../php/nav.php');?>
		 	<div id='container'>
			<div id='container-item'>
				<div id='div-img-left'>
					<div id='div-extra-imgs'>
						<img src='../imgsextra/d3e36e2b4eca8e2a054aff1246dc0799.png' class='extra-imgs' id='imgextra0' onclick='iimgextra1()'><br>
						<img src='../imgsextra/452a41ee3453ac3a9071c0506feb684a.png' class='extra-imgs' id='imgextra1' onclick='iimgextra2()'><br>
						<img src='../imgsextra/7d8ed03cf603fe8e63ef2c722a5ff92a.jpg' class='extra-imgs' id='imgextra2' onclick='iimgextra3()'><br>
						<img src='../imgsextra/a1810cf0ec07927a78b9b800f4bcbf36.jpg' class='extra-imgs' id='imgextra3' onclick='iimgextra4()'>
					</div>
					<img src='../upload/23748dda1306a478124b9ad3b59a31fe.png' id='img-left'>
				</div>
				<div id='div-infos-product'>
					<b id='title'>Monitor Gamer Red Dragon 144hz 24 Polegadas</b><br>
					<div id='evaluation' style='position: relative; height: 1.3vw;'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<b id='b-opinions'>
						<?php

											$_selectAll = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
											$_selectAll->execute();
											$_selectAllFetch = $_selectAll->fetch(PDO::FETCH_ASSOC);
											$_qntAval = $_selectAllFetch["qnt_aval"];
											print $_qntAval;
											echo ' Avaliações';

						?></b>
					</div><br>
	 				 <b id='price'><h2 style='color: gray; text-decoration: line-through; font-size: 20px;'>R$ 2.100,00</h2><h2 id='price-real-confirm'> R$ 1.827,00</h2><b style='font-size: 18px;'>Ou 5x de R$ 365,40</b><br></b><br>
	 				  
					<form method='post' action='../inserts/insertCarrinho?np=<?php echo 'Monitor Gamer Red Dragon 144hz 24 Polegadas';?>'>
								<button type='submit' id='idbtncart' name='btn-cart' value='Adicionar ao Carrinho' >Adicionar ao Carrinho</button><br>
					</form>
					<form method='post' action='../inserts/insertCarrinho?np=<?php echo 'Monitor Gamer Red Dragon 144hz 24 Polegadas';?>'>
								<button type='submit' id='idbtnbuy' name='btn-buy' value='Comprar Agora' >Comprar Agora</button><br>
					</form>
					<a href='' id='paymentmethods'>Formas de pagamento</a><br>
					<div class='input-group w-75' id='div-details'>
					  <input type='text' class='form-control' placeholder='Calcular CEP' aria-label='Calcular CEP' aria-describedby='button-addon2' name='input-cep' id='id-input-cep' maxlength='8'>
					  <button class='btn btn-outline-secondary' type='submit' id='button-addon3' >Calcular</button>
				    </div><br>
				      <div class='infos-extras'>
				      	<img src='../img/truck.png' class='truck-icon'>
						  <b class='b-infos-extras'><a class='fake-link'>Entrega para todo Brasil!</a></b>
					  </div>
					   <div class='infos-extras'>
				      	<img src='../img/quality.png' class='truck-icon'>
						   <b class='b-infos-extras'><a class='fake-link'>Garantia de Satisfação!</a></b>
					  </div>
					  <div class='infos-extras'>
				      	<img src='../img/exchange.png' class='truck-icon'>
						  <b class='b-infos-extras'><a class='fake-link'>Troca Grátis</a></b>
					  </div>
				</div>
			</div>
			
			<div id='desc-prod'>
				<div id='desc-prod-b'><b>Descrição do Produto</b></div><br>
				<div id='alig-desc'>Tablet Samsung Galaxy Tab A SPen 32G 3GB Ram </div>
			</div><br><br>
			
			<div id='features-prod-b'><b>Características Gerais</b></div><br>
			
				<?php


						if('Monitor' == 'Console'){
						
						$_sql = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
						$_sql->execute();
						$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
							$nucleos_console = $_resultset["nucleos_console"];
							$unidades_comp_console = $_resultset["unidades_comp_console"];
							$sup_hdr_console = $_resultset["sup_hdr_console"];
							$midia_console = $_resultset["midia_console"];
							$memoria_ram_console = $_resultset["memoria_ram_console"];
							$hd_console = $_resultset["hd_console"];
							$peso_console = $_resultset["peso_console"];
	      $tipo_memoria_console = $_resultset["tipo_memoria_console"];
					?>
			<table id='customers'>

					<tr>
							<td style='width: 30%;'>Núcleos</td>
							<td><?php echo $nucleos_console?></td>
					</tr>
					<tr>
							<td>Unidades Computacionais</td>
							<td><?php echo $unidades_comp_console?></td>
					</tr>
					<tr>
							<td>Suporte para HDR</td>
							<td><?php echo $sup_hdr_console?></td>
					</tr>
					<tr>
							<td>Midia</td>
							<td><?php echo $midia_console?></td>
					</tr>
					<tr>
							<td>Memoria RAM</td>
							<td><?php echo $memoria_ram_console.'GB'?></td>
					</tr>
					<tr>
							<td>HD</td>
							<td><?php echo $hd_console.'GB'?></td>
					</tr>
					<tr>
							<td>Peso</td>
							<td><?php echo number_format($peso_console, 2,',','.').' Kg';?></td>
					</tr>
					<tr>
							<td>Tipo de Memória</td>
							<td><?php echo $tipo_memoria_console?></td>
					</tr>
			</table><br>
		<?php }?>
			
			
					<?php


						if('Monitor' == 'Monitor'){
						
						$_sql = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
						$_sql->execute();
						$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
							$tamanho_monitor = $_resultset["tamanho_monitor"];
							$resolucao_monitor = $_resultset["resolucao_monitor"];
							$tempo_resposta_monitor = $_resultset["tempo_resposta_monitor"];
							$taxa_atualizacao_monitor = $_resultset["taxa_atualizacao_monitor"];
							$painel_monitor = $_resultset["painel_monitor"];
							$conexoes_monitor = $_resultset["conexoes_monitor"];
							$usb_monitor = $_resultset["usb_monitor"];
	
					?>
			<table id='customers'>

					<tr>
							<td style='width: 30%;'>Tamanho</td>
							<td><?php echo $tamanho_monitor?></td>
					</tr>
					<tr>
							<td>Resolução</td>
							<td><?php echo $resolucao_monitor?></td>
					</tr>
					<tr>
							<td>Tempo de Resposta</td>
							<td><?php echo $tempo_resposta_monitor?></td>
					</tr>
					<tr>
							<td>Taxa de Atualização</td>
							<td><?php echo $taxa_atualizacao_monitor?></td>
					</tr>
					<tr>
							<td>Painel</td>
							<td><?php echo $painel_monitor?></td>
					</tr>
					<tr>
							<td>Conexões</td>
							<td><?php echo $conexoes_monitor?></td>
					</tr>
					<tr>
							<td>Porta USB</td>
							<td><?php echo $usb_monitor?></td>
					</tr>
			</table><br>
		<?php }?>
		
		
		
		
		
		<?php

						if('Monitor' == 'Tablet'){
						
						$_sql = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
						$_sql->execute();
						$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
							$sistema_op_tablet = $_resultset["sistemaop_tablet"];
							$tamanho_tablet = $_resultset["tamanho_tablet"];
							$resolucao_tablet = $_resultset["resolucao_tablet"];
							$ram_tablet = $_resultset["ram_tablet"];
							$capac_bateria_tablet = $_resultset["capac_bateria_tablet"];
							$armazenamento_tablet = $_resultset["armazenamento_tablet"];
							$nucleos_tablet = $_resultset["nucleos_tablet"];
	
					?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Sistema Operacional</td>
							<td><?php echo $sistema_op_tablet?></td>
					</tr>
					
					<tr>
							<td>Tamanho</td>
							<td><?php echo $tamanho_tablet.' Polegadas'?></td>
					</tr>
					<tr>
							<td>Resolução</td>
							<td><?php echo $resolucao_tablet?></td>
					</tr>
					<tr>
							<td>Memória RAM</td>
							<td><?php echo $ram_tablet?></td>
					</tr>
					<tr>
							<td>Capacidade da Bateria</td>
							<td><?php echo $capac_bateria_tablet?></td>
					</tr>
					<tr>
							<td>Armazenamento Interno</td>
							<td><?php echo $armazenamento_tablet?></td>
					</tr>
					<tr>
							<td>Núcleos</td>
							<td><?php echo $nucleos_tablet?></td>
					</tr>

			</table><br>
	<?php }?>
								
								
								
								
			<?php

						if('Monitor' == 'Computador'){
						
						$_sql = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
						$_sql->execute();
						$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
		 $sistemaop_computador = $_resultset["sistemaop_computador"];
		 $marca_placamae_computador = $_resultset["marca_placamae_computador"];
		 $formato_placamae_computador = $_resultset["formato_placamae_computador"];
			$memoria_compativel_computador = $_resultset["memoria_compativel_computador"];
			$video_integrado_computador = $_resultset["video_integrado_computador"];
			$tipo_memoria_ram_computador = $_resultset["tipo_memoria_ram_computador"];
			$capacidade_ram_computador = $_resultset["capacidade_ram_computador"];
			$potencia_fonte_computador = $_resultset["potencia_fonte_computador"];
			$cabeamento_fonte_computador = $_resultset["cabeamento_fonte_computador"];
			$tipo_armazenamento_computador = $_resultset["tipo_armazenamento_computador"];
			$armazenamento_disco_computador = $_resultset["armazenamento_disco_computador"];
			$fabricante_chipset_computador = $_resultset["fabricante_chipset_computador"];
			$marca_processador_computador = $_resultset["marca_processador_computador"];
			
				?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Sistema Operacional</td>
							<td><?php echo $sistemaop_computador?></td>
					</tr>
					
					<tr>
							<td>Placa Mãe</td>
							<td><?php echo $marca_placamae_computador?></td>
					</tr>
					<tr>
							<td>Formato da Placa Mãe</td>
							<td><?php echo $formato_placamae_computador?></td>
					</tr>
					<tr>
							<td>Memória Compatível</td>
							<td><?php echo $memoria_compativel_computador?></td>
					</tr>
				
					<tr>
						<td>Processador</td>
						<td>
						<?php

								if($marca_processador_computador === 'Intel'){
									echo 'Intel';
						}else if($marca_processador_computador === 'AMD'){
							  echo 'AMD';
									}
							?>
					</tr>
					
					<tr>
					<td>Geração do Processador</td>
						<td>
						<?php
									if($marca_processador_computador === 'Intel'){
									$geracao_processador_intel_computador = $_resultset["geracao_processador_intel_computador"];
									echo $geracao_processador_intel_computador;
									
						}else if($marca_processador_computador === 'AMD'){
							  $geracao_processador_amd_computador = $_resultset["geracao_processador_amd_computador"];
									echo $geracao_processador_amd_computador;
									}
							?>
					</tr>
					
					<tr>
					<?php ?>
							<td>Processador com vídeo integrado</td>
							<td><?php echo $video_integrado_computador?></td>
					</tr>
					<tr>
							<td>Tipo de Memória RAM</td>
							<td><?php echo $tipo_memoria_ram_computador?></td>
					</tr>
					<tr>
							<td>Memória RAM</td>
							<td><?php echo $capacidade_ram_computador?></td>
					</tr>
					<tr>
							<td>Potência da Fonte</td>
							<td><?php echo $potencia_fonte_computador?></td>
					</tr>
					<tr>
							<td>Cabeamento da Fonte</td>
							<td><?php echo $cabeamento_fonte_computador?></td>
					</tr>
					<tr>
							<td>Disco de Armazenamento</td>
							<td><?php echo $tipo_armazenamento_computador?></td>
					</tr>
					<tr>
							<td>Armazenamento em Disco</td>
							<td><?php echo $armazenamento_disco_computador?></td>
					</tr>
					<tr>
							<td>Fabricante do Chipset</td>
							<td><?php echo $fabricante_chipset_computador?></td>
					</tr>

			</table><br>
		<?php }?>
											
		<?php
				if('Monitor' == 'Notebook'){
						
						$_sql = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
						$_sql->execute();
						$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
		 $sistemaop_notebook = $_resultset["sistemaop_notebook"];
		 $tamanho_tela_notebook = $_resultset["tamanho_tela_notebook"];
		 $resolucao_notebook = $_resultset["resolucao_notebook"];
			$tipo_memoria_notebook = $_resultset["tipo_memoria_notebook"];
			$armazenamento_notebook = $_resultset["armazenamento_notebook"];
			$memoria_ram_notebook = $_resultset["memoria_ram_notebook"];
			$placa_dedicada_notebook = $_resultset["placa_dedicada_notebook"];
			$peso_notebook = $_resultset["peso_notebook"];
			$marca_processador_notebook = $_resultset["marca_processador_notebook"];

				?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Sistema Operacional</td>
							<td><?php echo $sistemaop_notebook?></td>
					</tr>
					
					<tr>
							<td>Tamanho da Tela</td>
							<td><?php echo $tamanho_tela_notebook?></td>
					</tr>
					<tr>
							<td>Resolução</td>
							<td><?php echo $resolucao_notebook?></td>
					</tr>
					<tr>
							<td>Tipo de Memória</td>
							<td><?php echo $tipo_memoria_notebook?></td>
					</tr>
				
					<tr>
						<td>Processador</td>
						<td>
						
						<?php 
								if($marca_processador_notebook === 'Intel'){
									echo 'Intel';
						}else if($marca_processador_notebook === 'AMD'){
							  echo 'AMD';
									}
							?>
					</tr>
					
					<tr>
					<td>Geração do Processador</td>
						<td>
						<?php
									if($marca_processador_notebook === 'Intel'){
									$geracao_processador_intel_notebook = $_resultset["geracao_processador_intel_notebook"];
									echo $geracao_processador_intel_notebook;
									
						}else if($marca_processador_notebook === 'AMD'){
							  $geracao_processador_amd_notebook = $_resultset["geracao_processador_amd_notebook"];
									echo $geracao_processador_amd_notebook;
									}
							?>
					</tr>
					
					<tr>
					<?php ?>
							<td>Armazenamento Interno</td>
							<td><?php echo $armazenamento_notebook?></td>
					</tr>
					<tr>
							<td>Memória RAM</td>
							<td><?php echo $memoria_ram_notebook?></td>
					</tr>
					
							
					<tr>
							<td>Placa de vídeo dedicada</td>
							<td><?php echo $placa_dedicada_notebook?></td>
					</tr>
					<tr>
							<td>Peso</td>
							<td><?php echo $peso_notebook.' Kg'?></td>
					</tr>
					
			</table><br>
		<?php }?>
		
		<?php
		
		if('Monitor' == 'Jogo'){
						
						$_sql = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
						$_sql->execute();
						$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
		 $plataforma_jogo = $_resultset["plataforma_jogo"];
		 $multijogador_jogo = $_resultset["multijogador_jogo"];
		 $online_jogo = $_resultset["online_jogo"];
			$formato_jogo = $_resultset["formato_jogo"];
			$data_lanc_jogo = $_resultset["data_lanc_jogo"];
			$genero_jogo = $_resultset["genero_jogo"];


				?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Plataforma</td>
							<td><?php echo $plataforma_jogo?></td>
					</tr>
					
					<tr>
							<td>Multijogador</td>
							<td><?php echo $multijogador_jogo?></td>
					</tr>
					<tr>
							<td>Online</td>
							<td><?php echo $online_jogo?></td>
					</tr>
					<tr>
							<td>Midia</td>
							<td><?php echo $formato_jogo?></td>
					</tr>
					
			  <tr>
							<td>Data de Lançamento</td>
							<td><?php  echo date('d/m/Y', strtotime($data_lanc_jogo));?></td>
					</tr>
					
					<tr>
							<td>Gênero</td>
							<td><?php echo $genero_jogo?></td>
					</tr>
					
			</table><br>
		<?php }?>
		
		
		<?php
		if('Monitor' == 'Cadeira'){
						
						$_sql = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
						$_sql->execute();
						$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
		 $braco_ajustavel_cadeira = $_resultset["braco_ajustavel_cadeira"];
		 $altura_ajustavel_cadeira = $_resultset["altura_ajustavel_cadeira"];
		 $inclinacao_ajustavel_cadeira = $_resultset["inclinacao_ajustavel_cadeira"];
			$altura_cadeira = $_resultset["altura_cadeira"];
			$largura_cadeira = $_resultset["largura_cadeira"];
			$rodas_giratorias_cadeira = $_resultset["rodas_giratorias_cadeira"];
			$peso_max_suportavel_cadeira = $_resultset["peso_max_suportavel_cadeira"];
			$e_gamer_cadeira = $_resultset["e_gamer_cadeira"];
			$encosto_reclinavel_cadeira = $_resultset["encosto_reclinavel_cadeira"];
			$ergonomica_cadeira = $_resultset["ergonomica_cadeira"];
				?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Braço Ajustável</td>
							<td><?php echo $braco_ajustavel_cadeira?></td>
					</tr>
					
					<tr>
							<td>Altura Ajustável</td>
							<td><?php echo $altura_ajustavel_cadeira?></td>
					</tr>
					<tr>
							<td>Inclinação Ajustável</td>
							<td><?php echo $inclinacao_ajustavel_cadeira?></td>
					</tr>
					<tr>
							<td>Altura</td>
							<td><?php echo $altura_cadeira.'cm'?></td>
					</tr>
					
			  <tr>
							<td>Largura</td>
							<td><?php echo $largura_cadeira.'cm'?></td>
					</tr>
					
					<tr>
							<td>Rodas Giratórias</td>
							<td><?php echo $rodas_giratorias_cadeira?></td>
					</tr>
					
					<tr>
							<td>Peso Máximo Suportável</td>
							<td><?php echo $peso_max_suportavel_cadeira.'kg'?></td>
					</tr>
					
					<tr>
							<td>É gamer?</td>
							<td><?php echo $e_gamer_cadeira?></td>
					</tr>
					
					<tr>
							<td>Encosto Reclinável</td>
							<td><?php echo $encosto_reclinavel_cadeira?></td>
					</tr>
					
					<tr>
							<td>É ergonômica?</td>
							<td><?php echo $ergonomica_cadeira?></td>
					</tr>
					
			</table><br>
		<?php }?>
		<div id='container-aval'>
    	<?php 
						$_getAval = $_pdo->prepare("SELECT * FROM avalia_prods WHERE prod_aval = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
						$_getAval->execute();
						$_getAvalFetch = $_getAval->fetchAll(PDO::FETCH_ASSOC);

							$_getAvalAverage = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = 'Monitor Gamer Red Dragon 144hz 24 Polegadas'");
							$_getAvalAverage->execute();
							$_getAvalAverageFetch = $_getAvalAverage->fetch(PDO::FETCH_ASSOC);
							?>
							<div id='aval-average'>
											<img src='../img/star_yellow.png' id='star-average'>
											<b><?php echo number_format($_getAvalAverageFetch['aval_media'],2,'.');?></b>
								</div>
						<div class='glider-contain multiple'>
							<div class='glider'>
				<?php foreach($_getAvalFetch as $_getAvalFetchFC){?>						
								<div id='content-aval'>
								 <div id='div-username'>
								 <b id='comment'><?php echo $_getAvalFetchFC['comentarios'];?></b><br><br>
								 <b><?php echo $_getAvalFetchFC['nome_cliente_aval'];?></b><br>
								 	<img src='../img/star_yellow.png' id='star-aval-1'>
										<img src='../img/star_yellow.png' id='star-aval-2'>
										<img src='../img/star_yellow.png' id='star-aval-3'>
										<img src='../img/star_yellow.png' id='star-aval-4'>
										<img src='../img/star_yellow.png' id='star-aval-5'>
								 </div>
							 </div>
				<?php }?>
				</div>
			</div>		
  </div>
		
		<div class='glider-contain multiple'>
					<div id='prod-relac'>Produtos Relacionados</div>
								<div class='glider'>
												<?php
												$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = 'Monitor' LIMIT 16");
												$_offer->execute();
												$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
												$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
												
												foreach($_resultset as $_line){	
													$_linkprod = $_line['Nome_Produto'];
												?>

								<button class='idbestseller'> 
           
															<?php
																			if(isset($idCliente)){

																?>
																	<a id='wishes-list-a' href='../inserts/insertWishes.php?npw=<?php echo $_linkprod?>&imgdsj=<?php echo $_line['Imagem_Produto']?>'>
																						<i class='material-icons sixth-icon' style='font-size: 1.8rem;' id='icon-wishes'>loyalty</i>
																	</a> 
														<?php
																	foreach($_getAllWishesFetchAll as $_getAllWishesFetch){

																	if($_line['Nome_Produto']==$_getAllWishesFetch['nome_prod_desej']){ 
															?>

														<a id='wishes-list-a' href='#'>
																		<i class='material-icons sixth-icon' style='font-size: 1.8rem;color:#e86332' id='icon-wishes'>loyalty</i>
														</a> 
													<?php }?>
									<?php }?>
								<?php }?>                                
										<a href='../products/<?php echo $_line['Nome_Produto']?>'>

											<img src='../upload/<?php echo $_line['Imagem_Produto']?>'>
									<div class='nome1-bestseller'>
										<h5><?php echo $_line['Nome_Produto']?></h5><br>
										<div id='div-star-img'>
										<img src='../img/star_yellow.png' id='star1'>
										<img src='../img/star_yellow.png' id='star2'>
										<img src='../img/star_yellow.png' id='star3'>
										<img src='../img/star_yellow.png' id='star4'>
										<img src='../img/star_yellow.png' id='star5'>
											<b><?php echo '('.$_line['qnt_aval'].')';?></b>
										</div>
										<div id='qnt-oferta-style'>
											<h4>
												<b><?php echo $_line['qnt_oferta']?>%</b>
												<img src='../img/arrow-down.svg'>
											</h4>
									</div>
										<div id='flex-precos'>
											<h2 id='preco'>R$<?php echo number_format($_line['Preco_Produto'], 2,',','.');?></h2>

											<h2 id='preco-offer'>
											R$<?php echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'], 2,',','.')?>
											</h2>
										</div>
										<div style='font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;'>
												R$ <?php
													$vistAux = ($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta']) / 10;
													echo number_format($_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'] - $vistAux, 2, ',', '.');
											?> 
												a vista com desconto boleto ou 
											<?php 
											$precojuros = $_line['Preco_Produto'] - ($_line['Preco_Produto'] / 100) * $_line['qnt_oferta'];

											$precojurosaux = $precojuros / 5;
											if($precojuros <=2500 and $precojuros < 2501){echo '5x de R$'. number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 10;
											if($precojuros >=2501 and $precojuros <= 4000){echo '10x de R$' .number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 15;
											if($precojuros >=4001 and $precojuros <= 7000){echo '15x de R$'.number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 20;
											if($precojuros >=7001 and $precojuros <= 9000){echo '20x de R$'.number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 25;
											if($precojuros >=9001 and $precojuros <= 11000){echo '25x de R$'.number_format($precojurosaux, 2, ',','.');}
											$precojurosaux = $precojuros / 30;
											if($precojuros >=11001 and $precojuros < 14000){echo '30x de R$'. number_format($precojurosaux, 2, ',','.');}

											$precojurosaux = $precojuros / 35;
											if($precojuros >=14000){echo '35x de R$'.number_format($precojurosaux, 2, ',','.');}

											?> 
										</div><br><br>
									</div>
								</a>
							</button>	
						<?php }?>	
	 		</div>
	</div>				
</div>
		
		  <?php require_once('../php/infossite.php');?>
				<script src="../js/glider.min.js"></script>
						  <script>
                        new Glider(document.querySelector(".glider"),{
                            slidesToScroll: "auto",
                            draggable: true,
																												slidesToShow: 4.5,
                            arrows:{
                                        prev: ".glider-prev",
                                        next: ".glider-next"
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
		 </body>
		</html>