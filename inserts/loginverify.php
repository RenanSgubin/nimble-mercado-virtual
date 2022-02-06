<?php
session_start();
require_once("../conexao/db.php");
$emailLoginVerify = $_POST["name-email-login"];
$pswLoginVerify = $_POST["name-psw-login"];

if(isset($emailLoginVerify) && isset($pswLoginVerify )){
	if($emailLoginVerify == "suportenimble@nimble.com" && $pswLoginVerify == "hexpsw2192817"){
		 session_regenerate_id(true);
			$_SESSION["nimble-suporte"] = "true";
		 header("location:../suporte/duvidas");
	}else{
	$pswVerify = $_pdo->prepare("SELECT * FROM clientes WHERE email = '$emailLoginVerify'");
 $pswVerify->execute();
 $pswVerifyResult = $pswVerify->fetch(PDO::FETCH_ASSOC);
 $data = $pswVerifyResult['senha'];
  if(password_verify($pswLoginVerify, $data)){
			$cookieTime = 60 * 60 * 24 * 7;
			session_set_cookie_params($cookieTime);
			session_regenerate_id(true);
			$_SESSION["user-name"] = $pswVerifyResult['nomecliente'];
			$_SESSION["cellphone"] = $pswVerifyResult['celular'];
			$_SESSION["cpf"] = $pswVerifyResult['cpf'];
			$_SESSION["email"] = $pswVerifyResult['email'];
			$_SESSION["cep"] = $pswVerifyResult['cep'];
			$_SESSION["numero"] = $pswVerifyResult['cidade'];
			$_SESSION["bairro"] = $pswVerifyResult['bairro'];
			$_SESSION["rua"] = $pswVerifyResult['rua'];
			$_SESSION["estado"] = $pswVerifyResult['estado'];
			$_SESSION["idcliente"] = $pswVerifyResult['idcliente'];
			$_SESSION["autenticado"] = "1";
			header("location:../php/homep");
			
		}
		else{
	  echo "<b style='color: red;position: absolute;top: 125%;left: 50%;transform: translateX(-50%);z-index:1;'>Email ou senha inválidos.</b>";
			require_once("../conta/login.php");
		}
 }
}

else{
	  echo "<b style='color: white;'>Campos vazios identificados</b>";
			require_once("../conta/login");
			
}
?>