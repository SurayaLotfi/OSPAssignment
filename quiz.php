<?php
session_start();
include "connect.php";
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];

}else{
    $username = 'Not_login_yet';
}
?>

<style>
    .welcome-message {
                position: absolute;
                bottom: -60px; /* Adjust the value to position the text lower */
                left: 0;
                right: 0;
                color: #ffffff;
                text-align: right;
                font-size: 16px;
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
                                                <a href="logout.php?source=quiz" class="btn">Sign Out</a>
                                            <?php } else { ?>
                                                <a href="login.php?source=quiz" class="btn">Sign In</a>
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
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Quiz</li>
                                        <li class="breadcrumb-item"><a href="historyQuiz.php">History</a></li>
                                        <li class="breadcrumb-item"><a href="rankingQuiz.php">Ranking</a></li>
                                    </ol>
                                </nav>
                            </div>
                                </div>
                                <div class="welcome-message">
                                    <?php
                                    // Check if the user is logged in
                                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                                        $username = $_SESSION['username'];
                                        echo 'You\'re logged in as <u>' . $username . '</u>';
                                    }
                                    ?>
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
                        $title = $row['title'];
                        $total = $row['total'];
                        $correct = $row['correct'];
                        $time = $row['time'];
                        $eid = $row['eid'];
                        $answered = mysqli_query($mysqli, "SELECT score FROM history WHERE eid='$eid' AND username = '$username'")  or die('Error98');
                        $rowcount = mysqli_num_rows($answered);

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
                                <p><?php echo $row['description']?></p>
                                    <ul class="schedule">
                                        <li>
                                            <span>Total Questions:</span>
                                            <span class="class-size"><?php echo $total ?> Questions</span>
                                        </li>
                                        <?php if($rowcount == 0){?>
                                        <li>
                                            <?php if(!empty($_SESSION['username'])){?>
                                            <div class="header-btn second-header-btn">
                                            <a href="quiz_detail.php?q=quiz&step=2&eid=<?php echo $eid ?>&n=1&t=<?php echo $total ?>" class="btn">Start</a>
                                            </div>
                                            <?php }else{
                                                ?>
                                                <div class="header-btn second-header-btn">
                                                <a href="login.php?source=quiz" class="btn">Start</a>
                                                </div><?php 
                                                
                                                } ?>
                                            
                                        </li>
                                        <?php } 
                                        else {?>
                                        <li>
                                            <div class="header-btn second-header-btn">
                                            <a href="quizUpdate.php?q=quizre&step=25&eid=<?php echo $eid ?>&n=1&t=<?php echo $total ?>" class="btn">Restart</a>
                                        </li>
                                        <?php }?>
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