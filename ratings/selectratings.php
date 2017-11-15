<?php 
include('../dbconfig.php');



$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT rate_by, rate_count, vend_id, cust_id FROM ratings";
$result = $conn->query($sql);


$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
var_dump(json_encode($result));


$conn->close();
?>