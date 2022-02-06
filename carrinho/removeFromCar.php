<?php session_start();
if(!isset($_SESSION["idcliente"])){
	header("location:../conta/login");
}
?>
<?php
require_once("../conexao/db.php");
$npAux = $_GET["np"];

$removeFromCar = $_pdo->prepare("DELETE FROM carrinho WHERE nome_produto_carrinho = '$npAux'");
$removeFromCar->execute();
header("location: index.php");
?>