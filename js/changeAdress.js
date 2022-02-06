function changeAdress(){
	var cepChange = document.getElementById("change-cep").value;
	if(cepChange.length < 8){
		document.getElementById("change-cep").style.borderBottom = "2px solid #ff5d5d";
		document.getElementById("save-changes").disabled = true;
	}else{
		 var pattern = '[a-zA-Z]';
	 	var pattern2 = '[0-9]';
	 	var pattern3 = '[!@$#%¨¨&*`´{}]';
			var cepValue = document.getElementById("change-cep").value;
   var cep = cepValue.replace(/\D/g, '');
   var validacep = /^[0-9]{8}$/;
								if(cepValue.match(pattern) || cepValue.match(pattern3)){
											document.getElementById("change-cep").style.borderBottom = "2px solid #ff5d5d";
											document.getElementById("save-changes").disabled = true;
								}
								if(validacep.test(cep)) {
											  var scripttt = document.createElement('script');

                //Sincroniza com o callback.
                scripttt.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(scripttt);
								}
								else{
													document.getElementById("change-cep").style.borderBottom = "2px solid #ff5d5d";
													document.getElementById("save-changes").disabled = true;
								}
	}
}
function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
									   document.getElementById("change-cep").style.borderBottom = "2px solid #82CB6F";
												document.getElementById("save-changes").disabled = false;
												document.getElementById('road').innerHTML=(conteudo.logradouro);
            document.getElementById('district').innerHTML=(conteudo.bairro);
            document.getElementById('city').innerHTML=(conteudo.localidade);
            document.getElementById('state').innerHTML=(conteudo.uf);
									
												document.getElementById('receive-road-id').value=(conteudo.logradouro);
            document.getElementById('receive-district-id').value=(conteudo.bairro);
            document.getElementById('receive-city-id').value=(conteudo.localidade);
            document.getElementById('receive-state-id').value=(conteudo.uf);
        } //end if.
        else {
												document.getElementById("change-cep").style.borderBottom = "2px solid #ff5d5d";
        }
    }
