<?php
session_start();
require_once("../conexao/db.php");

$nameWishe = $_GET["nmw"];
$idCliente = $_SESSION["idcliente"];

$_deleteWish = $_pdo->prepare("DELETE FROM lista_desejos WHERE nome_prod_desej = '$nameWishe' and id_cliente_desej = '$idCliente'");
$_deleteWish->execute();

if($_deleteWish){
	header("location:lista-desejos");
}
?>