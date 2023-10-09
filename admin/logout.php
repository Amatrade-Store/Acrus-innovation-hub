<?php
session_start(); // Start a session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header('Location: /arcus/admin/login.php');
exit();
?>
