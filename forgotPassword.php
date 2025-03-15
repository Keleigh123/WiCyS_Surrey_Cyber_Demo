<?php
session_start();

//solution step 1- csrf tokens to stop csrf attacks
// $token = "ee8a401cea1f673d42564d9542772197a277834035422ce8381067e799c18f5g";
// $passphrase = "abc1234";
// $cipher = "aes-256-cbc";
// $ivlen = openssl_cipher_iv_length($cipher);
// $iv = openssl_random_pseudo_bytes($ivlen);
// $encrypted = openssl_encrypt($token, $cipher, $passphrase, OPENSSL_RAW_DATA, $iv);
// $hashedToken = base64_encode($iv . $encrypted);
// $_SESSION['csrf_token'] = $hashedToken;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 well">
        <h3 class="text-primary">Change Password</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <form method="POST" action="updateMember.php">  
        <div class="form-group">
            <label>Enter Username</label>
            <input type="text" name="username" class="form-control" required="required"/>
          </div>
          <div class="form-group">
            <label>Enter New Password</label>
            <input type="text" name="password" class="form-control" required="required"/>
          </div>
          <button class="btn btn-primary btn-block" name="reset-password">Reset Password</button>
        </form> 
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

