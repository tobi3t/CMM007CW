<?php
include("connection.php");

// Get the story ID from the query string
$story_id = $_GET['id'];

// Delete the story from the database
$conn->query("DELETE FROM stories WHERE id = $story_id");

// Redirect back to the profile page
header('Location: adminprofile.php');
?>