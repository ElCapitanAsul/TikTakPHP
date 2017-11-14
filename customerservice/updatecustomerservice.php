<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tiktak";

if (isset ($_POST['id']) &&
	($_POST['request_status']) && 
	($_POST['service_id']) && 
	($_POST['cust_id'])) {


	$id = $_POST['id'];
	$request_status = $_POST['request_status'];
	$service_id = $_POST['service_id'];
	$cust_id = $_POST['cust_id'];
	

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE customers_services SET request_status = 'request_status', 
service_id = 'service_id', 
cust_id = 'cust_id', 
WHERE id= 'id' ";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>