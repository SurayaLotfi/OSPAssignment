<?php 
include "connection.php";
    $sqlInsert = "INSERT INTO `student_score2` (`student_id`, `quiz2`) VALUES ('1','{$_GET['score']}' );";
    $result = $conn->query($sqlInsert);
?>