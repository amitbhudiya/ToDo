<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="topnav">
  <p class="title">Task Manager</p>
  <a href="login.html">Login</a>
  <a href="signup.html">Sign Up</a>  
  <a class="active" href="/">Home</a>
</div>

<div class="tasks">
	<ul class='list-group'>
		<?php
			include 'login.php';
			function add_task(){
				$mysqli = new mysqli("localhost", "admin", "1234", "test");
				if($mysqli -> connect_errno) {
				  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
				  exit();
				}
				else{
					echo "Successfully connected to database\n";
				}

				$title = $_POST["title"];
				$desc = $_POST["desc"];
				$user = $uname;

				$query = "INSERT INTO task VALUES ('$title', '$user', '$desc')";

				if (mysqli_query($mysqli, $query)) {
				  echo "New record created successfully";
				} else {
				  echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
				}

				mysqli_close($mysqli);
			}

			$mysqli = new mysqli("localhost", "admin", "1234", "test");
			$u = 'chandbud5';
			$query = "SELECT * FROM task WHERE Username='$u'";

			if($res = mysqli_query($mysqli, $query)){ 
				if(mysqli_num_rows($res) > 0){ 
					while ($row = mysqli_fetch_array($res)){
						echo "<li class='list-group-item'><b>".$row['Title']."</b></li>";
						echo "<li class='list-group-item'>".$row['Description']."</li><br>";
					}
			    }
			    else{
			    	echo "No record";
			    }
			}
			else{
				echo "Query not executed";
			}

			$mysqli->close();
		?>
	</ul>
</div>
<div>
	<form method="POST" action="add_task.php" class="add-task">
		<input type="text" name="title" placeholder="Title">
		<input type="text" name="desc" placeholder="Description">
		<input type="submit" name="submit" value="Add Task">
	</form>
</div>
</body>
</html>
