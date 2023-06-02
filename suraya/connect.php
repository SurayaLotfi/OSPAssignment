<?php
    //connect to database
    $connection = mysqli_connect('localhost', 'root', '', 'assignmentosp');

    if (!$connection) {
        die('Connection Failed: ' . mysqli_connect_error());
    }
    
    // Rest of your code...
    else{
        if (isset($_POST["submit"]) && isset($_POST["username"]) && isset($_POST["title"]) && isset($_POST["description"])){
        $username = $_POST["username"];
        $title = $_POST["title"];
        $description = $_POST["description"];

        $stmt = $connection-> prepare("insert into stories(username, title, description)
                            values(?,?,?)");
                          
        $stmt -> bind_param("sss", $username, $title, $description);
        $stmt -> execute();
        echo "Story has been Submitted";
        $stmt-> close();
        $connection -> close();

       }else{
        echo " error ";
       }
    }

?>