<?php
if(isset($_GET['sucess'])){
	require_once("../conexao/db.php");
	require_once("../variaveis.php");
	
$_imgError = array();	
$config["tamanho"] = 500000;  	
$config["largura"] = 512;
$config["altura"]  = 512;	
	
	

$_product = $_POST["product-name"];
$_brand = $_POST["product-brand"];
$_amount = $_POST["product-amount"];
$_price = $_POST["product-price"];
$_imagevalue = $_FILES["product-image"];
$_imagesextras0 = $_FILES["product-extras"];
$_imagesextras1 = $_FILES["product-extras"];
$_imagesextras2 = $_FILES["product-extras"];
$_imagesextras3 = $_FILES["product-extras"];
$_desc_prod = $_POST["desc-prod"];
$_date_offer = $_POST["date-offer"];
$_color = $_POST["product-color"];
$_type = $_POST["product-type"];
$_offer = $_POST["offer"];
$_offerqnt = $_POST["offer-qnt"];
date_default_timezone_set('America/Sao_Paulo');
$dateTime =  date('Y/m/d');	
$dateForNew = date('Y/m/d', strtotime('+30 days'));




	 	  /*Imagem central do produto*/
		  preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_imagevalue["name"], $ext);
		  $_image_name = md5(uniqid(time())). "." . $ext[1];
		  $_directory = "../upload/".$_image_name;
	
		  /*Imagem extra 0*/
		  preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_imagesextras0["name"][0] , $ext);
		  $_image_name_extra0 = md5(uniqid(time())). "." . $ext[1];
		  $_directory_extra0 = "../imgsextra/".$_image_name_extra0;
	
		  /*Imagem extra 1*/
		  preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_imagesextras1["name"][1] , $ext);
		  $_image_name_extra1 = md5(uniqid(time())). "." . $ext[1];
		  $_directory_extra1 = "../imgsextra/".$_image_name_extra1;
	
	      /*Imagem extra 2*/
		  preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_imagesextras2["name"][2] , $ext);
		  $_image_name_extra2 = md5(uniqid(time())). "." . $ext[1];
		  $_directory_extra2 = "../imgsextra/".$_image_name_extra2;
	
	      /*Imagem extra 3*/
		  preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_imagesextras3["name"][3] , $ext);
		  $_image_name_extra3 = md5(uniqid(time())). "." . $ext[1];
		  $_directory_extra3 = "../imgsextra/".$_image_name_extra3;

		$_sql = $_pdo->prepare("INSERT INTO  produtos (Nome_Produto, Marca_Produto, Quantidade_Estoque_Produto, Preco_Produto, Imagem_Produto, Cor_Produto, Tipo_Produto, oferta, qnt_oferta, tempo_oferta, desc_produto, img_extra0, img_extra1, img_extra2, img_extra3, data_insercao_prod, data_fim_insercao_prod) VALUES (:product,:brand,:amount,:price,:image,:color,:type,:oferta,:ofertaqnt,:timeoffer,:descprod,:img_extra0,:img_extra1,:img_extra2,:img_extra3,:datetime,:datefornew)");

		 $_sql->bindValue(":product",$_product);
		 $_sql->bindValue(":brand",$_brand);
		 $_sql->bindValue(":amount",$_amount);
		 $_sql->bindValue(":price",$_price);
		 $_sql->bindValue(":color",$_color);
		 $_sql->bindValue(":type",$_type);
		 $_sql->bindValue(":image",$_image_name);
		 $_sql->bindValue(":oferta",$_offer);
		 $_sql->bindValue(":ofertaqnt",$_offerqnt);
		 $_sql->bindValue(":timeoffer",$_date_offer);
		 $_sql->bindValue(":descprod",$_desc_prod);
		 $_sql->bindValue(":img_extra0",$_image_name_extra0);
		 $_sql->bindValue(":img_extra1",$_image_name_extra1);
		 $_sql->bindValue(":img_extra2",$_image_name_extra2);
		 $_sql->bindValue(":img_extra3",$_image_name_extra3);
	  $_sql->bindValue(":datetime", $dateTime);
	  $_sql->bindValue(":datefornew", $dateForNew);
		 $_sql->execute();
	
	echo $dateTime."<br>";
	echo $dateForNew;
	
	
	/*Inserir configurações de cada produto, baseando-se no Select do Admin*/
	if($_type == "Console"){
			$console_cores = $_POST["console-cores"];
			$console_comp_unity = $_POST["console-comp-unity"];
			$console_hdr = $_POST["console-hdr"];
		 $console_media = $_POST["console-media"];
			$console_ram = $_POST["console-ram-memory"];
		 $console_memory = $_POST["console-memory"];
		 $console_memory_type = $_POST["console-memory-type"];
		 $console_size = $_POST["console-size"];
		
		
			$insertConfigs = $_pdo->prepare("
			UPDATE produtos SET nucleos_console = '$console_cores',
			unidades_comp_console = '$console_comp_unity',
			sup_hdr_console = '$console_hdr',
			midia_console = '$console_media',
			memoria_ram_console = '$console_ram',
			hd_console = '$console_memory',
			peso_console = '$console_size',
			tipo_memoria_console = '$console_memory_type'
			WHERE Nome_Produto = '$_product'");
		
			$insertConfigs->execute();
		 }
	
	
	
	if($_type == "Monitor"){
			$monitor_size = $_POST["size-monitor"];
			$monitor_resolution = $_POST["resolution-monitor"];
			$monitor_response_time = $_POST["response-time-monitor"];
		 $monitor_refresh_rate = $_POST["refresh-rate-monitor"];
			$monitor_panel = $_POST["panel-monitor"];
		 $monitor_connections = $_POST["connections-monitor"];
		 $monitor_usb = $_POST["usb-monitor"];
		
		
			$insertConfigs = $_pdo->prepare("
			UPDATE produtos SET tamanho_monitor = '$monitor_size',
			resolucao_monitor = '$monitor_resolution', 
			tempo_resposta_monitor = '$monitor_response_time', 
			taxa_atualizacao_monitor = '$monitor_refresh_rate', 
			painel_monitor = '$monitor_panel', 
			conexoes_monitor = '$monitor_connections', 
			usb_monitor = '$monitor_usb' 
			WHERE Nome_Produto = '$_product'");
		
			$insertConfigs->execute();
		
			}
	
	if($_type == "Tablet"){
			$tablet_system = $_POST["operational-system-tablet"];
			$tablet_size = $_POST["size-tablet"];
			$tablet_resolution = $_POST["resolution-tablet"];
		 $tablet_ram = $_POST["ram-memory-tablet"];
			$tablet_battery = $_POST["battery-capacity-tablet"];
		 $tablet_storage = $_POST["storage-tablet"];
		 $tablet_cores = $_POST["cores-tablet"];
		
		
			$insertConfigs = $_pdo->prepare("
			UPDATE produtos SET sistemaop_tablet = '$tablet_system',
			tamanho_tablet = '$tablet_size', 
			resolucao_tablet = '$tablet_resolution',
			ram_tablet = '$tablet_ram', 
			capac_bateria_tablet = '$tablet_battery',
			armazenamento_tablet = '$tablet_storage',
			nucleos_tablet = '$tablet_cores'
			WHERE Nome_Produto = '$_product'");
		
			$insertConfigs->execute();
			}
	
	if($_type == "Computador"){
			$pc_system = $_POST["operating-system-computador"];
			$pc_board = $_POST["brand-placa-mae"];
			$pc_board_format = $_POST["format-motherboard-computador"];
		 $pc_compatiblememory = $_POST["compatible-memory-computador"];
		 $pc_brand_processor = $_POST["brand-processor-computador"];
		 $pc_processor_amd = $_POST["generation-processor-amd-computador"];
		 $pc_processor_intel = $_POST["generation-processor-intel-computador"];
		 $pc_integrated_video = $_POST["integrated-video"];
		 $pc_ram_type = $_POST["RAM-memory-type-computador"];
		 $pc_ram = $_POST["RAM-memory-capacity-computador"];
			$pc_power_source = $_POST["power-source-computador-computador"];
			$pc_source_cabling = $_POST["source-cabling-computador"];
			$pc_storage_type = $_POST["storage-type-computador"];
			$pc_source_storage = $_POST["source-storage-computador"];
		 $pc_chipset = $_POST["chipset-manufacturers-computador"];

		 if($pc_brand_processor === "Intel"){
				$insertProcessor = $_pdo->prepare("
				UPDATE produtos
				SET geracao_processador_intel_computador = '$pc_processor_intel'
				WHERE Nome_Produto = '$_product'");
		
			$insertProcessor->execute();
			}
		
			if($pc_brand_processor === "AMD"){
				$insertProcessor = $_pdo->prepare("
				UPDATE produtos
				SET geracao_processador_amd_computador = '$pc_processor_amd'
				WHERE Nome_Produto = '$_product'");
		
			$insertProcessor->execute();
			}
		
			$insertConfigs = $_pdo->prepare("
			UPDATE produtos
			SET sistemaop_computador = '$pc_system',
			marca_placamae_computador = '$pc_board',
			formato_placamae_computador = '$pc_board_format',
			memoria_compativel_computador = '$pc_compatiblememory',
			marca_processador_computador = '$pc_brand_processor',
			video_integrado_computador = '$pc_integrated_video',
			tipo_memoria_ram_computador = '$pc_ram_type',
			capacidade_ram_computador = '$pc_ram',
			potencia_fonte_computador = '$pc_power_source',
			cabeamento_fonte_computador = '$pc_source_cabling',
			tipo_armazenamento_computador = '$pc_storage_type',
			armazenamento_disco_computador = '$pc_source_storage',
			fabricante_chipset_computador = '$pc_chipset'
			WHERE Nome_Produto = '$_product'");
		
		 $insertConfigs->execute();
			}
	
	if($_type == "Notebook"){
			$notebook_system = $_POST["operating-system-notebook"];
			$notebook_brand_processor = $_POST["brand-processor-notebook"];
		 /*As duas gerações aqui*/
			$notebook_amd = $_POST["generation-processor-amd-notebook"];
		 $notebook_intel = $_POST["generation-processor-intel-notebook"];
			$notebook_size = $_POST["screen-size-notebook"];
		 $notebook_resolution = $_POST["resolution-notebook"];
		 $notebook_memory_type = $_POST["memory-type-notebook"];
		 $notebook_storage = $_POST["storage-notebook"];
		 $notebook_ram = $_POST["RAM-memory-notebook"];
			$notebook_video_card = $_POST["video-card-notebook"];
		 $notebook_weight = $_POST["weight-notebook"];
		
		 if($notebook_brand_processor === "Intel"){
				$insertProcessor = $_pdo->prepare("
				UPDATE produtos
				SET geracao_processador_intel_notebook = '$notebook_intel'
				WHERE Nome_Produto = '$_product'");
		
			$insertProcessor->execute();
			}
		
			if($notebook_brand_processor === "AMD"){
				$insertProcessor = $_pdo->prepare("
				UPDATE produtos
				SET geracao_processador_amd_notebook = '$notebook_amd'
				WHERE Nome_Produto = '$_product'");
		
			$insertProcessor->execute();
			}
		
			$insertConfigs = $_pdo->prepare("
			UPDATE produtos
			SET sistemaop_notebook = '$notebook_system',
			marca_processador_notebook = '$notebook_brand_processor',
			tamanho_tela_notebook = '$notebook_size',
		 resolucao_notebook = '$notebook_resolution',
			tipo_memoria_notebook = '$notebook_memory_type',
			armazenamento_notebook = '$notebook_storage',
			memoria_ram_notebook = '$notebook_ram',
			placa_dedicada_notebook = '$notebook_video_card',
			peso_notebook = '$notebook_weight'
			WHERE Nome_Produto = '$_product'");
		
			$insertConfigs->execute();
			}
	if($_type == "Jogo"){
			$game_platform = $_POST["platform-game"];
			$game_multiplayer = $_POST["multiplayer-game"];
			$game_online = $_POST["online-game"];
		 $game_format = $_POST["format-game"];
			$game_launch = $_POST["date-launch-game"];
		 $game_genre = $_POST["genre-game"];
		
			$insertConfigs = $_pdo->prepare("
			UPDATE produtos 
			SET plataforma_jogo = '$game_platform',
			multijogador_jogo = '$game_multiplayer',
			online_jogo = '$game_online',
			formato_jogo = '$game_format',
			data_lanc_jogo = '$game_launch',
			genero_jogo = '$game_genre'
			WHERE Nome_Produto = '$_product'");
		
			$insertConfigs->execute();
			}
	if($_type == "Cadeira"){
			$chair_adjustable_arm = $_POST["adjustable-arm-chair"];
			$chair_height_arm = $_POST["adjustable-height-chair"];
			$chair_slope = $_POST["slope-chair"];
		 $chair_height = $_POST["height-chair"];
			$chair_width = $_POST["width-chair"];
		 $chair_swivel_wheels = $_POST["swivel-wheels-chair"];
		 $chair_max_weight = $_POST["max-weight-chair"];
	 	$chair_qs_gamer = $_POST["its-gamer-chair"];
		 $chair_reclining_backrest = $_POST["reclining-backrest-chair"];
		 $chair_ergonomic_chair = $_POST["ergonomic-chair"];
		
			$insertConfigs = $_pdo->prepare("
			UPDATE produtos 
			SET braco_ajustavel_cadeira = '	$chair_adjustable_arm',
		 altura_ajustavel_cadeira = '$chair_height_arm',
   inclinacao_ajustavel_cadeira = '$chair_slope', 
			altura_cadeira = '$chair_height',
			largura_cadeira = '$chair_width',
			rodas_giratorias_cadeira = '$chair_swivel_wheels',
			peso_max_suportavel_cadeira = '$chair_max_weight',
			e_gamer_cadeira = '$chair_qs_gamer',
			encosto_reclinavel_cadeira = '$chair_reclining_backrest',
			ergonomica_cadeira = '$chair_ergonomic_chair'
			WHERE Nome_Produto = '$_product'");
		
			$insertConfigs->execute();
			}

		/*Imagem central*/
		move_uploaded_file($_imagevalue["tmp_name"], $_directory);
	
		/*Imagens extras*/
		move_uploaded_file($_imagesextras0["tmp_name"][0], $_directory_extra0);
		move_uploaded_file($_imagesextras1["tmp_name"][1], $_directory_extra1);
		move_uploaded_file($_imagesextras2["tmp_name"][2], $_directory_extra2);
		move_uploaded_file($_imagesextras3["tmp_name"][3], $_directory_extra3);
	
	
		$_sql = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = '$_product'");
		$_sql->execute();
		$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);
		$_nomeproduto = $_resultset['Nome_Produto'];
		$_imagemproduto = $_resultset['Imagem_Produto'];
		$_precoproduto = $_resultset['Preco_Produto'];
		$_descproduto = $_resultset['desc_produto'];
		$_quantoferta = $_resultset['qnt_oferta'];
		$_prod_type = $_resultset['Tipo_Produto'];
		$_imgextra0 = $_resultset['img_extra0'];
		$_imgextra1 = $_resultset['img_extra1'];
		$_imgextra2 = $_resultset['img_extra2'];
		$_imgextra3 = $_resultset['img_extra3'];
	
		$precojuros = $_resultset['Preco_Produto'] - ($_resultset['Preco_Produto'] / 100) * $_resultset['qnt_oferta'];
	 $precojurosNoF = ($_resultset['Preco_Produto'] / 100); 
	
		
				/*PARA ITENS COM OFERTA*/
		  $precojurosaux = $precojuros / 5;
		  $_rem1 = $precojuros <= 2500 && $precojuros <= 2501? "5x de R$ ".number_format($precojurosaux, 2, ',', '.'): "";
	
	 	  $precojurosaux = $precojuros / 10;
		  $_rem2 = $precojuros >= 2501 && $precojuros <= 4000? "10x de R$ ".number_format($precojurosaux, 2, ',', '.'): "";
	
		  $precojurosaux = $precojuros / 15;
		  $_rem3 = $precojuros >= 4001 && $precojuros <= 7000? "15x de R$ ".number_format($precojurosaux, 2, ',', '.'): "";
	
	 	  $precojurosaux = $precojuros / 20;
		  $_rem4 = $precojuros >= 7001 && $precojuros <= 9000?"20x de R$ ".number_format($precojurosaux, 2, ',', '.'): "";
	
	 	  $precojurosaux = $precojuros / 25;
		  $_rem5 = $precojuros >= 9001 && $precojuros <= 11000? "25x de R$ ".number_format($precojurosaux, 2, ',', '.'): "";
	
	 	  $precojurosaux = $precojuros / 30;
		  $_rem6 = $precojuros >= 11001 && $precojuros <= 14000? "30x de R$ ".number_format($precojurosaux, 2, ',', '.'): "";
	
	  	  $precojurosaux = $precojuros / 35;
		  $_rem7 = $precojuros >= 14000? "35x de R$ ".number_format($precojurosaux, 2, ',', '.'): "";
	
	
	
	  		/*PARA ITENS SEM OFERTA*/
					$precojurosauxNoF = $_precoproduto / 5;
					$_remNoF1 = $_precoproduto <= 2500 && $_precoproduto <= 2501? "5x de R$ ".number_format($precojurosauxNoF, 2, ',', '.'): "";
	
	 	  $precojurosauxNoF = $_precoproduto / 10;
		  $_remNoF2 = $_precoproduto >= 2501 && $_precoproduto <= 4000? "10x de R$ ".number_format($precojurosauxNoF, 2, ',', '.'): "";
	
		  $precojurosauxNoF = $_precoproduto / 15;
		  $_remNoF3 = $_precoproduto >= 4001 && $_precoproduto <= 7000? "15x de R$ ".number_format($precojurosauxNoF, 2, ',', '.'): "";
	
	 	 $precojurosauxNoF= $_precoproduto / 20;
		  $_remNoF4 = $_precoproduto >= 7001 && $_precoproduto <= 9000?"20x de R$ ".number_format($precojurosauxNoF, 2, ',', '.'): "";
	
	 	 $precojurosauxNoF = $_precoproduto / 25;
		  $_remNoF5 = $_precoproduto >= 9001 && $_precoproduto <= 11000? "25x de R$ ".number_format($precojurosauxNoF, 2, ',', '.'): "";
	
	 	 $precojurosauxNoF = $_precoproduto / 30;
		  $_remNoF6 = $_precoproduto >= 11001 && $_precoproduto <= 14000? "30x de R$ ".number_format($precojurosauxNoF, 2, ',', '.'): "";
	
	  	  $precojurosaux = $_precoproduto / 35;
		  $_remNoF7 = $_precoproduto >= 14000? "35x de R$ ".number_format($precojurosauxNoF, 2, ',', '.'): "";
					 
				$precoNumFormat = number_format($_precoproduto, 2, ',','.');
				$precoJurosNumFormat = number_format($precojuros,2,',','.');
	
		 /*VERIFICA SE TEM OFERTA*/
		 $_ofertaconfirm = $_resultset['oferta'] == 'Sim'? "<h2 style='color: gray; text-decoration: line-through; font-size: 20px;'>R$ $precoNumFormat</h2>"."<h2 id='price-real-confirm'> R$ $precoJurosNumFormat</h2>"."<b style='font-size: 18px;'>Ou $_rem1$_rem2$_rem3$_rem4$_rem5$_rem6$_rem7</b>"."<br>" : "R$ $_precoproduto"."<br>"."<b style='font-size: 17px;'>Ou $_remNoF1$_remNoF2$_remNoF3$_remNoF4$_remNoF5$_remNoF6$_remNoF7</b>"."<br>";
	
	  /*PHP PARA O CAROUSEL*/
			 date_default_timezone_set('America/Sao_Paulo');
			 $datetime =  date('d/m/Y');	
				$_timeoffer = $_pdo->prepare("UPDATE produtos SET oferta='Não' WHERE tempo_oferta <= '$datetime'");
				$_desc0 = $_pdo->prepare("UPDATE produtos SET qnt_oferta = '0' WHERE oferta = 'Não'");
				$_timeoffer->execute();
				$_desc0->execute();
	
			/*PEGAR PRODUTOS RELACIONADOS*/
				$related_prods = $_pdo->prepare("SELECT * FROM produtos WHERE Tipo_Produto = '$_prod_type'");
				$related_prods->execute();
				$related_prodsValues = $related_prods->fetchAll(PDO::FETCH_ASSOC);
	
	
	
	
	  /*FIM PHP PRO CAROUSEL*/
					
			$_offer = $_pdo->prepare("SELECT * FROM produtos WHERE oferta = 'Sim' ORDER BY qnt_oferta DESC LIMIT 50");
			$_offer->execute();
			$_resultset = $_offer->fetchAll(PDO::FETCH_ASSOC);
			$_resultsetfetch = $_offer->fetch(PDO::FETCH_ASSOC);
	
	
	
	

	
	
		$link = "<?php session_start();?>
		<!DOCTYPE html>
		<html>
		 <head>
		 	<title>$_nomeproduto</title>
			 $_sla
		 </head>
		 <body>
		  <?php require_once('../php/nav.php');?>
		 	<div id='container'>
			<div id='container-item'>
				<div id='div-img-left'>
					<div id='div-extra-imgs'>
						<img src='../imgsextra/$_imgextra0' class='extra-imgs' id='imgextra0' onclick='iimgextra1()'><br>
						<img src='../imgsextra/$_imgextra1' class='extra-imgs' id='imgextra1' onclick='iimgextra2()'><br>
						<img src='../imgsextra/$_imgextra2' class='extra-imgs' id='imgextra2' onclick='iimgextra3()'><br>
						<img src='../imgsextra/$_imgextra3' class='extra-imgs' id='imgextra3' onclick='iimgextra4()'>
					</div>
					<img src='../upload/$_imagemproduto' id='img-left'>
				</div>
				<div id='div-infos-product'>
					<b id='title'>$_nomeproduto</b><br>
					<div id='evaluation' style='position: relative; height: 1.3vw;'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<img src='../img/star_yellow.png' class='stars-img'>
						<b id='b-opinions'>
						<?php

											"."$"."_selectAll = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_nomeproduto'\");
											"."$"."_selectAll->execute();
											"."$"."_selectAllFetch = "."$"."_selectAll->fetch(PDO::FETCH_ASSOC);
											"."$"."_qntAval = "."$"."_selectAllFetch[\"qnt_aval\"];
											"."print $"."_qntAval;
											echo ' Avaliações';

						?></b>
					</div><br>
	 				 <b id='price'>$_ofertaconfirm</b><br>
	 				  
					<form method='post' action='../inserts/insertCarrinho?np=<?php echo '$_nomeproduto';?>'>
								<button type='submit' id='idbtncart' name='btn-cart' value='Adicionar ao Carrinho' >Adicionar ao Carrinho</button><br>
					</form>
					<form method='post' action='../inserts/insertCarrinho?np=<?php echo '$_nomeproduto';?>'>
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
				<div id='alig-desc'>$_descproduto </div>
			</div><br><br>
			
			<div id='features-prod-b'><b>Características Gerais</b></div><br>
			
				<?php


						if('$_prod_type' == 'Console'){
						
						"."$"."_sql = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_product'\");
						"."$"."_sql->execute();
						"."$"."_resultset = "."$"."_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
							"."$"."nucleos_console = "."$"."_resultset[\"nucleos_console\"];
							"."$"."unidades_comp_console = "."$"."_resultset[\"unidades_comp_console\"];
							"."$"."sup_hdr_console = "."$"."_resultset[\"sup_hdr_console\"];
							"."$"."midia_console = "."$"."_resultset[\"midia_console\"];
							"."$"."memoria_ram_console = "."$"."_resultset[\"memoria_ram_console\"];
							"."$"."hd_console = "."$"."_resultset[\"hd_console\"];
							"."$"."peso_console = "."$"."_resultset[\"peso_console\"];
	      "."$"."tipo_memoria_console = "."$"."_resultset[\"tipo_memoria_console\"];
					?>
			<table id='customers'>

					<tr>
							<td style='width: 30%;'>Núcleos</td>
							<td><?php echo "."$"."nucleos_console?></td>
					</tr>
					<tr>
							<td>Unidades Computacionais</td>
							<td><?php echo "."$"."unidades_comp_console?></td>
					</tr>
					<tr>
							<td>Suporte para HDR</td>
							<td><?php echo "."$"."sup_hdr_console?></td>
					</tr>
					<tr>
							<td>Midia</td>
							<td><?php echo "."$"."midia_console?></td>
					</tr>
					<tr>
							<td>Memoria RAM</td>
							<td><?php echo "."$"."memoria_ram_console.'GB'?></td>
					</tr>
					<tr>
							<td>HD</td>
							<td><?php echo "."$"."hd_console.'GB'?></td>
					</tr>
					<tr>
							<td>Peso</td>
							<td><?php echo number_format("."$"."peso_console, 2,',','.').' Kg';?></td>
					</tr>
					<tr>
							<td>Tipo de Memória</td>
							<td><?php echo "."$"."tipo_memoria_console?></td>
					</tr>
			</table><br>
		<?php }?>
			
			
					<?php


						if('$_prod_type' == 'Monitor'){
						
						"."$"."_sql = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_product'\");
						"."$"."_sql->execute();
						"."$"."_resultset = "."$"."_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
							"."$"."tamanho_monitor = "."$"."_resultset[\"tamanho_monitor\"];
							"."$"."resolucao_monitor = "."$"."_resultset[\"resolucao_monitor\"];
							"."$"."tempo_resposta_monitor = "."$"."_resultset[\"tempo_resposta_monitor\"];
							"."$"."taxa_atualizacao_monitor = "."$"."_resultset[\"taxa_atualizacao_monitor\"];
							"."$"."painel_monitor = "."$"."_resultset[\"painel_monitor\"];
							"."$"."conexoes_monitor = "."$"."_resultset[\"conexoes_monitor\"];
							"."$"."usb_monitor = "."$"."_resultset[\"usb_monitor\"];
	
					?>
			<table id='customers'>

					<tr>
							<td style='width: 30%;'>Tamanho</td>
							<td><?php echo "."$"."tamanho_monitor?></td>
					</tr>
					<tr>
							<td>Resolução</td>
							<td><?php echo "."$"."resolucao_monitor?></td>
					</tr>
					<tr>
							<td>Tempo de Resposta</td>
							<td><?php echo "."$"."tempo_resposta_monitor?></td>
					</tr>
					<tr>
							<td>Taxa de Atualização</td>
							<td><?php echo "."$"."taxa_atualizacao_monitor?></td>
					</tr>
					<tr>
							<td>Painel</td>
							<td><?php echo "."$"."painel_monitor?></td>
					</tr>
					<tr>
							<td>Conexões</td>
							<td><?php echo "."$"."conexoes_monitor?></td>
					</tr>
					<tr>
							<td>Porta USB</td>
							<td><?php echo "."$"."usb_monitor?></td>
					</tr>
			</table><br>
		<?php }?>
		
		
		
		
		
		<?php

						if('$_prod_type' == 'Tablet'){
						
						"."$"."_sql = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_product'\");
						"."$"."_sql->execute();
						"."$"."_resultset = "."$"."_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
							"."$"."sistema_op_tablet = "."$"."_resultset[\"sistemaop_tablet\"];
							"."$"."tamanho_tablet = "."$"."_resultset[\"tamanho_tablet\"];
							"."$"."resolucao_tablet = "."$"."_resultset[\"resolucao_tablet\"];
							"."$"."ram_tablet = "."$"."_resultset[\"ram_tablet\"];
							"."$"."capac_bateria_tablet = "."$"."_resultset[\"capac_bateria_tablet\"];
							"."$"."armazenamento_tablet = "."$"."_resultset[\"armazenamento_tablet\"];
							"."$"."nucleos_tablet = "."$"."_resultset[\"nucleos_tablet\"];
	
					?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Sistema Operacional</td>
							<td><?php echo "."$"."sistema_op_tablet?></td>
					</tr>
					
					<tr>
							<td>Tamanho</td>
							<td><?php echo "."$"."tamanho_tablet.' Polegadas'?></td>
					</tr>
					<tr>
							<td>Resolução</td>
							<td><?php echo "."$"."resolucao_tablet?></td>
					</tr>
					<tr>
							<td>Memória RAM</td>
							<td><?php echo "."$"."ram_tablet?></td>
					</tr>
					<tr>
							<td>Capacidade da Bateria</td>
							<td><?php echo "."$"."capac_bateria_tablet?></td>
					</tr>
					<tr>
							<td>Armazenamento Interno</td>
							<td><?php echo "."$"."armazenamento_tablet?></td>
					</tr>
					<tr>
							<td>Núcleos</td>
							<td><?php echo "."$"."nucleos_tablet?></td>
					</tr>

			</table><br>
	<?php }?>
								
								
								
								
			<?php

						if('$_prod_type' == 'Computador'){
						
						"."$"."_sql = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_product'\");
						"."$"."_sql->execute();
						"."$"."_resultset = "."$"."_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
		 "."$"."sistemaop_computador = "."$"."_resultset[\"sistemaop_computador\"];
		 "."$"."marca_placamae_computador = "."$"."_resultset[\"marca_placamae_computador\"];
		 "."$"."formato_placamae_computador = "."$"."_resultset[\"formato_placamae_computador\"];
			"."$"."memoria_compativel_computador = "."$"."_resultset[\"memoria_compativel_computador\"];
			"."$"."video_integrado_computador = "."$"."_resultset[\"video_integrado_computador\"];
			"."$"."tipo_memoria_ram_computador = "."$"."_resultset[\"tipo_memoria_ram_computador\"];
			"."$"."capacidade_ram_computador = "."$"."_resultset[\"capacidade_ram_computador\"];
			"."$"."potencia_fonte_computador = "."$"."_resultset[\"potencia_fonte_computador\"];
			"."$"."cabeamento_fonte_computador = "."$"."_resultset[\"cabeamento_fonte_computador\"];
			"."$"."tipo_armazenamento_computador = "."$"."_resultset[\"tipo_armazenamento_computador\"];
			"."$"."armazenamento_disco_computador = "."$"."_resultset[\"armazenamento_disco_computador\"];
			"."$"."fabricante_chipset_computador = "."$"."_resultset[\"fabricante_chipset_computador\"];
			"."$"."marca_processador_computador = "."$"."_resultset[\"marca_processador_computador\"];
			
				?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Sistema Operacional</td>
							<td><?php echo "."$"."sistemaop_computador?></td>
					</tr>
					
					<tr>
							<td>Placa Mãe</td>
							<td><?php echo "."$"."marca_placamae_computador?></td>
					</tr>
					<tr>
							<td>Formato da Placa Mãe</td>
							<td><?php echo "."$"."formato_placamae_computador?></td>
					</tr>
					<tr>
							<td>Memória Compatível</td>
							<td><?php echo "."$"."memoria_compativel_computador?></td>
					</tr>
				
					<tr>
						<td>Processador</td>
						<td>
						<?php

								if("."$"."marca_processador_computador === 'Intel'){
									echo 'Intel';
						}else if("."$"."marca_processador_computador === 'AMD'){
							  echo 'AMD';
									}
							?>
					</tr>
					
					<tr>
					<td>Geração do Processador</td>
						<td>
						<?php
									if("."$"."marca_processador_computador === 'Intel'){
									"."$"."geracao_processador_intel_computador = "."$"."_resultset[\"geracao_processador_intel_computador\"];
									echo "."$"."geracao_processador_intel_computador;
									
						}else if("."$"."marca_processador_computador === 'AMD'){
							  "."$"."geracao_processador_amd_computador = "."$"."_resultset[\"geracao_processador_amd_computador\"];
									echo "."$"."geracao_processador_amd_computador;
									}
							?>
					</tr>
					
					<tr>
					<?php ?>
							<td>Processador com vídeo integrado</td>
							<td><?php echo "."$"."video_integrado_computador?></td>
					</tr>
					<tr>
							<td>Tipo de Memória RAM</td>
							<td><?php echo "."$"."tipo_memoria_ram_computador?></td>
					</tr>
					<tr>
							<td>Memória RAM</td>
							<td><?php echo "."$"."capacidade_ram_computador?></td>
					</tr>
					<tr>
							<td>Potência da Fonte</td>
							<td><?php echo "."$"."potencia_fonte_computador?></td>
					</tr>
					<tr>
							<td>Cabeamento da Fonte</td>
							<td><?php echo "."$"."cabeamento_fonte_computador?></td>
					</tr>
					<tr>
							<td>Disco de Armazenamento</td>
							<td><?php echo "."$"."tipo_armazenamento_computador?></td>
					</tr>
					<tr>
							<td>Armazenamento em Disco</td>
							<td><?php echo "."$"."armazenamento_disco_computador?></td>
					</tr>
					<tr>
							<td>Fabricante do Chipset</td>
							<td><?php echo "."$"."fabricante_chipset_computador?></td>
					</tr>

			</table><br>
		<?php }?>
											
		<?php
				if('$_prod_type' == 'Notebook'){
						
						"."$"."_sql = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_product'\");
						"."$"."_sql->execute();
						"."$"."_resultset = "."$"."_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
		 "."$"."sistemaop_notebook = "."$"."_resultset[\"sistemaop_notebook\"];
		 "."$"."tamanho_tela_notebook = "."$"."_resultset[\"tamanho_tela_notebook\"];
		 "."$"."resolucao_notebook = "."$"."_resultset[\"resolucao_notebook\"];
			"."$"."tipo_memoria_notebook = "."$"."_resultset[\"tipo_memoria_notebook\"];
			"."$"."armazenamento_notebook = "."$"."_resultset[\"armazenamento_notebook\"];
			"."$"."memoria_ram_notebook = "."$"."_resultset[\"memoria_ram_notebook\"];
			"."$"."placa_dedicada_notebook = "."$"."_resultset[\"placa_dedicada_notebook\"];
			"."$"."peso_notebook = "."$"."_resultset[\"peso_notebook\"];
			"."$"."marca_processador_notebook = "."$"."_resultset[\"marca_processador_notebook\"];

				?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Sistema Operacional</td>
							<td><?php echo "."$"."sistemaop_notebook?></td>
					</tr>
					
					<tr>
							<td>Tamanho da Tela</td>
							<td><?php echo "."$"."tamanho_tela_notebook?></td>
					</tr>
					<tr>
							<td>Resolução</td>
							<td><?php echo "."$"."resolucao_notebook?></td>
					</tr>
					<tr>
							<td>Tipo de Memória</td>
							<td><?php echo "."$"."tipo_memoria_notebook?></td>
					</tr>
				
					<tr>
						<td>Processador</td>
						<td>
						
						<?php 
								if("."$"."marca_processador_notebook === 'Intel'){
									echo 'Intel';
						}else if("."$"."marca_processador_notebook === 'AMD'){
							  echo 'AMD';
									}
							?>
					</tr>
					
					<tr>
					<td>Geração do Processador</td>
						<td>
						<?php
									if("."$"."marca_processador_notebook === 'Intel'){
									"."$"."geracao_processador_intel_notebook = "."$"."_resultset[\"geracao_processador_intel_notebook\"];
									echo "."$"."geracao_processador_intel_notebook;
									
						}else if("."$"."marca_processador_notebook === 'AMD'){
							  "."$"."geracao_processador_amd_notebook = "."$"."_resultset[\"geracao_processador_amd_notebook\"];
									echo "."$"."geracao_processador_amd_notebook;
									}
							?>
					</tr>
					
					<tr>
					<?php ?>
							<td>Armazenamento Interno</td>
							<td><?php echo "."$"."armazenamento_notebook?></td>
					</tr>
					<tr>
							<td>Memória RAM</td>
							<td><?php echo "."$"."memoria_ram_notebook?></td>
					</tr>
					
							
					<tr>
							<td>Placa de vídeo dedicada</td>
							<td><?php echo "."$"."placa_dedicada_notebook?></td>
					</tr>
					<tr>
							<td>Peso</td>
							<td><?php echo "."$"."peso_notebook.' Kg'?></td>
					</tr>
					
			</table><br>
		<?php }?>
		
		<?php
		
		if('$_prod_type' == 'Jogo'){
						
						"."$"."_sql = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_product'\");
						"."$"."_sql->execute();
						"."$"."_resultset = "."$"."_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
		 "."$"."plataforma_jogo = "."$"."_resultset[\"plataforma_jogo\"];
		 "."$"."multijogador_jogo = "."$"."_resultset[\"multijogador_jogo\"];
		 "."$"."online_jogo = "."$"."_resultset[\"online_jogo\"];
			"."$"."formato_jogo = "."$"."_resultset[\"formato_jogo\"];
			"."$"."data_lanc_jogo = "."$"."_resultset[\"data_lanc_jogo\"];
			"."$"."genero_jogo = "."$"."_resultset[\"genero_jogo\"];


				?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Plataforma</td>
							<td><?php echo "."$"."plataforma_jogo?></td>
					</tr>
					
					<tr>
							<td>Multijogador</td>
							<td><?php echo "."$"."multijogador_jogo?></td>
					</tr>
					<tr>
							<td>Online</td>
							<td><?php echo "."$"."online_jogo?></td>
					</tr>
					<tr>
							<td>Midia</td>
							<td><?php echo "."$"."formato_jogo?></td>
					</tr>
					
			  <tr>
							<td>Data de Lançamento</td>
							<td><?php  echo date('d/m/Y', strtotime("."$"."data_lanc_jogo));?></td>
					</tr>
					
					<tr>
							<td>Gênero</td>
							<td><?php echo "."$"."genero_jogo?></td>
					</tr>
					
			</table><br>
		<?php }?>
		
		
		<?php
		if('$_prod_type' == 'Cadeira'){
						
						"."$"."_sql = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_product'\");
						"."$"."_sql->execute();
						"."$"."_resultset = "."$"."_sql->fetch(PDO::FETCH_ASSOC);
		
							/*Pegar configurações de cada Produto*/
		 "."$"."braco_ajustavel_cadeira = "."$"."_resultset[\"braco_ajustavel_cadeira\"];
		 "."$"."altura_ajustavel_cadeira = "."$"."_resultset[\"altura_ajustavel_cadeira\"];
		 "."$"."inclinacao_ajustavel_cadeira = "."$"."_resultset[\"inclinacao_ajustavel_cadeira\"];
			"."$"."altura_cadeira = "."$"."_resultset[\"altura_cadeira\"];
			"."$"."largura_cadeira = "."$"."_resultset[\"largura_cadeira\"];
			"."$"."rodas_giratorias_cadeira = "."$"."_resultset[\"rodas_giratorias_cadeira\"];
			"."$"."peso_max_suportavel_cadeira = "."$"."_resultset[\"peso_max_suportavel_cadeira\"];
			"."$"."e_gamer_cadeira = "."$"."_resultset[\"e_gamer_cadeira\"];
			"."$"."encosto_reclinavel_cadeira = "."$"."_resultset[\"encosto_reclinavel_cadeira\"];
			"."$"."ergonomica_cadeira = "."$"."_resultset[\"ergonomica_cadeira\"];
				?>
			<table id='customers'>
			
					<tr>
							<td style='width: 30%;'>Braço Ajustável</td>
							<td><?php echo "."$"."braco_ajustavel_cadeira?></td>
					</tr>
					
					<tr>
							<td>Altura Ajustável</td>
							<td><?php echo "."$"."altura_ajustavel_cadeira?></td>
					</tr>
					<tr>
							<td>Inclinação Ajustável</td>
							<td><?php echo "."$"."inclinacao_ajustavel_cadeira?></td>
					</tr>
					<tr>
							<td>Altura</td>
							<td><?php echo "."$"."altura_cadeira.'cm'?></td>
					</tr>
					
			  <tr>
							<td>Largura</td>
							<td><?php echo "."$"."largura_cadeira.'cm'?></td>
					</tr>
					
					<tr>
							<td>Rodas Giratórias</td>
							<td><?php echo "."$"."rodas_giratorias_cadeira?></td>
					</tr>
					
					<tr>
							<td>Peso Máximo Suportável</td>
							<td><?php echo "."$"."peso_max_suportavel_cadeira.'kg'?></td>
					</tr>
					
					<tr>
							<td>É gamer?</td>
							<td><?php echo "."$"."e_gamer_cadeira?></td>
					</tr>
					
					<tr>
							<td>Encosto Reclinável</td>
							<td><?php echo "."$"."encosto_reclinavel_cadeira?></td>
					</tr>
					
					<tr>
							<td>É ergonômica?</td>
							<td><?php echo "."$"."ergonomica_cadeira?></td>
					</tr>
					
			</table><br>
		<?php }?>
		<div id='container-aval'>
    	<?php 
						"."$"."_getAval = "."$"."_pdo->prepare(\"SELECT * FROM avalia_prods WHERE prod_aval = '$_product'\");
						"."$"."_getAval->execute();
						"."$"."_getAvalFetch = "."$"."_getAval->fetchAll(PDO::FETCH_ASSOC);

							"."$"."_getAvalAverage = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Nome_Produto = '$_product'\");
							"."$"."_getAvalAverage->execute();
							"."$"."_getAvalAverageFetch = "."$"."_getAvalAverage->fetch(PDO::FETCH_ASSOC);
							?>
							<div id='aval-average'>
											<img src='../img/star_yellow.png' id='star-average'>
											<b><?php echo number_format("."$"."_getAvalAverageFetch['aval_media'],2,'.');?></b>
								</div>
						<div class='glider-contain multiple'>
							<div class='glider'>
				<?php foreach("."$"."_getAvalFetch as "."$"."_getAvalFetchFC){?>						
								<div id='content-aval'>
								 <div id='div-username'>
								 <b id='comment'><?php echo "."$"."_getAvalFetchFC['comentarios'];?></b><br><br>
								 <b><?php echo "."$"."_getAvalFetchFC['nome_cliente_aval'];?></b><br>
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
								<div class='glider2'>
												<?php
												"."$"."_offer = "."$"."_pdo->prepare(\"SELECT * FROM produtos WHERE Tipo_Produto = '$_prod_type' LIMIT 16\");
												"."$"."_offer->execute();
												"."$"."_resultset = "."$"."_offer->fetchAll(PDO::FETCH_ASSOC);
												"."$"."_resultsetfetch = "."$"."_offer->fetch(PDO::FETCH_ASSOC);
												
												foreach("."$"."_resultset as "."$"."_line){	
													"."$"."_linkprod = "."$"."_line['Nome_Produto'];
												?>

								<button class='idbestseller'> 
           
															<?php
																			if(isset("."$"."idCliente)){

																?>
																	<a id='wishes-list-a' href='../inserts/insertWishes.php?npw=<?php echo "."$"."_linkprod?>&imgdsj=<?php echo "."$"."_line['Imagem_Produto']?>'>
																						<i class='material-icons sixth-icon' style='font-size: 1.8rem;' id='icon-wishes'>loyalty</i>
																	</a> 
														<?php
																	foreach("."$"."_getAllWishesFetchAll as "."$"."_getAllWishesFetch){

																	if("."$"."_line['Nome_Produto']=="."$"."_getAllWishesFetch['nome_prod_desej']){ 
															?>

														<a id='wishes-list-a' href='#'>
																		<i class='material-icons sixth-icon' style='font-size: 1.8rem;color:#e86332' id='icon-wishes'>loyalty</i>
														</a> 
													<?php }?>
									<?php }?>
								<?php }?>                                
										<a href='../products/<?php echo "."$"."_line['Nome_Produto']?>'>

											<img src='../upload/<?php echo "."$"."_line['Imagem_Produto']?>'>
									<div class='nome1-bestseller'>
										<h5><?php echo "."$"."_line['Nome_Produto']?></h5><br>
										<div id='div-star-img'>
										<img src='../img/star_yellow.png' id='star1'>
										<img src='../img/star_yellow.png' id='star2'>
										<img src='../img/star_yellow.png' id='star3'>
										<img src='../img/star_yellow.png' id='star4'>
										<img src='../img/star_yellow.png' id='star5'>
											<b><?php echo '('."."$"."_line['qnt_aval'].')';?></b>
										</div>
										<div id='qnt-oferta-style'>
											<h4>
												<b><?php echo "."$"."_line['qnt_oferta']?>%</b>
												<img src='../img/arrow-down.svg'>
											</h4>
									</div>
										<div id='flex-precos'>
											<h2 id='preco'>R$<?php echo number_format("."$"."_line['Preco_Produto'], 2,',','.');?></h2>

											<h2 id='preco-offer'>
											R$<?php echo number_format("."$"."_line['Preco_Produto'] - ("."$"."_line['Preco_Produto'] / 100) * "."$"."_line['qnt_oferta'], 2,',','.')?>
											</h2>
										</div>
										<div style='font-size: 13px;margin-top: 10px;margin-left: 2.5%;margin-right: 2.5%;'>
												R$ <?php
													"."$"."vistAux = ("."$"."_line['Preco_Produto'] - ("."$"."_line['Preco_Produto'] / 100) * "."$"."_line['qnt_oferta']) / 10;
													echo number_format("."$"."_line['Preco_Produto'] - ("."$"."_line['Preco_Produto'] / 100) * "."$"."_line['qnt_oferta'] - "."$"."vistAux, 2, ',', '.');
											?> 
												a vista com desconto boleto ou 
											<?php 
											"."$"."precojuros = "."$"."_line['Preco_Produto'] - ("."$"."_line['Preco_Produto'] / 100) * "."$"."_line['qnt_oferta'];

											"."$"."precojurosaux = "."$"."precojuros / 5;
											if("."$"."precojuros <=2500 and "."$"."precojuros < 2501){echo '5x de R$'. number_format("."$"."precojurosaux, 2, ',','.');}
											"."$"."precojurosaux = "."$"."precojuros / 10;
											if("."$"."precojuros >=2501 and "."$"."precojuros <= 4000){echo '10x de R$' .number_format("."$"."precojurosaux, 2, ',','.');}
											"."$"."precojurosaux = "."$"."precojuros / 15;
											if("."$"."precojuros >=4001 and "."$"."precojuros <= 7000){echo '15x de R$'.number_format("."$"."precojurosaux, 2, ',','.');}
											"."$"."precojurosaux = "."$"."precojuros / 20;
											if("."$"."precojuros >=7001 and "."$"."precojuros <= 9000){echo '20x de R$'.number_format("."$"."precojurosaux, 2, ',','.');}
											"."$"."precojurosaux = "."$"."precojuros / 25;
											if("."$"."precojuros >=9001 and "."$"."precojuros <= 11000){echo '25x de R$'.number_format("."$"."precojurosaux, 2, ',','.');}
											"."$"."precojurosaux = "."$"."precojuros / 30;
											if("."$"."precojuros >=11001 and "."$"."precojuros < 14000){echo '30x de R$'. number_format("."$"."precojurosaux, 2, ',','.');}

											"."$"."precojurosaux = "."$"."precojuros / 35;
											if("."$"."precojuros >=14000){echo '35x de R$'.number_format("."$"."precojurosaux, 2, ',','.');}

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
				$gliderJs
		 </body>
		</html>";
    print $link;

		
			$auxPageName = "$_product.php";
			$pagename = $auxPageName;
			$fp = fopen($pagename , "w");
			$fw = fwrite($fp, $link);
		
		if($fp == false) {
		   die('Não foi possível criar o arquivo');
		}else{
		   echo "<div style='font-family: 'Yantramanav',sans-serif;font-size: 20px;>O produto $pagename foi inserido com sucesso!</div>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	
</body>
</html>