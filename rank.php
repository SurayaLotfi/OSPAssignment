<?php
include "connection.php";

// Retrieve scores from the database
$sqlScores = "SELECT student_id, quiz2 FROM student_score2 ORDER BY quiz2 DESC";
$resultScores = $conn->query($sqlScores);

// Store scores in an array
$scores = array();
while ($row = $resultScores->fetch_assoc()) {
    $scores[$row['student_id']] = $row['quiz2'];
}

// Calculate the rank for each student
$rank = 1;
$rankedScores = array();
foreach ($scores as $studentID => $score) {
    $rankedScores[$studentID] = $rank;
    $rank++;
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
                                              <a href="index.html">Home</a>
                                          </li>
                                        
                                           <li class="has-sub">
                                               <a href="quiz.html">Quiz</a>
                                               <ul>
                                                <li><a href="quiz.html">Quizzes</a></li>
                                                <li><a href="class-single.html">History</a></li>
                                                <li><a href="class-single.html">Score</a></li>
                                                <li><a href="class-single.html">Ranking</a></li>
                                                </ul>
                                           </li>

                                          <li class="has-sub"> 
                                              <a href="community.html">Community Forum</a>
                                          </li>

                                          <li class="has-sub">
                                            <a href="contact.html">Contact Us</a>
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
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>Quiz</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Quiz</li>
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
           <!-- class area start -->
           <div body>
           <section class="class-area pt-120 pb-120 p-relative">
            <div class="animations-06"><img src="img/bg/an-img-06.png" alt="an-img-01"></div>
            <div class="animations-07"><img src="img/bg/an-img-07.png" alt="contact-bg-an-01"></div>
            <div class="animations-08"><img src="img/bg/an-img-08.png" alt="contact-bg-an-01"></div>
            <div class="animations-09"><img src="img/bg/an-img-09.png" alt="contact-bg-an-01"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="class-item mb-30">
                            <div class="class-img">
                                <div class="class-img-outer">
                                    <img src="https://i.pinimg.com/564x/7c/fc/07/7cfc076bf8997e4ee072fd090099e848.jpg" alt="class image">
                                </div>                                    
                            </div>
                            <div class="class-content">
                                <h4 class="title">Bullying Myths And Facts Quiz! Trivia</a></h4>
                                <p>There are a lot of schools that have different rituals with bullying hence, causes more harm than good. 
                                    The quiz below will help see if you have all your facts right when it comes to bullying.</p>
                                    
                            
                        


    </div>
                           
 </div>
