<?php

session_start();  // Start the session

// Destroy the session and unset session variables
session_unset();
session_destroy();

// Redirect to the login page or display a logout message
header("Location: login.php");
exit();

?>