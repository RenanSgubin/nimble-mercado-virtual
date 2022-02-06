function getProductType(){
	var productType = document.getElementById("id-product-type");
	var content = productType.options[productType.selectedIndex].text;
	
	if(content === "Console"){
		document.getElementById("type-console").style.display = "block";
		document.getElementById("type-monitor").style.display = "none";
		document.getElementById("type-tablet").style.display = "none";
		document.getElementById("type-computador").style.display = "none";
		document.getElementById("type-notebook").style.display = "none";
		document.getElementById("type-jogo").style.display = "none";
		document.getElementById("type-cadeira").style.display = "none";
	}
	
	
	if(content === "Monitor"){
		document.getElementById("type-console").style.display = "none";
		document.getElementById("type-monitor").style.display = "block";
		document.getElementById("type-tablet").style.display = "none";
		document.getElementById("type-computador").style.display = "none";
		document.getElementById("type-notebook").style.display = "none";
		document.getElementById("type-jogo").style.display = "none";
		document.getElementById("type-cadeira").style.display = "none";
	}
	
	
	if(content === "Tablet"){
		document.getElementById("type-console").style.display = "none";
		document.getElementById("type-monitor").style.display = "none";
		document.getElementById("type-tablet").style.display = "block";
		document.getElementById("type-computador").style.display = "none";
		document.getElementById("type-notebook").style.display = "none";
		document.getElementById("type-jogo").style.display = "none";
		document.getElementById("type-cadeira").style.display = "none";
	}
	
	
	if(content === "Computador"){
		document.getElementById("type-console").style.display = "bone";
		document.getElementById("type-monitor").style.display = "none";
		document.getElementById("type-tablet").style.display = "none";
		document.getElementById("type-computador").style.display = "block";
		document.getElementById("type-notebook").style.display = "none";
		document.getElementById("type-jogo").style.display = "none";
		document.getElementById("type-cadeira").style.display = "none";
	}
	
	
	if(content === "Notebook"){
		document.getElementById("type-console").style.display = "none";
		document.getElementById("type-monitor").style.display = "none";
		document.getElementById("type-tablet").style.display = "none";
		document.getElementById("type-computador").style.display = "none";
		document.getElementById("type-notebook").style.display = "block";
		document.getElementById("type-jogo").style.display = "none";
		document.getElementById("type-cadeira").style.display = "none";
	}
	
	
	if(content === "Jogo"){
		document.getElementById("type-console").style.display = "none";
		document.getElementById("type-monitor").style.display = "none";
		document.getElementById("type-tablet").style.display = "none";
		document.getElementById("type-computador").style.display = "none";
		document.getElementById("type-notebook").style.display = "none";
		document.getElementById("type-jogo").style.display = "block";
		document.getElementById("type-cadeira").style.display = "none";
	}
	
	
	if(content === "Cadeira"){
		document.getElementById("type-console").style.display = "none";
		document.getElementById("type-monitor").style.display = "none";
		document.getElementById("type-tablet").style.display = "none";
		document.getElementById("type-computador").style.display = "none";
		document.getElementById("type-notebook").style.display = "none";
		document.getElementById("type-jogo").style.display = "none";
		document.getElementById("type-cadeira").style.display = "block";

	}
}


function processorChange(){
	var processorType = document.getElementById("id-processor-type-pc");
	var content = processorType.options[processorType.selectedIndex].text;
	
	if(content == "Intel"){
		document.getElementById("intel-gen").style.display = "block";
		document.getElementById("amd-gen").style.display = "none";
	}else{
		document.getElementById("intel-gen").style.display = "none";
		document.getElementById("amd-gen").style.display = "block";
	}
}

function processorChangeNotebook(){
	var processorType = document.getElementById("id-processor-type-notebook");
	var content = processorType.options[processorType.selectedIndex].text;
	
	if(content == "Intel"){
		document.getElementById("intel-gen-notebook").style.display = "block";
		document.getElementById("amd-gen-notebook").style.display = "none";
	}else{
		document.getElementById("intel-gen-notebook").style.display = "none";
		document.getElementById("amd-gen-notebook").style.display = "block";
	}
}