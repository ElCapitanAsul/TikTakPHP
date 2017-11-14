<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tiktak";

if (isset($_POST['rate_by']) && 
	($_POST['rate_count']) && 
	($_POST['vend_id']) &&
	($_POST['cust_id'])) {


	$rate_by = $_POST['rate_by'];
	$rate_count = $_POST['rate_count'];
	$vend_id = $_POST['vend_id'];
	$cust_id = $_POST['cust_id'];
	

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO ratings (rate_by, rate_count, vend_id, cust_id) VALUES ('$rate_by', '$rate_count', '$vend_id', '$cust_id')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;

	}

	$conn->close();
}	
?>