<?php 
	$mysqli = new mysqli("localhost", "admin", "1234", "test");
	if($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
	else{
		echo "Successfully connected to database\n";
	}

	$name = $_POST["Name"];
	$username = $_POST["username"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$mob = $_POST["phone_no"];
	$email = $_POST["email_id"];
	$city = $_POST["City"];
	$state = $_POST["State"];
	$password = $_POST["password"];


	$query = "INSERT INTO User VALUES (' $name ', ' $username ', ' $gender ', ' $address ', ' $mob ', ' $email ', ' $city','$state','$password')";

	if ($mysqli->query($query) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $mysqli->error;
	}

	$mysqli->close();

?>