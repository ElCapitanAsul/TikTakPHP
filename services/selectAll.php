<?php 
	include('../dbconfig.php');

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT name FROM services";
	$result = $conn->query($sql);


	$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($result);


	$conn->close();
?>