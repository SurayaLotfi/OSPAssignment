<?php
session_start();
$username = $_SESSION['username'] ?? null;

include "connect.php";

$id = $_GET['id']; //replace with get
//echo 'activity id: '.$id;
$joined = $_GET['joined'] ?? null; //replace with 
//echo 'joined?: '.$joined;

// GET THE ACTIVITY ROW / DATA
$query = 
"SELECT *
FROM activity
where activity.id = $id;
";

// Execute the query
$result = mysqli_query($mysqli, $query);

// Check if the query was successful
if ($result) {
    // Fetch the row data
    $row = mysqli_fetch_assoc($result);

    // Access the column values
    $activityTitle = $row['title'];
    $activityImg = $row['Img'];
    $activityDescription = $row['description'];
    $activityLocation = $row['location'];
    $activityStart = $row['start_date'];
    $activityEnd = $row['end_date'];
} else {
    // Query execution failed
    echo "Error: " . mysqli_error($mysqli);
}
?>

<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Volunteering Details</title>
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

        <style>
        
        /* .button {
            font-size: 1em;
            padding: 15px 35px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
            background: #403e3d;
            border-radius: 50px;
        } */
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
        <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrp.png)">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Volunteering Details</h2>    
                                <div class="breadcrumb-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Volunteering Details</li>
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
        <!-- volunteer-details-content -->
        <section class="b-details-p pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details-wrap">
                            <div class="details__content pb-30">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-11">
                                            <h1><?php echo $activityTitle; ?></h1>
                                        </div>
                                        <div class="col-lg-1">
                                        <?php 
                                        
                                        // Check if the user is logged in
                                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
                                            //logged in and joined
                                            if ($joined == 1) {
                                                echo '<button class="btn" href="#delete">UNJOIN</button>';
                                            }   
                                            //if logged in but not join yet
                                            else{
                                                // Retrieve user notel and fullname
                                                $query1 = "SELECT * FROM users WHERE username = '$username'";
                                                //echo 'username: '.$username;
                                                $result1 = mysqli_query($mysqli, $query1);

                                                $row1 = mysqli_fetch_assoc($result1);
                                                $_SESSION['user_id'] = $row1['user_id'];
                                                //echo 'userid session '.$_SESSION['user_id'];
                                                $notel = $row1['phone'];
                                                // echo 'no tel: '.$notel;
                                                $fname = $row1['fullname'];
                                                // echo 'fullnmae: '.$fname;

                                                // If notel or fname Null, pop-up to enter name and notel
                                                if ($notel == NULL || $fname == NULL) {
                                                    echo '<button class="btn" href="join">JOIN</button>';
                                                    //function here, Azrul!!!
                                                } else { // notel, fname already filled
                                                    // echo '<form method="post" action="join_activity.php">';
                                                    // echo '<input type="hidden" name="activity_id" value="' . $id . '">'; // Add a hidden input field to pass the activity_id
                                                    // echo '<button class="btn" type="submit" name="join">JOIN</button>';
                                                    // echo '</form>';
                                                    echo '<button class="btn" href="confirm-join">JOIN</button>';
                                                }                                       
                                            }
                                        }
                                        //if user not log in yet
                                        else {
                                            echo '<li>';
                                            echo '<span class="class-more"><a href="login.php?source=volunteer" class="btn">JOIN</a></span>';
                                            echo '</li>';
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="details__content-img">
                                    <img src="<?php echo $activityImg; ?>" alt="">
                                </div>
                                <p><?php echo $activityDescription; ?></p>
                            </div>
                            <!-- #JOIN VOLUNTEER-->
                            <!-- <div id="comments" class="comments-area  mt-45">
                                <div id="respond" class="comment-respond">
                                    <h3 id="reply-title" class="comment-reply-title">Join Us <small><a rel="nofollow" id="cancel-comment-reply-link" href="/finco/?p=2112#respond" style="display:none;">Cancel reply</a></small></h3>
                                    <form action="http://wordpress.zcube.in/finco/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                        <p class="comment-field"><i class="fas fa-user"></i><input id="author" placeholder="Your Name" name="author" type="text"></p>
                                        <p class="comment-field"><i class="fas fa-envelope"></i><input id="email" placeholder="example@gmail.com" name="email" type="text"></p>
                                        <p class="comment-field"><i class="fas fa-phone"></i><input id="phone" placeholder="011-XXXXXXX" name="phone" type="text"></p>
                                        <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="JOIN"> <input type="hidden" name="comment_post_ID" value="2112" id="comment_post_ID">
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                        </p>
                                    </form>
                                </div>
                            </div> -->
                            <!-- #JOIN VOLUNTEER (END) -->
                        </div>
                    </div>
                        <!-- #right side -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar-widget">
                        <section id="cause-area" class="widget">
                            <h2 class="widget-title">Location</h2>
                            <p><?php echo $activityLocation; ?></p>
                            <h2 class="widget-title">Start Date</h2>
                            <p><?php echo $activityStart; ?></p>
                            <h2 class="widget-title">End Date</h2>
                            <p><?php echo $activityEnd; ?></p>
                            <h2 class="widget-title">Duration</h2>
                            <p>
                            <?php
                                // Convert start and end dates to DateTime objects
                                $startDate = new DateTime($activityStart);
                                $endDate = new DateTime($activityEnd);

                                // Calculate the duration as the difference between the two dates
                                $duration = $endDate->diff($startDate)->format('%a');

                                if ($duration == 1) {
                                    echo $duration . ' day';
                                } else {
                                    echo $duration . ' days';
                                }
                                ?>
                            </p>
                            <h2 class="widget-title">Slots left</h2>
                            <p>
                                <?php
                                $activityMaxPart = $row['max_participant'];
                                $activityCurPart = $row['current_participant'];

                                // $slotsLeft = $activityMaxPart - $activityCurPart;
                                echo $activityCurPart . '/' . $activityMaxPart . ' people';
                                ?>
                            </p>
                        </section>
                        <section id="cause-area" class="widget">
                        <div class="row">
                            <div class="col pt-15 pb-15">
                                <a class="button" href="#edit">Edit</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col pt-15 pb-15">
                                <a class="button" href="#delete">Delete</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col pt-15 pb-15">
                                <a class="button" href="#join">Join</a>
                            </div>
                        </div>
                        </section>
                    </aside>
                    </div>
                    <!-- #right side end -->
                </div>
            </div>
        </section>
        <!-- volunteer-details-content-end -->
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

        <?php
        // Retrieve the user_id from the query string parameter
        // $user_id = $_GET['id'];
        $user_id = $_SESSION['user_id']; 
        $act_id = $id;

        // // Fetch data from the 'users' table for the specified user_id
        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $result = mysqli_query($mysqli, $query);

        if (!$result) {
            // Handle the query error appropriately for your application
            echo "Error executing the query: " . mysqli_error($mysqli);
            exit();
        }

        // Retrieve the user details
        $user = mysqli_fetch_assoc($result);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            // Retrieve the updated values from the form
            $phone = $_POST['phone'];
            $fullname = $_POST['fullname'];

            // Update the user details in the database
            $updateQuery = "UPDATE users SET phone = '$phone', fullname = '$fullname' WHERE user_id = $user_id";
            $updateResult = mysqli_query($mysqli, $updateQuery);

            if ($updateResult) {
                // Redirect back to the volunteer_details.php page
                header("Location: volunteer_details.php?id=$user_id");
                exit();
            } else {
                // Handle the update error appropriately for your application
                echo "Error updating users details: " . mysqli_error($mysqli);
                exit();
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
            // Delete the user from the user_activity table
            $deleteQuery = "DELETE FROM user_activity WHERE user_id = $user_id AND activity_id = $act_id";
            $deleteResult = mysqli_query($mysqli, $deleteQuery);
    
            if ($deleteResult) {
                // Redirect back to the volunteer_details.php page
                header("Location: volunteer_details.php?id=$user_id");
                exit();
            } else {
                // Handle the delete error appropriately for your application
                echo "Error deleting user: " . mysqli_error($mysqli);
                exit();
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['join'])) {
            // Get the form values
            $fullName = $_POST['fullName'];
            $phoneNumber = $_POST['phoneNumber'];
            
            // Insert the user into the users table
            $updateUserQuery = "UPDATE users SET phone = '$phoneNumber', fullname = '$fullName' WHERE user_id = $user_id";
            $insertUserResult = mysqli_query($mysqli, $updateUserQuery);
        
            if ($insertUserResult) {
                // Get the newly inserted user_id
                // $user_id = mysqli_insert_id($mysqli);
                
                // Insert the user_activity record
                $insertActivityQuery = "INSERT INTO user_activity (user_id, activity_id) VALUES ('$user_id', '$act_id')";
                $insertActivityResult = mysqli_query($mysqli, $insertActivityQuery);
        
                if ($insertActivityResult) {
                    // Redirect back to the volunteer_details.php page
                    header("Location: volunteer_details.php?id=$user_id");
                    exit();
                } else {
                    // Handle the insert error appropriately for your application
                    echo "Error inserting user activity: " . mysqli_error($mysqli);
                    exit();
                }
            } else {
                // Handle the insert error appropriately for your application
                echo "Error inserting user: " . mysqli_error($mysqli);
                exit();
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm-join'])) {
                
            // Insert the user_activity record
            $insertActivityQuery = "INSERT INTO user_activity (user_id, activity_id) VALUES ('$user_id', '$act_id')";
            $insertActivityResult = mysqli_query($mysqli, $insertActivityQuery);
    
            if ($insertActivityResult) {
                // Redirect back to the volunteer_details.php page
                header("Location: volunteer_details.php?id=$user_id");
                exit();
            } else {
                // Handle the insert error appropriately for your application
                echo "Error inserting user activity: " . mysqli_error($mysqli);
                exit();
            }
        }

    ?>

    <!-- Edit button -->
    <div class="overlay" id="edit">
        <div class="wrapper">
            <h2>Change your details</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <div class="form-container">
                    <form action="" method="post" style="width:50vw; min-width:300px;">
                        <div class="mb-3">
                            <label class="form-label">Phone:</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name:</label>
                            <input type="text" class="form-control" name="fullname" value="<?php echo $user['fullname']; ?>">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success" name="submit">Update</button>
                            <a href="volunteer_details.php?id=<?php echo $user_id; ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Delete button -->
    <div class="overlay" id="delete">
        <div class="wrapper">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <div class="form-container">
                    <form action="" method="post" style="width:50vw; min-width:300px;">
                        <p>Are you sure you want to delete this user?</p>

                        <div>
                            <button type="submit" class="btn btn-danger" name="confirm">Delete</button>
                            <a href="volunteer_details.php?id=<?php echo $user_id; ?>" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Join button -->
    <div class="overlay" id="join">
        <div class="wrapper">
            <h2>Please Fill up The Form</h2><a class="close" href="#">&times;</a>
            <div class="content">
                <div class="form-container">
                    <form method="post">
                        <label>Full Name</label>
                        <input placeholder="Your name.." type="text" name="fullName">
                        <label>Phone Number</label>
                        <input placeholder="01X-XXXXXXX" type="text" name="phoneNumber">
                        <input type="submit" value="Submit" name="join">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Join button -->
    <div class="overlay" id="confirm-join">
        <div class="wrapper">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <div class="form-container">
                    <form action="" method="post" style="width:50vw; min-width:300px;">
                        <p>Are you sure you want to join this activity?</p>

                        <div>
                            <button type="submit" class="btn btn-danger" name="confirm-join">Yes</button>
                            <a href="volunteer_details.php?id=<?php echo $user_id; ?>" class="btn btn-secondary">No</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>