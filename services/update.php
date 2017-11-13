<?php 
include('../dbconfig.php');

if (isset ($_POST['id']) &&
	isset($_POST['name'])) {


		$id = $_POST['id'];
		$name = $_POST['name'];

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE services SET name = 'name'
	WHERE id=$id";

	$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();
}
?>