function changePassword(){
	  var pattern = '[a-zA-Z]';
	  var pattern2 = '[0-9]';
	  var pattern3 = '[!@$#%¨¨&*`´{}]';
			
		var password = document.getElementById("change-password-id").value;
	 var passwordConfirm = document.getElementById("confirm-change-password-id").value;
	
	
	if(password.length>=8){
		document.getElementById("req-1").style.color = "#3a8027";
	}else{
		document.getElementById("req-1").style.color = "#5c5c5c";
	}
	
	if(password.match(pattern)){
		document.getElementById("req-2").style.color = "#3a8027";
	}else{
		document.getElementById("req-2").style.color = "#5c5c5c";
	}
	
	
	if(password.match(pattern2)){
		document.getElementById("req-3").style.color = "#3a8027";
	}else{
		document.getElementById("req-3").style.color = "#5c5c5c";
	}
	
	if(password.match(pattern3)){
		document.getElementById("req-4").style.color = "#3a8027";
	}else{
		document.getElementById("req-4").style.color = "#5c5c5c";
	}
	
	if(password!=passwordConfirm){
		document.getElementById("alert-dif-psw").innerHTML = "As senhas não coincidem!";
		document.getElementById("alert-dif-psw").style.color = "#f45252";
	}else{
		document.getElementById("alert-dif-psw").innerHTML = "";
	}
}