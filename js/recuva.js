window.onload = function(){
	document.forms["confirm_mail"].onsubmit = recuva;
	document.getElementById("btn_last_nav").onclick = about;
}

function recuva(){
	if(document.forms["confirm_mail"]["mail"].value == ""){
		alert("Empty feald!");
		return false;
	}
}

function about(){
	document.getElementById("teem").scrollIntoView();
}