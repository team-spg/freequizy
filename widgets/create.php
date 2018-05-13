<div class="block">
	<p id="heading">Add new</p>
	<?php 
		if(isset($_SESSION['warning'])){
			echo "<p id=\"warning_message\">";
			echo $_SESSION['warning'];
			echo "</p>";
			unset($_SESSION['warning']);
		}
	?>
	<form action="new.php" method="GET" name="new_quiz">
			<label>Create new quiz: <input name="quiz_name" type="text" placeholder="Enter New Name"/><label>
			<label><input name="create_quiz" type="submit" value="Create"/><label>
	</form>
</div>