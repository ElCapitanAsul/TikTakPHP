<?php 
include('../dbconfig.php');

if (isset($_POST['fname']) && 
	isset($_POST['lname']) && 
	isset($_POST['email']) && 
	isset($_POST['password']) && 
	isset($_POST['rating']) && 
	isset($_POST['comment']) && 
	isset($_POST['latitude']) && 
	isset($_POST['longitude']) && 
	isset($_POST['image'])) {


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rating = $_POST['rating'];
	$comment = $_POST['comment'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$image = $_POST['image'];

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO vendors (fname, lname, email, password, rating, comment, latitude, longitude, image) VALUES ('$fname', '$lname', '$email', '$password', '$rating', '$comment', '$latitude', '$longitude', '$image')";

	if ($conn->query($sql) === TRUE) {
	    echo json_encode([
	    	'status' => 'success', 
	    	'message' => 'Record inserted successfully'
	    ]);
	} else {
	    echo json_encode([
	    	'status' => 'error',
	    	'message' =>  $conn->error
	    ]);
	}

	$conn->close();
}else{
	echo json_encode([
		'status' => 'error', 
		'message' => 'Please include all required fields'
	]);
}
?>