<?php
 session_start();
	require_once("../conexao/db.php");
	$clientId = $_SESSION["idcliente"];

	$_dataName = $_POST["data-name"];
	$_dataEmail = $_POST["data-email"];
	$_dataCpf = $_POST["data-cpf"];
	$_dataCellphone = $_POST["data-cellphone"];
	$_dataRg = $_POST["data-rg"];
 $_dataGender = $_POST["data-select-gender"];

 $updateDataName = $_pdo->prepare("UPDATE clientes SET nomecliente = '$_dataName' WHERE idcliente = '$clientId'");
 $updateDataName->execute();

 $updateDataEmail = $_pdo->prepare("UPDATE clientes SET email = '$_dataEmail' WHERE idcliente = '$clientId'");
 $updateDataEmail->execute();

 $updateDataCpf = $_pdo->prepare("UPDATE clientes SET cpf = '$_dataCpf' WHERE idcliente = '$clientId'");
 $updateDataCpf->execute();

 $updateDataCellphone = $_pdo->prepare("UPDATE clientes SET celular = '$_dataCellphone' WHERE idcliente = '$clientId'");
 $updateDataCellphone->execute();

 $updateDataRg = $_pdo->prepare("UPDATE clientes SET rg = '$_dataRg' WHERE idcliente = '$clientId'");
 $updateDataRg->execute();

 $updateDataGender = $_pdo->prepare("UPDATE clientes SET sexo = '$_dataGender' WHERE idcliente = '$clientId'");
 $updateDataGender->execute();

 header("location:alterar-dados");
?>