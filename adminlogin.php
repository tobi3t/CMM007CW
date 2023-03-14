<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])) {
  // get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // validate the username and password against the admin table in the database
  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    // set the session variable to indicate that the admin is logged in
    $_SESSION['admin'] = true;
    header('Location: adminprofile.php');
    exit;
  } else {
    // redirect to the login page with an error message
    header('Location: admin.php?error=1');
    exit;
  }
}

mysqli_close($conn);
?>
