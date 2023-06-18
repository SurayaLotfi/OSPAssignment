<?php  session_start(); 

if(empty($_SESSION['username'])){
    header("location: login.php");
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

        <!--Sweet Alert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--Smooth Scroll-->
        <script src="https://cdn.jsdelivr.net/npm/smooth-scroll/dist/smooth-scroll.min.js"></script>
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
        <!--Delete Modal-->
            <!-- Modal for delete -->
                <div class="modal fade custom-modal" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                <form action="delete_post.php" method="post" enctype="multipart/form-data" >
                    <input type = "text" name="post_id" id="post_id">
                    <!-- <input type = "hidden" name="delete_id" id="delete_id"> -->
                    <div style="margin: 50px">
                        <h3>Are you sure you want to delete your post?</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  type="submit" class="btn btn-info"  name="delete">Delete</button>

                    </form>
                </div>
                </div>
            </div>
            </div>
      
        <!-- main-area -->
        <main>
            
            <!-- search-popup -->
		<div class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
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
		</div>
		<!-- /search-popup -->
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrp.png);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>Stories</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="blog.php">Stories</a></li>
                                        <li class="breadcrumb-item" aria-current="page"><a href ="#contact">Share Your Own Story</a></li>
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
             <!-- inner-blog -->
            

            <section class="inner-blog pt-120 pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                        <section id="posts-container">
                        <?php
                            //retrieve data from database
                            include "connect.php";
                            
                            if($_SESSION["logged_in"]){
                                $query = "SELECT * FROM posts WHERE category = 'Physical Bullying'";
                                $result = mysqli_query($mysqli, $query);
                                $total_pb = mysqli_num_rows($result);

                                $query = "SELECT * FROM posts WHERE category = 'Verbal Bullying'";
                                $result = mysqli_query($mysqli, $query);
                                $total_vb = mysqli_num_rows($result);

                                $query = "SELECT * FROM posts WHERE category = 'Cyber Bullying'";
                                $result = mysqli_query($mysqli, $query);
                                $total_cb = mysqli_num_rows($result);

                                $query = "SELECT * FROM posts WHERE category = 'Others'";
                                $result = mysqli_query($mysqli, $query);
                                $total_others = mysqli_num_rows($result);

                                $query = "SELECT * FROM posts";
                                $result = mysqli_query($mysqli, $query);
                                $total_all = mysqli_num_rows($result);

                                // check if a category query parameter is present
                                if (isset($_GET['category'])) {
                                    $category = $_GET['category'];
                                    if($category == "All"){
                                        $sql = "SELECT * FROM posts";
                                    }else{
                                        $sql = "SELECT * FROM posts WHERE category = '$category'";
                                    }
                                } else {
                                    $sql = "SELECT * FROM posts ORDER BY id DESC";
                                }
                                $result = mysqli_query($mysqli,$sql);
                                
                                
                                while($row = mysqli_fetch_assoc($result)){
                                    $post_id = $row['id']; //getting each post id   
                                    $post_username = $row['username']; //getting the current post's username
                                    ?>
                                    <div class="bsingle__post mb-50">
                                        <div class="bsingle__post-thumb">
                                            
                                        </div>
                                        <div class="bsingle__content quote-post" style="background-image:url(img/bg/quote_bg.png)">
                                            <div class="meta-info">
                                                <ul>
                                                    <li style="display: none;"><input type="hidden" class="post-id" value="<?php echo $post_id; ?>"></li>
                                                    <li><i class="far fa-user"></i>By <?php echo $row['username']?></li>
                                                    <li><i class="far fa-comments"></i><?php echo $row['comments']?> Comments</li>
                                                    <!-- <li><a href="like.php"><i class="fas fa-thumbs-up"></i><?php echo $row['likes']?> Likes</a></li> -->
                                                    <li><i class="fa fa-eye"></i><?php echo $row['views']?> Views</li>
                                                    <?php if($post_username == $_SESSION['username']){ ?>
                                                    <li><i class="fas fa-edit"></i><a href="edit_post.php?post_id=<?php echo $post_id; ?>">Edit</a></li>
                                                    <li><i class="fa fa-trash" aria-hidden="true"></i><a href="#" class='delete-post'>Delete</a></li>
                                                    <?php 
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <!-- <div class="editable-content"> -->
                                                <h2 class="post-title"><?php echo $row['title']; ?></h2>
                                                <p class="post-story"><?php echo $row['story']; ?></p>
                                            <!-- </div> -->
                                            <div class="blog__btn">
                                            <a href="storydetail.php?post_id=<?php echo $post_id?>" class="btn">Read More</a>
                                            <div class="meta-info" style="text-align: end; margin-bottom: -30px; margin-top: -30px;">
                                                
                                                
                                                    <ul>
                                                        <li><i class="fa fa-list-alt"></i><?php echo $row['date']?></li>
                                                        <li><i class="fa fa-list-alt"></i><?php echo $row['category']?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <?php
                                }
                            }
                        ?>


                        </section>
                        </div>
                         <div class="col-sm-12 col-md-12 col-lg-4">
                           <aside class="sidebar-widget">
                              <!-- <section id="search-3" class="widget widget_search">
                                 <h2 class="widget-title">Search</h2>
                                 <form role="search" method="get" class="search-form" action="http://wordpress.zcube.in/finco/">
                                    <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                                    </label>
                                    <input type="submit" class="search-submit" value="Search" />
                                 </form>
                              </section> -->
                              <section id="categories-1" class="widget widget_categories">
                                <h2 class="widget-title">Filter By</h2>
                                <ul>
                                    <li class="cat-item cat-item-22"><a href="fetch_posts.php?category=MostRecent">Most Recent</a></li>
                                    <li class="cat-item cat-item-16"><a href="fetch_posts.php?category=MostPopular">Most Popular</a></li>
                                    <li class="cat-item cat-item-22"><a href="fetch_posts.php?category=MyPosts">My Posts</a></li>
                                </ul>
                                </section>
                              <section id="categories-1" class="widget widget_categories">
                                <h2 class="widget-title">Categories</h2>
                                <ul>
                                    <li class="cat-item cat-item-22"><a href="fetch_posts.php?category=All">All</a> (<?php echo $total_all?>)</li>
                                    <li class="cat-item cat-item-16"><a href="fetch_posts.php?category=PhysicalBully">Physical Bullying</a> (<?php echo $total_pb?>)</li>
                                    <li class="cat-item cat-item-23"><a href="fetch_posts.php?category=CyberBullying">Cyber Bullying</a> (<?php echo $total_cb?>)</li>
                                    <li class="cat-item cat-item-18"><a href="fetch_posts.php?category=VerbalBullying">Verbal Bullying</a> (<?php echo $total_vb?>)</li>
                                    <li class="cat-item cat-item-22"><a href="fetch_posts.php?category=Others">Others</a> (<?php echo $total_others?>)</li>
                                </ul>
                                </section>
                              <!-- <section id="custom_html-5" class="widget_text widget widget_custom_html">
                                 <h2 class="widget-title">Follow Us</h2>
                                 <div class="textwidget custom-html-widget">
                                    <div class="widget-social">
                                       <a href="#"><i class="fab fa-twitter"></i></a>
                                       <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                       <a href="#"><i class="fab fa-facebook-f"></i></a>
                                       <a href="#"><i class="fab fa-instagram"></i></a>
                                       <a href="#"><i class="fab fa-wordpress"></i></a>
                                    </div>
                                 </div>
                              </section> -->

                              <section id="recent-posts-4" class="widget widget_recent_entries">
                                 <h2 class="widget-title">Recent Posts</h2>
                                 <ul>
                                 <?php
                                    $query = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
                                    $result = mysqli_query($mysqli,$query);
                                   
                                    while( $row = mysqli_fetch_assoc($result)){
                                        $title = $row['title'];
                                        $dateString = $row['date'];
                                        $timestamp = strtotime($dateString);
                                        $formattedDate = date('F d, Y', $timestamp);

                                        ?>
                                            <li>
                                            <a href="#"><?php echo $title?></a>
                                            <span class="post-date"><?php echo $formattedDate?></span>
                                            </li>

                                        <?php
                                    }
                                 ?>
                                 </ul>
                              </section>
                              <!-- <section id="tag_cloud-1" class="widget widget_tag_cloud">
                                 <h2 class="widget-title">Tag</h2>
                                 <div class="tagcloud">
                                     <a href="#" class="tag-cloud-link tag-link-28 tag-link-position-1" style="font-size: 8pt;" aria-label="app (1 item)">app</a>
                                    <a href="#" class="tag-cloud-link tag-link-17 tag-link-position-2" style="font-size: 8pt;" aria-label="Branding (1 item)">Branding</a>
                                    <a href="#" class="tag-cloud-link tag-link-20 tag-link-position-3" style="font-size: 8pt;" aria-label="corporat (1 item)">corporat</a>
                                    <a href="#" class="tag-cloud-link tag-link-24 tag-link-position-4" style="font-size: 16.4pt;" aria-label="Design (2 items)">Design</a>
                                    <a href="#" class="tag-cloud-link tag-link-25 tag-link-position-5" style="font-size: 22pt;" aria-label="gallery (3 items)">gallery</a>
                                    <a href="#" class="tag-cloud-link tag-link-26 tag-link-position-6" style="font-size: 8pt;" aria-label="video (1 item)">video</a>
                                    <a href="#" class="tag-cloud-link tag-link-29 tag-link-position-7" style="font-size: 16.4pt;" aria-label="web design (2 items)">web design</a>
                                 </div>
                              </section> -->
                           </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- inner-blog-end -->
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
                              <h5>We are here to lend you a helping ear</h5>
                               <h2>
                                 Share Your Own Story
                               </h2>
                              
                           </div>
                            
                       <form action="submitstory.php" method="post" class="contact-form mt-35">
                           <div class="row">
                           <div class="col-lg-12">
                               <div class="contact-field p-relative c-name mb-30">                                    
                                   <input type="text" id="title" name="title" placeholder="Title" required>
                               </div>                               
                           </div>
                           <div class="col-lg-12">                               
                               <div class="contact-field p-relative c-subject mb-30">                                   
                                    <div class="form-group">
                                        <label for="department-select"><h6>Select Category</h6></label>
                                        <select class="form-control" id="category-select" name="category">
                                            <option value="Verbal Bullying">Verbal Bullying</option>
                                            <option value="Physical Bullying">Physical Bullying</option>
                                            <option value="Cyber Bullying">Cyber Bullying</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                               </div>
                           </div>		
                           <div class="col-lg-12">
                               <div class="contact-field p-relative c-message mb-30">                                  
                                   <textarea name="story" id="story" cols="30" rows="10" placeholder="Share Your Story"></textarea>
                               </div>
                               <div class="slider-btn">                                          
                                           <button type="submit" name="submit" class="btn ss-btn active" data-animation="fadeInRight" data-delay=".8s">Submit Now</button>				
                                </div>                             
                           </div>
                           </div>
                       
                   </form>
                   <!--If success post-->
                   <?php 
                        if(isset($_GET['status'])){
                            $status = $_GET['status'];

                            if($status === 'success'){
                                ?>
                                <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Post has been posted!'
                                })
                                </script>      
                        <?php
                            }elseif($status === 'deletesuccess'){
                                ?>
                                <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Post has been Deleted.'
                                })
                                </script>      
                        <?php
                            }elseif($status === 'editsuccess'){
                                ?>
                                <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Your post has been edited.'
                                })
                                </script>      
                        <?php
                            }else{
                                ?>
                                <script>
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!'
                                    })
                                </script>
                                
                        <?php
                        

                            }
                        }?>
                           
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
                                   <img src="img/logo/f_logo.png" alt="img">
                                </div>
                                <div class="footer-text mb-20">
                                    <p>In interdum, mauris in sollicitudin consectetur, elit odio tempus mauris, eget convallis metus arcu nec diam. Vestibulum sagittis at lectus et.</p>
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
                                        <li><a href="about.html"> About Us</a></li>
                                        <li><a href="classes.html">  Classes</a></li>
                                        <li><a href="contact.html"> Contact Us</a></li>
                                        <li><a href="blog.html">Blog </a></li>
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
                                        <span>1247/Plot No. 39, 15th Phase, <br>Colony, Hyderabad</span>
                                    </li>
                                    <li>
                                        <i class="icon fal fa-phone"></i>
                                        <span>1800-121-3637<br>+91-7052-101-786</span>
                                    </li>
                                   <li><i class="icon fal fa-envelope"></i>
                                        <span>
                                            <a href="mailto:info@example.com">info@example.com</a>
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
                              Copyright © 2022 Kidso All rights reserved.  
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--Sweet Alert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!--Dynamic Page-->
        <script>
            $(document).ready(function() {
                $('.cat-item a').click(function(e) {
                e.preventDefault();
                var category = $(this).text().trim();

                $.ajax({
                    url: 'fetch_posts.php',
                    method: 'GET',
                    data: { category: category },
                    success: function(response) {
                    // Update the content in the #posts-container div
                    $('#posts-container').html(response);
                    },
                    error: function(xhr, status, error) {
                    console.log(error);
                    }
                });
                });
            });
            </script>

        <!--Delete-->
        <script>
            $(document).ready(function() {
                var scrollPosition; // Variable to store the scroll position

                $('.delete-post').on('click', function() {
                    // Store the current scroll position
                    scrollPosition = $(window).scrollTop();

                    // Show the modal
                    $('#deletemodal').modal('show');

                    // Retrieve the post ID
                    var postId = $(this).closest('.bsingle__post').find('.post-id').val();
                    $('#post_id').val(postId);
                });

                $('#deletemodal').on('hidden.bs.modal', function() {
                    // Restore the scroll position after the modal is closed
                    $(window).scrollTop(scrollPosition);
                });
                });
        </script>

                    <!---------Smooth Scroll-------->
            <script src="smooth-scroll.js"></script>
            <script>
                var scroll = new SmoothScroll('a[href*="#"]');
            </script>
    </body>
</html>