<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiktak";

if (isset($_POST['id'])) {


	$id = $_POST['id'];
	

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM services WHERE id='id'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
?>