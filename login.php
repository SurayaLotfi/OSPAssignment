<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewrt" content="width=device-width, initial-scale=1.0" />
    <title>Say No to Bully</title>
    <link rel="stylesheet" href="css/style1.css" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    
  </head>
  <body>

    <?php $sourcePage = isset($_GET['source']) ? $_GET['source'] : 'index'; ?>
    
    <!-- Login Form -->
    <section class="home show">
    <div class="form_container">
    <form method="POST" action="loginprocess.php?source=<?php echo $sourcePage; ?>">
            <h2>Login</h2>

            <?php
            if (isset($_GET['error'])) {
                $errorMessage = "";
                // Handle different error cases
                switch ($_GET['error']) {
                case "user_not_found":
                    $errorMessage = "Username does not exist.";
                    break;
                case "incorrect_password":
                    $errorMessage = "Incorrect password.";
                    break;
                default:
                    $errorMessage = "An error occurred.";
                    break;
                }
                echo '<div class="error-message">';
                echo '<span>' . $errorMessage . '</span>';
                echo '</div>';
            }
            ?>

            <?php
            if (isset($_GET['success'])) {
                $successMessage = "";
                // Handle different error cases
                switch ($_GET['success']) {
                case "registered":
                    $successMessage = "Account registered.";
                    break;
                }
                echo '<div class="success-message">';
                echo '<span>' . $successMessage . '</span>';
                echo '</div>';
            }
            ?>

            <div class="input_box">
                <input type="username" placeholder="Enter your username" name="username" required />
                <i class="uil uil-user email"></i>
            </div>
            <div class="input_box">
                <input type="password" placeholder="Enter your password" name="password" required />
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
                <input type="submit" value="Login">
            </div>

            <div class="login_signup">Don't have an account? <a href="signup.php?source=<?php echo $sourcePage; ?>" id="signup">Signup</a></div>
            </form>
    </div>
    </section>

    <script src="js/script1.js"></script>
    <style>
        .success-message {
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            background-color: #124d10;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
            }
    </style>
  </body>
</html>