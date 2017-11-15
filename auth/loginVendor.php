<?php 
include('../dbconfig.php');

if(!isset($_POST['email']) ||!isset($_POST['password'])){
	echo json_encode([
		'status' => 'error',
		'message' => 'incomplete fields'
	]);
	return;
}

$email = $_POST['email'];
$password = $_POST['password'];

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM vendors where email = '$email' and password = '$password'";
$result = $conn->query($sql);


$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
// echo json_encode($result);
if(count($result) > 0){
	echo json_encode([
		'status' => 1
	]);
}else {
	echo json_encode([
		'status' => 0
	]);
}

$conn->close();
?>