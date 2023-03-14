<?php
include("connection.php");

  // get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Create a new database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // insert the form data into the feedback table
  $sql = "INSERT INTO feedback (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
  if (mysqli_query($conn, $sql)) {
    // redirect to the thank you page
    header('Location: thankyou.php');
    exit;
  } else {
    // redirect to an error page
    header('Location: contactus.php');
    exit;
  }


// close the database connection
mysqli_close($conn);
?>