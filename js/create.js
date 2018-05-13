window.onload = function(){
	document.forms["new_quiz"].onsubmit = create_check;
	document.getElementById("btn_last_nav").onclick = about;
}

function create_check(){
	if(document.forms["new_quiz"]["quiz_name"].value == ""){
		alert("Empty feald!");
		return false;
	}
}

function about(){
	document.getElementById("teem").scrollIntoView();
}