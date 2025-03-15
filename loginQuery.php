<?php
	session_start();
	require_once 'connection.php';
 
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
 
		//$query = "SELECT COUNT(*) as count FROM `memberV0` WHERE `username` = :username AND `password` = :password"; //solution step 1 - sql injection
		$query = "SELECT COUNT(*) as count FROM `memberV0` WHERE `username` = '$username' AND `password` = '$password'"; //injection example

		//solution step 2 - sql injection
		// $stmt = $conn->prepare($query);
		// $stmt->bindParam(':username', $username);
		// $stmt->bindParam(':password', $password);
		// $stmt->execute();
		$stmt = $conn->query($query); //Direct execution
		$row = $stmt->fetch();
 
		$count = $row['count'];
		if($count > 0){
			$cookie_options = array(
				'expires' => time() + 60*60*24*30,
				'secure' => true, // or false
				'samesite' => 'None' // None || Lax || Strict
			  );
			  
			  setcookie('cors-cookie', 'my-site-cookie', $cookie_options);
		$_SESSION['username'] = $username;
           
			header('location:forgotPassword.php');
		}else{
			$_SESSION['error'] = "Invalid username or password";
			header('location:login.php');
		}
	}
?>