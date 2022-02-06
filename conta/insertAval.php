<?php
session_start();
if(!isset($_SESSION["idcliente"])){
	header("location:../conta/login");
}
require_once("../conexao/db.php");

$prodNameAval = $_GET["npav"];
$commentsOpinion = $_POST["comment-name"];
$selectOpinion = $_POST["opinion-name"];
$idCliente = $_SESSION["idcliente"];

/*Pegar nome do cliente*/
$infoCliente = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
$infoCliente->execute();
$infoClienteValues = $infoCliente->fetch(PDO::FETCH_ASSOC);
$clientName = $infoClienteValues["nomecliente"];

/*Inserir nome do produto, comentário e id do cliente*/
$insertAval = $_pdo->prepare("INSERT INTO avalia_prods (prod_aval, comentarios, id_cliente_avalia, nota_produto, nome_cliente_aval) VALUES (:prodNameAval, :comments, :idClienteAvalia, :nota_produto, :nome_cliente_aval)");
$insertAval->bindValue(":prodNameAval", $prodNameAval);
$insertAval->bindValue(":comments", $commentsOpinion);
$insertAval->bindValue(":idClienteAvalia", $idCliente);
$insertAval->bindValue(":nota_produto", $selectOpinion);
$insertAval->bindValue(":nome_cliente_aval", $clientName);
$insertAval->execute();


/*Inserir na tabela produtos o nivel da avaliação, e incrementar a quantidade da mesma*/
$prodsData = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = '$prodNameAval'");
$prodsData->execute();
$prodsDataFetch = $prodsData->fetch(PDO::FETCH_ASSOC);

/*Incremento*/
$qntAvalIncrement = $prodsDataFetch["qnt_aval"]+1;
$updateQntAvalProds = $_pdo->prepare("UPDATE produtos SET qnt_aval = '$qntAvalIncrement' WHERE Nome_Produto = '$prodNameAval'");
$updateQntAvalProds->execute();


/*Nota*/
if($selectOpinion=="Ruim"){
	$qntTotalAval1 = $prodsDataFetch["total_aval"] + 2.5;
	$updateTotalAvalProds = $_pdo->prepare("UPDATE produtos SET total_aval = '$qntTotalAval1' WHERE Nome_Produto = '$prodNameAval'");
 $updateTotalAvalProds->execute();
}
if($selectOpinion=="Mediano"){
	$qntTotalAval1 = $prodsDataFetch["total_aval"] + 5;
	$updateTotalAvalProds = $_pdo->prepare("UPDATE produtos SET total_aval = '$qntTotalAval1' WHERE Nome_Produto = '$prodNameAval'");
 $updateTotalAvalProds->execute();
}
if($selectOpinion=="Bom"){
	$qntTotalAval1 = $prodsDataFetch["total_aval"] + 7.5;
	$updateTotalAvalProds = $_pdo->prepare("UPDATE produtos SET total_aval = '$qntTotalAval1' WHERE Nome_Produto = '$prodNameAval'");
 $updateTotalAvalProds->execute();
}
if($selectOpinion=="Muito Bom"){
	$qntTotalAval1 = $prodsDataFetch["total_aval"] + 10;
	$updateTotalAvalProds = $_pdo->prepare("UPDATE produtos SET total_aval = '$qntTotalAval1' WHERE Nome_Produto = '$prodNameAval'");
 $updateTotalAvalProds->execute();
}
header("location:avaliar-produtos");
?>