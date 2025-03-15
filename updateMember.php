<?php

// solution step 1 - allowing different site requests
//  session_set_cookie_params([
//     'lifetime' => 0, 
//     'secure' => true, 
//     'samesite' => 'None'
// ]);
session_start();

// solution step 2 - give access to different calls
// header("Access-Control-Allow-Origin: null");
// header("Access-Control-Allow-Credentials: true");
// header("Access-Control-Allow-Private-Network: true");
// header("Access-Control-Allow-Methods: POST, OPTIONS"); 
// header("Access-Control-Allow-Headers: Content-Type"); 

//  if (isset($_COOKIE['PHPSESSID']) && session_id()=== $_COOKIE['PHPSESSID']) { // when the server is configured to run on https with a SSl certificate we can conduct a proper demo with user authentication
if($_COOKIE['PHPSESSID']==session_id()){
    include_once 'connection.php';

    if (isset($_POST['reset-password']) ) {
       
        //solution step 3 - check csrf token
        // $cipher = "aes-256-cbc";
        // $ivlen = openssl_cipher_iv_length($cipher);
        // $encryptedToken = base64_decode($_SESSION['csrf_token']);
        // $iv = substr($encryptedToken, 0, $ivlen);
        // $encrypted = substr($encryptedToken, $ivlen);
        // $_SESSION['token']= openssl_decrypt($encrypted, $cipher, "abc1234", OPENSSL_RAW_DATA, $iv);
        // if ("ee8a401cea1f673d42564d9542772197a277834035422ce8381067e799c18f5g" !== $_SESSION['token']) {
        //     die("CSRF token validation failed");
        // }else{
        $username =  $_POST['username'];

        $sql = "SELECT * FROM `memberV0` WHERE username = :username";
        // $sql = "SELECT * FROM `member` WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $password = $_POST['password'];
            $sql = "UPDATE `memberV0` SET password = :password WHERE username = :username";
          //  $sql = "UPDATE `member` SET password = :password WHERE username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['password' => $password, 'username' => $username]);
         
            $_SESSION['success'] = "Password reset successful. Check your email for the new password.";
        } else {
            
            $_SESSION['error'] = "Username not found.";
        }
    } else {
        $_SESSION['error'] = "Please enter your username.";
    }

 header("Location: popup.php");
exit();
}
//  }else{
//      echo "Session is not active.";
//  }

?>
