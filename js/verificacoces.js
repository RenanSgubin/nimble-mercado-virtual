function validaReg(){
		var mlnome = document.getElementById("ml-register-nome").value;
	 var cpf = document.getElementById("idcpf").value;
	 var email = document.getElementById("idemail").value;
	 var password = document.getElementById("idpassword").value;
	 var passwordcnf = document.getElementById("idpasswordconfirm").value;
		var cep = document.getElementById("idcep").value;
		var numero = document.getElementById("idnumero").value;
	 
	
	
	 if(mlnome.length>0 && cpf.length>0 && email.length>0 && password.length>0 && passwordcnf.length>0 && cep.length>0 && numero.length>0){
					
		}
	 else if(mlnome.length==0 || cpf.length==0 || email.length==0 || password.length==0 || passwordcnf.length == 0 || cep.length==0|| numero.length==0){
					alert("Ainda há campos vazios!");
		}
	 
}
function validaNome(){
	 var pattern = '[a-zA-Z]';
	 var pattern2 = '[0-9]';
	 var pattern3 = '[!@$#%¨¨&*`´{}]';
		var mlnome = document.getElementById("ml-register-nome").value;

	if(mlnome.match(pattern)){document.getElementById("labelnome").innerHTML = "";}/*Correto*/
	
	if(mlnome.match(pattern2)){
		  document.getElementById("ml-register-nome").value = "";
				document.getElementById("labelnome").style.color = "red";
				document.getElementById("labelnome").innerHTML = "Não são permitidos números.";
}
	
	if(mlnome.match(pattern3)){
		  document.getElementById("ml-register-nome").value = "";	
				document.getElementById("labelnome").style.color = "red";
				document.getElementById("labelnome").innerHTML = "Não são permitidos caracteres especiais.";
	}
}
function mask(o, f) {
  setTimeout(function() {
    var v = validaNumero(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}
function validaNumero() {
	 var aa = document.getElementById("idcel").value;
  var r = aa.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}
function validaCpf(){
		var valCpf = document.getElementById("idcpf").value;
	 var pattern = '[a-zA-Z]';
	 var pattern2 = '[!@$#%¨¨&*`´{}]';

	   var Soma;
    var Resto;
    Soma = 0;
  if (valCpf == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(valCpf.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0; 
    if (Resto != parseInt(valCpf.substring(9, 10)) )
					
				document.getElementById("labelconfirmcpf").innerHTML = "CPF Inválido.";
				document.getElementById("labelconfirmcpf").style.color = "red";

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(valCpf.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0; 
    if (Resto != parseInt(valCpf.substring(10, 11) ) ) return false;
	
				document.getElementById("labelconfirmcpf").style.color = "black";
				document.getElementById("labelconfirmcpf").innerHTML = "";
	}
function validaEmail(){
				var emailValida = document.getElementById("idemail").value;
    var re = /\S+@\S+\.\S+/;
	   
	   if(re.test(emailValida) == false){
					document.getElementById("labelemail").style.color = "red";
					document.getElementById("labelemail").innerHTML = "Email Inválido.";
				}
				if(re.test(emailValida) == true){
					document.getElementById("labelemail").style.color = "black";
					document.getElementById("labelemail").innerHTML = "";
				}
}
function validaSenha(){
	  var pattern = '[a-zA-Z]';
	  var pattern2 = '[0-9]';
	  var pattern3 = '[!@$#%¨¨&*`´{}]';
			document.getElementById("labelsenha").innerHTML;
	
		var password = document.getElementById("idpassword").value;
	
	if(password.match(pattern) && password.match(pattern2) && password.match(pattern3) && password.length>=8){
		 document.getElementById("labelsenha").innerHTML = "";
	}else{
		 document.getElementById("labelsenha").style.color = "red";
		 document.getElementById("labelsenha").innerHTML = "Sua senha deve conter pelo menos uma letra, um número e um caractere especial.";
	}
}

function confirmaSenha(){
	 document.getElementById("labelconfirmsenha").innerHTML;
	 var passwordcnf = document.getElementById("idpasswordconfirm").value;
		var password = document.getElementById("idpassword").value;
	
	if(passwordcnf!=password){
		document.getElementById("labelconfirmsenha").style.color = "red";
		document.getElementById("labelconfirmsenha").innerHTML = "As senhas não coincidem.";
	}if(passwordcnf==password){
		document.getElementById("labelconfirmsenha").innerHTML = "";
	}
}

function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
          document.getElementById("labelcep").innerHTML = "";
												document.getElementById('idrua').value=(conteudo.logradouro);
            document.getElementById('idbairro').value=(conteudo.bairro);
            document.getElementById('idcidade').value=(conteudo.localidade);
            document.getElementById('idestado').value=(conteudo.uf);
        } //end if.
        else {
												document.getElementById("labelcep").style.color = "red";
            document.getElementById("labelcep").innerHTML = "CEP não encontrado.";
        }
    }

function validaCep(){
			var pattern = '[a-zA-Z]';
	 	var pattern2 = '[0-9]';
	 	var pattern3 = '[!@$#%¨¨&*`´{}]';
			var cepValue = document.getElementById("idcep").value;
   var cep = cepValue.replace(/\D/g, '');
   var validacep = /^[0-9]{8}$/;
								if(cepValue.match(pattern) || cepValue.match(pattern3)){
											document.getElementById("labelcep").innerHTML = "Apenas números são permitidos."
											document.getElementById("idcep").value = "";
								}
								if(validacep.test(cep)) {
											  var scripttt = document.createElement('script');

                //Sincroniza com o callback.
                scripttt.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(scripttt);
								}
								else{
													document.getElementById("labelcep").style.color = "red";
													document.getElementById("labelcep").innerHTML = "Formato de CEP INVALIDO."
								}
}
