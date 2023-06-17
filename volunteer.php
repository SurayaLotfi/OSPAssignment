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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Londrina Solid">

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
                                                <a href="logout.php?source=volunteer" class="btn">Sign Out</a>
                                            <?php } else { ?>
                                                <a href="login.php?source=volunteer" class="btn">Sign In</a>
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
                                    <h2>Activity</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Activity</li>
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
            
            <!-- content area -->
            <style>
                .class-item {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    /* width: 300px; customize the width */
                    height: min-content; /*customize the height */
                    background-color: #ffffff; /* customize the background color */
                    border: 1px solid #ccc; /* customize the border */
                    padding-bottom: 30px;
                    padding-left: 30px;
                    padding-right: 30px;
                }
            
                .class-item .class-img {
                    flex: 0 0 auto;
                    margin-right: 10px;
                }
            
                .class-item .class-content {
                    background-color: #ffffff;
                    padding: 10px; /* customize the padding */
                    border: 1px solid #ccc; /* customize the border */
                    border-radius: 5px; /* customize the border radius */
                    flex: min;
                    margin-top: 20px;
                    margin-right: auto;
                    margin-left: auto;
                }
            
                .class-item .title {
                    font-family: 'Londrina Solid';
                    margin-bottom: 10px;
                }
            
                .class-item .class-more {
                    background: #fe4b7b;
                    font-size: 20px;
                    color: #fff;
                    padding: 7px 10px;
                    border-radius: 30px;
                    width: 98px;
                    height: 34px;
                    text-align: center;
                    font-weight: 700;
                    font-family: 'Londrina Solid';
                    margin-top: 5px;
                }

                /* For Extra Large and Large screens */
                @media (min-width: 1200px) {
                    .class-item {
                        flex-direction: row;
                    }
                }

                /* For Medium, Small, and Extra Small screens */
                @media (max-width: 1199px) {
                    .class-item {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        /* width: 300px; customize the width */
                        height: min-content; /*customize the height */
                        background-color: #ffffff; /* customize the background color */
                        border: 1px solid #ccc; /* customize the border */
                        padding-bottom: 30px;
                        padding-left: 30px;
                        padding-right: 30px;
                    }
                }
            </style>
            
            <section class="class-area pt-120 pb-120 p-relative">
                <div class="animations-06"><img src="img/bg/an-img-06.png" alt="an-img-01"></div>
                <div class="animations-07"><img src="img/bg/an-img-07.png" alt="contact-bg-an-01"></div>
                <div class="animations-08"><img src="img/bg/an-img-08.png" alt="contact-bg-an-01"></div>
                <div class="animations-09"><img src="img/bg/an-img-09.png" alt="contact-bg-an-01"></div>
                <div class="container">
                <div class="row justify-content-center">
                    <?php
                    // Fetch data from the 'activity' table
                    $query = "SELECT * FROM activity";
                    $result = $mysqli->query($query);

                    // Check if the query was successful
                    if ($result === false) {
                        echo "Error executing the query: " . $mysqli->error;
                        // Handle the query error appropriately for your application
                        exit();
                    }

                    // Iterate through each activity and generate the HTML dynamically
                    while ($activity = $result->fetch_assoc()) {
                        $activity_id = $activity['id'];
                        $title = $activity['title'];
                        $description = $activity['description'];
                        $location = $activity['location'];
                        $startDate = $activity['start_date'];
                        $endDate = $activity['end_date'];
                        $image = $activity['Img'];

                        echo '<div class="col-xl-12 col-lg-12 col-md-12">';
                        echo '<div class="class-item mb-30">';
                        echo '<div class="class-img">';
                        echo '<div class="class-img-outer">';
                        echo '<img src="' . $image . '" alt="class image">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="class-content">';
                        echo '<h4 class="title">' . $title . '</h4>';
                        echo '<p>' . $description . '</p>';
                        echo '<ul class="schedule">';
                        echo '<li>';
                        echo '<span>Location:</span>';
                        echo '<span class="class-size">' . $location . '</span>';
                        echo '</li>';
                        echo '<li>';
                        echo '<span>Date:</span>';
                        echo '<span class="class-size class-size-2">' . date('d M Y', strtotime($startDate)) . ' - ' . date('d M Y', strtotime($endDate)) . '</span>';
                        echo '</li>';
                        // Check if the user is logged in
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                            $username = $_SESSION['username'];

                            // Retrieve user ID based on the username
                            $query1 = "SELECT user_id FROM users WHERE username = '$username'";
                            $result1 = mysqli_query($mysqli, $query1);

                            $row1 = mysqli_fetch_assoc($result1);
                            $user_id = $row1['user_id'];

                            // Retrieve activity ID(s) associated with the user
                            $query2 = "SELECT activity_id FROM user_activity WHERE user_id = '$user_id'";
                            $result2 = mysqli_query($mysqli, $query2);

                            $activity_ids = [];
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $activity_ids[] = $row2['activity_id'];
                            }

                            // Check if the desired activity ID exists in the user's activity IDs
                            if (in_array($activity_id, $activity_ids)) {
                                echo '<li>';
                                echo '<span class="class-more"><a href="volunteer_details.php?id=' . $activity_id . '&joined=true">Joined</a></span>';
                                echo '</li>';
                            } else {
                                // activity not joined yet
                                echo '<li>';
                                echo '<span class="class-more"><a href="volunteer_details.php?id=' . $activity_id . '&joined=false">Join</a></span>';
                                echo '</li>';
                            }
                        }
                        else{
                            // user not signed in
                            echo '<li>';
                            echo '<span class="class-more"><a href="volunteer_details.php?id=' . $activity_id . '&joined=NULL">Join</a></span>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            </section>

            
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
