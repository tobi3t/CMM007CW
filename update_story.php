<?php
  $story_id = $_GET['id'];
  $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

  // Update the story in the database
  $title = $_POST['title'];
  $persona = $_POST['persona'];
  $scenario = $_POST['scenario'];
  $story = $_POST['story'];
  $image = $_FILES['image']['name'];
  if (!empty($image)) {
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
    $query = "UPDATE stories SET title='$title', persona='$persona', scenario='$scenario', story='$story', image='$image' WHERE id=$story_id";
  } else {
    $query = "UPDATE stories SET title='$title', persona='$persona', scenario='$scenario', story='$story' WHERE id=$story_id";
  }
  mysqli_query($conn, $query);

  // Redirect back to the story list page
  header('Location: story_list.php');
?>
