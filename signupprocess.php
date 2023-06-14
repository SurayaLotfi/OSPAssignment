<?php
// Start the session
session_start();

//connection database at page connect.php
include 'connect.php';
$con = mysqli_connect('localhost','root','','osp');

// Get the submitted username and password
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$email = trim($email);
$sourcePage = $_GET['source'];

if (!preg_match('/^[-a-z0-9~!$%^&*=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/', $email)) {
    header('Location: signup.php?error=invalid_email&source=' . $sourcePage);
    exit();
}

$email = mysqli_real_escape_string($con, $email);

// Perform form validation
if (empty($username) || empty($password)) {
    // Handle empty fields
    header('Location: login.php?error=empty_fields&source=' . $sourcePage);
    exit();
}

// Prepare the SQL statement to check for the username
$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if a row was found in the database
if ($result->num_rows > 0) {
    // Username already exists, redirect to the sign-up page with an error message
    header('Location: signup.php?error=username_exists&source=' . $sourcePage);
    exit();
} else {
    // Username is available, proceed with inserting the user into the database

    // Hash the password
    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL statement to insert the user into the database
    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    // Check if the user was successfully added
    if ($stmt->affected_rows > 0) {
        // User was added successfully, redirect to the login page
        header('Location: login.php?success=registered&source=' . $sourcePage);
        exit();
    } else {
        // Failed to add the user, redirect to the sign-up page
        header('Location: signup.php?error=registration_failed&source=' . $sourcePage);
        exit();
    }
}
?>
