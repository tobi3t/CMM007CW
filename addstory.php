<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != true) {
  header('Location: index.html');
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Story</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="profile.php"><?php echo 'Welcome, ' . $_SESSION['email']; ?></a></li>
                <li><a href="addstory.php">Add Story</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="formholder">
        <form method="POST" action="add_story.php">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
            <br>
  
            <label for="location">Location:</label>
                <select id="location" name="location" required>
                    <option value="Aberdeenshire">Aberdeenshire</option>
                    <option value="London">London</option>
                    <option value="Manchester">Manchester</option>
                    <option value="Birmingham">Birmingham</option>
                    <option value="Liverpool">Liverpool</option>
                    <option value="Glasgow">Glasgow</option>
                    <option value="Edinburgh">Edinburgh</option>
                    <option value="Belfast">Belfast</option>
                    <option value="Dublin">Dublin</option>
                    <option value="Newcastle">Newcastle</option>
                    <option value="Leeds">Leeds</option>
                    <option value="Cardiff">Cardiff</option>
                    <option value="Bristol">Bristol</option>
                    <option value="Southampton">Southampton</option>
                    <option value="Portsmouth">Portsmouth</option>
                    <option value="Sheffield">Sheffield</option>
                    <option value="Nottingham">Nottingham</option>
                    <option value="Cambridge">Cambridge</option>
                    <option value="Norwich">Norwich</option>
                    <option value="Plymouth">Plymouth</option>
                    <option value="Exeter">Exeter</option>
                </select>
                <br>
  
            <label for="story">Story:</label>
            <textarea name="story" id="story" rows="10" required></textarea>
            <br>

            <label for="image">Image:</label>
            <input type="file" name="image">
            <br>
  
            <input type="hidden" name="user_id" value="user_id"> 
  
            <button type="submit">Submit</button>
        </form>
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