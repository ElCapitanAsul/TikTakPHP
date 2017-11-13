<?php 
	header('Content-Type: application/json');
	
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "jesign";
	$dbname = "tiktak";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);