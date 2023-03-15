<?php
include("connection.php");

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['authenticated'] = true;
  $_SESSION['email'] = $row['email'];
  $_SESSION['user_id'] = $row['user_id'];
  
  header('Location: profile.php');
  exit;
} else {
  header('Location: login.php');;
}
?>
