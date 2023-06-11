<?php
// Start the session
session_start();

// Get the submitted username and password
$username = $_POST['username'];
$password = $_POST['password'];

// Perform form validation
if (empty($username) || empty($password)) {
    // Handle empty fields
    header('Location: login.php?error=empty_fields');
    exit();
}
//connection database at page connect.php
include 'connect.php';

// Prepare the SQL statement to check for the username
$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if a row was found in the database
if ($result->num_rows > 0) {
    // Username already exists, redirect to the sign-up page with an error message
    header('Location: signup.php?error=username_exists');
    exit();
} else {
    // Username is available, proceed with inserting the user into the database

    // Hash the password
    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL statement to insert the user into the database
    $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Check if the user was successfully added
    if ($stmt->affected_rows > 0) {
        // User was added successfully, redirect to the login page
        header('Location: signup.php?success=registered');
        exit();
    } else {
        // Failed to add the user, redirect to the sign-up page
        header('Location: signup.php?error=registration_failed');
        exit();
    }
}
?>
