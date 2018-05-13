<div class="block">
	<form name="search" action="index.php" method="GET">
		<div class="controls">
			<ul>
				<li><input type="text" name="search_input" placeholder="Search quiz ... "/></li> 
				<li><button name="search_quiz" type="submit">Search</button></li>
			</ul>
		</div>
	</form>
	<?php
		$con = mysqli_connect($host, $username, $password, "quiz_resource");
		$result = mysqli_query($con, "SHOW TABLES FROM quiz_resource");
		echo "<table><th>Quiz type</th><th>Questions</th>";
		while($quiz = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td><a href=\"test.php?selected=" . $quiz[0] . "\">" . str_replace('_', ' ', $quiz[0]) . "</a></td>";
			$emount = mysqli_query($con, "SELECT * FROM $quiz[0]");
			echo "<td>" . mysqli_num_rows($emount) ."</td>";
			echo "</tr>";
		}
		echo "</table>";
		mysqli_close($con);
	?>
</div>