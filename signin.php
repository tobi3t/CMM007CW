<?php
include("connection.php");
// Start the session to store the user's authentication status
session_start();

// Get the user input from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to the MySQL database
$conn = mysqli_connect('localhost', 'username', 'password', 'database');

// Prepare and execute the SQL query to check if the storyteller exists and has the correct password
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

// If the query returns a row, the user exists and has the correct password
if (mysqli_num_rows($result) == 1) {
  // Store the user's authentication status in the session
  $_SESSION['authenticated'] = true;
  // Redirect the stotyteller to the profile page
  header('Location: profile.php');
  exit;
} else {
  // If the query returns no rows, the authentication fails
  $error_message = "Invalid email or password.";
}
?>