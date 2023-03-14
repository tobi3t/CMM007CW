<?php
include("connection.php");

$errors = [];

if(isset($_POST['register'])) {
	// Validate name
	if(empty($_POST['name'])) {
		$errors['name'] = "Name is required";
	} else {
		$name = test_input($_POST['name']);
		if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$errors['name'] = "Only letters and white space allowed";
		}
	}

	// Validate email
	if(empty($_POST['email'])) {
		$errors['email'] = "Email is required";
	} else {
		$email = test_input($_POST['email']);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Invalid email format";
		} else {
			$domain = substr(strrchr($email, "@"), 1);
			if(!checkdnsrr($domain, "MX")) {
				$errors['email'] = "Invalid email domain";
			}
		}
	}

	// Validate password
	if(empty($_POST['password'])) {
		$errors['password'] = "Password is required";
	} else {
		$password = test_input($_POST['password']);
		if(strlen($password) < 8) {
			$errors['password'] = "Password must be at least 8 characters";
		}
	}

	// Validate confirm password
	if(empty($_POST['confirm_password'])) {
		$errors['confirm_password'] = "Please confirm password";
	} else {
		$confirm_password = test_input($_POST['confirm_password']);
		if($confirm_password !== $password) {
			$errors['confirm_password'] = "Passwords do not match";
		}
	}

	if(empty($errors)) {
		// Insert data into database
		$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $password);
		$stmt->execute();
		
		// Redirect storyteller to login page
		header("Location: login.php");
		exit();
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
