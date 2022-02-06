<?php

$dsn = "mysql:dbname=nimble;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try{
	$_pdo = new PDO($dsn,$dbuser,$dbpass);
	$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	var_dump($_e);
	echo $_e->getMessage();
	echo "<br>";
	echo $_e->getCode();
}
?>
