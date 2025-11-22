<?php
$u = $_POST["uid"];
$p = $_POST["pw"];
    
    require_once("dbinfo.php");

    $sql = "SELECT * FROM users 
    WHERE userID='$u' AND password='$p'";

    $result = $mysqli->query($sql);
    
if($result->num_rows == 1 ) {
    session_start();
    $_SESSION['uid'] = $u; // STORES WHAT USER ENTERS AS USER ID

    // GET ONE RECORD FROM THE QUERY
    $user =  $result->fetch_assoc(); //GET THE USER RECORD

    $_SESSION['userID'] = $user["userID"]; // STORES FULL NAME FROM users TABLE
    $_SESSION['id'] = $user["ID"]; // STORES ID (1,2,3,4) FROM users TABLE
    $_SESSION['mobile'] = $user["mobile"]; // STORES MOBILE NUMBER FROM users TABLE   
    $_SESSION['email'] = $user["email"]; // STORES EMAIL FROM users TABLE

    // echo $_SESSION['username'] . " " . $_SESSION['id'] . "<br>";
    header("location: Movie.php");
}
else {
    header("location: login.php?error=11111");
}
?>