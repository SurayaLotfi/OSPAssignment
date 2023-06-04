<?php

// Get the submitted email and password
$email = $_POST['email'];

// Perform the database query to add the user
// Replace the database credentials with your own
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'osp';

// Create a database connection
$mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die('Connection Error: ' . $mysqli->connect_error);
}

// Prepare the SQL statement to insert the user into the database
$stmt = $mysqli->prepare("INSERT INTO newsletter (email) VALUES (?)");
$stmt->bind_param("s", $email);
$stmt->execute();

// Check if the user was successfully added
if ($stmt->affected_rows > 0) {
    // User was added successfully, start the session and redirect to a logged-in page
    header('Location: index.php');
    exit();
} else {
    // Failed to add the user, redirect to the sign-up page
    header('Location: index.php');
    exit();
}
?>
