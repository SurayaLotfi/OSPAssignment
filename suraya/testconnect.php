<?php

if (isset($_POST["submit"]) && isset($_POST["username"]) && isset($_POST["title"]) && isset($_POST["description"])){
    $username = $_POST["username"];
    $title = $_POST["title"];
    $description = $_POST["description"];

       //connect to database
       $connection = new mysqli('localhost', 'root', '', 'assignmentosp');
       if ($connection -> connect_error) {
           die('Connection Failed: ' . $connection->connect_error);
       }
       else{
        $stmt = $connection-> prepare("insert into stories(username, title, description)
                            values(?,?,?)");
                          
        $stmt -> bind_param("sss", $username, $title, $description);
        $stmt -> execute();
        echo "Story has been Submitted";
        $stmt-> close();
        $connection -> close();

       }
    }

?>