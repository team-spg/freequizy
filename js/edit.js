window.onload = function(){
	document.forms["edit"].onsubmit = edit_check;
	document.getElementById("btn_last_nav").onclick = about;
}

function edit_check(){
	if(document.forms["edit"]["question"].value == ""){
		alert("Empty feald!");
		return false;
	}
	var count = 0;
	if(document.forms["edit"]["a"].value == ""){
		count++;
	}
	if(document.forms["edit"]["b"].value == ""){
		count++;
	}
	if(document.forms["edit"]["c"].value == ""){
		count++;
	}
	if(document.forms["edit"]["d"].value == ""){
		count++;
	}
	if(count > 2 && count <= 4){
		alert("Empty feald!");
		return false;
	}
	if(document.forms["edit"]["answer"].value == ""){
		alert("Empty feald!");
		return false;
	}
}

function about(){
	document.getElementById("teem").scrollIntoView();
}