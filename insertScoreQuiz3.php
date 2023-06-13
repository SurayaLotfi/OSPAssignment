<?php 
include "connection.php";
    $sqlInsert = "INSERT INTO `student_score3` (`student_id`, `quiz3`) VALUES ('1','{$_GET['score']}' );";
    $result = $conn->query($sqlInsert);
?>