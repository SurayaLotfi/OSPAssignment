<?php
include "connect.php";
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
                                                <li><a href="quiz.html">Quizzes</a></li>
                                                <li><a href="class-single.html">History</a></li>
                                                <li><a href="class-single.html">Score</a></li>
                                                <li><a href="class-single.html">Ranking</a></li>
                                                </ul>
                                           </li>

                                          <li class="has-sub"> 
                                              <a href="community.php">Community Forum</a>
                                          </li>

                                          <li class="has-sub">
                                            <a href="contact.php">Contact Us</a>
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
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrp2.png)">
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
                    <!-- Add PHP scripts here -->
                    <?php 
                     $sql = "SELECT * FROM quiz";
                     $result = mysqli_query($mysqli,$sql);
                     $i = 0;
                     while($row = mysqli_fetch_assoc($result)){
                        $i++;
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="class-item mb-30">
                            <div class="class-img">
                                <div class="class-img-outer">
                                    <img src="<?php echo $row['image']?>" alt="class image">
                                </div>                                    
                            </div>
                            <div class="class-content">
                                <h4 class="title"><?php echo $row['title']?></a></h4>
                                <p>There are a lot of schools that have different rituals with bullying hence, causes more harm than good. 
                                    The quiz below will help see if you have all your facts right when it comes to bullying.</p>
                                    <ul class="schedule">
                                        <li>
                                            <span>Total Questions:</span>
                                            <span class="class-size">2 Questions</span>
                                        </li>
                                        <li>
                                            <div class="header-btn second-header-btn">
                                            <a href="quiz<?php echo $i?>.php" class="btn">Start</a>
                                        </li>
                            </ul>
                            </div>
                           
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                    
        </section>
    </div>
        <!-- class area start -->        




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
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="quiz.html"> Quiz</a></li>
                                    <li><a href="community.html">  Community Forum</a></li>
                                    <li><a href="contact.html"> Contact Us</a></li>
                                    <li><a href="volunteer.html">Join Us</a></li>
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

        <!-- JS here -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-3.6.0.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/one-page-nav-min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/paroller.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/js_isotope.pkgd.min.js"></script>
        <script src="js/imagesloaded.min.js"></script>
        <script src="js/parallax.min.js"></script>
         <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.meanmenu.min.js"></script>
        <script src="js/parallax-scroll.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/element-in-view.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>