<?php
require_once("../conexao/db.php");
session_start();
$idCliente = $_SESSION["idcliente"];
$_receivedCep = $_POST["change-cep-name"];
$_receivedRoad = $_POST["receive-road"];
$_receivedDistrict = $_POST["receive-district"];
$_receivedCity = $_POST["receive-city"];
$_receivedState = $_POST["receive-state"];

$changeCep = $_pdo->prepare("UPDATE clientes SET cep = '$_receivedCep' WHERE idcliente = '$idCliente'");
$changeCep->execute();

$changeRoad = $_pdo->prepare("UPDATE clientes SET rua = '$_receivedRoad' WHERE idcliente = '$idCliente'");
$changeRoad->execute();

$changeDistrict = $_pdo->prepare("UPDATE clientes SET bairro = '$_receivedDistrict' WHERE idcliente = '$idCliente'");
$changeDistrict->execute();

$changeCity = $_pdo->prepare("UPDATE clientes SET cidade = '$_receivedCity' WHERE idcliente = '$idCliente'");
$changeCity->execute();

$changeState = $_pdo->prepare("UPDATE clientes SET estado = '$_receivedState' WHERE idcliente = '$idCliente'");
$changeState->execute();

header("location:meu-endereco");
?>