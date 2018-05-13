<div class="block">
	<p id="heading">Password recovery</p>
	<?php 
		if(isset($_SESSION['message'])){
			echo "<p id=\"success_message\">";
			echo $_SESSION['message'];
			echo "</p>";
			unset($_SESSION['message']);
		}
		if(isset($_SESSION['warning'])){
			echo "<p id=\"warning_message\">";
			echo $_SESSION['warning'];
			echo "</p>";
			unset($_SESSION['warning']);
		}
	?>
	<form action="password_recovery.php" name="confirm_mail" method="POST">
		<input type="email" name="mail" placeholder="Confirm your mail"/>
		<input type="submit" name="mail_confirm" value="Confirm"/>
	</form>
</div>