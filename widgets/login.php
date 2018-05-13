<div class="block">
	<p id="heading">Login</p>
	<form class="reception" action="sign_in.php" method="POST" name="login">
		<ul>
			<label><li><input name="username" type="text" placeholder="Enter Name" value="<?php if(isset($_COOKIE['member_name'])){ echo $_COOKIE['member_name']; }?>"/></li><label>
			<label><li><input name="password" type="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE['member_password'])){ echo $_COOKIE['member_password']; }?>"/></li><label>
			<label><li><input name="remember" type="checkbox" <?php if(isset($_COOKIE['member_name'])){ ?> checked <?php } ?>/> Remember me</li><label>
			<label><li><input name="sign_in" type="submit" value="Sign in"/></li><label>
			<label><li>No eccount? <a href="sign_up.php">Sign Up</a></li><label>
		</ul>
	</form>
	<p id="notify">
		Authentication mode gives you posibility on ower sit, also it offers security of privisy information that you are going to keep online.
		It almost solvs all security essues. In torns of overcoming seran problams during registration, try to use more simbolic and numeric literals 
		in your key word for password. Take into account that login cookes are beeing genarated with a particular limited time amount, so that authentication may be required in time intervals.
	</p>
</div>