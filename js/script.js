/*
//Baner slideshow
*/
var array = new Array("img/1.png", "img/2.png", "img/3.png", "img/4.png", "img/5.png", "img/6.png");
var count = 0;
function slideshow(){
	var baner = document.getElementById("baner");
	baner.src = array[count];
	count++;
	if(count == 6)
		count = 0;
}
var interval = setInterval("slideshow()", 2000);

/*
//Quiz logic
*/
var questions = new Array("O’zbekistonda tabiiy holda o’sadigan yuksak o’simliklarning necha turi ma’lum?", 
						  "Botanika so’zi yunoncha so’zdan olinib, qanday ma’no anglatadi?", 
						  "Dorivor o’simliklar berilgan qatorni toping?", 
						  "Istemol qilinadigan o’simliklar berilgan qatorni toping?", 
						  "Yovvoyi yem-xashak o’simliklari berilgan qatorni toping?", 
						  "Yer yuzida gulli o’simliklarning nechta oilasi mavjud?", 
						  "Yer yuzida gulli o’simliklarning qancha turkumi mavjud?", 
						  "Seyshel palmasi yong’oqlarining og’irligi qancha?", 
						  "Meksika kaktuslari tanasida qancha suv saqlaydi?", 
						  "Hasharotxo’r o’simliklar berilgan qatorni toping?");

var variant = new Array(["4600", "4500", "8000", "4000"],
						["Hayvon ", "Zamburug’", "O’simlik", "Mikroorganizm"], 
						["Isiriq , zubturum, shirach", "Isiriq ,shuvoq, sallagul", "Isiriq, chakanda, zubturum", "Sirach, sallagul"],
						["Ravoch, do’lana", "Ravoch, sallagul", "Xolmon shirach", "Sebarga, burchoq"],
						["Sallagul,do’lana,ravoch", "Xolmon, shirach, sallagul", "Shuvoq, sebarga, burchoq", "Izen,ravoch"],
						["532", "531", "530", "533"],
						["12000", "13000", "11000", "11500"],
						["22kg", "23kg", "25kg", "20kg"],
						["200 l", "250 l", "300 l", "280 l"],
						["Nepentes, xolmon", "Nepentes, drosera", "Xolmon, kaktus", "Drosera, xolmon"]);
						  
var answers = new Array("B", "C", "C", "A", "C", "D", "B", "C", "A", "B");

var user_answer = new Array("", "", "", "", "", "", "", "", "", "");

var current = 0;
window.onload = function(){
	document.getElementById("radio_a").onclick = choose;
	document.getElementById("radio_b").onclick = choose;
	document.getElementById("radio_c").onclick = choose;
	document.getElementById("radio_d").onclick = choose;
	first();	
	document.getElementById("btn_first").onclick = first;
	document.getElementById("btn_previous").onclick = previous;
	document.getElementById("btn_one").onclick = one;
	document.getElementById("btn_two").onclick = two;
	document.getElementById("btn_three").onclick = three;
	document.getElementById("btn_next").onclick = next;
	document.getElementById("btn_last").onclick = last;
	document.getElementById("btn_go_to").onclick = go_to;
}
function first(){
	current = 0;
	setQuiz();
}
function previous(){
	if(current > 0){
		current -= 1;
		setQuiz();
	}
}
function one(){
	current = parseInt(document.getElementById("btn_one").innerHTML) - 1;
	setQuiz();
}
function two(){
	current = parseInt(document.getElementById("btn_two").innerHTML) - 1;
	setQuiz();
}
function three(){
	current = parseInt(document.getElementById("btn_three").innerHTML) - 1;
	setQuiz();
}
function next(){
	if(current < questions.length - 1){
		current += 1;
		setQuiz();
	}
}
function last(){
	current = questions.length - 1;
	setQuiz();
}
function go_to(){
	if(document.getElementById("page_number").value != "" && parseInt(document.getElementById("page_number").value) <= questions.length && parseInt(document.getElementById("page_number").value) > 0){
		current = parseInt(document.getElementById("page_number").value) - 1;
		setQuiz();
	}
}
function choose(){
	if(document.getElementById("radio_a").checked)
		user_answer[current] = "A";
	else if(document.getElementById("radio_b").checked)
		user_answer[current] = "B";
	else if(document.getElementById("radio_c").checked)
		user_answer[current] = "C";
	else if(document.getElementById("radio_d").checked)
		user_answer[current] = "D";
	
}
function setQuiz(){
	switch(user_answer[current]){
		case "A":
			document.getElementById("radio_a").checked = true;
			break;
		case "B":
			document.getElementById("radio_b").checked = true;
			break;
		case "C":
			document.getElementById("radio_c").checked = true;
			break;
		case "D":
			document.getElementById("radio_d").checked = true;
			break;
		default:
			document.getElementById("radio_a").checked = false;
			document.getElementById("radio_b").checked = false;
			document.getElementById("radio_c").checked = false;
			document.getElementById("radio_d").checked = false;
	}
	document.getElementById("number").innerHTML = current + 1 + ". ";
	document.getElementById("question").innerHTML = questions[current];
	document.getElementById("variant_a").innerHTML = variant[current][0];
	document.getElementById("variant_b").innerHTML = variant[current][1];
	document.getElementById("variant_c").innerHTML = variant[current][2];
	document.getElementById("variant_d").innerHTML = variant[current][3];
	if(current == 0){
		document.getElementById("btn_one").innerHTML = current + 1;
		document.getElementById("btn_two").innerHTML = current + 2;
		document.getElementById("btn_three").innerHTML = current + 3;
	}else if(current == questions.length - 1){
		document.getElementById("btn_one").innerHTML = current - 1;
		document.getElementById("btn_two").innerHTML = current;
		document.getElementById("btn_three").innerHTML = current + 1;
	}else{
		document.getElementById("btn_one").innerHTML = current;
		document.getElementById("btn_two").innerHTML = current + 1;
		document.getElementById("btn_three").innerHTML = current + 2;
	}
}