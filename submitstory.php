<?php
session_start();
include "connect.php";


if(isset($_SESSION['username'])){
    if(isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $title = $_POST['title'];
        $story = $_POST['story'];
        $category = $_POST['category'];


        $sql = "INSERT INTO posts (username, title, story, category) VALUES ('$username','$title','$story','$category')";
        $result = mysqli_query($mysqli,$sql);
        if($result){
            header('Location: blog.php?status=success'); //navigate to blog.php.. where? at the status where it mentions success.
        }else{
            header('Location: blog.php?status=error');
        }
    }else{
        
    }
}else{
   header('Location: login.php');
}

?>