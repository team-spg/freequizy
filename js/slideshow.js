var array = new Array("img/1.png", "img/2.png", "img/3.png", "img/4.png", "img/5.png");
var count = 0;
function slideshow(){
	var baner = document.getElementById("baner");
	baner.src = array[count];
	count++;
	if(count == 5)
		count = 0;
}
var interval = setInterval("slideshow()", 2000);