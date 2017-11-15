<?php 
	/* Fill up the fields below and save it as dbconfig.php */
	header('Content-Type: application/json');
	header("Access-Control-Allow-Origin: *");
	
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tiktak";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);