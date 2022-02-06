<?php
session_start();
if(!isset($_SESSION["nimble-suporte"])){
	header("location:../conta/login");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Duvidas | Suporte</title>
	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../css/questions.css">
</head>
<body>
<?php require_once("headerSup.php");?>
<div class="container-sup">
 <?php
	 require_once("../conexao/db.php");
	 $_getQuestions = $_pdo->prepare("SELECT * FROM duvidas_suporte");
		$_getQuestions->execute();
		$_getQuestionsFetchAll = $_getQuestions->fetchAll(PDO::FETCH_ASSOC);	
		
		foreach($_getQuestionsFetchAll as $_getQuestionsFetchAllFC){				
	?>
		<div class="container-block">
			  <div class="content-block">
		  	 <b>Nome:</b><br> <?php echo $_getQuestionsFetchAllFC["nome_cliente_sup"]?><br><br>
		  	 <b>Email:</b><br> <?php echo $_getQuestionsFetchAllFC["email_cliente_sup"]?><br><br>
		  	 <b>Tipo do Problema:</b><br> <?php echo $_getQuestionsFetchAllFC["tipo_problema_sup"]?><br>
									<br>
									<div class="desc-problem">
										<?php echo $_getQuestionsFetchAllFC["desc_problema_sup"];?>
									</div><br><br><br>
									<form class="sup-awnser" method="post" action="../suporte/sendEmail?useremail=<?php echo $_getQuestionsFetchAllFC["email_cliente_sup"]?>">
									  Inserir Resposta<br>
										<textarea class="text-area-awnser" name="awnser-problem"></textarea>
										<div class="answer-button">
												<button type="submit"><img src="../img/corner-down-right.svg"></button>
									 </div>
									</form>
        		<a href="excludeQuestion?userid=<?php echo $_getQuestionsFetchAllFC["id_cliente_suporte"];?>" id="exclude-question"><img src="../img/x.svg"></a>

			  </div>
		</div>
	<?php }?>
	</div>
</body>
</html>
<?php }?>