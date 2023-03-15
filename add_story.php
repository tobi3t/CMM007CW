<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$location = $_POST['location'];
$story = $_POST['story'];
$image = $_POST['image'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

$sql = "INSERT INTO stories (title, location, story, image, user_id) VALUES ('$title', '$location', '$story', '$image', '$user_id')";

if ($conn->query($sql) === TRUE) {
  header('Location: profile.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
