<div class="block">
	<form name="search" action="index.php" method="GET">
		<div class="controls">
			<ul>
				<li><input type="text" name="search_input" placeholder="Quiz search ... "/></li> 
				<li><button name="search_quiz" type="submit">Search</button></li>
			</ul>
		</div>
	</form>
	<?php
		if(isset($_SESSION['admin'])){
			if(isset($_SESSION['search'])){
				$result = mysqli_query($connection_resource, "SHOW TABLES FROM $db_quiz_resource_name LIKE '%$search%'");
				if(mysqli_num_rows($result) > 0){
					echo "<table><th>Quiz type</th><th>Questions</th><th>Options</th>";
					while($quiz = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td><a href=\"test.php?selected=" . $quiz[0] . "\">" . str_replace('_', ' ', $quiz[0]) . "</a></td>";
						$emount = mysqli_query($connection_resource, "SELECT * FROM $quiz[0]");
						echo "<td>" . mysqli_num_rows($emount) ."</td>";
						echo "<td><a href=\"index.php?edit_quiz=" . $quiz[0] . "\">Edit</a> / <a href=\"index.php?delete_quiz=" . $quiz[0] . "\">Delete</a></td>";
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<p id=\"warning_message\">Not found.</p>";
				}
				unset($_SESSION['search']);
			}else if(empty($_GET['search'])){
				$result = mysqli_query($connection_resource, "SHOW TABLES FROM $db_quiz_resource_name");
				echo "<table><th>Quiz type</th><th>Questions</th><th>Options</th>";
				while($quiz = mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><a href=\"test.php?selected=" . $quiz[0] . "\">" . str_replace('_', ' ', $quiz[0]) . "</a></td>";
					$emount = mysqli_query($connection_resource, "SELECT * FROM $quiz[0]");
					echo "<td>" . mysqli_num_rows($emount) ."</td>";
					echo "<td><a href=\"index.php?edit_quiz=" . $quiz[0] . "\">Edit</a> / <a href=\"index.php?delete_quiz=" . $quiz[0] . "\">Delete</a></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}else{
			if(isset($_SESSION['search'])){
				$result = mysqli_query($connection_resource, "SHOW TABLES FROM $db_quiz_resource_name LIKE '%$search%'");
				if(mysqli_num_rows($result) > 0){
					echo "<table><th>Quiz type</th><th>Questions</th>";
					while($quiz = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td><a href=\"test.php?selected=" . $quiz[0] . "\">" . str_replace('_', ' ', $quiz[0]) . "</a></td>";
						$emount = mysqli_query($connection_resource, "SELECT * FROM $quiz[0]");
						echo "<td>" . mysqli_num_rows($emount) ."</td>";
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<p id=\"warning_message\">Not found.</p>";
				}
				unset($_SESSION['search']);
			}else if(empty($_GET['search'])){
				$result = mysqli_query($connection_resource, "SHOW TABLES FROM $db_quiz_resource_name");
				echo "<table><th>Quiz type</th><th>Questions</th>";
				while($quiz = mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><a href=\"test.php?selected=" . $quiz[0] . "\">" . str_replace('_', ' ', $quiz[0]) . "</a></td>";
					$emount = mysqli_query($connection_resource, "SELECT * FROM $quiz[0]");
					echo "<td>" . mysqli_num_rows($emount) ."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}
	?>
</div>