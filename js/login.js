window.onload = function(){
	document.forms["login"].onsubmit = login;
	document.getElementById("btn_last_nav").onclick = about;
}

function login(){
	if(document.forms["login"]["username"].value == "" || document.forms["login"]["password"].value == ""){
		alert("Empty feald!");
		return false;
	}
}

function about(){
	document.getElementById("teem").scrollIntoView();
}