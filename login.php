<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$mysqli = new mysqli("localhost", "admin", "1234", "test");
		if($mysqli -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}
		else{
			echo "Successfully connected to database\n";
		}

		$uname = $_POST["uname"];
		$pass = $_POST["pass"];
		echo $uname;
		$query = "SELECT * FROM user WHERE username='$uname'";

		if($res = mysqli_query($mysqli, $query)){ 
			if(mysqli_num_rows($res) > 0){ 
				while ($row = mysqli_fetch_array($res)){
					echo "<li class='list-group-item'><b>".$row['Username']."</b></li>";
					echo "<li class='list-group-item'>".$row['Password']."</li><br>";
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
	}
	else{
		$uname = 'amitb';
	}
?>