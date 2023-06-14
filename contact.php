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
                                                <a href="quiz.html">Quiz</a>
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
                                                <a href="logout.php" class="btn">Sign Out</a>
                                            <?php } else { ?>
                                                <a href="login.php" class="btn">Sign In</a>
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
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrp.png)">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>Contact Us</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
		<div class="col-xs-12 col-sm-4 col-md-4">
			<i class="fas fa-code"></i>
			<h3>AZRUL</h3>
			<p>Bachelor in Computer Science (Information System)</p>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<img src="img/team/suraya.jpg" style="max-width: 200px; height: auto;">
			<h3>SURAYA</h3>
			<p>Bachelor in Computer Science (Information System)</p>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<i class="fab fa-css3"></i>
			<h3>FILZAH</h3>
			<p>Bachelor in Computer Science (Information System)</p>
		</div>
        <div class="col-xs-12 col-sm-6 col-md-6">
			<i class="fas fa-bold"></i>
			<h3>VISALINI</h3>
			<p>Bachelor in Computer Science (Information System)</p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<img src="img/team/Faiz.jpg" style="max-width: 200px; height: auto;">
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
                                    <p>380 St Kilda Road, Melbourne <br>
                                    VIC 3004, Australia</p>
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
                                    <p> <a href="#">support@example.com</a><br><a href="#">info@example.com</a></p>
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
                        <div class="col-lg-6 order-1">
                            <img src="img/bg/contact.png" alt="img">							
                        </div>
                        <div class="col-lg-6 order-2">
                            <div class="contact-bg02 wow fadeInLeft  animated">
                            <div class="section-title center-align">
                                <h5>Contact Us</h5>
                                <h2>
                                    Reach Out for Bullying Awareness Assistance
                                </h2>
                            </div>
						<form action="mail.php" method="post" class="contact-form mt-35">
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-name mb-30">                                    
                                        <input type="text" id="firstn" name="firstn" placeholder="Full Name" required>
                                    </div>                               
                                </div>
                                <div class="col-lg-12">                               
                                    <div class="contact-field p-relative c-subject mb-30">                                   
                                        <input type="text" id="email" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>		
                                <div class="col-lg-12">                               
                                    <div class="contact-field p-relative c-subject mb-30">                                   
                                        <input type="text" id="phone" name="phone" placeholder="Phone No." required>
                                    </div>
                                </div>	
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-message mb-30">                                  
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                                    </div>
                                    <div class="slider-btn">                                          
                                        <button class="btn ss-btn active" data-animation="fadeInRight" data-delay=".8s">Submit Now</button>				
                                    </div>                             
                                </div>
                            </div>
                        </form>
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
