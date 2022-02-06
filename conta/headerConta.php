<?php require_once("../conexao/db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<style>
		#bg-w-img{
			background-color: #1d1d1d;
			width: 100%;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		#img-header-account{
			width: 21%;
			margin-left: 25%;
		}
		a{
			text-decoration: none;
		}
		#user-greeting{
			margin-right: 0%;
			color: #d9d8d8;
			font-size: 0.9rem;
			width: 20%;
		}
	</style>
	<?php
	 $idCliente = $_SESSION["idcliente"];
		$infoCliente = $_pdo->prepare("SELECT * FROM clientes WHERE idcliente = '$idCliente'");
		$infoCliente->execute();
		$infoClienteValues = $infoCliente->fetch(PDO::FETCH_ASSOC);
		
	?>
		<div id="bg-w-img">
			<a href="../php/homep"><img src="../img/radtek-white.png" id="img-header-account"></a>
			<b id="user-greeting"><img src="../img/user.svg" style="margin-right: 4%;"><?php echo "Olá, ".$infoClienteValues['nomecliente'];?></b>
		</div>
</body>
</html>