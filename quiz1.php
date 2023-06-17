<?php
session_start(); 
include "connect.php";
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
                                                <ul>
                                                <li><a href="quiz.html">Quizzes</a></li>
                                                <li><a href="class-single.html">History</a></li>
                                                <li><a href="class-single.html">Score</a></li>
                                                <li><a href="class-single.html">Ranking</a></li>
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
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Stories</li>
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
                        <div class="col-lg-10">

                        <?php 
                            $sql = "SELECT questions.qid, answers.qid, questions.qns, answers.ansid FROM `questions` INNER JOIN `answers` ON questions.qid=answers.qid WHERE `eid` = 'bmafq111';";
                            $result = mysqli_query($mysqli,$sql);
                            $i = 0;
                            while($row = mysqli_fetch_assoc($result)){
                            $i++;
                    ?>
                                <section id="posts-container">
                                <div class="bsingle__content quote-post" style="background-image:url(img/bg/quote_bg.png)">
                                            <div class="meta-info">
                                                <ul>
                                                <p class="post-story"><?php echo $row['qns']; ?></p>
                                                    <li style="display: none;"><input type="hidden" class="post-id" value="<?php echo $qns; ?>"></li>
                                                     <!-- You will get the answer from row[ansid] -->
                                                    <?php 
                                                        $sql = "SELECT * FROM `options` WHERE `qid` = '$row[qid]';";
                                                        $result2 = mysqli_query($mysqli,$sql);
                                                        $j = 0;
                                                        while($row2 = mysqli_fetch_assoc($result2)){
                                                        $j++;
                                                     ?>
                                                        <div>
                                                            <input type="radio" id=<?php echo $row2['optionid']; ?> name=<?php echo $row['qid']; ?> value=<?php echo $row2['optionid']; ?>>
                                                            <label for=<?php echo $row2['optionid']; ?>><?php echo $row2['option']; ?></label>
                                                        </div>
                                                     <?php }
                                                     
                                                     ?>
                                                    <!-- <li><i class="fa fa-trash" aria-hidden="true"></i><a href="#" class='delete-post'>Delete</a></li> -->

                                                </ul>
                                            </div>
                                </div>
                                </section>
                                <?php
                                    }
                                ?>

                                <!-- submit button -->

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 text-right mt-30 mb-30 text-right text-xl-right">
                        <ul class="horizontal-buttons">
                            <li>
                                <div class="header-btn second-header-btn">
                                    <class="btn">Submit

                                <?php
                                // Check if the optionid is equal to the answerid
                                if ($row2['optionid'] == $row['ansid']) {
                                // Award a mark or perform any desired action
                                $mark = 1;
                                } else {
                                $mark = 0;
                                }
                                ?>
                                
                                    <?php if(isset($_SESSION['logged_in'])) { ?>
                                        <a href="logout.php" class="btn">Submit</a>
                                    <?php } else { ?>
                                        <a href="login.php" class="btn">Sign In</a>
                                    <?php } ?>
                                    
                                </div>
                            </li>
                        </ul>
                            </div>
                        </div>
                    </div>
                </div>
             </section>