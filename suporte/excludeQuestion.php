<?php
require_once("../conexao/db.php");
$userId= $_GET["userid"];

$excludeQuestion = $_pdo->prepare("DELETE FROM duvidas_suporte WHERE id_cliente_suporte = '$userId'");
$excludeQuestion->execute();

if($excludeQuestion){
	header("location:duvidas");
}else{
	echo "Algo deu errado.";
}
?>