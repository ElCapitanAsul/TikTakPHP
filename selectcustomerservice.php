<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tiktak";



$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT request_status, service_id, cust_id FROM customers_services";
$result = $conn->query($sql);


$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
var_dump(json_encode($result));


$conn->close();
?>