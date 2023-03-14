<?php
include("connection.php");

// Start the session to store the user's authentication status
session_start();

// Get the user input from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute the SQL query to check if the storyteller exists and has the correct password
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

// If the query returns a row, the user exists and has the correct password
if (mysqli_num_rows($result) == 1) {
  // Fetch the result row as an associative array
  $row = mysqli_fetch_assoc($result);
  // Store the user's authentication status and email in the session
  $_SESSION['authenticated'] = true;
  $_SESSION['email'] = $row['email'];
  $_SESSION['user_id'] = $row['user_id'];
  // Redirect the storyteller to the profile page
  header('Location: profile.php');
  exit;
} else {
  // If the query returns no rows, the authentication fails
  header('Location: login.php');;
}
?>
