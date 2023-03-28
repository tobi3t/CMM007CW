<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$location = $_POST['location'];
$story = $_POST['story'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if ($_FILES["image"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $target_file;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

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
