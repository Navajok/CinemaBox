<?php
require_once("dbinfo.php");
session_start();

$userParticulars = $_POST['userParticulars'];

$sql = "SELECT * FROM tickets WHERE mobile = '$userParticulars' OR email = '$userParticulars'";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    header("location: manageBookings.php?check=true");
} else {
    header("location: manageBookings.php?error=true");
}

// $sql = "SELECT * FROM users WHERE mobile = '$userParticulars' OR email = '$userParticulars'";

// $result = $mysqli->query($sql);

// if ($result->num_rows > 0) {
//     $sql = "SELECT * FROM tickets WHERE mobile = '$userParticulars' OR email = '$userParticulars'";
    
//     $results = $mysqli->query($sql);

//     if ($results->num_rows > 0) {
//         header("location: manageBookings.php?check=true");
//     } else{
//         header("location: manageBookings.php?error2=true");
//     }
// } else {
//     header("location: manageBookings.php?error1=true");
// }

?>