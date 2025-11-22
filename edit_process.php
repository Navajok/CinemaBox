<?php 
require_once("dbinfo.php");
session_start();

$movieID = $_POST['movieID'];
$title = $_POST['title'];
$poster = $_POST['poster'];
$plot = $_POST['plot'];
$price = $_POST['price'];
$genre = $_POST['genre'];
$runtime = $_POST['runtime'];

// echo $poster;
// echo "<br>";
// echo $title;
// echo "<br>";
// echo $plot;
// echo "<br>";
// echo $genre;
// echo "<br>";
// echo $price;
// echo "<br>";

$sql = "UPDATE movies 
        SET Title = '$title', 
            picFilename = '$poster', 
            Plot = '$plot', 
            moviePrice = $price, 
            genreFK = $genre, 
            runtime = $runtime 
            WHERE movieID = $movieID";

$mysqli->query($sql);

$sql = "UPDATE tickets 
        SET movieTitle = '$title', 
            ticketPrice = $price
            WHERE movieFK = $movieID";

$mysqli->query($sql);

header("location: manageMovies.php?movieUpdated=&movietitle=" . $title);


?>