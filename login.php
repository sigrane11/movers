<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="forms">
          <div class="form login">
            <img src="mover.jpg">
            <form action="#">
              <div class="input-field">
                <input type="text" placeholder="Enter your email" required />
                <i class="uil uil-envelope icon"></i>
              </div>
              <div class="input-field">
                <input type="password" class="password" placeholder="Enter your password" required />
                <i class="uil uil-lock icon"></i>
                <i class="uil uil-eye-slash showHidePw"></i>
              </div>
              <div class="checkbox-text">
                <div class="checkbox-content">
                  <input type="checkbox" id="logCheck" />
                  <label for="logCheck" class="text">Remember me</label>
                </div>
                <a href="#" class="text">Forgot password?</a>
              </div>
              <div class="input-field button">
                <a href="admindashboard.html"><input type="button" value="Login" /></a>
              </div>
            </form>
            <div class="login-signup">
              <span class="text"
                >Not a member?
               <a href="register.php" class="text login-link">Register</a>
              </span> 
            </div>
          </div>
    </div>
    <script src="loginn.js"></script>
</body>
</html>