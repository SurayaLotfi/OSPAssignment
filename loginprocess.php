<?php
// Start the session
session_start();

// Get the submitted email and password
$email = $_POST['email'];
$password = $_POST['password'];

// Perform the database query to check if the user exists
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

// Prepare the SQL statement to check for the user
$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if a row was found in the database
if ($result->num_rows > 0) {
    // User exists, start the session and redirect to a logged-in page
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;
    header('Location: index.php');
    exit();
} else {
    // User does not exist, redirect to the sign-up page
    header('Location: signup.php');
    exit();
}

?>
