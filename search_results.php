<?php
include("connection.php");
// Retrieve search query
$search = $_POST['search'];

// Perform search query
$sql = "SELECT * FROM stories WHERE title LIKE '%$search%' OR location LIKE '%$search%' OR story LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

// Display search results
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "<h2>" . $row["title"] . "</h2>";
		echo "<p>" . $row["location"] . "</p>";
		echo "<p>" . $row["story"] . "</p>";
	}
} else {
	echo "No results found.";
}

// Close database connection
mysqli_close($conn);
?>