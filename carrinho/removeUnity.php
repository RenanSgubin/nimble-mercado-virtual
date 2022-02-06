<?php
session_start();
require_once("../conexao/db.php");

$idCliente = $_SESSION["idcliente"];
$prods_client = $_pdo->prepare("SELECT * FROM carrinho WHERE id_cliente = '$idCliente'");	
$prods_client->execute();	
$prods_client_fetch = $prods_client->fetchAll(PDO::FETCH_ASSOC);

	



foreach ($prods_client_fetch as $prods_client_fetchFC){
/*Pegar tudo dos produtos onde seu nome é igual ao nome dos produtos no carrinho*/
$productsName = $prods_client_fetchFC['nome_produto_carrinho'];
$allProd = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = '$productsName'");
$allProd->execute();
$allProdFetch = $allProd->fetch(PDO::FETCH_ASSOC);
	
	/*Tirar 1 unidade dos produtos comprados*/
$qntUnity = $allProdFetch['Quantidade_Estoque_Produto']-1;
$prods_client_fetchFC_Prod_Name = $prods_client_fetchFC['nome_produto_carrinho'];
$updateUnity = $_pdo->prepare("UPDATE produtos SET Quantidade_Estoque_Produto = '$qntUnity' WHERE Nome_Produto = '$prods_client_fetchFC_Prod_Name'");
$updateUnity->execute();
	
	/*Adicionar 1 para a quantidade de vendas*/
$qntVendas = $allProdFetch['qnt_vendas']+1;
$updateQntVendas = $_pdo->prepare("UPDATE produtos SET qnt_vendas = '$qntVendas' WHERE Nome_Produto = '$prods_client_fetchFC_Prod_Name'");
$updateQntVendas->execute();
	
	/*Inserir na tabela pedidos*/
	date_default_timezone_set('America/Sao_Paulo'); 
	$datetime =  date('Y-m-d');
	
$insertRequests = $_pdo->prepare("INSERT INTO pedidos (nome_produto_pedido, quantidade_produto_pedido, imagem_produto_pedido, id_cliente_pedido, data_pedido) VALUES (:nome_pedido,:quantidade_produto_pedido,:imagem_produto_pedido,:id_cliente_pedido,:data_pedido)");
	
	$insertRequests->bindValue(":nome_pedido",$prods_client_fetchFC['nome_produto_carrinho']);
	$insertRequests->bindValue(":quantidade_produto_pedido",$prods_client_fetchFC['unidades']);
	$insertRequests->bindValue(":imagem_produto_pedido",$prods_client_fetchFC['imagem_produto_carrinho']);
	$insertRequests->bindValue(":id_cliente_pedido",$idCliente);
	$insertRequests->bindValue(":data_pedido",$datetime);
	$insertRequests->execute();
}

/*Tirar produtos do carrinho*/
	$removeProdFromCar = $_pdo->prepare("DELETE FROM carrinho WHERE id_cliente = '$idCliente'");
	$removeProdFromCar->execute();


$_sql = $_pdo->prepare("INSERT INTO  produtos (Nome_Produto, Marca_Produto, Quantidade_Estoque_Produto, Preco_Produto, Imagem_Produto, Cor_Produto, Tipo_Produto, oferta, qnt_oferta, tempo_oferta, desc_produto, img_extra0, img_extra1, img_extra2, img_extra3) VALUES (:product,:brand,:amount,:price,:image,:color,:type,:oferta,:ofertaqnt,:timeoffer,:descprod,:img_extra0,:img_extra1,:img_extra2,:img_extra3)");
if($updateUnity){
	header("location:../php/homep");
}
	
?>