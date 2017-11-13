<?php 
include('../dbconfig.php');

if (isset ($_POST['id']) &&
	isset($_POST['fname']) && 
	isset($_POST['lname']) && 
	isset($_POST['email']) && 
	isset($_POST['password']) && 
	isset($_POST['rating']) && 
	isset($_POST['comment']) && 
	isset($_POST['latitude']) && 
	isset($_POST['longitude']) && 
	isset($_POST['image'])) {


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

$sql = "UPDATE vendors SET fname = 'fname', 
		lname = 'lname', 
		email = 'email', 
		password = 'password', 
		rating = 'rating'
		comment = 'comment'
		latitude =  'latitude'
		longitude = 'longitude'
		image = 'image' 
		WHERE id=$id";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo json_encode([
    	'status' => 'success', 
    	'message' => 'Record updated successfully'
    ]);
} else {
    echo json_encode([
    	'status' => 'error',
    	'message' => $conn->error
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