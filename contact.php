<?php
session_start();
include "connect.php";
$setEmail = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $setEmail = 1;
    // Get the form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
            
    // Insert the contact record
    $insertContactQuery = "INSERT INTO contact (fullname, email, phone, message) VALUES ('$fullname', '$email', '$phone', '$message')";
    $insertContactResult = mysqli_query($mysqli, $insertContactQuery);

    if ($insertContactResult) {
        header("Location: contact.php?#success-sending-email");
        exit();
    } else {
        // Handle the insert error appropriately for your application
        echo "Error inserting contact record: " . mysqli_error($mysqli);
    }
}
            
?>

<!doctype html>
<html class="no-js" lang="zxx">
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
                                                <a href="logout.php?source=contact" class="btn">Sign Out</a>
                                            <?php } else { ?>
                                                <a href="login.php?source=contact" class="btn">Sign In</a>
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
                                    <h2>Contact Us</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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

            <!-- OUR TEAM DISPLAY -->
            <div class="container-fluid pt-120 pb-90">
                <div class="row">   
                    <div class="col-lg-12 p-relative">
                        <div class="section-title center-align mb-50 text-center">
                            <h5>Our Team</h5>
                            <h2>
                            Our Expert Team
                            </h2>
                        </div>
                    </div>     
                </div>
                <div class="row text-center pl-100 pr-100">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                    <img src="img/team/Visa.png" style="max-width: 200px; height: auto;">
                        <h3>VISALINI</h3>
                        <p>Bachelor in Computer Science (Information System)</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <img src="img/team/Suraya.png" style="max-width: 200px; height: auto;">
                        <h3>SURAYA</h3>
                        <p>Bachelor in Computer Science (Information System)</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                    <img src="img/team/Filzah.png" style="max-width: 200px; height: auto;">
                        <h3>FILZAH</h3>
                        <p>Bachelor in Computer Science (Information System)</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <img src="img/team/Azrul.png" style="max-width: 200px; height: auto;">
                        <h3>AZRUL</h3>
                        <p>Bachelor in Computer Science (Information System)</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <img src="img/team/Faiz.png" style="max-width: 200px; height: auto;">
                        <h3>FAIZ</h3>
                        <p>Bachelor in Computer Science (Information System)</p>
                    </div>
                </div>
                <hr class="my-4">
            </div>
            <!-- contact-area -->
            <section id="contact" class="contact-area after-none contact-bg pt-90 pb-30" style="background: #12275e;" >
                <div class="container">            
					<div class="row">
						<div class="col-lg-12">
                            <div class="contact-info">
                                <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                    <div class="f-cta-icon">
                                        <i class="far fa-map"></i>
                                    </div>
                                    <h5>Office Address</h5>
                                    <p>Faculty of Computer Science and Information Technology UM <br>
                                    50603 Kuala Lumpur</p>
                                </div>
							    <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                    <div class="f-cta-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <h5>Working Hours</h5>
                                    <p>Monday to Friday 09:00 to 18:30 <br> 
                                        Saturday 15:30</p>
                                </div>
                                <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                    <div class="f-cta-icon">
                                        <i class="far fa-envelope-open"></i>
                                    </div>
                                    <h5>Message Us</h5>
                                    <p> <a href="#">reportbullying@awareness.org</a><br><a href="#">helpstopbullying@awareness.org</a></p>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </section>
            <!-- contact-area-end -->
            <!-- map-area-->
            <div class="map fix" style="background: #f5f5f5;">
                <div class="container-flud">
                    <div class="row">
                        <div class="col-lg-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.9682916489293!2d101.65005106960155!3d3.128214738909601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49720ec81b9b%3A0x58d63e7d8749e9d8!2sFaculty%20of%20Computer%20Science%20and%20Information%20Technology!5e0!3m2!1sen!2smy!4v1685290554453!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
		    <!-- map-area-end -->
            <!-- contact-area -->
            <section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix"  style="background: #f8f9fe;">
                <div class="animations-12"><img src="img/bg/slider_shape03.png" alt="an-img-01"></div>
                <div class="animations-13"><img src="img/bg/an-img-12.png" alt="contact-bg-an-01"></div>
                <div class="animations-14"><img src="img/bg/slider_shape02.png" alt="contact-bg-an-01"></div>
                <div class="animations-15"><img src="img/bg/an-img-13.png" alt="contact-bg-an-01"></div>
                <div class="container">
					<div class="row">
                        <div class="col order-2">
                            <div class="contact-bg02 wow fadeInLeft  animated">
                            <div class="section-title center-align">
                                <h5>Contact Us</h5>
                                <h2>
                                    Send Us Your Feedback
                                </h2>
                            </div>
                            <form action="" method="post" class="contact-form mt-35" onsubmit="return validateForm()">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-name mb-30">
                                            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                                            <span class="error" id="fullname-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-subject mb-30">
                                            <input type="email" id="email" name="email" placeholder="Email Address" required>
                                            <span class="error" id="email-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-subject mb-30">
                                            <input type="tel" id="phone" name="phone" placeholder="Phone No." required>
                                            <span class="error" id="phone-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-message mb-30">
                                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Write to us" required></textarea>
                                            <span class="error" id="message-error"></span>
                                        </div>
                                        <div class="slider-btn">
                                            <button type="submit" class="btn ss-btn active" data-animation="fadeInRight" data-delay=".8s" name="submit">Submit Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <script>
                                function validateForm() {
                                    // Reset error messages
                                    document.getElementById('fullname-error').textContent = '';
                                    document.getElementById('email-error').textContent = '';
                                    document.getElementById('phone-error').textContent = '';
                                    document.getElementById('message-error').textContent = '';

                                    // Get form field values
                                    var fullname = document.getElementById('fullname').value.trim();
                                    var email = document.getElementById('email').value.trim();
                                    var phone = document.getElementById('phone').value.trim();
                                    var message = document.getElementById('message').value.trim();

                                    // Validate fullname (required)
                                    if (fullname === '') {
                                        document.getElementById('fullname-error').textContent = 'Full Name is required';
                                        return false;
                                    }

                                    // Validate email (required and format)
                                    if (email === '') {
                                        document.getElementById('email-error').textContent = 'Email Address is required';
                                        return false;
                                    } else if (!validateEmail(email)) {
                                        document.getElementById('email-error').textContent = 'Invalid Email Address';
                                        return false;
                                    }

                                    // Validate phone (required and format)
                                    if (phone === '') {
                                        document.getElementById('phone-error').textContent = 'Phone No. is required';
                                        return false;
                                    } else if (!validatePhone(phone)) {
                                        document.getElementById('phone-error').textContent = 'Invalid Phone No.';
                                        return false;
                                    }

                                    // Validate message (required)
                                    if (message === '') {
                                        document.getElementById('message-error').textContent = 'Message is required';
                                        return false;
                                    }

                                    // All fields are valid, allow form submission
                                    return true;
                                }

                                function validateEmail(email) {
                                    var emailRegex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
                                    return emailRegex.test(email);
                                }

                                function validatePhone(phone) {
                                    var phoneRegex = /^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$/;
                                    return phoneRegex.test(phone);
                                }
                            </script>
                            </div>
						</div>
					</div>
                </div>
            </section>
            <!-- contact-area-end -->
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

        <div class="overlay" id="success-sending-email">
            <div class="wrapper">
                <div class="content">
                    <div class="form-container">
                        <h2>The details have been successfully sent</h2>
                        <button class="btn btn-primary" onclick="closePopup()">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function closePopup() {
                // Redirect back to the contact.php page
                window.location.href = "contact.php";
            }
        </script>

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

        <style>
        .error {
        color: red;
        }
        .newbutton {
            font-size: 1em;
            padding: 15px 35px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
            background: #403e3d;
            border-radius: 50px;
        }
        
        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.8);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
            z-index: 9999;
        }
        .overlay:target {
            visibility: visible;
            opacity: 1;
        }
        .wrapper {
            margin: 70px auto;
            padding: 20px;
            background: #e7e7e7;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
        }
        .wrapper h2 {
            margin-top: 0;
            color: #333;
        }
        .wrapper .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }
        .wrapper .close:hover {
            color: #06D85F;
        }
        .wrapper .content {
            max-height: 30%;
            overflow: auto;
        }
        /*form*/

        .form-container {
            border-radius: 5px;
            background-color: #e7e7e7;
            padding: 20px 0;
        }
        form label {
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 3px;
        }
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #413b3b;
            color: #fff;
            padding: 15px 50px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

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
    </body>
</html>
