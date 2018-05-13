window.onload = function(){
	document.forms["new_quiz"].onsubmit = create_check;
}

function create_check(){
	if(document.forms["new_quiz"]["quiz_name"].value == ""){
		alert("Empty feald!");
		return false;
	}
}