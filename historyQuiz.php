<?php
session_start();
include "connect.php";
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];

}else{
    header("location: login.php");
}
?>

<style>
.table-info {
  font-family: Arial, sans-serif;
  font-size: 14px;
  color: #333;
  /* Add any other desired font properties */
}
    </style>

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
                                              <a href="blog.php">Community Forum</a>
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
                                    <h2>History</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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

    //history start
    $q=mysqli_query($mysqli,"SELECT * FROM history WHERE username='$username' ORDER BY date DESC " )or die('Error197');
    echo  '<div class="table-container" style="display: flex; justify-content: center; align-items: center; height: 60vh;">
            <table class="table table-striped title1" style="width: 80%;">
            <tr style="color:green">
            <td><h4 style="color:green">No.</h4></td>
            <td><h4 style="color:green">Quiz</h4></td>
            <td><h4 style="color:green">Question Solved</h4></td>
            <td><h4 style="color:green">Right</h4></td>
            <td><h4 style="color:green">Wrong</h4></td>
            <td><h4 style="color:green">Score</h4></td>';

            $no=0;
            while($row=mysqli_fetch_array($q) )
            {
                $eid=$row['eid'];
                $score=$row['score'];
                $wrong=$row['wrong'];
                $correct=$row['correct'];
                $qa=$row['level'];
                $result=mysqli_query($mysqli,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');
                while($row=mysqli_fetch_array($result) )
                {
                     $title=$row['title'];
            }
            $no++;
            echo '<tr><td><h5>'.$no.'</h5></td>
            <td><h5>'.$title.'</h5></td>
            <td><h5>'.$qa.'</h5></td>
            <td><h5>'.$correct.'</h5></td>
            <td><h5>'.$wrong.'</h5></td>
            <td><h5>'.$score.'</h5></td></tr>';
            }
            echo'</table></div>';
            ?>

               <!-- footer -->
       <footer class="footer-bg footer-p">
        <div class="footer-top pt-120 pb-80  p-relative" style="background-image: url(img/bg/footer-bg.png); background-color: #fff;  background-repeat: no-repeat;background-size: cover;background-position: center;">
            <div class="container">
                <div class="row justify-content-between">
                    
                      <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title mb-15">
                               <img src="img/logo/nl2.png" alt="img">
                            </div>
                            <div class="footer-text mb-20">
                                <p>An educational website dedicated to addressing and combating bullying issues, providing resources, support, and insights to create a safe and inclusive environment for students.</p>
                            </div>
                            <div class="footer-social">                                    
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>        
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>Our Links</h2>
                            </div>
                            <div class="footer-link">
                                <ul>                                        
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="quiz.php"> Quiz</a></li>
                                    <li><a href="blog.php">  Community Forum</a></li>
                                    <li><a href="contact.php"> Contact Us</a></li>
                                    <li><a href="volunteer.php">Join Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>Contact Us</h2>
                            </div>
                            <div class="f-contact">
                                <ul>
                                <li>
                                    <i class="icon fal fa-map-marker-check"></i>
                                    <span>Faculty of Computer Science and Information Technology</span>
                                </li>
                                <li>
                                    <i class="icon fal fa-phone"></i>
                                    <span>1800-121-3637<br>+91-7052-101-786</span>
                                </li>
                               <li><i class="icon fal fa-envelope"></i>
                                    <span>
                                        <a href="mailto:17201828@siswa.um.edu.my">17201828@siswa.um.edu.my</a>
                                   <br>
                                        <a href="mailto:help@example.com">help@example.com</a>
                                   </span>
                                </li>
                            </ul>
                                
                                </div>
                        </div>
                    </div>  
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title mb-15">
                              <h2>Subscribe Now !</h2>
                            </div>
                           <div class="footer-link">
                            <div class="newslater-area">
                                <form name="ajax-form" id="contact-form4" action="#" method="post" class="contact-form newslater">
                                   <div class="form-group p-relative">
                                      <input class="form-control" id="email2" name="email" type="email" placeholder="Email Address..." value="" required=""> 
                                      <button type="submit"  id="send2"><i class="far fa-chevron-right"></i></button>
                                   </div>
                                   <!-- /Form-email -->	
                                </form>
                             </div>
                            </div>
                        </div>
                    </div>
                  
                    
                </div>
                
            </div>
        </div>
       <div class="copyright-wrap text-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">                         
                          Copyright © 2023 UM All rights reserved.  
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->



