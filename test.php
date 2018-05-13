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
		$con = mysqli_connect($host, $username, $password, "quiz_resource");
		$quiz = $_GET['selected'];
		
		//question collect
		$count = 0;
		$sql_select = "SELECT question FROM $quiz";
		$result = mysqli_query($con, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($question_data = mysqli_fetch_array($result)){
				$question[$count] = $question_data[0];
				$count++;
			}
		}
		
		//answer collect
		$count = 0;
		$sql_select = "SELECT answer FROM $quiz";
		$result = mysqli_query($con, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($answer_data = mysqli_fetch_array($result)){
				$answer[$count] = $answer_data[0];
				$count++;
			}
		}
		
		//a variant collect
		$count = 0;
		$sql_select = "SELECT a FROM $quiz";
		$result = mysqli_query($con, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($a_data = mysqli_fetch_array($result)){
				$variant[$count][0] = $a_data[0];
				$count++;
			}
		}
		
		//b variant collect
		$count = 0;
		$sql_select = "SELECT b FROM $quiz";
		$result = mysqli_query($con, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($b_data = mysqli_fetch_array($result)){
				$variant[$count][1] = $b_data[0];
				$count++;
			}
		}
		
		//c variant collect
		$count = 0;
		$sql_select = "SELECT c FROM $quiz";
		$result = mysqli_query($con, $sql_select);
		if(mysqli_num_rows($result) > 0){
			while($c_data = mysqli_fetch_array($result)){
				$variant[$count][2] = $c_data[0];
				$count++;
			}
		}
		
		//d variant collect
		$count = 0;
		$sql_select = "SELECT d FROM $quiz";
		$result = mysqli_query($con, $sql_select);
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

			window.onload = function(){
				if(parseInt(questions.length) != 0)
					first();
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