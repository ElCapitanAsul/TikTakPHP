<?php 
	/* Fill up the fields below and save it as dbconfig.php */
	header('Content-Type: application/json');
	
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tiktak";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);