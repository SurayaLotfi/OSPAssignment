<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Share Your Story</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> <!--google icons-->
    <meta charset="UTF-8">
    <?php
    //connect to database
    $connection = mysqli_connect('localhost', 'root', '', 'stories');
    mysqli_set_charset($connection, 'utf8');


    if (!$connection) {
        die('Connection Failed: ' . mysqli_connect_error());
    }
    
    // Rest of your code...

?>
  <body>
        
    <div class="container-fluid no-padding">
        <div class="row">
            <!--Header-->
            <div class="image-container"> 
                <div class="content">
                    <h1>Real Kids Speak Out</h1>
                     <div class="content" style="margin: -20px; font-family: 'Rubik', sans-serif;" >
                        Know that you're not alone. Read these stories from kids like you from all over the world.
                     </div>
                     <button class="custom-button" style="margin:15px;">Share Your Own Story</button>

                </div>
            </div>
        </div>
        <!--Filter-->
        <div class="container">
        <div class="row">
                <div class="solid-bg-colour">
                    <div class="image-with-text">
                     80 posts     |
                     <a href="">
                        <img src="images/filter.png" alt="filter" style="width: 50px; margin-left: 10px;"/>
                    </a>
                    Sort By: Most Popular
                    </div>
                </div>  
            </div>
        </div>
        
        <!--Stories Content-->
        <div class="row">
            <div class="image-container" style="background-image: url(images/bullied-background-body.jpg); height: 2000px;">
                
                <div class="overlay"></div>
                <br>
                <br>
                <div class="container">
               
                                <?php
                                       $query = "SELECT * FROM stories;"; //one semicolon for sql language, one for php language
                                       $results = mysqli_query($connection, $query);
                                       $resultsCheck = mysqli_num_rows($results);
                                        if ($resultsCheck > 0 ){
                                            while($row = mysqli_fetch_assoc($results)){
                                                ?>
                                                    <div class="write-post-container" style="font-size: 30px;">
                                                        <?php echo $row['title'] ; ?>

                                                        <hr class = "custom-line" style="background-color: white;">

                                                        <div style = "font-family: 'Rubik', sans-serif; font-size: 15px; margin:5px;"><i>
                                                            <?php echo $row['date']; ?>
                                                        </div></i>

                                                        <div style="font-size: 25px; margin: 5px;">
                                                            <?php echo $row['username']; ?>
                                                        </div>

                                                        <div class="description">     
                                                            <?php echo $row['description'] ;?>
                                                        </div>
                                                    </div>
                                           <?php
                                            }
                                        } ?>
                                     
                               
                            
                    
                
            </div>
        </div>
        </div>
    </div>

</body>
</head>
</html>