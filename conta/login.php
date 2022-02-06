<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Nimble | Login</title>
	   <link rel="shortcut icon" href="../img/favicon.png"/>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="../img/favicon.png"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

	</head>
	<body>
		<?php include_once("../php/nav.php")?>
			<div id="content-center">
				<form class="row g-3" id="form-register" method="post" action="../inserts/loginverify.php">	
			    <!--<div id="hr-broke"><hr id="first-hr"><label id="or">Ou</label><hr id="second-hr"></div>-->
			    	<div id="login-strong-text"><strong>Bem vindo a Nimble!</strong></div>
			    	<div id="insert-credenc"><strong>Insira suas credenciais para continuar</strong></div><br><br><br>
				    <div class="col-md-9 form-group" id="l-email">
										<input type="text" id="idlemail" name="name-email-login" placeholder="Email" autofocus>
										<br>
								</div>
					<div class="col-md-9" id="l-psw">
						<input type="password" id="idlpsw" placeholder="Senha" name="name-psw-login">
						<a href="register.php" id="forg-psw">Esqueceu a senha?</a>
					</div>
					<button type="submit" class="btn btn-dark" id="btn-login">Entrar</button>
					<div id="at-register">Não tem uma conta? <a href="register.php" id="at-cadastro">Cadastre-se</a></div>
				</form>
			</div>
		<?php include_once("../php/infossite.php")?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
		</script>
	</body>
</html>