<?php
session_start();
require_once("../conexao/db.php");
$_prodName = $_GET["nm"];

$_selectProdType = $_pdo->prepare("SELECT * FROM produtos WHERE Nome_Produto = '$_prodName'");
$_selectProdType->execute();
$_selectProdTypeFetch = $_selectProdType->fetch(PDO::FETCH_ASSOC); 

if($_selectProdTypeFetch["Tipo_Produto"]=="Monitor"){
	$idCliente = $_SESSION["idcliente"];
	$_getUser = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
 $_getUser->execute();
	$_getUserFetch = $_getUser->fetch(PDO::FETCH_ASSOC);
	$insertClick = $_getUserFetch["qnt_cliques_monitor"]+1;
	
	$insertClick = $_pdo->prepare("UPDATE clientes SET qnt_cliques_monitor = '$insertClick' WHERE idcliente = '$idCliente'");
	$insertClick->execute();
	
	$updateVisit = $_pdo->prepare(
		"UPDATE clientes
		SET ultima_visita_monitor = '1',
		ultima_visita_console = '0',
		ultima_visita_tablet = '0',
		ultima_visita_computador = '0',
		ultima_visita_notebook = '0',
		ultima_visita_jogo = '0',
		ultima_visita_cadeira = '0'"
	);
	$updateVisit->execute();
}

if($_selectProdTypeFetch["Tipo_Produto"]=="Console"){
	$idCliente = $_SESSION["idcliente"];
	$_getUser = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
 $_getUser->execute();
	$_getUserFetch = $_getUser->fetch(PDO::FETCH_ASSOC);
	$insertClick = $_getUserFetch["qnt_cliques_console"]+1;
	
	$insertClick = $_pdo->prepare("UPDATE clientes SET qnt_cliques_console = '$insertClick' WHERE idcliente = '$idCliente'");
	$insertClick->execute();
	
		$updateVisit = $_pdo->prepare(
		"UPDATE clientes
		SET ultima_visita_console = '1',
		ultima_visita_monitor = '0',
		ultima_visita_tablet = '0',
		ultima_visita_computador = '0',
		ultima_visita_notebook = '0',
		ultima_visita_jogo = '0',
		ultima_visita_cadeira = '0'"
	);
	$updateVisit->execute();
}

if($_selectProdTypeFetch["Tipo_Produto"]=="Tablet"){
	$idCliente = $_SESSION["idcliente"];
	$_getUser = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
 $_getUser->execute();
	$_getUserFetch = $_getUser->fetch(PDO::FETCH_ASSOC);
	$insertClick = $_getUserFetch["qnt_cliques_tablet"]+1;
	
	$insertClick = $_pdo->prepare("UPDATE clientes SET qnt_cliques_tablet = '$insertClick' WHERE idcliente = '$idCliente'");
	$insertClick->execute();
	
		$updateVisit = $_pdo->prepare(
		"UPDATE clientes
		SET ultima_visita_tablet = '1',
		ultima_visita_console = '0',
		ultima_visita_monitor = '0',
		ultima_visita_computador = '0',
		ultima_visita_notebook = '0',
		ultima_visita_jogo = '0',
		ultima_visita_cadeira = '0'"
	);
	$updateVisit->execute();
}

if($_selectProdTypeFetch["Tipo_Produto"]=="Computador"){
	$idCliente = $_SESSION["idcliente"];
	$_getUser = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
 $_getUser->execute();
	$_getUserFetch = $_getUser->fetch(PDO::FETCH_ASSOC);
	$insertClick = $_getUserFetch["qnt_cliques_computador"]+1;
	
	$insertClick = $_pdo->prepare("UPDATE clientes SET qnt_cliques_computador = '$insertClick' WHERE idcliente = '$idCliente'");
	$insertClick->execute();
	
		$updateVisit = $_pdo->prepare(
		"UPDATE clientes
		SET ultima_visita_computador = '1',
		ultima_visita_console = '0',
		ultima_visita_tablet = '0',
		ultima_visita_monitor = '0',
		ultima_visita_notebook = '0',
		ultima_visita_jogo = '0',
		ultima_visita_cadeira = '0'"
	);
	$updateVisit->execute();
}

if($_selectProdTypeFetch["Tipo_Produto"]=="Notebook"){
	$idCliente = $_SESSION["idcliente"];
	$_getUser = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
 $_getUser->execute();
	$_getUserFetch = $_getUser->fetch(PDO::FETCH_ASSOC);
	$insertClick = $_getUserFetch["qnt_cliques_notebook"]+1;
	
	$insertClick = $_pdo->prepare("UPDATE clientes SET qnt_cliques_notebook = '$insertClick' WHERE idcliente = '$idCliente'");
	$insertClick->execute();
	
		$updateVisit = $_pdo->prepare(
		"UPDATE clientes
		SET ultima_visita_notebook = '1',
		ultima_visita_console = '0',
		ultima_visita_tablet = '0',
		ultima_visita_computador = '0',
		ultima_visita_monitor = '0',
		ultima_visita_jogo = '0',
		ultima_visita_cadeira = '0'"
	);
	$updateVisit->execute();
}

if($_selectProdTypeFetch["Tipo_Produto"]=="Jogo"){
	$idCliente = $_SESSION["idcliente"];
	$_getUser = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
 $_getUser->execute();
	$_getUserFetch = $_getUser->fetch(PDO::FETCH_ASSOC);
	$insertClick = $_getUserFetch["qnt_cliques_jogo"]+1;
	
	$insertClick = $_pdo->prepare("UPDATE clientes SET qnt_cliques_jogo = '$insertClick' WHERE idcliente = '$idCliente'");
	$insertClick->execute();
	
		$updateVisit = $_pdo->prepare(
		"UPDATE clientes
		SET ultima_visita_jogo= '1',
		ultima_visita_console = '0',
		ultima_visita_tablet = '0',
		ultima_visita_computador = '0',
		ultima_visita_notebook = '0',
		ultima_visita_monitor = '0',
		ultima_visita_cadeira = '0'"
	);
	$updateVisit->execute();
}

if($_selectProdTypeFetch["Tipo_Produto"]=="Cadeira"){
	$idCliente = $_SESSION["idcliente"];
	$_getUser = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
 $_getUser->execute();
	$_getUserFetch = $_getUser->fetch(PDO::FETCH_ASSOC);
	$insertClick = $_getUserFetch["qnt_cliques_cadeira"]+1;
	
	$insertClick = $_pdo->prepare("UPDATE clientes SET qnt_cliques_cadeira = '$insertClick' WHERE idcliente = '$idCliente'");
	$insertClick->execute();
	
	$updateVisit = $_pdo->prepare(
		"UPDATE clientes
		SET ultima_visita_cadeira = '1',
		ultima_visita_console = '0',
		ultima_visita_tablet = '0',
		ultima_visita_computador = '0',
		ultima_visita_notebook = '0',
		ultima_visita_jogo = '0',
		ultima_visita_monitor = '0'"
	);
	$updateVisit->execute();
}

header("location:../products/$_prodName.php");
?>