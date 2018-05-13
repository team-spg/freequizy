<?php
	session_start();
	
	$db_quiz_name = "quiz";
	$db_quiz_resource_name = "quiz_resource";
	$connection_quiz = mysqli_connect("localhost", "root", "", $db_quiz_name);
	$connection_resource = mysqli_connect("localhost", "root", "", $db_quiz_resource_name);
	
	if(mysqli_connect_error()){
		die("connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_error() . ")");
	}
	
	if(isset($_POST['sign_in'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql_select = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($connection_quiz, $sql_select);
		
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
			$result = mysqli_query($connection_quiz, $sql_select);
			if(mysqli_num_rows($result) == 1){
				$_SESSION['admin'] = "is admin";
			}
			
			header('location: index.php');
		}
	}
	
	if(isset($_POST['sign_up'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['mail'];
		$sql_select = "SELECT * FROM user WHERE username='$username'";
		$result = mysqli_query($connection_quiz, $sql_select);
		if(mysqli_num_rows($result) == 0){
			$sql_select = "SELECT * FROM user WHERE email='$email'";
			$result = mysqli_query($connection_quiz, $sql_select);
			if(mysqli_num_rows($result) == 0){
				$sql_insert = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
				mysqli_query($connection_quiz, $sql_insert);
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header('location: index.php');
			}else{
				$_SESSION['warning'] = "User with this email already exist, try other!";
			}
		}else{
			$_SESSION['warning'] = "User with this name already exist, try other!";
		}
	}
	
	if(isset($_POST['modify_password'])){
		$username = $_SESSION['username'];
		$password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$sql_select = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($connection_quiz, $sql_select);
		
		if(mysqli_num_rows($result) == 1){
			$sql_update = "UPDATE user SET password='$new_password' WHERE username='$username' AND password='$password'";
			mysqli_query($connection_quiz, $sql_update);
			$_SESSION['password'] = $new_password;
			$_SESSION['success'] = "Your password was changed successfully!";
		}else{
			$_SESSION['warning'] = "Wrong password, please try again!";
		}	
	}
	
	if(isset($_GET['create_quiz'])){
		$quiz = $_GET['quiz_name'];
		$quiz = str_replace(' ', '_', $quiz);
		$result = mysqli_query($connection_resource, "SHOW TABLES FROM $db_quiz_resource_name LIKE '%$quiz%'");
		
		if(mysqli_num_rows($result) == 0){
			$sql_create = "CREATE TABLE $quiz (id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY, question VARCHAR(500) NOT NULL, a VARCHAR(500) NOT NULL, b VARCHAR(500) NOT NULL, c VARCHAR(500) NOT NULL, d VARCHAR(500) NOT NULL, answer VARCHAR(1) NOT NULL)";
			mysqli_query($connection_resource, $sql_create);
			$sql_select = "SELECT * FROM $quiz";
			$result = mysqli_query($connection_resource, $sql_select);
			$_SESSION['edit_quiz'] = $quiz;
			$_SESSION['edit_quiz_message'] = str_replace('_', ' ', $quiz) . " (" . mysqli_num_rows($result) . " questions)";
		}else{
			$quiz = str_replace('_', ' ', $quiz);
			$_SESSION['warning'] = "Quiz with name \"$quiz\" is already exist, try other name!";
		}
	}
	
	if(isset($_GET['add'])){
		$question = $_GET['question'];
		$a = $_GET['a'];
		$b = $_GET['b'];
		$c = $_GET['c'];
		$d = $_GET['d'];
		$answer = $_GET['answer'];
		$quiz = $_SESSION['edit_quiz'];
		$sql_insert = "INSERT INTO $quiz (question, a, b, c, d, answer) VALUES ('$question', '$a', '$b', '$c', '$d', '$answer')";
		mysqli_query($connection_resource, $sql_insert);
		$sql_select = "SELECT * FROM $quiz";
		$result = mysqli_query($connection_resource, $sql_select);
		$_SESSION['edit_quiz'] = $quiz;
		$_SESSION['edit_quiz_message'] = str_replace('_', ' ', $quiz) . " (" . mysqli_num_rows($result) . " questions)";
	}
	
	if(isset($_GET['end_edit'])){
		unset($_SESSION['edit_quiz']);
	}
	
	if(isset($_GET['search_quiz'])){
		$search = $_GET['search_input'];
		$_SESSION['search'] = $search;
	}
	
	if(isset($_POST['mail_confirm'])){
		$email = $_POST['mail'];
		$sql_select = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($connection_quiz, $sql_select);
		if(mysqli_num_rows($result) == 1){
			$user_password = mysqli_fetch_array($result);
			$_SESSION['message'] = "$user_password[username] - your password is $user_password[password]";
		}else{
			$_SESSION['warning'] = "Wrong email, please try again!";
		}
	}
	
	if(isset($_GET['edit_quiz'])){
		$quiz = $_GET['edit_quiz'];
		$quiz = str_replace(' ', '_', $quiz);
		$sql_select = "SELECT * FROM $quiz";
		$result = mysqli_query($connection_resource, $sql_select);
		$_SESSION['edit_quiz'] = $quiz;
		$_SESSION['edit_quiz_message'] = str_replace('_', ' ', $quiz) . " (" . mysqli_num_rows($result) . " questions)";
		header('location: new.php');
	}
	
	if(isset($_GET['delete_quiz'])){
		$quiz = $_GET['delete_quiz'];
		$quiz = str_replace(' ', '_', $quiz);
		$sql_drop = "DROP TABLE $quiz";
		mysqli_query($connection_resource, $sql_drop);
	}
	
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		$connection_quiz->close();
		$connection_resource->close();
		header('location: sign_in.php');
	}
?>