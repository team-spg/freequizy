<?php
	session_start();
	
	$host = "localhost";
	$username = "root";
	$password = "";
	
	$con = mysqli_connect($host, $username, $password, "quiz");
	
	if(mysqli_connect_error()){
		die("connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_error() . ")");
	}
	
	if(isset($_POST['sign_in'])){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$sql_select = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($con, $sql_select);
		
		if(mysqli_num_rows($result) == 1){
			if(!empty($_POST["remember"])){
				setcookie("member_name", $username, time() + (10 * 365 * 24 * 60 * 60));
				setcookie("member_password", $password, time() + (10 * 365 * 24 * 60 * 60));
			}else{
				if(isset($_COOKIE['member_name'])){ 
					setcookie("member_name", "");
				}
				if(isset($_COOKIE['member_password'])){ 
					setcookie("member_password", "");
				}
			}

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			
			$sql_select = "SELECT * FROM admin WHERE name='$username' AND password='$password'";
			$result = mysqli_query($con, $sql_select);
			if(mysqli_num_rows($result) == 1){
				$_SESSION['admin'] = "is admin";
			}
			
			header('location: index.php');
		}
	}
	
	if(isset($_POST['sign_up'])){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$sql_insert = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
		mysqli_query($con, $sql_insert);
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header('location: index.php');
	}
	
	if(isset($_POST['modify_password'])){
		$username = $_SESSION['username'];
		$password = mysql_real_escape_string($_POST['old_password']);
		$new_password = mysql_real_escape_string($_POST['new_password']);
		$sql_select = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($con, $sql_select);
		
		if(mysqli_num_rows($result) == 1){
			$sql_update = "UPDATE user SET password='$new_password' WHERE username='$username' AND password='$password'";
			mysqli_query($con, $sql_update);
			$_SESSION['password'] = $new_password;
			$_SESSION['success'] = "Your password was changed successfully!";
		}else{
			$_SESSION['warning'] = "Wrong password, please try again!";
		}	
	}
	
	if(isset($_GET['create_quiz'])){
		$quiz = mysql_real_escape_string($_GET['quiz_name']);
		$quiz = str_replace(' ', '_', $quiz);
		$con = mysqli_connect($host, $username, $password, "quiz_resource");
		$sql_create = "CREATE TABLE $quiz (id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY, question VARCHAR(500) NOT NULL, a VARCHAR(500) NOT NULL, b VARCHAR(500) NOT NULL, c VARCHAR(500) NOT NULL, d VARCHAR(500) NOT NULL, answer VARCHAR(1) NOT NULL)";
		mysqli_query($con, $sql_create);
		$sql_select = "SELECT * FROM $quiz";
		$result = mysqli_query($con, $sql_select);
		$_SESSION['new_quiz'] = $quiz;
		$_SESSION['new_quiz_message'] = str_replace('_', ' ', $quiz) . " (" . mysqli_num_rows($result) . " questions)";
	}
	
	if(isset($_GET['add'])){
		$question = mysql_real_escape_string($_GET['question']);
		$a = mysql_real_escape_string($_GET['a']);
		$b = mysql_real_escape_string($_GET['b']);
		$c = mysql_real_escape_string($_GET['c']);
		$d = mysql_real_escape_string($_GET['d']);
		$answer = mysql_real_escape_string($_GET['answer']);
		$con = mysqli_connect($host, $username, $password, "quiz_resource");
		$quiz = $_SESSION['new_quiz'];
		$sql_insert = "INSERT INTO $quiz (question, a, b, c, d, answer) VALUES ('$question', '$a', '$b', '$c', '$d', '$answer')";
		mysqli_query($con, $sql_insert);
		$sql_select = "SELECT * FROM $quiz";
		$result = mysqli_query($con, $sql_select);
		$_SESSION['new_quiz'] = $quiz;
		$_SESSION['new_quiz_message'] = str_replace('_', ' ', $quiz) . " (" . mysqli_num_rows($result) . " questions)";
	}
	
	if(isset($_GET['end_edit'])){
		unset($_SESSION['new_quiz']);
	}
	
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		$con->close();
		header('location: sign_in.php');
	}
?>