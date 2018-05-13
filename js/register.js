window.onload = function(){
	document.forms["register"].onsubmit = register;
	document.getElementById("btn_last_nav").onclick = about;
}

function register(){
	if(document.forms["register"]["username"].value == "" || document.forms["register"]["password"].value == "" || document.forms["register"]["confirm_password"].value == "" || document.forms["register"]["email"].value == ""){
		alert("Empty feald!");
		return false;
	}else if(document.forms["register"]["password"].value != document.forms["register"]["confirm_password"].value){
		alert("Password confirmation failed!");
		return false;
	}
}

function about(){
	document.getElementById("teem").scrollIntoView();
}