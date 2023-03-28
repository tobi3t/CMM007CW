<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: admin.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="adminprofile.php"><?php echo 'Welcome, Admin'; ?></a></li>
                <li><a href="feedbackadmin.php">View Customer Feedback</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Dashboard</h1>
        <div>
        <?php
            include("connection.php"); 

            $sql_users = "SELECT COUNT(*) AS num_users FROM users";
            $result_users = mysqli_query($conn, $sql_users);
            $row_users = mysqli_fetch_assoc($result_users);
            $num_users = $row_users['num_users'];

            $sql_stories = "SELECT COUNT(*) AS num_stories FROM stories";
            $result_stories = mysqli_query($conn, $sql_stories);
            $row_stories = mysqli_fetch_assoc($result_stories);
            $num_stories = $row_stories['num_stories'];
            ?>

            <div class="dashboard">
                <div class="box">
                    <h2>Number of Storytellers</h2>
                    <p><?php echo $num_users; ?></p>
                </div>
                <div class="box">
                    <h2>Number of Stories</h2>
                    <p><?php echo $num_stories; ?></p>
                </div>
            </div>
            
            <?php
            $sql = "SELECT * FROM stories";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                        <thead>
                        <tr>
                        <th>Title</th>
                        <th>Location</th>
                        <th>View Story</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>";
    
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["title"]. "</td>
                        <td>" . $row["location"]. "</td>
                        <td><a href='viewstoryadmin.php?id=" . $row["id"]. "'>View</a></td>
                        <td><a href='deleteinadmin.php?id=" . $row["id"]. "'>Delete</a></td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo " ";
            }
            $conn->close();
        ?>
    </div>
  
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