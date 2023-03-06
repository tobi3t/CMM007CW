<?php
session_start();
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM stories WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Title: " . $row["title"]. "<br>Persona: " . $row["persona"]. "<br>Scenario: " . $row["scenario"]. "<br>Story: " . $row["story"]. "<br>Image: " . $row["image"]. "<br><br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
