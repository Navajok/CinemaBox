<?php
require_once("dbinfo.php");
session_start();

$bookedSeats = explode(",", $_GET['bookedSeats']);
$movieDate = $_GET['movieDate'];
$movieID = $_SESSION['movieID'];
$movieTitle = $_SESSION['title'];
$ticketprice = $_SESSION['ticketPrice'];
$userid = $_SESSION['id'];
$mobile = $_SESSION['mobile'];
$email = $_SESSION['email'];
$poster = $_SESSION['poster'];

$sql = "INSERT INTO tickets (movieFK, movieTitle, ticketPrice, userFK, mobile, email, movieDate, picFilename)
        VALUES ('$movieID', '$movieTitle', '$ticketprice', '$userid', '$mobile', '$email', '$movieDate', '$poster')";
$mysqli->query($sql);

$ticketID = $mysqli->insert_id;

foreach ($bookedSeats as $seatID) {
    $sql = "INSERT INTO bookedseats (ticketFK, seat, movieFK, movieDate) 
        VALUES ('$ticketID', '$seatID', '$movieID', '$movieDate')";

    $mysqli->query($sql); 
}

header("Location: Movie.php?");
?>
