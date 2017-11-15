<?php 
include('../dbconfig.php');


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT price, availability, service_id, vend_id FROM vendors_services";
$result = $conn->query($sql);


$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
var_dump(json_encode($result));


$conn->close();
?>