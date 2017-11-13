<?php 
include('../dbconfig.php');

if (isset($_POST['name'])) {
	$name = $_POST['name'];

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO services (name) VALUES ('$name')";

	if ($conn->query($sql) === TRUE) {
	    echo json_encode([
	    	'status' => 'success', 
	    	'message' => 'Record inserted successfully'
	    ]);
	} else {
	    echo json_encode([
	    	'status' => 'error',
	    	'message' => $conn->error
	    ]);
	}

	$conn->close();
}	else {
	echo json_encode([
		'status' => 'error', 
		'message' => 'Please include all required fields'
	]);
}
?>