<div class="block">
	<p id="heading">Registration</p>
	<?php 
		if(isset($_SESSION['warning'])){
			echo "<p id=\"warning_message\">";
			echo $_SESSION['warning'];
			echo "</p>";
			unset($_SESSION['warning']);
		}
	?>
	<form class="reception" action="sign_up.php" method="POST" name="register">
		<ul>
			<label><li><input name="username" type="text" placeholder="Enter Name"/></li><label>
			<label><li><input name="password" type="password" placeholder="Enter Password"/></li><label>
			<label><li><input name="confirm_password" type="password" placeholder="Confirm Password"/></li><label>
			<label><li><input name="mail" type="email" placeholder="Enter email"/></li><label>
			<label><li><input name="sign_up" type="submit" value="Submit"/></li><label>
			<label><li>Exist eccount? <a href="sign_in.php">Sign In</a></li><label>
		</ul>
	</form>
	<p id="notify">
		Authentication mode gives you posibility on ower sit, also it offers security of privisy information that you are going to keep online.
		It almost solvs all security essues. In torns of overcoming seran problams during registration, try to use more simbolic and numeric literals 
		in your key word for password. Take into account that login cookes are beeing genarated with a particular limited time amount, so that authentication may be required in time intervals.
	</p>
</div>