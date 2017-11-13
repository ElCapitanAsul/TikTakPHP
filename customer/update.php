<?php 
include('../dbconfig.php');

if (isset ($_POST['id']) &&
	($_POST['fname']) && 
	($_POST['lname']) && 
	($_POST['email']) && 
	($_POST['password']) && 
	($_POST['rating']) && 
	($_POST['comment']) && 
	($_POST['latitude']) && 
	($_POST['longitude']) && 
	($_POST['image'])) {


	$id = $_POST['id'];
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

	$sql = "UPDATE customers SET fname = 'fname', 
	lname = 'lname', 
	email = 'email', 
	password = 'password', 
	rating = 'rating'
	comment = 'comment'
	latitude =  'latitude'
	longitude = 'longitude'
	image = 'image' WHERE id=$id ";

	$result = $conn->query($sql);

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