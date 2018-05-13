window.onload = function(){
	document.forms["modify"].onsubmit = modify;
	document.getElementById("btn_last_nav").onclick = about;
}

function modify(){
	if(document.forms["modify"]["old_password"].value == "" || document.forms["modify"]["new_password"].value == "" || document.forms["modify"]["confirm_password"].value == ""){
		alert("Empty feald!");
		return false;
	}else if(document.forms["modify"]["new_password"].value != document.forms["modify"]["confirm_password"].value){
		alert("Password confirmation failed!");
		return false;
	}
}

function about(){
	document.getElementById("teem").scrollIntoView();
}