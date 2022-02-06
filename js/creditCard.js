/*Mudar os textos enquanto escreve*/
function changeCardNumber(){
	
		
	var cardNumberValue = document.getElementById("id-card-number").value;
	var cardNumberValueFirstNumbers = cardNumberValue.substring(0,4);
	var cardNumberValueSecondNumbers = cardNumberValue.substring(4,8);
	var cardNumberValueThirdNumbers = cardNumberValue.substring(8,12);
	var cardNumberValueFourthNumbers = cardNumberValue.substring(12,16);
	

	document.getElementById("first-f-numbers").innerHTML = cardNumberValueFirstNumbers;
	document.getElementById("second-f-numbers").innerHTML = cardNumberValueSecondNumbers;
	document.getElementById("third-f-numbers").innerHTML = cardNumberValueThirdNumbers;
	document.getElementById("fourth-f-numbers").innerHTML = cardNumberValueFourthNumbers;
}
function changeMonth(){
	var monthSelect = document.getElementById("month-select-value");
	var monthSelectValue = monthSelect.options[monthSelect.selectedIndex].text; 
	document.getElementById("month-b").innerHTML = monthSelectValue;
}
function changeYear(){
	var yearSelect = document.getElementById("year-select-value");
	var yearSelectValue = yearSelect.options[yearSelect.selectedIndex].text;
	document.getElementById("year-b").innerHTML = yearSelectValue;
}
function changeHolderName(){
	var holder = document.getElementById("holder-input-id").value;
	document.getElementById("owner-b").innerHTML = holder;
}
function changeSecurityCode(){
	var securityCode = document.getElementById("security-code-id").value;
	document.getElementById("security-code-card").innerHTML = securityCode;
}
function onFocusRotate(){
	document.getElementById("credit-card").style.transform = "rotateY(-180deg)";
	var securityCode = document.getElementById("security-code-id").value;
	if(securityCode==""){
			document.getElementById("security-code-id").style.borderBottom = "2px solid #ff5d5d";
	}else{
		document.getElementById("security-code-id").style.borderBottom = "2px solid #82CB6F";
	}
}
function onBlurNotRotate(){
	document.getElementById("credit-card").style.transform = "rotateY(-360deg)";
	var securityCode = document.getElementById("security-code-id").value;
	if(securityCode=="" || securityCode.length<3){
			document.getElementById("security-code-id").style.borderBottom = "2px solid #ff5d5d";
	}else{
		document.getElementById("security-code-id").style.borderBottom = "2px solid #82CB6F";
	}
}
/*Mudar aparência do cartão*/
function masterCardChange(){
	document.getElementById("payment-method-type-img").src = "../img/mc_vrt_pos.svg";
	document.getElementById("credit-card").style.background = "linear-gradient(to bottom, #fbfbfb 0%, #B1B1B1 100%)";
	document.getElementById("credit-card-back").style.background = "linear-gradient(to bottom, #fbfbfb 0%, #B1B1B1 100%)";
	
}
function visaChange(){
	document.getElementById("payment-method-type-img").src = "../img/visa-icon.png";
	document.getElementById("credit-card").style.background = "linear-gradient(120deg, #1a1f71, #f7b600)";
	document.getElementById("credit-card-back").style.background = "linear-gradient(120deg, #1a1f71, #f7b600)";
}
function hiperCardChange(){
	document.getElementById("payment-method-type-img").src = "../img/hipercard.svg";
	document.getElementById("payment-method-type-img").style.marginTop = "15%";
	document.getElementById("credit-card").style.background = "linear-gradient(120deg, rgba(249,227,227,1) 5%, rgba(233,115,115,1) 13%, rgba(235,74,74,1) 42%, rgba(227,23,23,1) 88%)";
	document.getElementById("credit-card-back").style.background = "linear-gradient(120deg, rgba(249,227,227,1) 5%, rgba(233,115,115,1) 13%, rgba(235,74,74,1) 42%, rgba(227,23,23,1) 88%)";
}
function eloChange(){
	document.getElementById("payment-method-type-img").src = "../img/elo_payment_method_card_icon_142740.svg";
	document.getElementById("payment-method-type-img").style.marginTop = "15%";
	document.getElementById("credit-card").style.background = "linear-gradient(120deg, rgba(18,18,18,1) 44%, rgba(45,45,45,1) 60%)";
	document.getElementById("credit-card-back").style.background = "linear-gradient(120deg, rgba(18,18,18,1) 44%, rgba(45,45,45,1) 60%)";
}
function nubankChange(){
	document.getElementById("payment-method-type-img").src = "../img/nubank-logo.svg";
	document.getElementById("payment-method-type-img").style.marginTop = "15%";
	document.getElementById("credit-card").style.background = "linear-gradient(120deg, #7A43B6, #7A43B6)";
	document.getElementById("credit-card-back").style.background = "linear-gradient(120deg, #7A43B6 0%, #7A43B6 100%)";
}

/*VERIFICAÇÕES DE INFORMAÇÕES DO CARTÃO DE CRÉDITO*/
function cardNumberVerify(){
	var cardNumber = document.getElementById("id-card-number").value;
		if(cardNumber.length<16 ){
		document.getElementById("id-card-number").style.borderBottom = "2px solid #ff5d5d";
	}else{
		document.getElementById("id-card-number").style.borderBottom = "2px solid #82CB6F";
	}
}
function holderCardVerify(){
	var cardHolder = document.getElementById("holder-input-id").value;
	if(cardHolder==""){
		document.getElementById("holder-input-id").style.borderBottom = "2px solid #ff5d5d";
	}else{
		document.getElementById("holder-input-id").style.borderBottom = "2px solid #82CB6F";
	}
}
