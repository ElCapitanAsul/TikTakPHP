<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tiktak";



$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT comment_by, reply_to, message, `date`, vend_id, cust_id FROM comments";
$result = $conn->query($sql);


$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
var_dump(json_encode($result));


$conn->close();
?>