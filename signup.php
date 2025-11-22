<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <?php include_once("header.php") ?>
    <section id="main">
        <div class="form">
            <form id="signup" method="post" action="signup_process.php">
                <div class="header">CREATE AN ACCOUNT</div>  
                <div class="form-group">
                    <label for="userid">Login ID (username): </label>
                    <input type="text" name="userid" id="userid" />
                    <div id="userid_err" class="err_label"></div>
                </div>
                <div class="form-group">
                    <label>Personal Email Address:</label>
                    <input name="email" type="email" id="email" />
                    <div id="email_err" class="err_label"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input name="password" type="password" id="password" " placeholder="Between 8-16 characters"/>
                    <div id="password_err" class="err_label"></div>
                </div>
                <div class="form-group">
                    <label>Mobile Number: </label>
                    <input name="mobilenumber" type="tel" id="mobile" />
                    <div id="mobile_err" class="err_label"></div>
                </div>
                <div class="form-group">
                    <label for="password">Re-enter Password: </label>
                    <input name="password" type="password" id="repassword"  placeholder="Re-enter Password"/>
                    <div id="repassword_err" class="err_label"></div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit"/>
                </div>
                <div class="form-group">
                    <p>Already have an account? <a href="login.php">Login here!</a></p>
                </div>
            </form>
        </div>
    </section>

    <?php
        if (isset($_GET['u']) && isset($_GET['e'])) {
            echo "<script>document.getElementById('userid_err').innerHTML = 'User ID &#39;" .  $_GET['u'] . "&#39; has been used before, please enter a new one';</script>";
            echo "<script>document.getElementById('email_err').innerHTML = 'The email &#39;" .  $_GET['e'] . "&#39; has been used before, please enter a new one';</script>";
        }
        else if (isset($_GET['u'])) {
            echo "<script>document.getElementById('userid_err').innerHTML = 'User ID &#39;" .  $_GET['u'] . "&#39; has been used before, please enter a new one';</script>";
        }
        else if (isset($_GET['e'])) {
            echo "<script>document.getElementById('email_err').innerHTML = 'The email &#39;" .  $_GET['e'] . "&#39; has been used before, please enter a new one';</script>";
        }
    ?>

    <?php include_once("footer.php") ?>
    <script src="js/signup.js"></script>

</body>

</html>
