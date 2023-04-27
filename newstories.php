<!DOCTYPE html>
<html>
<head>
  <title>My YouTube Video</title>
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
  </style>
</head>
<body>
  <div class="wrapper">
    <h1>Stories of bully victims</h1>
    
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
