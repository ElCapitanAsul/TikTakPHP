<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tiktak";

if (isset($_POST['fname']) && 
	($_POST['lname']) && 
	($_POST['email']) && 
	($_POST['password']) && 
	($_POST['rating']) && 
	($_POST['comment']) && 
	($_POST['latitude']) && 
	($_POST['longitude']) && 
	($_POST['image'])) {


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rating = $_POST['rating'];
	$comment = $_POST['comment'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$image = $_POST['image'];


	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO vendors (fname, lname, email, password, rating, comment, latitude, longitude, image) VALUES ('$fname', '$lname', '$email', '$password', '$rating', '$comment', '$latitude', '$longitude', '$image')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;

	}

	$conn->close();
}	
?>