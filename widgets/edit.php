<div class="block">
	<p id="heading">Edit: <?php echo $_SESSION['edit_quiz_message']; ?></p>
	<form action="editing.php" method="GET" name="edit">
		<textarea name="question" rows="3" placeholder="Enter question ..."></textarea><br/>
		<textarea name="a" rows="3" placeholder="Enter variant A) ..."></textarea>
		<textarea name="b" rows="3" placeholder="Enter variant B) ..."></textarea>
		<textarea name="c" rows="3" placeholder="Enter variant C) ..."></textarea>
		<textarea name="d" rows="3" placeholder="Enter variant D) ..."></textarea><br/>
		<input name="answer" type="text" placeholder="Enter answer"/>
		<input name="add" type="submit" value="Add"/> 
	</form>
	<br/>
	<div class="controls"><a id="undecorated_link" href = "new.php?end_edit='1'"><button>End</button></a></div>
</div>