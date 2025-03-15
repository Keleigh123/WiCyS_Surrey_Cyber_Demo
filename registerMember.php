<!DOCTYPE html>
<?php 
session_start();
?>
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
        <h3 class="text-primary">BE A MEMBER OF WICYS TODAY!!!</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <a href="login.php">Already a member? Log in here...</a>
        <br style="clear:both;"/><br />
        <form id="registrationForm">  
          <div class="alert alert-info">Registration</div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username" class="form-control" required="required"/>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control" required="required"/>
          </div>
          <div class="form-group">
            <label>Firstname</label>
            <input type="text" name="firstname" id="firstname" class="form-control" required="required"/>
          </div>
          <div class="form-group">
            <label>Lastname</label>
            <input type="text" name="lastname" id="lastname" class="form-control" required="required"/>
          </div>
          <button type="submit" class="btn btn-primary btn-block"  ><span class="glyphicon glyphicon-save"></span> Register</button>
        </form> 
        <div class="mt-3" id="transactionMessage" style="display: none;">
                            <div class="alert alert-success" role="alert">
                                Registration successful! 
                            </div>
                        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/localforage/1.10.0/localforage.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
       
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault();

      var password = document.getElementById("password").value;
      var username = document.getElementById("username").value;
      var firstname = document.getElementById("firstname").value;
      var lastname = document.getElementById("lastname").value;

     
    
      submitForm(password,username,firstname,lastname)

      function submitForm(password,username,firstname,lastname) {
        console.log("data", username,firstname,lastname,password)
                fetch('addMember.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                      password: password,
                      username: username,
                      firstname:firstname,
                      lastname:lastname,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                        document.getElementById('transactionMessage').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
            }
    });
  });
  </script>

</body>
</html>
