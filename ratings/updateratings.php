<?php 
include('../dbconfig.php');
if (isset ($_POST['id']) &&
	($_POST['rate_by']) && 
	($_POST['rate_count']) && 
	($_POST['vend_id']) &&
	($_POST['cust_id'])) {


	$id = $_POST['id'];
	$rate_by = $_POST['rate_by'];
	$rate_count = $_POST['rate_count'];
	$vend_id = $_POST['vend_id'];
	$cust_id = $_POST['cust_id'];
	

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE ratings SET rate_by = 'rate_by', 
rate_count = 'rate_count', 
vend_id = 'vend_id', 
cust_id = 'cust_id'
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