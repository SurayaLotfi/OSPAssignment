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
    // Get the source page parameter
    $sourcePage = $_GET['source'];

    if ($password == $storedPassword) {
        // Password is correct, start the session and redirect to a logged-in page based on the source page
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Set the appropriate redirect URL based on the source page
        switch ($sourcePage) {
            case 'volunteer':
                header('Location: volunteer.php');
                break;
            case 'community':
                header('Location: community.php');
                break;
            case 'quiz':
                header('Location: quiz.php');
                break;
            case 'contact':
                header('Location: contact.php');
                break;
            default:
                header('Location: index.php');
                break;
        }

        exit();
    } else {
            // Password is incorrect, redirect to the login page
            header('Location: login.php?error=incorrect_password&source=' . $sourcePage);
            exit();
        }
    } else {
        // User does not exist, redirect to the login page
        header('Location: login.php?error=user_not_found&source=' . $sourcePage);
        exit();
    }
    ?>
