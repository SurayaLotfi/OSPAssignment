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
    .table-container {
  overflow-x: auto;
}

@media (max-width: 768px) {
  .table-container {
    width: 100%;
  }
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
                <form action="deleteHistoryQuiz.php" method="post" enctype="multipart/form-data" >
                    <input type = "hidden" name="history_id" id="history_id">
                    <input type = "text" name="username_id" id="username_id">
                    <!-- <input type = "hidden" name="delete_id" id="delete_id"> -->
                    <div style="margin: 50px">
                        <h3>Are you sure you want to delete history of this quiz?</h3>
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
      
            <!--If deleted quiz history-->
           <?php 
                        if(isset($_GET['status'])){
                            $status = $_GET['status'];

                            if($status === 'deletesuccess'){
                                ?>
                                <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Quiz has been deleted!'
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
            <th><h4 style="color:green">No.</h4></th>
            <th><h4 style="color:green">Quiz</h4></th>
            <th><h4 style="color:green">Question Solved</h4></th>
            <th><h4 style="color:green">Right</h4></th>
            <th><h4 style="color:green">Wrong</h4></th>
            <th><h4 style="color:green">Score</h4></th>
            <th><h4 style="color:green">Action</h4></th>';

            $no=0;
            while($row=mysqli_fetch_array($q) )
            {
                $history_id = $row['history_id'];
                $username = $row['username'];
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
            ?>
            <tr>
            <td style="display: none;"><input type="hidden" class="history-id" value="<?php echo $history_id; ?>"></td>
            <td style="display: none;"><input type="hidden" class="username-id" value="<?php echo $username; ?>"></td>
            <td><h5><?php echo $no ?></h5></td>
            <td><h5><?php echo $title ?></h5></td>
            <td><h5><?php echo $qa ?></h5></td>
            <td><h5><?php echo $correct ?></h5></td>
            <td><h5><?php echo $wrong ?></h5></td>
            <td><h5><?php echo $score ?></h5></td>
            <td><i class="fa fa-trash" aria-hidden="true"></i><a href="#" class="deletebtn"> Delete</a></td>
            </tr>
            <?php
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


        <!--Delete-->

    <script>
        $(document).ready(function(){
           $('.deletebtn').on('click', function(){

                $('#deletemodal').modal('show');
                //to display current value 
                $tr = $(this).closest('tr');

                var historyID = $tr.find('.history-id').val();
                var usernameID = $tr.find('.username-id').val();

                console.log(historyID);
                console.log(usernameID);

                $('#history_id').val(historyID);
                $('#username_id').val(usernameID);

           });
        });

    </script>
            </body>
</html>