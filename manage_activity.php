<?php
include "connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <title>How to create a pop up window using html css</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    
</head>
    <body>
    <h3>Your Company</h3>
        <h5>We Are Award Winning Web Design Agency From NewYork. We will help you improve your website and digital marketing, to increase your leads and sales online.</h5>
        <div class="box">
            <a class="button" href="#edit">Edit</a>
            <a class="button" href="#delete">Delete</a>
            <a class="button" href="#join">Join</a>
        </div>
        <?php
        // Retrieve the user_id from the query string parameter
        // $user_id = $_GET['id'];
        $user_id = 2;
        $act_id = 2;

        // Fetch data from the 'users' table for the specified user_id
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

    ?>

    <!-- Edit button -->
    <div class="overlay" id="edit">
        <div class="wrapper">
            <h2>Change your details</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <div class="container">
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
                <div class="container">
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
                <div class="container">
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

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #e7e7e7;
            height: 100vh;
        }
        h3 {
            text-align: center;
            color: #413b3b;
            text-transform: uppercase;
            font-size: 80px;
            font-family: 'Zen Tokyo Zoo', cursive;
        }
        h5 {
            text-align: center;
            color: #82807f;
            margin: 80px auto;
            font-size: 20px;
            width: 50%;
            line-height: 1.7;
        }
        .box {
            text-align: center;
        }
        .button {
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

        .container {
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
</body>
</html>