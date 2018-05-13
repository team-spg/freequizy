<?php 
	include("widgets/server.php");
	
	if(empty($_SESSION['username'])){
		header('location: sign_in.php');
	}
	if(empty($_SESSION['admin'])){
		header('location: index.php');
	}
	if(empty($_SESSION['edit_quiz'])){
		header('location: new.php');
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
		<script type="text/javascript" src="js/edit.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<div id = "load"></div>
			<div id="content">
				<?php include("widgets/head.php"); ?>
				<?php include("widgets/baner.php"); ?>
				<?php include("widgets/edit.php"); ?>
				<?php include("widgets/team.php"); ?>
				<?php include("widgets/footer.php"); ?>
			</div>
		</div>
	</body>
</html>