<?php
    //connect to database
    $mysqli = new mysqli('localhost', 'root', '', 'assignmentosp');

    if($mysqli -> connect_errno !=0){
        echo $mysqli -> connect_error;
        exit();
    }
    
    // Rest of your code...
   