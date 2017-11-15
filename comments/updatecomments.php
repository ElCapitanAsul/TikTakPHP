<?php 
include('../dbconfig.php');

if (isset ($_POST['id']) &&
	($_POST['comment_by']) && 
	($_POST['reply_to']) && 
	($_POST['message']) && 
	($_POST['date']) && 
	($_POST['vend_id']) && 
	($_POST['cust_id'])) {


	$id = $_POST['id'];
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

$sql = "UPDATE comments SET comment_by = 'comment_by', 
reply_to = 'reply_to', 
message = 'message', 
`date`= 'date', 
vend_id = 'vend_id'
cust_id= 'cust_id'
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