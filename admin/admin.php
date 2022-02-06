<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Página do Adminstrador</title>
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	</head>
	<body>
		<div id="container">
			<form method="post" enctype="multipart/form-data" class="row g-3" novalidate action="../products/insertAdmin.php?sucess=true">
			  <div class="col-md-12">
								<label for="product-name" class="form-label">Nome do Produto</label>
								<input type="text" class="form-control" name="product-name" placeholder="Ex: Iphone X PRO 64GB Dual Camera">
			  </div>
			  <div class="col-md-6">
								<label for="product-brand" class="form-label">Marca</label>
								<input type="text" class="form-control" name="product-brand" placeholder="Ex: Apple">
			  </div>
			  <div class="col-md-6">
								<label for="product-amount" class="form-label">Quantidade em Estoque</label>
								<input type="number" class="form-control" name="product-amount" placeholder="Ex: 300" >
			  </div>
			  <div class="col-md-6">
								<label for="product-price" class="form-label">Preço</label>
								<input type="number" class="form-control" name="product-price" placeholder="Ex: 7000" min="1.00" step="0.010">
			  </div>
			  <div class="col-md-6">
								<label for="product-image" class="form-label">Imagem do Produto</label>
								<input type="file" class="form-control" name="product-image">
			  </div>
			  <div class="col-md-6">
							<label for="product-extras" class="form-label">Imagens Extras</label>
							<input type="file" class="form-control" name="product-extras[]" multiple="multiple" >
			  </div>
			  <div class="col-md-6">
							<label for="product-color" class="form-label">Cor</label>
							<input type="text" class="form-control" name="product-color" placeholder="Ex: Preto" >
			  </div>
			  <div class="col-md-6">
							<label for="product-type" class="form-label">Tipo</label>
							<select class="form-select" id="id-product-type" name="product-type" onchange="getProductType()">
									<option selected>Monitor</option>
									<option>Console</option>
									<option>Tablet</option>
									<option>Computador</option>
									<option>Notebook</option>
									<option>Jogo</option>
									<option>Cadeira</option>
							</select>
			  </div>
			  <div class="col-md-6">
					<label for="offer" class="form-label">Oferta</label>
							<select class="form-select" id="idoffer" name="offer">
									<option selected>Não</option>
									<option>Sim</option>
							</select>
			  </div>
			  <div class="col-md-6">
							<label for="offer-qnt" class="form-label">Porcentagem de Desconto</label>
							<input type="text" class="form-control" name="offer-qnt" placeholder="Ex: 50">
			  </div>
			  <div class="col-md-6">
							<label for="date-offer" class="form-label">Data até a oferta acabar:</label>
							<input type="date" class="form-control" name="date-offer" placeholder="Ex: 50">
			  </div>
			  <div class="form-group">
							<label for="exampleFormControlTextarea1">Descrição do Produto</label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc-prod" required style="display: flex;flex-wrap: wrap;"></textarea>
			  </div>
			  
			  
			  
			  
			  <!--Divs escondidas baseadas na opção do select-->
					<div id="type-console" style="display: none;">
			   	<div class="col-md-6">
									<label for="resolution-monitor" class="form-label">Núcleos</label>
									<select class="form-control" id="id-celular-type" name="console-cores" required>
											<option selected>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
											<option>13</option>
											<option>14</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="resolution-monitor" class="form-label">Unidades Computacionais</label>
									<select class="form-control" id="id-celular-type" name="console-comp-unity" required>
											<option selected>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
											<option>13</option>
											<option>14</option>
											<option>15</option>
											<option>16</option>
											<option>17</option>
											<option>18</option>
											<option>19</option>
											<option>20</option>
											<option>21</option>
											<option>22</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="resolution-monitor" class="form-label">Suporte a HDR</label>
									<select class="form-control" id="id-celular-type" name="console-hdr" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="resolution-monitor" class="form-label">Tipo de Mídia</label>
									<select class="form-control" id="id-celular-type" name="console-media" required>
											<option selected>Física</option>
											<option>Digital</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="resolution-monitor" class="form-label">Memória Ram</label>
									<select class="form-control" id="id-celular-type" name="console-ram-memory" required>
											<option selected>4GB</option>
											<option>8GB</option>
											<option>12GB</option>
											<option>16GB</option>
											<option>32GB</option>
									</select>
						</div>	
						
			  	 <div class="col-md-6">
									<label for="resolution-monitor" class="form-label">HD</label>
									<select class="form-control" id="id-celular-type" name="console-memory" required>
											<option selected>500GB</option>
											<option>1TB</option>
											<option>2TB</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="resolution-monitor" class="form-label">Tipo de Memoria</label>
									<select class="form-control" id="id-celular-type" name="console-memory-type" required>
											<option selected>DDR3</option>
											<option>DDR4</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="resolution-monitor" class="form-label">Peso</label>
									<select class="form-control" id="id-celular-type" name="console-size" required>
											<option selected>2kg</option>
											<option>2.5kg</option>
											<option>3kg</option>
											<option>3.5kg</option>
											<option>4kg</option>
											<option>4.5kg</option>
											<option>5kg</option>
									</select>
			  	 </div>
			   </div>
			   
      
      <div id="type-monitor">
			   	<div class="col-md-6">
									<label for="size-monitor" class="form-label">Tamanho</label>
									<select class="form-select" id="id-celular-type" name="size-monitor">
											<option selected>13,3 Polegadas</option>
											<option>14 Polegadas</option>
										 <option>15,6 Polegadas</option>
										 <option>17,3 Polegadas</option>
										 <option>19,5 Polegadas</option>
										 <option>21,5 Polegadas</option>
										 <option>23 Polegadas</option>
										 <option>24 Polegadas</option>
										 <option>28 Polegadas</option>
										 <option>29 Polegadas</option>
									</select>
			  	 </div>
			  	 <div class="col-md-6">
									<label for="resolution-monitor" class="form-label">Resolução</label>
									<select class="form-select" id="id-celular-type" name="resolution-monitor">
											<option selected>SVGA (4:3 - LetterBox)</option>
											<option>Full HD (16:9 - WideScreen)</option>
											<option>Full HD+ (21:9 - UltraWide)</option>
											<option>Quad HD (16:9 - WideScreen)</option>
											<option>4k (16:9 - WideScreen)</option>
											<option>8k (4:3 - LetterBox)</option>
									</select>
			  	 </div>
			  	 <div class="col-md-6">
									<label for="response-time" class="form-label">Tempo de Resposta</label>
									<select class="form-select" id="id-celular-type" name="response-time-monitor">
											<option selected>1 ms</option>
											<option>2ms</option>
										 <option>3ms</option>
										 <option>4ms</option>
										 <option>5ms</option>
										 <option>6ms</option>
										 <option>7ms</option>
										 <option>8ms</option>
										 <option>9ms</option>
										 <option>10ms</option>
									</select>
			  	 </div>
			  	 <div class="col-md-6">
									<label for="refresh-rate" class="form-label">Taxa de Atualização</label>
									<select class="form-select" id="id-celular-type" name="refresh-rate-monitor">
											<option selected>60Hz</option>
											<option>75Hz</option>
											<option>85Hz</option>
											<option>120Hz</option>
										 <option>144Hz</option>
										 <option>240Hz</option>
									</select>
			  	 </div>
			  	 <div class="col-md-6">
									<label for="panel" class="form-label">Painel</label>
									<select class="form-select" id="id-celular-type" name="panel-monitor">
											<option selected>TN</option>
											<option>IPS</option>
											<option>VA</option>
											<option>AMOLED</option>
									</select>
			  	 </div>
			  	 <div class="col-md-6">
									<label for="connections" class="form-label">Conexões</label>
									<select class="form-select" id="id-celular-type" name="connections-monitor">
											<option selected>Display Port</option>
											<option>HDMI</option>
											<option>VGA</option>
											<option>HDMI/VGA</option>
											<option>HDMI/Display Port</option>
											<option>VGA/Display Port</option>
									</select>
			  	 </div>
			  	 <div class="col-md-6">
									<label for="usb" class="form-label">Porta USB</label>
									<select class="form-select" id="id-celular-type" name="usb-monitor">
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	 </div>
			   </div>
			   
			         
			               
			                     
			                           
			                                 
			                                             
      
      <div id="type-tablet" style="display: none;">
       <div class="col-md-6">
								<label for="product-tablet-type" class="form-label">Sistema Operacional</label>
									<select class="form-select" id="id-celular-type" name="operational-system-tablet" required>
											<option selected>iOS</option>
											<option>Android</option>
									</select>
			    </div>
			    
			   	<div class="col-md-6">
									<label for="size-tablet" class="form-label">Tamanho</label>
									<select class="form-select" id="id-celular-type" name="size-tablet" required>
											<option selected>7 polegadas</option>
                <option>7,9 polegadas</option>
								        <option>8 polegadas</option>
																<option>9 polegadas</option>
																<option>10,2 polegadas</option>
																<option>10,4 polegadas</option>
																<option>10.9 polegadas</option>
																<option>11 polegadas</option>
																<option>12,9 polegadas</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="resolution-tablet" class="form-label">Resolução</label>
									<select class="form-select" id="id-celular-type" name="resolution-tablet" required>
											<option selected>HD</option>
											<option>FULL HD</option>
											<option>2K</option>
											<option>4K</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="RAM-memory" class="form-label">Memória Ram</label>
									<select class="form-select" id="id-celular-type" name="ram-memory-tablet" required>
											<option selected>2GB</option>
								   <option>3GB</option>
										 <option>4GB</option>
										 <option>6GB</option>
										 <option>8GB</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="battery-capacity" class="form-label">Capacidade de Bateria</label>
									<select class="form-select" id="id-celular-type" name="battery-capacity-tablet" required>
											<option selected>4450 mAh</option>
											<option>5100 mAh</option>
											<option>5124 mAh</option>
											<option>7040 mAh</option>
											<option>8000 mAh</option>
											<option>8827 mAh</option>
											<option>9720 mAh</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="storage-tablet" class="form-label">Armazenamento Interno</label>
									<select class="form-select" id="id-celular-type" name="storage-tablet" required>
											<option selected>16gb</option>
											<option>32GB</option>
											<option>64GB</option>
											<option>128GB</option>
											<option>256GB</option>
											<option>512GB</option>
											<option>1TB</option>
								 </select>
			  	 </div>
			  	 
			  	<div class="col-md-6">
								<label for="cores" class="form-label">Núcleos</label>
									<select class="form-select" id="id-celular-type" name="cores-tablet" required>
											<option selected>2 Núcleos</option>
											<option>3 Núcleos</option>
											<option>4 Núcleos</option>
											<option>5 Núcleos</option>
											<option>6 Núcleos</option>
											<option>7 Núcleos</option>
											<option>8 Núcleos</option>	
									</select>
			  	  </div>
			   </div>
                
                <!-- TABLET-->
                
                
                <!-- COMPUTADOR-->
     <div id="type-computador" style="display: none;">            
       <div class="col-md-6">
								<label for="operating-system-computador" class="form-label">Sistema Operacional</label>
									<select class="form-select" id="id-celular-type" name="operating-system-computador" required>
											<option selected>MacOS</option>
											<option>Microsoft Windows</option>
           <option>Linux</option>
									</select>
			    </div>
                    <!-- placa mae-->
      <div class="col-md-6">
								<label for="brand-placa-mae" class="form-label">Marcas da Placa Mãe</label>
									<select class="form-select" id="id-celular-type" name="brand-placa-mae" required>
											<option selected>Aorus</option>
											<option>ASRock</option>
											<option>Asus</option>
											<option>Bluecase</option>
											<option>Gigabyte</option>
											<option>MSI</option>
											<option>PCWARE</option>
									</select>
			    </div>
			    
			   	<div class="col-md-6">
									<label for="format-placa-mae" class="form-label">Formato Placa Mãe</label>
									<select class="form-select" id="id-celular-type" name="format-motherboard-computador" required>
											<option selected>ATX</option>
								   <option>Extended ATX</option>
											<option>Micro ATX</option>
											<option>Mini ITX</option>
											<option>uATX</option>
											<option>Mini STX</option>
											<option>XL-ATX</option>
											<option>Mini-DTX</option>                               
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="compatible-memory" class="form-label">Memorias Compativeis</label>
									<select class="form-select" id="id-celular-type" name="compatible-memory-computador" required>
											<option selected>DDR3 </option>
											<option>DDR4</option>
									</select>
			  	 </div>
			  	 			  	 
                    <!-- placa mae-->
                <!-- processador--> 
			  	 <div class="col-md-6">
									<label for="brand-processor" class="form-label">Marca Processador</label>
									<select class="form-select" id="id-processor-type-pc" name="brand-processor-computador" required onchange="processorChange()">
											<option selected>Intel</option>
											<option>AMD</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6" style="display: none;" id="amd-gen">
									<label for="generation-processor-AMD" class="form-label">Geração de Processadores AMD</label>
									<select class="form-select" id="id-celular-type" name="generation-processor-amd-computador" required>
											<option selected>AMD: Gen 1000</option>
											<option>AMD: Gen 2000</option>
											<option>AMD: Gen 3000</option>
											<option>AMD: Gen 5000</option>                               
								 </select>
			  	 </div>
			  	 
			  	<div class="col-md-6" id="intel-gen">
								<label for="generation-processor-intel" class="form-label">Geração de Processadores Intel</label>
									<select class="form-select" id="id-celular-type" name="generation-processor-intel-computador" required>
											<option selected>Intel: 1ª Geração</option>
											<option>Intel: 2ª Geração</option>
											<option>Intel: 3ª Geração</option>
											<option>Intel: 4ª Geração</option>
											<option>Intel: 5ª Geração</option>
											<option>Intel: 6ª Geração</option>
											<option>Intel: 7ª Geração</option>
											<option>Intel: 8ª Geração</option>
											<option>Intel: 9ª Geração</option>
											<option>Intel: 10ª Geração</option>
											<option>Intel: 11ª Geração</option>			
									</select>
			  	  </div>
       <div class="col-md-6">
								<label for="integrated-video" class="form-label">Video Integrado</label>
									<select class="form-select" id="id-celular-type" name="integrated-video" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	  </div>
                    <!-- processador--> 
                    <!-- memoria ram-->
       <div class="col-md-6">
								<label for="RAM-memory-type" class="form-label">Tipo de Memoria RAM</label>
									<select class="form-select" id="id-celular-type" name="RAM-memory-type-computador" required>
											<option selected>DDR4</option>
											<option>DDR3</option>
           <option>DDR3L</option>
           <option>M.2</option>
           <option>Optane</option>
									</select>
			    </div>
			    
			   	<div class="col-md-6">
									<label for="RAM-memory-capacity" class="form-label">Capacidade Memoria Ram</label>
									<select class="form-select" id="id-celular-type" name="RAM-memory-capacity-computador" required>
											<option selected>2GB</option>
								   <option>4GB</option>
											<option>8GB</option>
											<option>16GB</option>
											<option>32GB</option>
											<option>64GB</option>   
											<option>128GB</option>  
										 <option>256GB</option>         
									</select>
			  	 </div>
                    
                    <!-- memoria ram-->
                    <!-- fonte-->
			  	 <div class="col-md-6">
									<label for="power-source-computador" class="form-label">Potencia da Fonte</label>
									<select class="form-select" id="id-celular-type" name="power-source-computador-computador" required>
											<option selected>100 - 190 W</option>
											<option>200 - 250 W</option>
											<option>300 - 350 W</option>
											<option>400 - 450 W</option>
											<option>500 - 550 W</option>
											<option>600 - 650 W</option>
											<option>700 - 750 W</option>
											<option>800 - 850 W</option>
											<option>1000 - 1050 W</option>
											<option>1200 - 1250 W</option>
											<option>1300 - 1350 W</option>
											<option>1500 - 1550 W</option>
											<option>1600 - 1650 W</option>                             
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="source-cabling" class="form-label">Cabeamento da Fonte</label>
									<select class="form-select" id="id-celular-type" name="source-cabling-computador" required>
											<option selected>Semi Modular</option>
           <option>Full Modular</option>
									</select>
			  	 </div>
			  	 
        <div class="col-md-6">
									<label for="chipset-manufacturers" class="form-label">Tipo de Armazenamento</label>
									<select class="form-select" id="id-celular-type" name="storage-type-computador" required>
											<option selected>HD</option>
											<option>SSD</option>   
											<option>HD/SSD</option>                              
								 </select>
			  	  </div>
			  	         
			  	 <div class="col-md-6">
									<label for="source-storage" class="form-label">Armazenamento de Disco</label>
									<select class="form-select" id="id-celular-type" name="source-storage-computador" required>
											<option selected>120GB</option>
											<option>240GB</option>
											<option>480GB</option>
											<option>520GB</option>
											<option>980GB</option>
											<option>1TB</option>		
											<option>2TB</option>
									</select>
			  	 </div>
                    
                    <!-- fonte-->
                    <!-- placa de video-->
			  	 <div class="col-md-6">
									<label for="chipset-manufacturers" class="form-label">Fabricantes do Chipset</label>
									<select class="form-select" id="id-celular-type" name="chipset-manufacturers-computador" required>
											<option selected>NVIDIA</option>
											<option>RADEON</option>                                
								 </select>
			  	 </div>             <!-- placa de video--> 
			   </div>
                
                <!-- COMPUTADOR-->
                
                
                <!-- NOTEBOOK-->
							<div id="type-notebook" style="display: none;">
								<div class="col-md-6">
									<label for="operating-system-notebook" class="form-label">Sistema Operacional</label>
										<select class="form-select" id="id-celular-type" name="operating-system-notebook" required>
												<option selected>MacOS</option>
												<option>Microsoft Windows</option>
												<option>Linux</option>
										</select>
								</div>

      
       <div class="col-md-6">
									<label for="brand-processor" class="form-label">Marca do Processador</label>
									<select class="form-select" id="id-processor-type-notebook" name="brand-processor-notebook" onchange="processorChangeNotebook()" required>
											<option selected>Intel</option>
											<option>AMD</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6" style="display: none;" id="amd-gen-notebook">
									<label for="generation-processor-AMD" class="form-label">Geração de Processadores AMD</label>
									<select class="form-select" id="id-celular-type" name="generation-processor-amd-notebook" required>
											<option selected>AMD: Gen 1000</option>
											<option>AMD: Gen 2000</option>
											<option>AMD: Gen 3000</option>
											<option>AMD: Gen 5000</option>                               
								 </select>
			  	 </div>
			  	 
			  	<div class="col-md-6" id="intel-gen-notebook">
								<label for="generation-processor-intel" class="form-label">Geração de Processadores Intel</label>
									<select class="form-select" id="id-celular-type" name="generation-processor-intel-notebook" required>
											<option selected>Intel: 1ª Geração</option>
											<option>Intel: 2ª Geração</option>
											<option>Intel: 3ª Geração</option>
											<option>Intel: 4ª Geração</option>
											<option>Intel: 5ª Geração</option>
											<option>Intel: 6ª Geração</option>
											<option>Intel: 7ª Geração</option>
											<option>Intel: 8ª Geração</option>
											<option>Intel: 9ª Geração</option>
											<option>Intel: 10ª Geração</option>
											<option>Intel: 11ª Geração</option>			
									</select>
			  	  </div>
			  	  
			   	<div class="col-md-6">
									<label for="size-notebook" class="form-label">Tamanho</label>
									<select class="form-select" id="id-celular-type" name="screen-size-notebook" required>
											<option selected>11 polegadas</option>
           <option>12 polegadas</option>
								   <option>13 polegadas</option>
											<option>14 polegadas</option>
											<option>15 polegadas</option>
											<option>16 polegadas</option>
											<option>17 polegadas</option>                                  
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="resolution-notebook" class="form-label">Resolução</label>
									<select class="form-select" id="id-celular-type" name="resolution-notebook" required>
											<option selected>HD</option>
											<option>FULL HD</option>
											<option>QUADHD</option>
											<option>Padrão</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="RAM-memory" class="form-label">Tipo de Memória</label>
									<select class="form-select" id="id-celular-type" name="memory-type-notebook" required>
											<option selected>HD</option>
											<option>SSD</option>
											<option>HD e SSD</option>
									</select>
			  	 </div>
			  	 
			  	 <div class="col-md-6">
									<label for="storage-notebook" class="form-label">Armazenamento Interno</label>
									<select class="form-select" id="id-celular-type" name="storage-notebook" required>
											<option selected>128GB</option>
											<option>256GB</option>
											<option>512GB</option>
											<option>1TB</option>
											<option>2TB</option>
								 </select>
				   </div>
				    
			  	 <div class="col-md-6">
									<label for="RAM-memory" class="form-label">Memória Ram</label>
									<select class="form-select" id="id-celular-type" name="RAM-memory-notebook" required>
											<option selected>4GB</option>
											<option>8GB</option>
											<option>12GB</option>
											<option>16GB</option>
											<option>32GB</option>
											<option>64GB</option>
									</select>
			  	 </div>
			  	 
			 
			  	<div class="col-md-6">
								<label for="video-card" class="form-label">Placa de Video Dedicada</label>
									<select class="form-select" id="id-celular-type" name="video-card-notebook" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	</div>
			  	
			  	<div class="col-md-6">
								<label for="video-card" class="form-label">Peso</label>
									<input type="number" id="" name="weight-notebook" class="form-select" min="1.00" step="0.010">
			  	</div>
				</div>
                <!-- NOTEBOOK-->
                
                <!--JOGO-->
                
							<div id="type-jogo" style="display: none;">
							
								<div class="col-md-6">
									<label for="platform-jogo" class="form-label">Plataforma</label>
										<select class="form-select" id="id-celular-type" name="platform-game" required>
												<option selected>Computador</option>
												<option>PS4</option>
												<option>PS5</option>
												<option>PS4 e PS5</option>
												<option>Xbox 360</option>
												<option>Xbox One +</option>
												<option>Xbox 360 e Xbox One</option>
												<option>Computador e Xbox One+</option>
												<option>Computador e PS4</option>
												<option>Computador e PS5</option>
												<option>Computador e Xbox 360</option>
												<option>Computador, PS4, PS5, Xbox 360 e Xbox One+</option>
												<option>Computador, PS4, PS5 e Xbox One+</option>
										</select>
									</div>
									
									<div class="col-md-6">
									<label for="platform-jogo" class="form-label">Multijogador</label>
										<select class="form-select" id="id-celular-type" name="multiplayer-game" required>
												<option selected>Sim</option>
												<option>Não</option>
										</select>
									</div>
									
									<div class="col-md-6">
									<label for="platform-jogo" class="form-label">Online</label>
										<select class="form-select" id="id-celular-type" name="online-game" required>
												<option selected>Sim</option>
												<option>Não</option>
										</select>
									</div>
									
									<div class="col-md-6">
									<label for="platform-jogo" class="form-label">Formato</label>
										<select class="form-select" id="id-celular-type" name="format-game" required>
												<option selected>Física</option>
												<option>Digital</option>
										</select>
									</div>
									
									<div class="col-md-6">
										<label for="height" class="form-label">Data de Lançamento</label><br>
										<input type="date" name="date-launch-game" class="form-select">
			  	  	</div>
									
									<div class="col-md-6">
									<label for="platform-jogo" class="form-label">Gênero</label>
										<input type="text" class="form-select" name="genre-game">
									</div>

       </div>
       

                   
                    <!--CADEIRA-->
                
							<div id="type-cadeira" style="display: none;">
							<div class="col-md-6">
								<label for="arm" class="form-label">Braço Ajustável</label>
									<select class="form-select" id="id-celular-type" name="adjustable-arm-chair" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	  </div>
			  	  
       <div class="col-md-6">
								<label for="height" class="form-label">Altura Ajustável</label>
									<select class="form-select" id="id-celular-type" name="adjustable-height-chair" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	  </div>
			  	  
       <div class="col-md-6">
								<label for="slope" class="form-label">Inclinação Ajustável</label>
									<select class="form-select" id="id-celular-type" name="slope-chair" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	  </div>
               
        <div class="col-md-6">
								<label for="slope" class="form-label">Altura</label>
									<input type="number" class="form-select" id="id-celular-type" name="height-chair" required>
			  	  </div>
			  	  
			  	  <div class="col-md-6">
								<label for="slope" class="form-label">Largura</label>
									<input type="number" class="form-select" id="id-celular-type" name="width-chair" required>
			  	  </div>   
			  	  
			  	 <div class="col-md-6">
								<label for="slope" class="form-label">Rodas Girátorias</label>
									<select class="form-select" id="id-celular-type" name="swivel-wheels-chair" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	  </div>   
			  	  
			  	 <div class="col-md-6">
								<label for="slope" class="form-label">Peso Máximo Suportado</label>
									<input type="number" class="form-select" id="id-celular-type" name="max-weight-chair" required>
			  	 </div>   
			  	 

							<div class="col-md-6">
								<label for="arm" class="form-label">É gamer?</label>
									<select class="form-select" id="id-celular-type" name="its-gamer-chair" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	 </div>
		  	    
		  	  <div class="col-md-6">
								<label for="arm" class="form-label">Encosto Reclinável</label>
									<select class="form-select" id="id-celular-type" name="reclining-backrest-chair" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	 </div>
		  	    
		  	  <div class="col-md-6">
								<label for="arm" class="form-label">É ergonômica?</label>
									<select class="form-select" id="id-celular-type" name="ergonomic-chair" required>
											<option selected>Sim</option>
											<option>Não</option>
									</select>
			  	 </div>
			  	    
      </div>
		<!--Cadeira-->
			   
			   
			   


			  <!--Fim das divs escondidas baseadas na opção do select-->
			  
			   
			   
			  <div class="col-12">
							<button type="submit" class="btn btn-primary">Cadastrar Produto</button>
			  </div>
			</form>
		</div>
		<script>
				(function () {
						'use strict'

						// Fetch all the forms we want to apply custom Bootstrap validation styles to
						var forms = document.querySelectorAll('.needs-validation')

						// Loop over them and prevent submission
						Array.prototype.slice.call(forms)
								.forEach(function (form) {
										form.addEventListener('submit', function (event) {
												if (!form.checkValidity()) {
														event.preventDefault()
														event.stopPropagation()
												}

												form.classList.add('was-validated')
										}, false)
								})
				})()
		</script>
		<script src="../js/admin.js" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
	  </script>
	</body>
</html>