<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['admin'] = true;
    header('Location: adminprofile.php');
    exit;
  } else {
    header('Location: admin.php?error=1');
    exit;
  }
}

mysqli_close($conn);
?>
