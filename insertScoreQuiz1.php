<?php 
include "connection.php";
    $sqlInsert = "INSERT INTO `student_score` (`student_id`, `quiz1`) VALUES ('1','{$_GET['score']}' );";
    $result = $conn->query($sqlInsert);
?>