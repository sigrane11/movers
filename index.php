
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="indexx.css"/>
</head>
<body>
    <div class="container" id="signup" style="display:none;">
        <div class="form-title">
        <img src="mover.jpg">
        </div>
        <form method="post" action="regis.php">
            <div class="input-group">
                <i class="uil uil-user icon"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
            </div>
            <div class="input-group">
                <i class="uil uil-user icon"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            </div>
            <div class="input-group">
                <i class="uil uil-envelope icon"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="uil uil-lock icon"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <div class="links">
            <p>Already Have Account?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>

    <div class="container" id="signIn">
        <div class="form-title">
        <img src="mover.jpg">
        </div>
        <form method="POST" action="regis.php">
            <div class="input-group">
                <i class="uil uil-envelope icon"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="uil uil-lock icon"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <p class="recover">
                <a href="#">Recover Password</a>
            </p>

         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
      </div>
      <script src="loginn.js"></script>
</body>
</html>
