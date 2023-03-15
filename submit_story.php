<?php
include("connection.php");
$title = $_POST['title'];
$location = $_POST['location'];
$story = $_POST['story'];

$host = 'localhost';  
$dbname = 'storytelling'; 
$username = 'root'; 
$password = '';  
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
 
$sql = "INSERT INTO user_stories (title, location, story) VALUES (:title, :location, :story)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':story', $story);
$stmt->execute();

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

  $image = file_get_contents($_FILES['image']['tmp_name']);
  $image_type = $_FILES['image']['type'];

  $sql = "INSERT INTO images (data, type) VALUES (:data, :type)";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':data', $image, PDO::PARAM_LOB);
  $stmt->bindParam(':type', $image_type);
  $stmt->execute();

  $image_id = $db->lastInsertId();

  $sql = "UPDATE user_stories SET image_id = :image_id WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':image_id', $image_id);
  $stmt->bindParam(':id', $db->lastInsertId());
  $stmt->execute();
}

header('Location: profile.php');
exit();
?>
