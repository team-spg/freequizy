window.onload = function(){
	document.forms["login"].onsubmit = login;
}

function login(){
	if(document.forms["login"]["username"].value == "" || document.forms["login"]["password"].value == ""){
		alert("Empty feald!");
		return false;
	}
}