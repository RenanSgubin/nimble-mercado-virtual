<?php
session_start();
require_once("../conexao/db.php");
$idCliente = $_SESSION["idcliente"];

$password = trim(password_hash($_POST["change-password"], PASSWORD_ARGON2I));

$changePsw = $_pdo->prepare("UPDATE clientes SET senha = '$password' WHERE idcliente = '$idCliente'");
$changePsw->execute();
header("location:alterar-senha");
?>