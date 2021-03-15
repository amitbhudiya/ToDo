<?php 
	include 'login.php';

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

?>
