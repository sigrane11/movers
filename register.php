<?php 

include 'db_connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="forms">
          <div class="form login">
            <img src="mover.jpg">
            <form action="#">
              <div class="input-field">
                <input type="text" placeholder="Email" required />
                <i class="uil uil-envelope icon"></i>
              </div>
              <div class="input-field">
                <input type="password" class="Password" placeholder="Password" required />
                <i class="uil uil-lock icon"></i>
              </div>
              <div class="input-field">
                <input type="password" class="CPassword" placeholder="Confirm password" required />
                <i class="uil uil-lock icon"></i>
                <i class="uil uil-eye-slash showHidePw"></i>
              </div>
              <div class="input-field button">
                <a href="login.html"><input type="button" value="Register" /></a>
              </div>
            </form>
            <div class="login-signup">
                <span class="text"
                  >Already a member?
                  <a href="login.html" class="text login-link">Login Now</a>
                </span>
              </div>
          </div>
    </div>
    <script src="login.js"></script>  <!-- Include your JavaScript file here -->
</body>
</html>