<div class="block">
	<p id="heading">Change your password</p>
	<?php if(isset($_SESSION['success'])): ?>
		<p id="success_message">
			<?php 
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			?>
		</p>
	<?php endif ?>
	<?php if(isset($_SESSION['warning'])): ?>
		<p id="warning_message">
			<?php 
				echo $_SESSION['warning'];
				unset($_SESSION['warning']);
			?>
		</p>
	<?php endif ?>
	<form class="reception" action="change_password.php" method="POST" name="modify">
		<ul>
			<label><li><input name="old_password" type="password" placeholder="Enter Old Password"/></li><label>
			<label><li><input name="new_password" type="password" placeholder="Enter New Password"/></li><label>
			<label><li><input name="confirm_password" type="password" placeholder="Confirm New Password"/></li><label>
			<label><li><input name="modify_password" type="submit" value="Change"/></li><label>
		</ul>
	</form>
	<p id="notify">
		Authentication mode gives you posibility on ower sit, also it offers security of privisy information that you are going to keep online.
		It almost solvs all security essues. In torns of overcoming seran problams during registration, try to use more simbolic and numeric literals 
		in your key word for password. Take into account that login cookes are beeing genarated with a particular limited time amount, so that authentication may be required in time intervals.
	</p>
</div>