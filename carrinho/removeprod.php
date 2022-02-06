<?php session_start();
if(!isset($_SESSION["idcliente"])){
	header("location:../conta/login");
}
?>
<?php
require_once("../conexao/db.php");

$getInsertVariable = $_GET["q"];

$unityInsert = $_pdo->prepare("UPDATE carrinho SET unidades = unidades - 1 WHERE nome_produto_carrinho = '$getInsertVariable'");
$unityInsert->execute();
header("location:index.php");
?>