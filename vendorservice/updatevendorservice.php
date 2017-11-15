<?php 
include('../dbconfig.php');
if (isset ($_POST['id']) &&
	($_POST['price']) && 
	($_POST['availability']) && 
	($_POST['service_id']) &&
	($_POST['vend_id'])) {


	$id = $_POST['id'];
	$price = $_POST['price'];
	$availability = $_POST['availability'];
	$service_id = $_POST['service_id'];
	$vend_id = $_POST['vend_id'];
	

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE vendors_services SET price = 'price', 
availability = 'availability', 
service_id = 'service_id', 
vend_id = 'vend_id'
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