<?php 
include "connection.php";
// value '2' is the username id
    $sqlInsert = "INSERT INTO `student_score2` (`student_id`, `quiz2`) VALUES ('2','{$_GET['score']}' );";
    $result = $conn->query($sqlInsert);
?>