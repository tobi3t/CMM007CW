<?php
include("connection.php");
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Name</th><th>Email</th><th>Message</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["message"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No feedback found.";
}

$conn->close();
?>
