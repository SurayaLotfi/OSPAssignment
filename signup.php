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
    
    <!-- Signup Form -->
    <section class="home show">
    <div class="form_container">
        <form method="POST" action="signupprocess.php">
        <h2>Signup</h2>

        <?php
        if (isset($_GET['error'])) {
            $errorMessage = "";
            // Handle different error cases
            switch ($_GET['error']) {
            case "username_exists":
                $errorMessage = "Username already exists.";
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

        <div class="input_box">
            <input type="username" placeholder="Enter your username" name="username" required />
            <i class="uil uil-user email"></i>
        </div>
        <div class="input_box">
            <input type="password" placeholder="Create password" name="password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
        </div>
        <div class="input_box">
            <input type="submit" value="Sign Up">
        </div>

        <div class="login_signup">Already have an account? <a href="login.php" id="login">Login</a></div>
        </form>
    </div>
    </section>
  </body>
</html>