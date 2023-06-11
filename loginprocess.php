<?php
// Start the session
session_start();

// Get the submitted email and password
$username = $_POST['username'];
$password = $_POST['password'];

//connection database at page connect.php
include 'connect.php';

// Prepare the SQL statement to check for the user
$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if a row was found in the database
if ($result->num_rows > 0) {
    // User exists, fetch the stored hashed password
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];

    // Verify the submitted password against the stored hashed password
    if ($password == $storedPassword) {
        // Password is correct, start the session and redirect to a logged-in page
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        // Password is incorrect, redirect to the login page
        header('Location: login.php?error=incorrect_password');
        exit();
    }
} else {
    // User does not exist, redirect to the login page
    header('Location: login.php?error=user_not_found');
    exit();
}
?>
