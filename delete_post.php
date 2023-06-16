<?php
include "connect.php";
if(isset($_POST['delete'])){
    $post_id = $_POST['post_id'];
    echo $post_id;
    
    $checkTotalComments = "SELECT * FROM comments WHERE post_id = $post_id";
    $result_total_comments = mysqli_query($mysqli, $checkTotalComments);
 

    if(mysqli_num_rows($result_total_comments)>0){

        $deleteComments = "DELETE FROM comments WHERE post_id = $post_id"; //delete all the comments first post_id fk is in the table
        $result = mysqli_query($mysqli, $deleteComments);
        $delete_query = "DELETE FROM posts WHERE id = $post_id";
        $result = mysqli_query($mysqli,$delete_query);

        if($result){
            header("Location: blog.php?status=deletesuccess");
        }else{ //failed to delete
            $error_message = mysqli_error($mysqli);
            echo "Deletion failed: " . $error_message;
            
         }
           
    }else{ //post has no comments
        $delete_query = "DELETE FROM posts WHERE id = $post_id";
        $result = mysqli_query($mysqli,$delete_query);
        if($result){
            header("Location: blog.php?status=deletesuccess");
        }else{ //failed to delete
            $error_message = mysqli_error($mysqli);
            echo "Deletion failed: " . $error_message;
            
         }

        }
    }

?>