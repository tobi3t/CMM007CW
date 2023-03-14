<?php
// Start the session to destroy the user's authentication status
session_start();
// Destroy the session
session_destroy();
// Redirect the user to the login page
header('Location: index.php');
exit;
?>
