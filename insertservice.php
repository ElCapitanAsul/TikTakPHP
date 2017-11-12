<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tiktak";

if (isset($_POST['name'])) {


	$name = $_POST['name'];
	
	

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO services (name) VALUES ('$name')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;

	}

	$conn->close();
}	
?>