<?php

	require_once 'connection.php';
 
	$data = json_decode(file_get_contents('php://input'), true);
	if (isset($data['password']) && isset($data['username'], $data['firstname'], $data['lastname']
	)) {
        $password = $data['password'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
		$username = $data['username'];
		
		$query = "INSERT INTO `memberV0` (username, password, firstname, lastname) VALUES(:username, :password, :firstname, :lastname)";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);

		if ($stmt->execute()) {
            $response = array(
                'success' => true,
            );
            echo json_encode($response);
           
            exit;
        } else {
            $response = array(
                'success' => false,
                'error' => 'Failed to save transaction details',
            );
            echo json_encode($response);
            exit;
        }
    } else {
        $response = array(
            'success' => false,
            'error' => 'Required parameters are missing',
        );
        echo json_encode($response);
        exit;
    }
?>