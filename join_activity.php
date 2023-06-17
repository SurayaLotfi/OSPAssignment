<?php
if (isset($_POST['join'])) {
    // Retrieve the user_id and activity_id from the request
    $user_id = $_SESSION['user_id']; // 
    $activity_id = $_POST['activity_id']; //

    $query = 'INSERT INTO user_activity (user_id, activity_id) VALUES ($user_id, $activity_id);';

    // Redirect to a success page or display a success message
    header("Location: index.php");
    exit();
}
?>