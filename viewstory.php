<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Story</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="browsestories.php">Stories</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.html">Sign Up</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <?php
include("connection.php");

$id = $_GET['id'];

$sql = "SELECT * FROM stories WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<div class='story-container'>";
    echo "<h2 class='story-title'>" . $row["title"] . "</h2>";
    echo "<p class='story-meta'>" . $row["location"] . "</p>";
    echo "<p class='story-content'>" . $row["story"] . "</p>";
    echo "</div>";
} else {
    echo "Story not found.";
}

mysqli_close($conn);
?>

    </main>
    <footer>
        <p>&copy; 2023 Touries Inc. All rights reserved.</p>
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav>
                        <ul>
                            <li><a href="faq.html">Frequently Asked Questions</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col">
                    <nav>
                        <ul>
                            <li><a href="contactus.html">Reader's Feedback</a></li>
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

</html>