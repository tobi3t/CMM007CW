<?php
// Start a session to store user data
session_start();

// Connect to the database
include('connection.php');

// Get user input
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate user input (optional)
if(empty($name) || empty($email) || empty($password)) {
	$_SESSION['error'] = "All fields are required.";
	header('Location: index.php');
	exit();
}

// Check if email already exists in the database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
	$_SESSION['error'] = "Email already exists.";
	header('Location: register.php');
	exit();
}

// Insert user data into the database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if(mysqli_query($conn, $sql)) {
	$_SESSION['success'] = "Registration successful.";
	header('Location: login.php');
	exit();
} else {
	$_SESSION['error'] = "Registration failed.";
	header('Location: register.php');
	exit();
}
?>
