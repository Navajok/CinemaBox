<?php 
require_once("dbinfo.php");
session_start();

$title = $_POST['title'];
$poster = $_POST['poster'];
$plot = $_POST['plot'];
$price = $_POST['price'];
$genre = $_POST['genre'];
$runtime = $_POST['runtime'];

echo $poster;
echo "<br>";
echo $title;
echo "<br>";
echo $plot;
echo "<br>";
echo $genre;
echo "<br>";
echo $price;
echo "<br>";

$sql = "INSERT INTO movies (Title, picFilename, Plot, moviePrice, genreFK, runtime) 
        VALUES ('$title', '$poster', '$plot', $price, $genre, $runtime)";

$mysqli->query($sql);

header("location: manageMovies.php?movieInserted=&movietitle=" . $title);


?>