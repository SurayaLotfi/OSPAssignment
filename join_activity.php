<?php
include "connect.php";
session_start();

if (isset($_POST['join'])) {
    // Retrieve the user_id and activity_id from the request
    $user_id = $_SESSION['user_id']; 
    $activity_id = $_POST['activity_id']; 

    $query = "INSERT INTO user_activity (user_id, activity_id) VALUES ($user_id, $activity_id);";
    
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // Query executed successfully
        // You can perform any additional operations here
        echo "Success";
    } else {
        // Query execution failed
        echo "Error: " . mysqli_error($mysqli);
        echo 'userid: '.$_SESSION['user_id']; 
    }

    // Redirect to a success page or display a success message
    header("Location: index.php");
    exit();
}
?>