<?php 
include('../dbconfig.php');

if (isset($_POST['price']) && 
	($_POST['availability']) && 
	($_POST['service_id']) &&
	($_POST['vend_id'])) {


	$price = $_POST['price'];
	$availability = $_POST['availability'];
	$service_id = $_POST['service_id'];
	$vend_id = $_POST['vend_id'];
	

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO vendor_services (price, availability, service_id, vend_id) VALUES ('$price', '$availability', '$service_id', '$vend_id')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;

	}

	$conn->close();
}	
?>