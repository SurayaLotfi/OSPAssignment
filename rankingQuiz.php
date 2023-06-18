<?php
session_start();
include "connect.php";
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];

}else{
    header("location: login.php");
}
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Say No to Bully</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="font-flaticon/flaticon.css">
        <link rel="stylesheet" href="css/dripicons.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>

    
    <body>
        <!-- header -->
        <header class="header-area header-three">  	
            <div id="header-sticky" class="menu-area">
              <div class="container">
                  <div class="second-menu">
                      <div class="row align-items-center">
                          <div class="col-xl-2 col-lg-2">
                              <div class="logo">
                                  <a href="index.html"><img src="img/logo/nl2.png" alt="logo"></a>
                              </div>
                          </div>
                         <div class="col-xl-7 col-lg-7">
                            
                              <div class="main-menu text-right text-xl-right">
                                  <nav id="mobile-menu">
                                       <ul>
                                          <li class="has-sub">
                                              <a href="index.php">Home</a>
                                          </li>
                                        
                                           <li class="has-sub">
                                               <a href="quiz.php">Quiz</a>
                                               <ul>
                                                <li><a href="quiz.php">Quizzes</a></li>
                                                <li><a href="historyQuiz.php">History</a></li>
                                                <li><a href="rankingQuiz.php">Ranking</a></li>
                                                </ul>
                                           </li>

                                          <li class="has-sub"> 
                                              <a href="community.php">Community Forum</a>
                                          </li>

                                          <li class="has-sub">
                                            <a href="contact.php">Contact Us</a>
                                          </li> 

                                          <li class="has-sub">
                                                <a href="volunteer.php">Join Us</a>
                                            </li>    
                                                                                        
                                      </ul>
                                  </nav>
                              </div>
                          </div>   
                          <div class="col-xl-3 col-lg-3 text-right d-none d-lg-block mt-30 mb-30 text-right text-xl-right">
                              <div class="login">
                                  <ul>
                                      <li><div class="header-btn second-header-btn">
                                 <a href="volunteer.html" class="btn">Join Us</a>
                              </div></li>
                                  </ul>
                              
                              </div>
                             
                          </div>
                          
                              <div class="col-12">
                                  <div class="mobile-menu"></div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>
      <!-- header-end -->

        <!-- main-area -->
        <main>

<!-- breadcrumb-area -->
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrp.png);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>Ranking</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="quiz.php">Back to All Quizzes</a></li>
                                    </ol>
                                </nav>
                            </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

    <?php
            //ranking start
        $q=mysqli_query($mysqli,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
        echo '<div class="panel title">
        <div class="table-responsive" style="padding: 30px;">
        <table class="table table-striped title1" style="margin: 0 auto; width: 50%;">
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 40%;">
                <col style="width: 40%;">
            </colgroup>
            <tr style="color: blue;">
                <th><b>Rank</b></th>
                <th><b>Name</b></th>
                <th><b>Score</b></th>
            </tr>';
            
            $no = 0; //declare ranking
            while ($row = mysqli_fetch_array($q)) {
            $username = $row['username'];
            $score = $row['score'];
            $no++;

            echo '<tr>
                    <td><b>' . $no . '</b></td>
                    <td>' . $username . '</td>
                    <td>' . $score . '</td>
                    </tr>';
            }
    echo '</table></div></div>';
?>