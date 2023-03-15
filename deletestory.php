<?php
include("connection.php");

$story_id = $_GET['id'];

$conn->query("DELETE FROM stories WHERE id = $story_id");

header('Location: profile.php');
?>