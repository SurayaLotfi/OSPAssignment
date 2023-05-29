<?php
    //connect to database
    $connection = mysqli_connect('localhost', 'root', '', 'stories');

    if (!$connection) {
        die('Connection Failed: ' . mysqli_connect_error());
    }
    
    // Rest of your code...

?>