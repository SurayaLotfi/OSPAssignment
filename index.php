<?php
include "connect.php";
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <?php  session_start(); ?>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Say No to Bully</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        
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
                                    <a href="index.php"><img src="img/logo/nl2.png" alt="logo"></a>
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
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 text-right mt-30 mb-30 text-right text-xl-right">
                                <ul class="horizontal-buttons">
                                    <li>
                                        <div class="header-btn second-header-btn">
                                            <?php if(isset($_SESSION['logged_in'])) { ?>
                                                <a href="logout.php?source=index" class="btn">Sign Out</a>
                                            <?php } else { ?>
                                                <a href="login.php?source=index" class="btn">Sign In</a>
                                            <?php } ?>
                                        </div>
                                    </li>
                                </ul>
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
            
            <!-- search-popup -->
		<!-- <div class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content search-popup">
					<div class="text-center">
						<a href="#" class="close2" data-dismiss="modal" aria-label="Close">× close</a>
					</div>
					<div class="row search-outer">
						<div class="col-md-11"><input type="text" placeholder="Search for products..." /></div>
						<div class="col-md-1 text-right"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- /search-popup -->
            <!-- slider-area -->
            <section id="parallax" class="slider-area slider-four fix p-relative">
                <div class="slider-shape ss-one layer" data-depth="0.10"><img src="img/bg/slider_shape01.png" alt="shape"></div>
                <div class="slider-shape ss-two layer" data-depth="0.30"><img src="img/bg/slider_shape02.png" alt="shape"></div>
                <div class="slider-shape ss-three layer" data-depth="0.40"><img src="img/bg/slider_shape03.png" alt="shape"></div>
                <div class="slider-active">
				<div class="single-slider slider-bg d-flex align-items-center" style="background: url(img/slider/slider_bg.png) no-repeat; ">
                    <div class="img-main" data-animation="fadeInLeft" data-delay=".2s" > <img src="img/slider/slider_bg.png" alt="slider-overlay"></div>
                        <div class="container">
                           <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="slider-content s-slider-content pt-100">
                                        <?php
                                        // Check if the user is logged in
                                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                                            $username = $_SESSION['username']; ?>
                                            <h5 data-animation="fadeInUp" data-delay=".4s" style="margin-top: -30px;">WELCOME, <?php echo $username ?></h5>
                                        <?php 
                                        }
                                        else { ?>
                                            <h5 data-animation="fadeInUp" data-delay=".4s" style="margin-top: -30px;">WELCOME, GUEST</h5>
                                        <?php
                                        }
                                        ?>
                                         <h2 data-animation="fadeInUp" data-delay=".4s">SAY <span>NO</span> TO</h2>
                                         <h2 data-animation="fadeInUp" data-delay=".4s"><div class ="big-text" style="margin-top: -50px;">BULLY!</div></h2>
                                        <p data-animation="fadeInUp" data-delay=".6s" style="margin-top: -30px;">"People are going to bring you down because of your drive.
                                            Ultimately, it makes you a stronger person to turn
                                            your cheek and go the other way." ~Selena Gomez</p>
                                        
                                         <!-- <div class="slider-btn mt-30">                                          
                                            <a href="about.html" class="btn mr-15" data-animation="fadeInUp" data-delay=".4s">Explore More</a>                                             
                                        </div>         -->
                                                              
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    </div>
                    
               
            </section>
            <!-- slider-area-end -->
            
            <!-- brand-area -->
            <div class="brand-area pt-60 pb-60" style="background: #fe4b7c;">
                <div class="container-fluid">
                    <div class="row brand-active">
                        <div class="col-xl-2">
                            <div class="single-brand" style="margin-top: 30px;">
                                 <img src="img/brand/unicef.png" alt="img">
                            </div>
                        </div>
                       <div class="col-xl-2">
                            <div class="single-brand">
                                     <img src="img/brand/miasa.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand" style="margin-top: 15px;">
                                  <img src="img/brand/stc.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                  <img src="img/brand/maw.png" alt="img">
                            </div>
                        </div>
                         <div class="col-xl-2">
                            <div class="single-brand">
                                 <img src="img/brand/cdf.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                 <img src="img/brand/miasa.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand" style="margin-top: 15px;">
                                  <img src="img/brand/stc.png" alt="img">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->
                <!-- services-area -->
            <section id="services" class="services-area services-bg pt-120 pb-90 p-relative">
                <div class="animations-01"><img src="img/bg/an-img-01.png" alt="an-img-01"></div>
                <div class="animations-02"><img src="img/bg/an-img-02.png" alt="contact-bg-an-01"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        
                        <div class="col-xl-7 col-lg-10">
                            <div class="section-title text-center mb-35">
                                <h5>Our</h5>
                                <h2>Features</h2>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-30">
                            <div class="s-single-services  text-center">
                                <img src="img/bg/sr-img01.png" alt="feature">
                                <div class="services-hover">
                                    <div class="services-icon">
                                       <img src="img/icon/f-icon1.png"/>
                                    </div>
                                    <div class="second-services-content">
                                        <h5>Volunteering</h5>
                                        <p><br>The volunteering section inspire users to take action, raise awareness, and contribute to creating a positive and inclusive environment in communities.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-6 mb-30">
                            <div class="s-single-services text-center">
                                <img src="img/bg/sr-img02.png" alt="feature">
                                <div class="services-hover">
                                    <div class="services-icon">
                                       <img src="img/icon/f-icon2.png"/>
                                    </div>
                                    <div class="second-services-content">
                                        <h5>Community Forum</h5>
                                        <p> <br> The community forum section aims to provide a platform for open discussions, and allowing users to share their stories in a supportive and safe environment.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    

                         <div class="col-lg-4 col-md-6 mb-30">
                            <div class="s-single-services text-center">
                                <img src="img/bg/sr-img03.png" alt="feature">
                                <div class="services-hover">
                                    <div class="services-icon" >
                                       <img src="img/icon/f-icon3.png"/>
                                    </div>
                                    <div class="second-services-content">
                                    <h5>Quiz</h5>
                                        <p>  <br> The quiz section provides an interactive and engaging way for users to test their knowledge of bullying-related topics.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                  
                </div>
            </section>
            <!-- services-area-end -->
            <!-- about-area -->
            <section class="about-area about-p pt-120 pb-195 p-relative" style="background: #f7f9ff;">
                <div class="animations-03"><img src="img/bg/an-img-03.png" alt="an-img-01"></div>
                <div class="animations-04"><img src="img/bg/an-img-04.png" alt="contact-bg-an-01"></div>
                <div class="animations-05"><img src="img/bg/an-img-05.png" alt="contact-bg-an-01"></div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                         <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="s-about-img p-relative  wow fadeInLeft  animated"   data-animation="fadeInLeft" data-delay=".4s">
                                <img src="img/features/about3.png" alt="img" width="3000" height="600">    
                            </div>
                          
                        </div>
                        
					<div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="about-content s-about-content  wow fadeInRight  animated pl-30" data-animation="fadeInRight" data-delay=".4s">
                                <div class="about-title second-title pb-25">  
                                    <h5>Get to know more</h5>
                                    <h2>What is Bullying?</h2>                                   
                                </div>
                                   <p>Bullying is when someone is hurt by unwanted words or actions, usually more than once and has a hard time stopping what is happening to them.</p>
                                  <!-- <p>Vivamus convallis sed felis sed tincidunt. Sed nec arcu vel lectus molestie efficitur. Praesent viverra ipsum sagittis tellus facilisis malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p> -->
                                  <div class="slider-btn mt-15">                                          
                                        <a href="https://www.pacerkidsagainstbullying.org/what-is-bullying/" class="btn">Explore More</a>					
                                    </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </section>
            <!-- about-area-end -->
        
            <!-- steps-area -->
            <section class="steps-area fix p-relative"  style="background-color: #fe4b7b;">
                <div class="animations-10"><img src="img/bg/an-img-10.png" alt="an-img-01"></div>
                <div class="animations-11"><img src="img/bg/an-img-11.png" alt="an-img-01"></div>
                <div class="container">
                
                
          
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">

                       
                            <div class="section-title mb-35"> 
                                <br>
                                <!-- <h5 style="color: rgb(0, 0, 0);">How Does it Work</h5>                      -->
                                <h2 style="color: rgb(0, 0, 0);">Sign that you are being bullied</h2>
                            </div>
                            <ul>

                            <?php 
                            $sql = "SELECT * FROM signmain";
                            $result = mysqli_query($mysqli, $sql);
                            $i = 0;

                            if ($result) {
                                // Opening <ul> tag placed outside the while loop
                        ?>
                                <ul>
                        <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $i++;
                        ?>
                                    <li>
                                        <div class="step-box">
                                            <div class="dnumber">
                                                <div class="date-box"><?php echo $i; ?></div>
                                            </div>
                                            <div class="text">
                                                <h3 class="content-title"><?php echo $row['topic']; ?></h3>
                                                <p style="color: black;"><?php echo $row['content']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                        <?php
                                }
                                // Closing </ul> tag placed outside the while loop
                        ?>
                                </ul>
                        <?php
                            }
                            // Handle any errors that occurred during the query execution
                            else {
                                echo "Error: " . mysqli_error($mysqli);
                            }

                            // Free the result set
                            mysqli_free_result($result);

                            // Close the database connection
                            mysqli_close($mysqli);
                        ?>

                        <br>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="step-img">
                                <img src="img/bg/bully_sign.png" alt="class image" style="width: 63%; height: 100vh;">
                            </div>
                           
                        </div>

						
                    </div>
                    
                </div>
            </section>
            <!-- steps-area-end -->
			
        </main>
        <!-- main-area-end -->
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
                                <a ><i class="fab fa-facebook-f"></i></a>
                                <a ><i class="fab fa-twitter"></i></a>
                                <a ><i class="fab fa-instagram"></i></a>
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
                                        <a href="mailto:reach-us@osp.fsktm">reach-us@osp.fsktm</a>
                                   <br>
                                        <a href="mailto:bully@awareness.org">bully@awareness.org</a>
                                   </span>
                                </li>
                            </ul>
                                
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