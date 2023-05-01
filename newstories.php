<!DOCTYPE html>
<html>
<head>
  <title>Stories on bully victims</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    h1 {
      color: #ff0000;
    }
    .wrapper {
      margin: 0 auto;
      width: 70%;
    }
    .video-container {
      position: relative;
      padding-bottom: 56.25%; /* 16:9 aspect ratio */
      padding-top: 25px;
      height: 0px;
    }
    .video-container iframe {
      position: absolute;
      left: 0px;
      top: 0px;
      right: 0px;
      bottom: 0px;
      width: 100%;
      height: 100%;
    }
    .navbar {
      overflow: hidden;
      background-color: #333;
      font-family: Arial, sans-serif;
    }

    .navbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }

    .navbar a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Page Content */
    .container {
      margin: auto;
      width: 80%;
      padding-top: 50px;
      text-align: center;
    }

    .section {
      background-size: cover;
      height: 600px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .section-content {
      background-color: rgba(255, 255, 255, 0.7);
      padding: 20px;
      max-width: 500px;
      margin: auto;
      border-radius: 10px;
    }

    .section-title {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .section-content p {
      font-size: 18px;
      text-align: left;
      margin-bottom: 15px;
    }
    
    body{
    background-image: url('https://i.pinimg.com/564x/70/2e/40/702e40edcf6d527a7cb598ba2204d6be.jpg');
      } 
  </style>
</head>
<body>
<div class="navbar">
          <a href="homepage.php">Home</a>
          <a href="facts.php">Facts</a>
          <a href="news.php">News</a>
          <a href="tips.php">Prevention Tips</a>
          <a href="gethelp.php">Get Help</a>
          <a href="newstories.php">Sharing</a>
          <a href="story.php">Share with Us</a>
    </div>
  <div class="wrapper">
    <h1>Stories of bully victims</h1>
    <b><p> Know that you are not alone. This page shows videos of previous victims and how they face and overcome bullying issues</p></b>
    <br>
    
    <?php
      $videos = array(
        array(
          'title' => 'What It’s Like To Be Bullied',
          'url' => 'https://www.youtube.com/embed/hQ6Yxh-44qY',
        ),
        array(
          'title' => 'Life long trauma of the bullied',
          'url' => 'https://www.youtube.com/embed/8DMB_Iqxa50',
        ),
        array(
          'title' => 'Mental bullying',
          'url' => 'https://www.youtube.com/embed/f6r-Kd_YEY4',
        ),
        array(
          'title' => 'Men Respond To Their Childhood Bullies',
          'url' => 'https://www.youtube.com/embed/0LCI7EOttM0',
        ),
        array(
          'title' => "Roseanna's cyberbullying story",
          'url' => 'https://www.youtube.com/embed/E0WbSOpIlqY',
        ),
      );
      
      foreach ($videos as $video) {
        echo '<h2>' . $video['title'] . '</h2>';
        echo '<div class="video-container">';
        echo '<iframe src="' . $video['url'] . '" frameborder="0" allowfullscreen></iframe>';
        echo '</div>';
      }
    ?>

  </div>
</body>
</html>
