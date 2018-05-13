window.onload = function(){
	document.forms["search"].onsubmit = search_check;
}

function search_check(){
	if(document.forms["search"]["search_input"].value == ""){
		alert("Empty feald!");
		return false;
	}
}