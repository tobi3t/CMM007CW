<?php
session_start();

include('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($name) || empty($email) || empty($password)) {
	$_SESSION['error'] = "All fields are required.";
	header('Location: register.html');
	exit();
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
	$_SESSION['error'] = "Email already exists.";
	header('Location: register.html');
	exit();
}

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if(mysqli_query($conn, $sql)) {
	$_SESSION['success'] = "Registration successful.";
	header('Location: login.php');
	exit();
} else {
	$_SESSION['error'] = "Registration failed.";
	header('Location: register.html');
	exit();
}
?>
