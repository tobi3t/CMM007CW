<?php
session_start();

include("connection.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM stories WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Title: " . $row["title"]. "<br>Location: " . $row["location"]. "<br>Story: " . $row["story"]. "<br>Image: " . $row["image"]. "<br><br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
