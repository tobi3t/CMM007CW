<?php
session_start();
include("connection.php");

// Get the form data
$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$location = $_POST['location'];
$story = $_POST['story'];
$image = $_POST['image'];

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Prepare the SQL statement
$sql = "INSERT INTO stories (title, location, story, image, user_id) VALUES ('$title', '$location', '$story', '$image', '$user_id')";

// Execute the statement
if ($conn->query($sql) === TRUE) {
  // Redirect the storyteller to the profile page
  header('Location: profile.php');
} else {
  // There was an error adding the story
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
