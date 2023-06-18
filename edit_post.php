<?php  session_start(); 
include "connect.php";
//incrementing view count

    if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $query = "SELECT * FROM posts WHERE id = $post_id";
    $result = mysqli_query($mysqli, $query);
    if($result){
        $row = mysqli_fetch_assoc($result);
        //retrieve all data
        $title = $row['title'];
        $story = $row['story'];
        $category = $row['category'];
    }else{
        echo '
        <script type = "text/javascript">
          alert("Unsuccessful");
          window.location = "create.php";
        </script>';
    }

    //edit
    if(isset($_POST['edit'])){

        $new_title = mysqli_real_escape_string($mysqli, $_POST['title']);
        $new_story = mysqli_real_escape_string($mysqli, $_POST['story']);
        $new_category = mysqli_real_escape_string($mysqli, $_POST['category']);

        //escape string is to escape speacial characters in the user input before storing it into variables
        //which causes errors.
        //it wont delete the special characters, instead it will just fix it into the correct syntax. this is why its important.

        $updateQuery = "UPDATE posts SET title = '$new_title', story = '$new_story', category = '$new_category' WHERE id = $post_id";
        $result = mysqli_query($mysqli, $updateQuery);

        if($result){
            header("Location: edit_post.php?post_id=$post_id&status=editsuccess");
        }else{
            header("Location: edit_post.php?post_id=$post_id&status=error");
        }
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

    <!-- Modal for delete -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
      <form action="comment.php" method="post" enctype="multipart/form-data" >
        <input type = "hidden" name="post_id" id="post_id">
        <input type = "hidden" name="delete_id" id="delete_id">
        <div style="margin: 50px">
            <h3>Are you sure you want to delete your comment?</h3>
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
                                    <h2>Edit Post</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="blog.php">Back to All Stories</a></li>
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
                        <div class="col">
                        <section id="posts-container">
                        <?php
                            //retrieve data from database
                            include "connect.php";
                            
                            if($_SESSION["logged_in"]){  //check whether the user is logged in or not
                                if(isset($_GET['post_id'])){
                                $post_id = $_GET['post_id']; //get post id, so we can only show the post with the chosen id
                                $sql = "SELECT * FROM posts WHERE id = $post_id";
                                $result = mysqli_query($mysqli,$sql);

                                while($row = mysqli_fetch_assoc($result)){
                                    
                                    ?>
                                    <div class="bsingle__post mb-50">
                                        <div class="bsingle__post-thumb">
                                            
                                        </div>
                                        <div class="bsingle__content quote-post" style="background-image:url(img/bg/quote_bg.png)">
                                            <div class="meta-info">
                                                <ul>
                                                    <li><i class="far fa-user"></i>By <?php echo $row['username']?></li>
                                                    <li><i class="far fa-comments"></i><?php echo $row['comments']?> Comments</li>
                                                    <!-- <li><a href="like.php"><i class="fas fa-thumbs-up"></i><?php echo $row['likes']?> Likes</a></li> -->
                                                    <li><i class="fa fa-eye"></i><?php echo $row['views']?> Views</li>
                                                </ul>
                                            </div>

                 <form action="" method="post" class="contact-form mt-35">
                           <div class="row">
                           <div class="col-lg-12">
                               <div class="contact-field p-relative c-name mb-30">                                    
                                   <input type="text" value='<?php echo $title ?>' id="title" name="title" placeholder="Title" required>
                               </div>                               
                           </div>
                           <div class="col-lg-12">                               
                               <div class="contact-field p-relative c-subject mb-30">                                   
                                    <div class="form-group">
                                        <label for="department-select"><h6>Select Category</h6></label>
                                        <select class="form-control" id="category-select" name="category">
                                        <option value="Verbal Bullying" <?php if($category == 'Verbal Bullying') echo 'selected'; ?>>Verbal Bullying</option>
                                        <option value="Physical Bullying" <?php if($category == 'Physical Bullying') echo 'selected'; ?>>Physical Bullying</option>
                                        <option value="Cyber Bullying" <?php if($category == 'Cyber Bullying') echo 'selected'; ?>>Cyber Bullying</option>
                                        <option value="Others" <?php if($category == 'Others') echo 'selected'; ?>>Others</option>
                                        </select>
                                    </div>
                               </div>
                           </div>		
                           <div class="col-lg-12">
                               <div class="contact-field p-relative c-message mb-30">                                  
                                   <textarea name="story" id="story" cols="30" rows="10" placeholder="Share Your Story"><?php echo $story ?></textarea>
                               </div>
                               <div class="blog__btn">                                          
                                           <button type="submit" name="edit" class="btn" data-animation="fadeInRight" data-delay=".8s">Edit Now</button>				
                                </div>                             
                           </div>
                           </div>
                       
                   </form>
                                            
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
                        }
                        ?>
                       
                        


                            <!-- <div class="pagination-wrap mb-50">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item"><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                        <li class="page-item active"><a href="#">1</a></li>
                                        <li class="page-item"><a href="#">2</a></li>
                                        <li class="page-item"><a href="#">3</a></li>
                                        <li class="page-item"><a href="#">...</a></li>
                                        <li class="page-item"><a href="#">10</a></li>
                                        <li class="page-item"><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </section>
                        </div> -->
                         <!-- <div class="col-sm-12 col-md-12 col-lg-4">
                           <aside class="sidebar-widget"> -->
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
                              <!-- <section id="categories-1" class="widget widget_categories">
                                <h2 class="widget-title">Filter By</h2>
                                <ul>
                                    <li class="cat-item cat-item-22"><a href="fetch_posts.php?category=MostRecent">Most Recent</a></li>
                                    <li class="cat-item cat-item-16"><a href="fetch_posts.php?category=MostPopular">Most Popular</a></li>
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
                              <section id="custom_html-5" class="widget_text widget widget_custom_html">
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
                              </section>

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
                              </section> -->
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
                           <!-- </aside>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- inner-blog-end -->
            <!-- contact-area
            <section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix"  style="background: #f8f9fe;">
                <div class="animations-12"><img src="img/bg/slider_shape03.png" alt="an-img-01"></div>
               <div class="animations-13"><img src="img/bg/an-img-12.png" alt="contact-bg-an-01"></div>
               <div class="animations-14"><img src="img/bg/slider_shape02.png" alt="contact-bg-an-01"></div>
               <div class="animations-15"><img src="img/bg/an-img-13.png" alt="contact-bg-an-01"></div>
               <div class="container">
            
                   <div class="row">
                       
                        <div class="col-lg-6 order-1">
                           <img src="img/bg/contact-img.png" alt="img">							
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
                       
                   </form> -->
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
                                    text: 'Comment has been posted!'
                                })
                                </script>      
                        <?php
                            }elseif($status === 'deletesuccess'){
                                ?>
                                <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Comment has been Deleted.'
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

            <script>
            
            function showReplyForm(self) {
                var commentId = self.getAttribute("data-id");
                if (document.getElementById("form-" + commentId).style.display == "") {
                    document.getElementById("form-" + commentId).style.display = "none";
                } else {
                    document.getElementById("form-" + commentId).style.display = "";
                }
            }
            
            </script>

            <script>
            
            function showReplyForReplyForm(self) {
                var commentId = self.getAttribute("data-id");
                var name = self.getAttribute("data-name");
            
                if (document.getElementById("form-" + commentId).style.display == "") {
                    document.getElementById("form-" + commentId).style.display = "none";
                } else {
                    document.getElementById("form-" + commentId).style.display = "";
                }
            
                document.querySelector("#form-" + commentId + " textarea[name=comment]").value = "@" + name;
                document.getElementById("form-" + commentId).scrollIntoView();
            }
            
            </script>

            <script>
            $(document).ready(function() {
                $('.delete-link').on('click', function() {
                $('#deletemodal').modal('show');
                    var id = $(this).closest('.bsingle__post').find('.comment-id').val();
                    var postId = $(this).closest('.bsingle__post').find('.post-id').val();

                    console.log("ID:", id);
                    console.log("Post ID:", postId);

                    $('#delete_id').val(id);
                    $('#post_id').val(postId);
                });
            });
            </script>
    </body>
</html>