<?php 
	include("widgets/server.php");
	
	if(empty($_SESSION['username'])){
		header('location: sign_in.php');
	}
	
	if(empty($_GET['selected'])){
		header('location: index.php');
	}
	
	$question = array();
	$variant = array();
	$answer = array();
	
	if(isset($_GET['selected'])){
		$quiz = $_GET['selected'];
		
		//question collect
		$count = 0;
		$sql_select = "SELECT question FROM $quiz";
		$result = mysqli_query($connection_resource, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($question_data = mysqli_fetch_array($result)){
				$question[$count] = $question_data[0];
				$count++;
			}
		}
		
		//answer collect
		$count = 0;
		$sql_select = "SELECT answer FROM $quiz";
		$result = mysqli_query($connection_resource, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($answer_data = mysqli_fetch_array($result)){
				$answer[$count] = $answer_data[0];
				$count++;
			}
		}
		
		//a variant collect
		$count = 0;
		$sql_select = "SELECT a FROM $quiz";
		$result = mysqli_query($connection_resource, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($a_data = mysqli_fetch_array($result)){
				$variant[$count][0] = $a_data[0];
				$count++;
			}
		}
		
		//b variant collect
		$count = 0;
		$sql_select = "SELECT b FROM $quiz";
		$result = mysqli_query($connection_resource, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($b_data = mysqli_fetch_array($result)){
				$variant[$count][1] = $b_data[0];
				$count++;
			}
		}
		
		//c variant collect
		$count = 0;
		$sql_select = "SELECT c FROM $quiz";
		$result = mysqli_query($connection_resource, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($c_data = mysqli_fetch_array($result)){
				$variant[$count][2] = $c_data[0];
				$count++;
			}
		}
		
		//d variant collect
		$count = 0;
		$sql_select = "SELECT d FROM $quiz";
		$result = mysqli_query($connection_resource, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($d_data = mysqli_fetch_array($result)){
				$variant[$count][3] = $d_data[0];
				$count++;
			}
		}
	}
?>

<html>
	<head>
		<title>quiz</title>
		<meta charset = "utf-8"/>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src="jquery/jquery-3.0.0.min.js"></script>
		<script type="text/javascript" src="js/loader.js"></script>
		<script type="text/javascript" src="js/slideshow.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript">
			var questions = <?php echo json_encode($question); ?>;
			var variant = <?php echo json_encode($variant); ?>;							  
			var answers = <?php echo json_encode($answer); ?>;
			var user_answer = new Array();
			var current = 0;
			
			var hour;
			var given_hour;
			var minute;
			var given_minute;
			var secunde;
			var given_secunde;
			
			var correct = 0;
			var wrong = 0;
			var empty = 0;
			
			var the_end = false;
			
			if(parseInt(questions.length) != 0){
				time_amount = parseInt(questions.length);
				var time = parseInt(time_amount);
				given_hour = hour = parseInt(time / 60);
				given_minute = minute = parseInt(time % 60) - 1;
				given_secunde = secunde = 59;
				var interval;
			}
			window.onload = function(){
				document.getElementById("btn_last_nav").onclick = about;
				if(parseInt(questions.length) != 0){
					first();
					interval = setInterval("timer()", 1000);
				}
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
					user_answer[current] = "a";
				else if(document.getElementById("radio_b").checked)
					user_answer[current] = "b";
				else if(document.getElementById("radio_c").checked)
					user_answer[current] = "c";
				else if(document.getElementById("radio_d").checked)
					user_answer[current] = "d";				
			}
			function setQuiz(){
				if(the_end == true){
					document.getElementById("a_img").src = "img/empty.png";
					document.getElementById("b_img").src = "img/empty.png";
					document.getElementById("c_img").src = "img/empty.png";
					document.getElementById("d_img").src = "img/empty.png";
							
					switch(answers[current]){
						case "a":
							document.getElementById("a_img").src = "img/correct.png";
							break;
						case "b":
							document.getElementById("b_img").src = "img/correct.png";
							break;
						case "c":
							document.getElementById("c_img").src = "img/correct.png";
							break;
						case "d":
							document.getElementById("d_img").src = "img/correct.png";
							break;
						default: break;
					}
					if(user_answer[current] != answers[current]){
						switch(user_answer[current]){
							case "a":
								document.getElementById("a_img").src = "img/wrong.png";
								break;
							case "b":
								document.getElementById("b_img").src = "img/wrong.png";
								break;
							case "c":
								document.getElementById("c_img").src = "img/wrong.png";
								break;
							case "d":
								document.getElementById("d_img").src = "img/wrong.png";
								break;
							default: break;
						}
					}
				}
				document.getElementById("number").innerHTML = current + 1 + ". ";
				document.getElementById("question").innerHTML = questions[current];
				document.getElementById("variant_a").innerHTML = variant[current][0];
				document.getElementById("variant_b").innerHTML = variant[current][1];
				document.getElementById("variant_c").innerHTML = variant[current][2];
				document.getElementById("variant_d").innerHTML = variant[current][3];
				switch(user_answer[current]){
					case "a":
						document.getElementById("radio_a").checked = true;
						break;
					case "b":
						document.getElementById("radio_b").checked = true;
						break;
					case "c":
						document.getElementById("radio_c").checked = true;
						break;
					case "d":
						document.getElementById("radio_d").checked = true;
						break;
					default:
						document.getElementById("radio_a").checked = false;
						document.getElementById("radio_b").checked = false;
						document.getElementById("radio_c").checked = false;
						document.getElementById("radio_d").checked = false;
				}

				if(variant[current][0] != ""){
					document.getElementById("a").style.display = "block";
				}else{
					document.getElementById("a").style.display = "none";
				}
				if(variant[current][1] != ""){
					document.getElementById("b").style.display = "block";
				}else{
					document.getElementById("b").style.display = "none";
				}
				if(variant[current][2] != ""){
					document.getElementById("c").style.display = "block";
				}else{
					document.getElementById("c").style.display = "none";
				}
				if(variant[current][3] != ""){
					document.getElementById("d").style.display = "block";
				}else{
					document.getElementById("d").style.display = "none";
				}
				
				if(parseInt(questions.length) > 3){
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
			}
			function setTime(){
				if(secunde < 0){
					minute--;
					secunde = 59;
					if(minute < 0){
						hour--;
						minute = 59;
					}
				}
				var time_string = "";
				if(hour < 10){
					time_string += "0" + hour + ":";
				}else{
					time_string += hour + ":";
				}
				if(minute < 10){
					time_string += "0" + minute + ":";
				}else{
					time_string += minute + ":";
				}
				if(secunde < 10){
					time_string += "0" + secunde;
				}else{
					time_string += secunde;
				}
				return time_string;
			}
			function timer(){
				var timer = document.getElementById("time_view");
				if(secunde < 0){
					minute--;
					secunde = 59;
					if(minute < 0){
						hour--;
						minute = 59;
					}
				}
				timer.innerHTML = setTime();
				if(secunde == 0 && minute == 0 && hour == 0){
					end();
				}else{
					secunde--;
				}
			}
			
			
			function end(){	
				clearInterval(interval);
				document.getElementById("radio_a").disabled = true;
				document.getElementById("radio_b").disabled = true;
				document.getElementById("radio_c").disabled = true;
				document.getElementById("radio_d").disabled = true;
				
				for(var i = 0; i < questions.length; i++){
					if(user_answer[i] == null){
						empty++;
					}else{
						if(user_answer[i] != answers[i]){
							wrong++;
						}else{
							correct++;
						}
					}
				}
				document.getElementById("correct").innerHTML = correct;
				document.getElementById("wrong").innerHTML = wrong;
				document.getElementById("empty").innerHTML = empty;
				document.getElementById("total").innerHTML = questions.length;
				secunde = given_secunde - secunde;
				if(secunde < 0){
					secunde = 60 + secunde;
					minute--;
				}
				minute = given_minute - minute;
				if(minute < 0){
					minute = 60 + minute;
					hour--;
				}
				hour = given_hour - hour;
				document.getElementById("spent_time").innerHTML = setTime();
				
				document.getElementById("results").style.display = "block";
				the_end = true;
				setQuiz();
			}
			
			function about(){
				document.getElementById("teem").scrollIntoView();
			}
		</script>
	</head>
	<body>
		<div class="wrapper">
			<div id = "load"></div>
			<div id="content">
				<?php include("widgets/head.php"); ?>
				<?php include("widgets/baner.php"); ?>
				<?php include("widgets/quiz.php"); ?>
				<?php include("widgets/team.php"); ?>
				<?php include("widgets/footer.php"); ?>
			</div>
		</div>
	</body>
</html>