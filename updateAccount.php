<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/updateAccount.css">
</head>

<body>      
    <?php include_once("header.php") ?>
    <section id="main">
        <div class="form">
            <form id="updateAccount" action="updateAccount_process.php" method="post">
                <fieldset>
                    <div class="header">Update Account Particulars</div>  
                    <div class="form-group">
                        <label>Mobile Number: </label>
                        <input name="mobilenumber" type="text" id="mobile" placeholder="Mobile Number must start with 8 or 9 and have 8 digits"/>
                        <div id="mobile_err" class="err_label"></div>
                    </div>
                    <div class="form-group">
                        <label>Personal Email Address:</label>
                        <input name="email" type="email" id="email"/>
                        <div id="email_err" class="err_label"></div>
                    </div>
                    <input type="submit" id="submitbutton" class="button" value="Submit Form">
                </fieldset>
            </form>
        </div>
        <div id="bookingPopup" class="popupBackground">
            <div class="popupBox">
                <h2>Account Updated✅!</h2>
                <p id="popupMessage"></p>
                <button id="popupOkBtn">OK</button>
            </div>
        </div>
    </section>

    <?php
        if (isset($_GET['error'])) {
            echo "<script>document.getElementById('email_err').innerHTML = 'Email " .  $_GET['e'] . " has been used before, please enter a new one';</script>";
        }

        if (isset($_GET['success'])){
            echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                $('#bookingPopup').fadeIn(200).css('display', 'flex');
                $('#popupOkBtn').on('click', function () {
                    window.location.href = 'Movie.php'
                });
            });
            </script>";
        }
    ?>

    <?php include_once("footer.php") ?>
    <script src="js/jquery.js"></script>
    <script src="js/updateAccount.js"></script>
</body>

</html>
