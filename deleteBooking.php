<?php
require_once("dbinfo.php");
session_start();

if (isset($_GET['ticketID'])){
    $ticketID = (int) $_GET['ticketID'];

    $sql = "DELETE FROM tickets WHERE ticketID = $ticketID";

    $mysqli->query( $sql);

    $sql = "DELETE FROM bookedseats WHERE ticketFK = $ticketID";

    
    $mysqli->query( $sql);

    header("location: manageBookings.php?check=true");
}else{
    header("location: manageBookings.php?check=true");
}

?>