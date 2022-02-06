<?php
   session_start();
			require_once("../conexao/db.php");

   if(isset($_SESSION["autenticado"])){
				$npInsertCarrinho = $_GET["np"];
				$_insertcarrinho = $_pdo->prepare("INSERT INTO carrinho (preco_unidade, nome_produto_carrinho,imagem_produto_carrinho, id_cliente, qnt_oferta_carrinho) VALUES (:preco_unidade, :nome_prod_carrinho,:img_prod_carrinho, :id_cliente_value, :qnt_oferta)");
				
				$_sql = $_pdo->prepare("SELECT * FROM produtos where Nome_Produto = '$npInsertCarrinho'");
				$_sql->execute();
				$_resultset = $_sql->fetch(PDO::FETCH_ASSOC);

				$_resultsetaux1 = $_resultset["Nome_Produto"];
				$_resultsetaux2 = $_resultset["Preco_Produto"];
				$_resultsetaux3 = $_resultset["Imagem_Produto"];
				$_resultsetaux4 = $_resultset["qnt_oferta"];
				
				$idClient = $_SESSION["idcliente"];
				$prodRepeatVerify = $_pdo->prepare("SELECT * FROM carrinho where id_cliente = '$idClient'");
				$prodRepeatVerify->execute();
				$prodRepeatVerifyValues = $prodRepeatVerify->fetch(PDO::FETCH_ASSOC); 
				$qntUnity = $prodRepeatVerifyValues["unidades"]+1;
				
				/*Veriica se o item adicionado já está no carrinho. Caso esteja, adicionará uma unidade ao mesmo.*/
				if($npInsertCarrinho == $prodRepeatVerifyValues["nome_produto_carrinho"]){
							$_teste = $_pdo->prepare("UPDATE carrinho SET unidades = '$qntUnity' WHERE nome_produto_carrinho = '$npInsertCarrinho'");
					  $_teste->execute();
							header("location:../carrinho/index");
						 exit;
				}

				$_insertcarrinho->bindValue(":nome_prod_carrinho", $_resultsetaux1);
				$_insertcarrinho->bindValue(":preco_unidade",     $_resultsetaux2);
				$_insertcarrinho->bindValue(":img_prod_carrinho", $_resultsetaux3);
				$_insertcarrinho->bindValue(":qnt_oferta", $_resultsetaux4);
				$_insertcarrinho->bindValue(":id_cliente_value", $_SESSION["idcliente"]);
				$_insertcarrinho->execute();
				header("location:../carrinho/index");
			}
if(!isset($_SESSION["autenticado"])){
				 header("location:../conta/login");
			}
			
?>