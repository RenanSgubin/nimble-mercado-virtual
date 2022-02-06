<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nimble | Registro </title>
 <link rel="shortcut icon" href="../img/favicon.png"/>
</head>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 <link rel="shortcut icon" href="../img/favicon.png"/>
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
	<body>
	<?php include_once("../php/nav.php")?>
	<div id="container">
		<form id="form-register" method="post" action="../inserts/registerinsert.php"><br>
	  <b style="font-size: 20px;">Dados Pessoais</b>
		  <div id="infos1">
						<label for="namenome">*Nome Completo</label><br>
								<input type="text" id="ml-register-nome" autofocus name="namenome" class="inputs-style" onkeypress="validaNome()" onkeydown="validaNome()" value="<?= (!empty($_POST['namenome']))?$_POST['namenome'] : '' ?>"><br>
						<label for="namenome" id="labelnome"></label><br>
						
						<label for="namecelular">*Celular</label><br>
						 <input type="text" id="idcel" name="namecelular" class="inputs-style" onkeypress="mask(this, validaNumero)" onblur="mask(this, validaNumero)" value="<?= (!empty($_POST['namecelular']))?$_POST['namecelular'] : '' ?>"><br>
					 <label for="namecelular" id="labelcelular"></label><br>
					 
					<label for="namecpf">*CPF</label><br>
						<input type="text" id="idcpf" maxlength="11" name="namecpf" class="inputs-style" onkeypress="validaCpf()" onblur="validaCpf()" value="<?= (!empty($_POST['namecpf']))?$_POST['namecpf'] : '' ?>"><br>
					<label for="namecpf" id="labelconfirmcpf"></label><br>
					
					<label for="nameemail">*Email</label><br>
						<input type="email" id="idemail" name="nameemail" class="inputs-style" onkeypress="validaEmail()" onblur="validaEmail()" value="<?= (!empty($_POST['nameemail']))?$_POST['nameemail'] : '' ?>"><br>
					<label for="nameemail" id="labelemail"></label><br>
					
					<label for="namesenha">*Senha</label><br>
						<input type="password" id="idpassword" name="namesenha" class="inputs-style" onkeypress="validaSenha()" onblur="validaSenha()"><br>
					<label for="namesenha" id="labelsenha"></label><br>
					
					<label for="nameconfirmsenha">*Confirmação da Senha</label><br>
						<input type="password" id="idpasswordconfirm" placeholder="Senha" name="nameconfirmsenha" class="inputs-style" onkeypress="confirmaSenha()" onblur="confirmaSenha()"><br>
					<label for="nameconfirmsenha" id="labelconfirmsenha"></label><br>
					
			</div>
		  
		  <b style="margin: 0 auto; font-size: 20px;">Dados para Entrega</b>
		  <div id="infos1">
						<label for="namecep">*CEP</label><br>
								<input type="text" id="idcep" autofocus name="namecep" class="inputs-style" onkeypress="validaCep()" onblur="validaCep()" maxlength="8" value="<?= (!empty($_POST['namecep']))?$_POST['namecep'] : '' ?>"><br>
						<label for="namecep" id="labelcep"></label><br>
					 
					<label for="namenumero">*Número</label><br>
						<input type="text" id="idnumero" name="namenumero" class="inputs-style" onkeypress="numbersOnly()"><br>
					<label for="namenumero"></label><br>
					
					<label for="namecidade">*Cidade</label><br>
						<input type="text" id="idcidade" name="namecidade" class="inputs-style" readonly><br>
					<label for="namecidade"></label><br>
					
					<label for="namebairro">*Bairro</label><br>
						<input type="text" id="idbairro" name="namebairro" class="inputs-style" readonly><br>
					<label for="namebairro"></label><br>

					<label for="namerua">*Rua</label><br>
						<input type="text" id="idrua" name="namerua" class="inputs-style" readonly><br>
					<label for="namerua"></label><br>
					
					<label for="nameestado">Estado</label><br>
					<input type="text" id="idestado" name="nameestado" class="inputs-style" readonly><br>
					<label for="nameestado"></label><br>
			</div>
			
			<label for="namebtnregister" id="labelcamposvazios"></label><br>
			<button type="submit" id="btn-register" onclick="validaReg()" name="namebtnregister">Finalizar Cadastro</button>
	</form>
</div>
	
		<?php include_once("../php/infossite.php")?>
		<script src="../js/verificacoces.js" type="text/javascript"></script>
		<script src="../js/masks.js" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
	  </script>
	</body>
</html>