<?php
session_start();
session_destroy();
header("Location: http://localhost/movers/pages/login.php"); // Redirect to login page after logout
exit();
?>