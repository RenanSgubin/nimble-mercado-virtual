<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>FAQ | Nimble</title>
		<link rel="shortcut icon" href="../img/favicon.png"/>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/faq.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
	   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	</head>
	<body>
		<?php include_once("../php/nav.php")?>
			<div id="container">
				<div id="title-faq">
						 <div id="content-title-faq">
								<b>Procurando por ajuda?</b><br>
									<div id="teste" style="position: relative;width: 100%;">
											<input type="text" id="sup-id" name="sup-name" placeholder="Digite palavras chaves">
											<img src="../img/mg_glass.png" style="width: 20px;position: absolute;bottom: 50%;transform: translateY(50%);left: 2.5%;">
											<button type="submit" style="position: absolute;bottom: 50%;left: 125%;transform: translateY(50%);width: 25%;height: 100%;background-color: #1a212a;color: #f0f0f0;border-top-right-radius: 5px;border-bottom-right-radius: 5px;">Buscar</button>
									</div>
							</div>
				</div>
			
				
				
				
				
				
				
					<div class="questions" onclick="firstOp()">
							<b>Administração de Compra</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>

					<div class="questions" onclick="secondOp()">
							<b>Erro no Pedido</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					<div class="questions" onclick="thirdOp()">
							<b>Formas de Entrega</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					<div class="questions" onclick="fourthOp()">
							<b>Diretrizes</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					<div class="questions" onclick="fifthOp()">
							<b>Segurança</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					<div class="questions" onclick="sixthOp()">
							<b>Proteção de Dados</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					<div class="questions" onclick="seventhOp()">
							<b>Devolução de Pedidos</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					<div class="questions" onclick="eighthOp()">
							<b>Gerenciar Anúncios</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					<div class="questions" onclick="ninethOp()">
							<b>Configurações da Conta</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					
					<div class="questions" onclick="teenthOp()">
							<b>Metódos de Pagamento</b>
							<img src="../img/down-arrow.png" class="arrow-down">
					</div>
					<div class="hidden-answers">
								<b>1.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt felis dui, at volutpat massa efficitur eu. Nullam ut hendrerit ante. Quisque semper magna et cursus egestas. Integer et metus sagittis, ullamcorper urna ut, tincidunt nisl. Pellentesque ut odio odio.<br><br>
								<b>2.</b> Duis ac lectus nec libero eleifend ornare. Donec ultrices nisi vitae metus imperdiet, sed tincidunt nisl euismod. Nam ut urna nisl. Sed molestie nisi sit amet ligula blandit congue. Curabitur finibus justo libero, quis aliquam justo dapibus a. Maecenas congue faucibus eros ac tempus. Etiam condimentum gravida magna at ultrices. Aenean vel risus diam. Maecenas magna velit, eleifend at molestie id, molestie nec neque.<br><br>
								<b>3.</b> Maecenas est neque, posuere sit amet dignissim ac, imperdiet eget quam. Mauris rutrum, lacus in dignissim ultricies, justo nibh placerat nisi, in maximus nisl augue et neque. Nulla sit amet elementum erat. Nulla vulputate nunc quis elit lacinia pellentesque. Pellentesque semper convallis eleifend. Fusce tincidunt ultricies ipsum non rhoncus.
					</div>
					
					
					<div id="div-solve-problem">
					<img src="../img/rocket.svg" id="support-img">
							<div id="contents-input-supp">
								<b>Sua dúvida não foi respondida?</b><br><br>
								<form method="post" action="../inserts/insertSup.php">
									<label for="name-user-input">Nome Completo</label><br>
									<input type="text" class="inputs-supp" name="name-user-input"><br><br>
									<label for="email-user-input">Email</label><br>
									<input type="email" class="inputs-supp" name="email-user-input"><br><br>
									<label for="type-user-input">Tipo do Problema</label><br>
									<select type="text" class="inputs-supp" name="type-user-input">
										<option>Pedidos</option>
										<option>Minha Conta</option>
										<option>Segurança</option>
										<option>Administração de Permissões</option>
										<option>Pagamento</option>
										<option>Outro</option>
									</select><br><br>
									<label for="description-user-input">Descrição do Problema</label><br>
									<textarea class="inputs-supp" name="description-user-input" id="textarea-description"></textarea><br><br>
									<button type="submit" id="btn-submit-sup">Enviar</button>
								</form>
							</div>
							
					</div>
			</div>
		<?php include_once("../php/infossite.php")?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
	  </script>
	  
	  
	  
	  <!-----------------------------------ABRIR E ESCONDER MENUS------------------------>
	  <script>
				
				
				function firstOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[0].src = "../img/up-arrow.png";

					if(firstOpVar[0].style.display !="none"){
							firstOpVar[0].style.display = "none";
							document.getElementsByClassName("arrow-down")[0].src = "../img/down-arrow.png";
					}else{
							firstOpVar[0].style.display = "block";
					}
			 }
					 
				
				function secondOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[1].src = "../img/up-arrow.png";

					if(firstOpVar[1].style.display !="none"){
							firstOpVar[1].style.display = "none";
							document.getElementsByClassName("arrow-down")[1].src = "../img/down-arrow.png";
					}else{
							firstOpVar[1].style.display = "block";
					}
				}
				
				function thirdOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[2].src = "../img/up-arrow.png";
	
					if(firstOpVar[2].style.display !="none"){
							firstOpVar[2].style.display = "none";
							document.getElementsByClassName("arrow-down")[2].src = "../img/down-arrow.png";
					}else{
							firstOpVar[2].style.display = "block";
					}
			 }
					 
				
				function fourthOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[3].src = "../img/up-arrow.png";
		
					if(firstOpVar[3].style.display !="none"){
							firstOpVar[3].style.display = "none";
							document.getElementsByClassName("arrow-down")[3].src = "../img/down-arrow.png";
					}else{
							firstOpVar[3].style.display = "block";
					}
			 }
					 		
				function fifthOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[4].src = "../img/up-arrow.png";
		
					if(firstOpVar[4].style.display !="none"){
							firstOpVar[4].style.display = "none";
							document.getElementsByClassName("arrow-down")[4].src = "../img/down-arrow.png";
					}else{
							firstOpVar[4].style.display = "block";
					}
			 }
					 				
				function sixthOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[5].src = "../img/up-arrow.png";
		
					if(firstOpVar[5].style.display !="none"){
							firstOpVar[5].style.display = "none";
							document.getElementsByClassName("arrow-down")[5].src = "../img/down-arrow.png";
					}else{
							firstOpVar[5].style.display = "block";
					}
			 }
					 	
				function seventhOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[6].src = "../img/up-arrow.png";
		
					if(firstOpVar[6].style.display !="none"){
							firstOpVar[6].style.display = "none";
							document.getElementsByClassName("arrow-down")[6].src = "../img/down-arrow.png";
					}else{
							firstOpVar[6].style.display = "block";
					}
			 }
				
				function eighthOp(){
					var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[7].src = "../img/up-arrow.png";
			
					if(firstOpVar[7].style.display !="none"){
							firstOpVar[7].style.display = "none";
							document.getElementsByClassName("arrow-down")[7].src = "../img/down-arrow.png";
					}else{
							firstOpVar[7].style.display = "block";
					}
			 }
				
				function ninethOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[8].src = "../img/up-arrow.png";
	
					if(firstOpVar[8].style.display !="none"){
							firstOpVar[8].style.display = "none";
							document.getElementsByClassName("arrow-down")[8].src = "../img/down-arrow.png";
					}else{
							firstOpVar[8].style.display = "block";
					}
			 }
				
				function teenthOp(){
						var firstOpVar  = document.getElementsByClassName("hidden-answers");
						var firstImgVar = document.getElementsByClassName("arrow-down")[9].src = "../img/up-arrow.png";
					
					if(firstOpVar[9].style.display !="none"){
							firstOpVar[9].style.display = "none";
							document.getElementsByClassName("arrow-down")[9].src = "../img/down-arrow.png";
					}else{
							firstOpVar[9].style.display = "block";
					}
			 }			 
				/*FIM DO SCRIPT - ABRIR E ESCONDER MENUS*/
				
			function changeLinkEffect(){
						document.getElementById("sup-a").style.borderBottom = "3px solid #e86332";
				  document.getElementsByTagName("h6")[6].style.color = "#e86332";
			}
			window.onload = function(){changeLinkEffect();}
		</script>		
	</body>
</html>