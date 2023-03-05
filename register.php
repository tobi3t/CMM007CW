<?php

$name = $email = $password = $confirm_password = "";
$name_error = $email_error = $password_error = $confirm_password_error = "";

if(isset($_POST['register'])) {
	// Validate name
	if(empty($_POST['name'])) {
		$name_error = "Name is required";
	} else {
		$name = test_input($_POST['name']);
		if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$name_error = "Only letters and white space allowed";
		}
	}

	// Validate email
	if(empty($_POST['email'])) {
		$email_error = "Email is required";
	} else {
		$email = test_input($_POST['email']);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_error = "Invalid email format";
		}
	}

	// Validate password
	if(empty($_POST['password'])) {
		$password_error = "Password is required";
	} else {
		$password = test_input($_POST['password']);
		if(strlen($password) < 8) {
			$password_error = "Password must be at least 8 characters";
		}
	}

	// Validate confirm password
	if(empty($_POST['confirm_password'])) {
		$confirm_password_error