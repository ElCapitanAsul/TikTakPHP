<?php 
include('../dbconfig.php');

	if (isset($_POST['fname']) && 
		isset($_POST['lname']) && 
		isset($_POST['email']) && 
		isset($_POST['password'])
	)
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$services = $_POST['services'];

		$services = json_decode($services);
		// $array = [];
		// foreach ($services as $service) {
		// 	$array[] = $service->id . ' ' . $service->name;
		// }
		// echo '<pre>';
		// print_r($services);
		// echo '</pre>';

		// echo json_encode($array);
		// return;
		
		if ($conn->connect_error) {
			// die("Connection failed: " . $conn->connect_error);
			echo json_encode([
				'status' => 'error', 
				'message' => 'Connection Failed ' . $conn->connect_error
			]);
		}

		$sql = "INSERT INTO vendors (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

		if ($conn->query($sql) === TRUE) {
		    $last_id = $conn->insert_id;
		    
		    $value = [];
		    foreach ($services as $service) {
		    	if(isset($service->isChecked) && $service->isChecked == true)
		    	$value[] = '(' . $last_id . ', ' . $service->id . ')';
		    }

			$values = implode(",", $value);

			$sql = " INSERT INTO vendors_services ( vend_id, service_id ) VALUES " . $values;

			if ($conn->query($sql) === TRUE) {
				echo json_encode([
					'status' => 'success', 
					'vendor_id' => $last_id,
					'message' => 'Record inserted successfully'
				]);
			} else {
		    echo json_encode([
		    	'status' => 'error',
		    	'message' =>  $conn->error
		    ]);
		}

		} else {
		    echo json_encode([
		    	'status' => 'error',
		    	'message' =>  $conn->error
		    ]);
		}

		$conn->close();
	}else{
		echo json_encode([
			'status' => 'error', 
			'message' => 'Please include all required fields'
		]);
	}
?>