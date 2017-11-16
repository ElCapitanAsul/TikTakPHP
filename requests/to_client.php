<?php 
include('../dbconfig.php');

	if (isset($_POST['vendor_id']) && 
		isset($_POST['customer_id'])
	)
	{
		$vendor_id = $_POST['vendor_id'];
		$customer_id = $_POST['customer_id'];

		if ($conn->connect_error) {
			echo json_encode([
				'status' => 'error', 
				'message' => 'Connection Failed ' . $conn->connect_error
			]);
		}

		$sql = "INSERT INTO requests_to_client (vendor_id, customer_id, status) VALUES ($vendor_id, $customer_id, 0)";

		if ($conn->query($sql) === TRUE) {
		    $last_id = $conn->insert_id;

			echo json_encode([
				'status' => 'success', 
				'message' => 'Request Sent!'
			]);
		} else {
		    echo json_encode([
		    	'status' => 'error',
		    	'message' =>  'Something went wrong!'
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