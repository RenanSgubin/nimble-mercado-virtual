<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET["search"]?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
   <div id="container-query">
   	<?php
					require_once("../conexao/db.php");
					$query = $_GET["search"];
					$queryBD = $_pdo->prepare("SELECT * FROM produtos WHERE Marca_Produto LIKE '$query%' OR Nome_Produto LIKE '$query%' OR Tipo_Produto LIKE '$query%'");
					$queryBD->execute();
					$count = $queryBD->rowCount();
					$queryBDResultFetchAll = $queryBD->fetchAll(PDO::FETCH_ASSOC);
					$queryBDResultFetch = $queryBD->fetch(PDO::FETCH_ASSOC);
   ?>
   <?php foreach($queryBDResultFetchAll as $queryBDResultFetchAllFC){}?>
   <div id="container-filter">
						<?php if($queryBDResultFetchAllFC["Tipo_Produto"] == "Monitor"){?>
							<div class="content-filter">
							 <b class="filter-title"><?php echo $query?></b><br>
							  <?php echo "$count resultados";?><br><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tamanho de Tela</b><br><br>
								  <a href="#">13" Polegadas</a>&nbsp;&nbsp;
								  <a href="#">14" Polegadas</a><br>
								  <a href="#">15" Polegadas</a>&nbsp;&nbsp;
								  <a href="#">17" Polegadas</a><br>
								  <a href="#">19" Polegadas</a>&nbsp;&nbsp;
								  <a href="#">21" Polegadas</a><br>
								  <a href="#">23" Polegadas</a>&nbsp;&nbsp;
								  <a href="#">24" Polegadas</a><br>
								  <a href="#">28" Polegadas</a>&nbsp;&nbsp;
								  <a href="#">29" Polegadas</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Resolução</b><br><br>
								  <a href="#">SVGA</a><br>
								  <a href="#">FULL HD</a><br>
								  <a href="#">FULL HD+</a><br>
								  <a href="#">QUAD HD</a><br>
								  <a href="#">4K</a><br>
								  <a href="#">8K</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tempo de Resposta</b><br><br>
								  <a href="#">1ms</a>&nbsp;&nbsp;
								  <a href="#">2ms</a><br>
								  <a href="#">3ms</a>&nbsp;&nbsp;
								  <a href="#">4ms</a><br>
								  <a href="#">5ms</a>&nbsp;&nbsp;
								  <a href="#">6ms+</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Taxa de Atualização</b><br><br>
								  <a href="#">60Hz</a><br>
								  <a href="#">75Hz</a><br>
								  <a href="#">85Hz</a><br>
								  <a href="#">120Hz</a><br>
								  <a href="#">144Hz</a><br>
								  <a href="#">240Hz</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Painel</b><br><br>
								  <a href="#">TN</a><br>
								  <a href="#">IPS</a><br>
								  <a href="#">VA</a><br>
								  <a href="#">AMOLED</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Conexões</b><br><br>
								  <a href="#">Display Port</a><br>
								  <a href="#">HDMI</a><br>
								  <a href="#">VGA</a><br>
								  <a href="#">HDMI/VGA</a><br>
								  <a href="#">HDMI/Display Port</a><br>
								  <a href="#">VGA/Display Port</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Com porta USB</b><br><br>
								  <a href="#">Sim</a><br>
								  <a href="#">Não</a><br>
							 </div><br>
							</div>
						<?php }?>
						
						
						<!--Tipo Console-->
				<?php if($queryBDResultFetchAllFC["Tipo_Produto"] == "Console"){?>
							<div class="content-filter">
							 <b class="filter-title"><?php echo $query?></b><br>
							  <?php echo "$count resultados";?><br><br>
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
						<?php }?>				
				
				
				<!--Tipo Tablet-->
				<?php if($queryBDResultFetchAllFC["Tipo_Produto"] == "Tablet"){?>
							<div class="content-filter">
							 <b class="filter-title"><?php echo $query?></b><br>
							  <?php echo "$count resultados";?><br><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Sistema Operacional</b><br><br>
								  <a href="#">Android</a><br>
								  <a href="#">iOS</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tamanho</b><br><br>
								  <a href="#">7 Polegadas</a><br>
								  <a href="#">8 Polegadas</a><br>
								  <a href="#">9 Polegadas</a><br>
								  <a href="#">10+ Polegadas</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Resolução</b><br><br>
								  <a href="#">HD</a><br>
								  <a href="#">FULL HD</a><br>
								  <a href="#">2K</a><br>
								  <a href="#">4K</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Memória RAM</b><br><br>
								  <a href="#">2GB</a><br>
								  <a href="#">3GB</a><br>
								  <a href="#">4GB</a><br>
								  <a href="#">6GB</a><br>
								  <a href="#">8GB</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Capacidade de Bateria</b><br><br>
								  <a href="#">4450mAh</a><br>
								  <a href="#">5100mAh</a><br>
								  <a href="#">5124mAh</a><br>
								  <a href="#">7040mAh</a><br>
								  <a href="#">8000mAh</a><br>
								  <a href="#">8827mAh</a><br>
								  <a href="#">9720mAh+</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Armazenamento Interno</b><br><br>
								  <a href="#">16GB</a><br>
								  <a href="#">32GB</a><br>
								  <a href="#">64GB</a><br>
								  <a href="#">128GB</a><br>
								  <a href="#">256GB</a><br>
								  <a href="#">512GB</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Núcleos</b><br><br>
								  <a href="#">2 Núcleos</a><br>
								  <a href="#">3 Núcleos</a><br>
								  <a href="#">4 Núcleos</a><br>
								  <a href="#">5 Núcleos</a><br>
								  <a href="#">6 Núcleos</a><br>
								  <a href="#">7 Núcleos</a><br>
								  <a href="#">8 Núcleos</a><br>
							 </div>
							</div>
						<?php }?>	
						
						
						<!--Tipo Computador-->
				<?php if($queryBDResultFetchAllFC["Tipo_Produto"] == "Computador"){?>
							<div class="content-filter">
							 <b class="filter-title"><?php echo $query?></b><br>
							  <?php echo "$count resultados";?><br><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Sistema Operacional</b><br><br>
								  <a href="#">Microsoft Windows</a><br>
								  <a href="#">MacOS</a><br>
								  <a href="#">Linux</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Placa Mãe</b><br><br>
								  <a href="#">Aorus</a><br>
								  <a href="#">ASRock</a><br>
								  <a href="#">Asus</a><br>
								  <a href="#">Bluecase</a><br>
								  <a href="#">GigaByte</a><br>
								  <a href="#">MSI</a><br>
								  <a href="#">PCWARE</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Formato da Placa Mãe</b><br><br>
								  <a href="#">ATX</a><br>
								  <a href="#">Extended ATX</a><br>
								  <a href="#">Micro ATX</a><br>
								  <a href="#">Mini ITX</a><br>
								  <a href="#">uATX</a><br>
								  <a href="#">Mini STX</a><br>
								  <a href="#">XL-ATX</a><br>
								  <a href="#">Mini-DTX</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tipo de Memória</b><br><br>
								  <a href="#">DDR3</a><br>
								  <a href="#">DDR4</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Marca do Processador</b><br><br>
								  <a href="#">Intel</a><br>
								  <a href="#">AMD</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Geração de Processador Intel</b><br><br>
								  <a href="#">Intel® Primeira Geração</a><br>
								  <a href="#">Intel® Segunda Geração</a><br>
								  <a href="#">Intel® Terceira Geração</a><br>
								  <a href="#">Intel® Quarta Geração</a><br>
									 <a href="#">Intel® Quinta Geração</a><br>
									 <a href="#">Intel® Sexta Geração</a><br>
									 <a href="#">Intel® Sétima Geração</a><br>
									 <a href="#">Intel® Oitava Geração</a><br>
									 <a href="#">Intel® Nona Geração</a><br>
									 <a href="#">Intel® Décima Geração</a><br>
									 <a href="#">Intel® Décima Primeira Geração</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Geração de Processador AMD</b><br><br>
								  <a href="#">AMD: Gen 1000</a><br>
								  <a href="#">AMD: Gen 2000</a><br>
								  <a href="#">AMD: Gen 3000</a><br>
									 <a href="#">AMD: Gen 5000</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Com vídeo integrado</b><br><br>
								  <a href="#">Sim</a><br>
								  <a href="#">Não</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tipo de Memória RAM</b><br><br>
								  <a href="#">DDR3</a><br>
								  <a href="#">DDR4</a><br>
								  <a href="#">DDR3L</a><br>
								  <a href="#">M.2</a><br>
								  <a href="#">Optane</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Memória RAM</b><br><br>
								  <a href="#">4GB</a><br>
								  <a href="#">8GB</a><br>
								  <a href="#">16GB</a><br>
								  <a href="#">32GB</a><br>
								  <a href="#">64GB</a><br>
								  <a href="#">128GB</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Potência da Fonte</b><br><br>
								  <a href="#">100W+</a><br>
								  <a href="#">300W+</a><br>
								  <a href="#">500W+</a><br>
								  <a href="#">800W+</a><br>
								  <a href="#">1200W+</a><br>
								  <a href="#">1600W+</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Cabeamento de Fonte</b><br><br>
								  <a href="#">Semi Modular</a><br>
								  <a href="#">Full Modular</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tipo de Armazenamento</b><br><br>
								  <a href="#">HD</a><br>
								  <a href="#">SSD</a><br>
								  <a href="#">HD e SSD</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Armazenamento em Disco</b><br><br>
								  <a href="#">120GB</a><br>
								  <a href="#">240GB</a><br>
								  <a href="#">480GB</a><br>
								  <a href="#">520GB</a><br>
								  <a href="#">980GB</a><br>
									 <a href="#">1TB</a><br>
									 <a href="#">2TB</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Chipset</b><br><br>
								  <a href="#">NVIDIA</a><br>
								  <a href="#">RADEON</a><br>
							 </div>
							</div>
						<?php }?>	
						
						
						<!--Tipo Notebook-->
				<?php if($queryBDResultFetchAllFC["Tipo_Produto"] == "Notebook"){?>
							<div class="content-filter">
							 <b class="filter-title"><?php echo $query?></b><br>
							  <?php echo "$count resultados";?><br><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Sistema Operacional</b><br><br>
								  <a href="#">Microsoft Windows</a><br>
								  <a href="#">MacOS</a><br>
								  <a href="#">Linux</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Marca do Processador</b><br><br>
								  <a href="#">Intel</a><br>
								  <a href="#">AMD</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Geração de Processador Intel</b><br><br>
								  <a href="#">Intel® Primeira Geração</a><br>
								  <a href="#">Intel® Segunda Geração</a><br>
								  <a href="#">Intel® Terceira Geração</a><br>
								  <a href="#">Intel® Quarta Geração</a><br>
									 <a href="#">Intel® Quinta Geração</a><br>
									 <a href="#">Intel® Sexta Geração</a><br>
									 <a href="#">Intel® Sétima Geração</a><br>
									 <a href="#">Intel® Oitava Geração</a><br>
									 <a href="#">Intel® Nona Geração</a><br>
									 <a href="#">Intel® Décima Geração</a><br>
									 <a href="#">Intel® Décima Primeira Geração</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Geração de Processador AMD</b><br><br>
								  <a href="#">AMD: Gen 1000</a><br>
								  <a href="#">AMD: Gen 2000</a><br>
								  <a href="#">AMD: Gen 3000</a><br>
									 <a href="#">AMD: Gen 5000</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tamanho</b><br><br>
								  <a href="#">11 Polegadas</a><br>
								  <a href="#">12 Polegadas</a><br>
								  <a href="#">13 Polegadas</a><br>
								  <a href="#">14 Polegadas</a><br>
								  <a href="#">15 Polegadas</a><br>
								  <a href="#">16 Polegadas</a><br>
								  <a href="#">17 Polegadas</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Resolução</b><br><br>
								  <a href="#">HD</a><br>
								  <a href="#">FULL HD</a><br>
								  <a href="#">QUAD HD</a><br>
								  <a href="#">Padrão</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tipo de Armazenamento</b><br><br>
								  <a href="#">HD</a><br>
								  <a href="#">SSD</a><br>
								  <a href="#">HD e SSD</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Armazenamento em Disco</b><br><br>
								  <a href="#">128GB</a><br>
								  <a href="#">256GB</a><br>
								  <a href="#">512GB</a><br>
									 <a href="#">1TB</a><br>
									 <a href="#">2TB</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Memória RAM</b><br><br>
								  <a href="#">4GB</a><br>
								  <a href="#">8GB</a><br>
								  <a href="#">16GB</a><br>
								  <a href="#">32GB</a><br>
								  <a href="#">64GB</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Placa de Vídeo Dedicada</b><br><br>
								  <a href="#">Sim</a><br>
								  <a href="#">Não</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Peso</b><br><br>
								  <a href="#">1KG</a><br>
								  <a href="#">2KG</a><br>
								  <a href="#">3KG</a><br>
								  <a href="#">4KG</a><br>
								  <a href="#">5KG</a><br>
							 </div><br>
							</div>
						<?php }?>	
						
						
						<!--Tipo Jogo-->
				<?php if($queryBDResultFetchAllFC["Tipo_Produto"] == "Jogo"){?>
							<div class="content-filter">
							 <b class="filter-title"><?php echo $query?></b><br>
							  <?php echo "$count resultados";?><br><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Plataforma</b><br><br>
								   <a href="#">Computador</a><br>
											<a href="#">PS4</a><br>
											<a href="#">PS5</a><br>
											<a href="#">PS4 e PS5</a><br>
											<a href="#">Xbox 360</a><br>
											<a href="#">Xbox One +</a><br>
											<a href="#">Xbox 360 e Xbox One</a><br>
											<a href="#">Computador e Xbox One+</a><br>
											<a href="#">Computador e PS4</a><br>
											<a href="#">Computador e PS5</a><br>
											<a href="#">Computador e Xbox 360</a><br>
											<a href="#">Computador, PS4, PS5, Xbox 360 e Xbox One+</a><br>
											<a href="#">Computador, PS4, PS5 e Xbox One+</a>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Estilo de Jogo</b><br><br>
								  <a href="#">Multijogador</a><br>
								  <a href="#">Um jogador</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tipo de Jogo</b><br><br>
								  <a href="#">Online</a><br>
								  <a href="#">Offline</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Mídia</b><br><br>
								  <a href="#">Fisica</a><br>
								  <a href="#">Digital</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Gênero</b><br><br>
								  <a href="#">Tiro</a><br>
								  <a href="#">Ação</a><br>
								  <a href="#">RPG</a><br>
								  <a href="#">Terror</a><br>
								  <a href="#">Suspense</a><br>
								  <a href="#">Drama</a><br>
								  <a href="#">Fanstasia</a><br>
								  <a href="#">Ficção Científica</a><br>
							 </div><br>
							</div>
						<?php }?>				
				
				<!--Tipo Cadeira-->
				<?php if($queryBDResultFetchAllFC["Tipo_Produto"] == "Cadeira"){?>
							<div class="content-filter">
							 <b class="filter-title"><?php echo $query?></b><br>
							  <?php echo "$count resultados";?><br><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Braço Ajustável</b><br><br>
								   <a href="#">Com Braço Ajustável</a><br>
											<a href="#">Sem Braço Ajustável</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Altura Ajustável</b><br><br>
								   <a href="#">Com Altura Ajustável</a><br>
											<a href="#">Sem Altura Ajustável</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Inclinação Ajustável</b><br><br>
								   <a href="#">Com Inclinação Ajustável</a><br>
											<a href="#">Sem Inclinação Ajustável</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Rodas Giratórias</b><br><br>
								   <a href="#">Com Rodas Giratórias</a><br>
											<a href="#">Sem Rodas Giratórias</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Encosto Reclinável</b><br><br>
								   <a href="#">Com Encosto Reclinável</a><br>
											<a href="#">Sem Encosto Reclinável</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Ergonomia</b><br><br>
								   <a href="#">Cadeira Ergonômica</a><br>
											<a href="#">Cadeira Não Ergonômica</a><br>
							 </div><br>
							 <div class="div-w-bg">
								  <b class="filter-type">Tipo de Cadeira</b><br><br>
								  <a href="#">Gamer</a><br>
								  <a href="#">Comum</a><br>
							 </div><br>
							</div>
						<?php }?>	
				</div>
				
				
		<div id="products-container">
   <?php
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
												<?php if($queryBDResultFetchAllFC['oferta']=="Sim"){?>
																<h4>
																	<b><?php echo $queryBDResultFetchAllFC['qnt_oferta']?>%</b>&nbsp;OFF
																</h4>
						      <?php }else{?><div id="null"></div><?php }?>
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
</body>
</html>