<?php 
include('../dbconfig.php');

if (isset($_POST['fname']) && 
	isset($_POST['lname']) && 
	isset($_POST['email']) && 
	isset($_POST['password'])
	{


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO vendors (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

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