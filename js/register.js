window.onload = function(){
	document.forms["register"].onsubmit = register;
}

function register(){
	if(document.forms["register"]["username"].value == "" || document.forms["register"]["password"].value == "" || document.forms["register"]["confirm_password"].value == ""){
		alert("Empty feald!");
		return false;
	}else if(document.forms["register"]["password"].value != document.forms["register"]["confirm_password"].value){
		alert("Password confirmation failed!");
		return false;
	}
}