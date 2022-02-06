<?php
require_once("../src/PHPMailer.php");
require_once("../src/SMTP.php");
require_once("../src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try{
	$userEmail = $_GET["useremail"];
 $awnserProblem = $_POST["awnser-problem"];
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'equipedesuportenimble@gmail.com';
	$mail->Password = 'aalbyaht9182';
	$mail->Port = 587;
	$mail->setFrom('equipedesuportenimble@gmail.com');
	$mail->addAddress("$userEmail");
	
	$mail->isHTML(true);
	$mail->Subject = 'Teste de suporte';
	$mail->Body = "<strong>$awnserProblem</strong>";
	$mail->AltBody = 'Chegou o email teste';
	
	if($mail->send()){
		echo 'Email enviado';
	}else{
		echo 'Email não enviado';
	}
	
}catch(Exception $e){
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?>