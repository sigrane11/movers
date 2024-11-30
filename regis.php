<?php 

include 'db_connect.php';

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * From users where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO users(firstName,lastName,email,password)
                       VALUES ('$firstName','$lastName','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}
session_start();
if (isset($_POST['signIn'])) {
    // Sanitize input to prevent SQL injection
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Encrypt the password
    $hashedPassword = md5($password);

    // SQL query
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    
    // Prepare and bind the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Start session and store user info
      
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        
        // Redirect to the admin dashboard
        header("Location: admindashboard.php");
        exit();
    } else {
        // Display error message
        echo '<script>alert("Invalid email or password!");</script>';
    }
    
    $stmt->close(); // Close the statement
}
?>
