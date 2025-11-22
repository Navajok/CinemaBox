<?php
require_once("dbinfo.php");
session_start();

if (isset($_GET['movieid'])){
    $movieID = $_GET['movieid'];

    $sql = "SELECT Title FROM movies WHERE movieID = '$movieID'";

    $result = $mysqli->query($sql);

    $results = $result->fetch_assoc();

    $title = $results['Title'];

    $sql = "DELETE FROM movies WHERE movieID = '$movieID'";

    $mysqli->query($sql);

    $sql = "DELETE FROM tickets WHERE movieFK = '$movieID'";

    $mysqli->query($sql);

    $sql = "DELETE FROM bookedseats WHERE movieFK = '$movieID'";

    $mysqli->query($sql);

    header("location: manageMovies.php?movieDeleted=&movietitle=" . $title);
}else{
    header("location: manageMovies.php");
}

?>