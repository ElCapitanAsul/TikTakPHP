<?php 
include('../dbconfig.php');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fname, lname, email, password, rating, comment, latitude, longitude, image FROM vendors";
$result = $conn->query($sql);


$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($result);


$conn->close();
?>