<?php 
include('../dbconfig.php');

if (isset($_POST['id'])) {
	$id = $_POST['id'];
		
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "DELETE FROM customers WHERE id=$id";
	$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) {
	    echo json_encode([
	    	'status' => 'success', 
	    	'message' => 'Record deleted successfully'
	    ]);
	} else {
	    echo json_encode([
	    	'status' => 'error',
	    	'message' => $conn->error
	    ]);
	}

	$conn->close();
}else {
	echo json_encode([
		'status' => 'error', 
		'message' => 'Please include all required fields'
	]);
}
?>