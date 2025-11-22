<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <?php include_once("header.php") ?>
    <section id="main">
        <div class="form">
            <form method="post" action="login_process.php">
                <div class="header">Login Page</div>  
                <div class="form-group">
                    <label for="userid">Login ID (username): </label>
                    <input type="text" name="uid" id="userid" />
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input name="pw" type="password" id="password" pattern="[A-Za-z0-9*#_$]{1,}"/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Log In"/>
                </div>
                <?php
                    if(isset($_GET['error']) ) {
                        // YOU CAME BACK FROM A FAILED LOGIN
                        echo "<h3>Your UserID or password is incorrect</h3>";
                    }
                ?>
                <div class="form-group">
                    <p>Don't have an account? <a href="signup.php">Sign up here!</a></p>
                </div>
            </form>
        </div>
    </section>
    <?php include_once("footer.php") ?>
</body>

</html>
