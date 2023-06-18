<?php
include "connect.php";

if(isset($_POST['delete'])){
$history_id = $_POST['history_id']; //retrieving the history id for reference delete
$username = $_POST['username_id'];

        $query = "SELECT * FROM history WHERE  username = '$username'";
        $result = mysqli_query($mysqli, $query); //if tinggal satu, meaning dia nak delete all history. so restart
        if(mysqli_num_rows($result) == 1){
            $q=mysqli_query($mysqli,"UPDATE `rank` SET `score`=0 ,time=NOW() WHERE username= '$username'")or die('Error174');
        }else{
            $q=mysqli_query($mysqli,"SELECT score FROM history WHERE history_id ='$history_id' AND username='$username'" )or die('Error156');
        while($row=mysqli_fetch_array($q) )
            {
                $s=$row['score'];
            }
        $q=mysqli_query($mysqli,"SELECT * FROM rank WHERE username='$username'" )or die('Error161');
        while($row=mysqli_fetch_array($q) )
            {
                $updated_score=$row['score'];
            }

        if($s >0){
            $updated_score = $updated_score - $s;
        }else{
            $updated_score = $updated_score + $s;
        }

        $q=mysqli_query($mysqli,"UPDATE `rank` SET `score`=$updated_score ,time=NOW() WHERE username= '$username'")or die('Error174');
        }
        
        


        $delete_query = "DELETE FROM history WHERE history_id = $history_id";
        $result = mysqli_query($mysqli,$delete_query);
        if($result){
             header("Location: historyQuiz.php?status=deletesuccess");
        }else{ //failed to delete
            $error_message = mysqli_error($mysqli);
            echo "Deletion failed: " . $error_message;
            
         }
        

        }
    

?>