<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimble - Avaliar Produtos</title>
	   <link rel="shortcut icon" href="../img/favicon.png"/>
				<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../css/aval_prod.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	</head>
	<body>
				<?php include "../php/nav.php";?>
					<div id="container-aval">
						<div id="container-aval-content">
						<?php 
							require_once("../conexao/db.php");
							$idCliente = $_SESSION["idcliente"];
							$avalProds = $_pdo->prepare("SELECT * FROM pedidos WHERE id_cliente_pedido = '$idCliente'");
							$avalProds->execute();
							$avalProdsFetch = $avalProds->FetchAll(PDO::FETCH_ASSOC);
							if(!$avalProdsFetch){echo "Você não possui nenhum Pedido!";}
							foreach($avalProdsFetch as $avalProdsFetchFC){
							?>
							<div id="div-form-aval">
							 <div id="prod-tw-aval">
									<img src="../upload/<?php echo $avalProdsFetchFC['imagem_produto_pedido'];?>"><br>
							 </div>
								<form id="form-aval" method="post" action="insertAval?npav=<?php echo $avalProdsFetchFC['nome_produto_pedido']?>">
								 <div id="prod-name-fix-h"><?php echo $avalProdsFetchFC['nome_produto_pedido']?><br><br></div>
									 O que você achou deste produto?
									<div id="content-left">
										<div class="opinion-block">
											<select id="select-opinion" name="opinion-name">
												<option>Ruim</option>
												<option>Mediano</option>
												<option>Bom</option>
												<option>Muito Bom</option>
										 </select>
										</div>
									</div>
									
									<div id="content-right">
										<textarea placeholder="Insira um comentário (Este comentário será público)." id="textarea-comment" maxlength="250" name="comment-name"></textarea>
									</div><br>
									<button id="insert-aval" type="submit">Salvar</button>
								</form>
									
							</div>
							<?php }?>
						</div>
					</div>
	</body>
</html>