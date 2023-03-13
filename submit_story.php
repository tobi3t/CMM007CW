<?php
include("connection.php");
// Get the form values
$title = $_POST['title'];
$location = $_POST['location'];
$subject = $_POST['subject'];
$story = $_POST['story'];

// Connect to the database
$host = 'localhost';  
$dbname = 'storytelling'; 
$username = 'root'; 
$password = '';  
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Insert the user story into the database 
$sql = "INSERT INTO user_stories (title, location, subject, story) VALUES (:title, :location, :subject, :story)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':subject', $subject);
$stmt->bindParam(':story', $story);
$stmt->execute();

// Check if an image was uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
  // Get the image data
  $image = file_get_contents($_FILES['image']['tmp_name']);
  $image_type = $_FILES['image']['type'];

  // Insert the image into the database
  $sql = "INSERT INTO images (data, type) VALUES (:data, :type)";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':data', $image, PDO::PARAM_LOB);
  $stmt->bindParam(':type', $image_type);
  $stmt->execute();

  // Get the ID of the inserted image
  $image_id = $db->lastInsertId();

  // Update the user story with the image ID
  $sql = "UPDATE user_stories SET image_id = :image_id WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':image_id', $image_id);
  $stmt->bindParam(':id', $db->lastInsertId());
  $stmt->execute();
}

// Redirect the user back to their profile
header('Location: profile.php');
exit();
?>
