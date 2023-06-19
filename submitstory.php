<?php
session_start();
include "connect.php";


if(isset($_SESSION['username'])){
    if(isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $category = $_POST['category'];
        $title = mysqli_real_escape_string($mysqli, $_POST['title']);
        $story = mysqli_real_escape_string($mysqli, $_POST['story']);


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

//for pagination
//getting the total number of posts
$query = "SELECT * from posts";
$records = mysqli_query($mysqli, $query);
$no_of_rows = mysqli_num_rows($records);

//setting the number of rows to display in a page
$rows_per_page = 4;

//calculating the number of pages
$pages = ceil($no_of_rows/$rows_per_page);

//setting the 'start from' value
$start = 0;

//if the user clicks on the pagination buttons
if(isset($_GET['page_number'])){
    $page = $_GET['page_nr']-1; 
    $start = $page * $rows_per_page;
}

//Query the database based on the calculated $start value,
//and the fixed $rows_per_page value
$query = "SELECT *  FROM posts LIMIT $start, $rows_per_page";
$result_pagination = mysqli_query($mysqli, $query);

?>