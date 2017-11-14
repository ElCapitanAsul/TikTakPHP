<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tiktak";

if (isset($_POST['comment_by']) && 
	($_POST['reply_to']) && 
	($_POST['message']) && 
	($_POST['date']) && 
	($_POST['vend_id']) && 
	($_POST['cust-id'])) {


	$comment_by = $_POST['comment_by'];
	$reply_to = $_POST['reply_to'];
	$message = $_POST['message'];
	$date = $_POST['date'];
	$vend_id = $_POST['vend_id'];
	$cust_id = $_POST['cust_id'];
	


	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO comments (comment_by, reply_to, message, `date`, vend_id, cust_id) VALUES ('$comment_by', '$reply_to', '$message', '$date', '$vend_id', '$cust_id')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;

	}

	$conn->close();
}	
?>