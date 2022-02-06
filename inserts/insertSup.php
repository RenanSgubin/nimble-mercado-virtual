<label for="name-user-input">Nome Completo</label><br>
									<input type="text" class="inputs-supp" name="name-user-input"><br><br>
									<label for="email-user-input">Email</label><br>
									<input type="email" class="inputs-supp" name="email-user-input"><br><br>
									<label for="type-user-input">Tipo do Problema</label><br>
									<select type="text" class="inputs-supp" name="type-user-input">
										<option>Pedidos</option>
										<option>Minha Conta</option>
										<option>Segurança</option>
										<option>Administração de Permissões</option>
										<option>Pagamento</option>
										<option>Outro</option>
									</select><br><br>
									<label for="description-user-input">Descrição do Problema</label><br>
<?php
require_once("../conexao/db.php");

$_nameUser = $_POST["name-user-input"];
$_emailUser = $_POST["email-user-input"];
$_problemTypeUser = $_POST["type-user-input"];
$_descProblemUser = $_POST["description-user-input"];

$_insertSup = $_pdo->prepare("INSERT INTO duvidas_suporte (nome_cliente_sup, email_cliente_sup, tipo_problema_sup, desc_problema_sup) VALUES (:nameuser, :emailuser, :problemuser, :descproblemuser)");
$_insertSup->bindValue(":nameuser", $_nameUser);
$_insertSup->bindValue(":emailuser", $_emailUser);
$_insertSup->bindValue(":problemuser", $_problemTypeUser);
$_insertSup->bindValue(":descproblemuser", $_descProblemUser);

$_insertSup->execute();
header("location:../suporte/faq");
?>