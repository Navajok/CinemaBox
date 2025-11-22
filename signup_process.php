
<?php
session_start();
// CONNECT

    require_once("dbinfo.php");

    $fuserid = $_POST["userid"];
    $femail = $_POST["email"];
    $fpassword = $_POST["password"];
    $fmobile = $_POST["mobilenumber"];

    $sql = "SELECT * FROM users
            WHERE userID = '$fuserid'";
    $result = $mysqli->query($sql);
    $userExists = $result ->num_rows > 0;

    $sql1 = "SELECT * FROM users
            WHERE email= '$femail'";
    $result1 = $mysqli->query($sql1);
    $emailExists = $result1->num_rows > 0;

    //DO IT


    if ($userExists && $emailExists) {
        header("Location: signup.php?error=" . time()  . "&u=$fuserid" . "&e=$femail");
    }
    else if ($userExists) { 
        header("Location: signup.php?error=" . time()  . "&u=$fuserid");
    }
    else if ($emailExists) {
        header("Location: signup.php?error=" . time()  . "&e=$femail");
    }
    else{
        $sql = "INSERT INTO users (userID, email, password, mobile) 
                VALUES ('$fuserid', '$femail', '$fpassword', '$fmobile')";

        //DO IT
        $result = $mysqli->query($sql);

        header("Location: login.php");
    }

?>