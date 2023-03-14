<?php
// Start the session to retrieve the storyteller's authentication status
session_start();

// Check if the storyteller is not authenticated, if yes, redirect to the login page
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != true) {
  header('Location: index.php');
  exit;
}
include("connection.php");

// Get the user ID from the URL parameter
$user_id = $_SESSION['user_id'];

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Prepare the SQL statement to select stories by user ID
$sql = "SELECT id, title, location, story, image FROM stories WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <?php echo 'Welcome, ' . $_SESSION['email']; ?>
                <li><a href="addstory.php">Add Story</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <h1>My Stories</h1>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Story</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td><?php echo $row['story']; ?></td>
          <td><?php echo $row['image']; ?></td>
          <td><a href="editstory.php?id=<?php echo $row['id']; ?>">Edit</a></td>
          <td><a href="delete_story.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
    </main>
    <footer>
        <p>&copy; 2023 Touries Inc. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
</body>

</html>