<?php
include "connect.php";

if(isset($_POST['delete'])){

    

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