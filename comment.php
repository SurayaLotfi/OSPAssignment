<?php
session_start();
// index.php
 
include "connect.php";
 
if (isset($_POST["post_comment"]))
{
    //validating all fields to prevent SQL injection using PHP built in functions.
    $name = mysqli_real_escape_string($mysqli, $_SESSION["username"]);
    $comment = mysqli_real_escape_string($mysqli, $_POST["comment"]);
    $post_id = mysqli_real_escape_string($mysqli, $_POST["post_id"]);
    $reply_of = 0; //zero if comment is directly for the post. will be greater than zero only for replies.
 
    $result = mysqli_query($mysqli, "INSERT INTO comments(username,  comment, post_id, created_at, reply_of) VALUES ('" . $name . "',  '" . $comment . "', '" . $post_id . "', NOW(), '" . $reply_of . "')");
    if($result){
        $query = "SELECT * from comments where post_id = $post_id"; //calculating number of comments this post has
        $result = mysqli_query($mysqli, $query);
        $total_comments = mysqli_num_rows($result);
        echo $total_comments;
        $updateTotalComments = "UPDATE posts SET comments = $total_comments WHERE id = $post_id";
        $updateresult = mysqli_query($mysqli, $updateTotalComments);
        if($updateresult){
        header("Location: storydetail.php?post_id=$post_id&status=success");
        }else
        {
            header("Location: storydetail.php?post_id=$post_id&status=error");
        }
    }
    else {
        header("Location: storydetail.php?post_id=$post_id&status=error");
    }
}

if (isset($_POST["do_reply"]))
{
    $name = mysqli_real_escape_string($mysqli, $_POST["name"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $comment = mysqli_real_escape_string($mysqli, $_POST["comment"]);
    $post_id = mysqli_real_escape_string($mysqli, $_POST["post_id"]);
    $reply_of = mysqli_real_escape_string($mysqli, $_POST["reply_of"]);
 
    $result = mysqli_query($mysqli, "SELECT * FROM comments WHERE id = " . $reply_of);
    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_object($result);
 
        // sending email
        $headers = 'From: YourWebsite <no-reply@yourwebsite.com>' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         
        $subject = "Reply on your comment";
 
        $body = "<h1>Reply from:</h1>";
        $body .= "<p>Name: " . $name . "</p>";
        $body .= "<p>Email: " . $email . "</p>";
        $body .= "<p>Reply: " . $comment . "</p>";
 
       
    }
 
    mysqli_query($mysqli, "INSERT INTO comments(username, comment, post_id, created_at, reply_of) VALUES ('" . $name . "',  '" . $comment . "', '" . $post_id . "', NOW(), '" . $reply_of . "')");
    echo "<p>Reply has been posted.</p>";
}

//for delete

if(isset($_POST['delete'])){
    $comment_id = $_POST['delete_id'];
    $post_id = $_POST['post_id'];
 
    $sql = "DELETE FROM comments WHERE id=$comment_id";
    $result = mysqli_query($mysqli,$sql);
    if($result){
            $query = "SELECT * from comments where post_id = $post_id"; //calculating number of comments this post has
            $result = mysqli_query($mysqli, $query);
            $total_comments = mysqli_num_rows($result);
            echo $total_comments;
            $updateTotalComments = "UPDATE posts SET comments = $total_comments WHERE id = $post_id";
            $updateresult = mysqli_query($mysqli, $updateTotalComments);
            if($updateresult){
              header("Location: storydetail.php?post_id=$post_id&status=deletesuccess");
             }else{
                ?>
            <script type = "text/javascript">
            alert("Delete unSuccessful");
            window.location = "blog.php";
            </script>
            <?php
            }
        }else{
            ?>
            <script type = "text/javascript">
            alert("Delete not clicked.");
            window.location = "blog.php";
            </script>
            <?php
        }
    }
?>