<?php
session_start();
require_once("../conexao/db.php");

$idClient = $_SESSION["idcliente"];
$prodName = $_GET["npw"];
$imgProd = $_GET["imgdsj"];

$insertWishes = $_pdo->prepare("INSERT INTO lista_desejos (nome_prod_desej, id_cliente_desej,img_prod_desej) VALUES (:prodname,:id_client,:img_prod_dsj)");

$insertWishes->bindValue(":prodname",$prodName);
$insertWishes->bindValue(":id_client",$idClient);
$insertWishes->bindValue(":img_prod_dsj",$imgProd);
$insertWishes->execute();

header("location:../conta/lista-desejos");
?>