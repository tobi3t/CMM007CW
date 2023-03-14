<?php
// Start the session to retrieve the storyteller's authentication status
session_start();

// Check if the storyteller is not authenticated, if yes, redirect to the login page
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != true) {
  header('Location: index.php');
  exit;
}

include("connection.php");

// Get the story ID from the query string
$story_id = $_GET['id'];

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
die('Connection failed: ' . $conn->connect_error);
 }

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Get the form data
$title = $_POST['title'];
$location = $_POST['location'];
$story = $_POST['story'];
$image = $_POST['image'];

// Prepare the SQL statement
$sql = "UPDATE stories SET title = '$title', location = '$location', story = '$story', image = '$image' WHERE id = $story_id";
$result = $conn->query($sql);

    // Check if the query was successful
    if ($result === TRUE) {
      // Redirect back to the profile page
      header('Location: profile.php');
    } else {
      // There was an error updating the story
      echo "Error updating story: " . $conn->error;
    }
  } else {
    // Get the story data from the database
    $sql = "SELECT * FROM stories WHERE id = $story_id";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
      // Get the story data
      $row = $result->fetch_assoc();
      $title = $row['title'];
      $location = $row['location'];
      $story = $row['story'];
      $image = $row['image'];
    } else {
      // No story was found with the specified ID
      echo "Story not found";
      exit();
    }
  }

  // Close the database connection
  $conn->close();
  ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Story</title>
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
        <h1>Edit Story</h1>
        <div class="formholder">
            <form method="POST">
                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $title; ?>" required>

                <br><br>

                <label for="location">Location:</label>
                <input type="text" name="location" value="<?php echo $location; ?>" required>

                <br><br>

                <label for="story">Story:</label>
                <textarea name="story" required><?php echo $story; ?></textarea>

                <br><br>

                <label for="image">Image URL:</label>
                <input type="text" name="image" value="<?php echo $image; ?>">

                <br><br>

                <input type="submit" value="Save Changes">
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Touries Inc. All rights reserved.</p>
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav>
                        <ul>
                            <li><a href="faq.php">Frequently Asked Questions</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col">
                    <nav>
                        <ul>
                            <li><a href="contactus.php">Reader's Feedback</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
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

</html>s