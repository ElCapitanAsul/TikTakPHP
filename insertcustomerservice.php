<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tiktak";

if (isset($_POST['request_status']) && 
	($_POST['service_id']) && 
	($_POST['cust_id'])) {


	$request_status = $_POST['request_status'];
	$service_id = $_POST['service_id'];
	$cust_id = $_POST['cust_id'];
	

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO customer_services (request_status, service_id, cust_id) VALUES ('$request_status', '$service_id', '$cust_id')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;

	}

	$conn->close();
}	
?>