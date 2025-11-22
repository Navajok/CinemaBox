<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

    require_once("dbinfo.php");

    $sql = "SELECT  movies.movieID, 
                    movies.Title, 
                    movies.picFilename, 
                    movies.Plot, 
                    movies.moviePrice, 
                    movies.runtime, 
                    genres.genreTitle 
            FROM movies 
            LEFT JOIN genres 
            ON movies.genreFK=genres.genreID";

    $items = $mysqli->query( $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movies</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/movie.css">
</head>
<body>
    <?php include_once("adminheader.php")?>
    
      <section id="main">

        <div class="topbar">
          <div class="searchContainer">
            <input type="text" class="searchBar" placeholder="Search..." id="searchInput">
            <button type="button" class="searchButton"><img src="images/search.png" alt=""></button>
          </div>
        </div>

        <div class="grid-container">
          <?php while ($item = $items->fetch_assoc()) { ?>
            <div class="form">
              <div class="movie" 
              data-movieid="<?php echo $item["movieID"]; ?>"
              data-title="<?php echo $item["Title"]; ?>" 
              data-poster="<?php echo $item["picFilename"]; ?>"
              data-movieprice="<?php echo $item["moviePrice"]; ?>"
              data-genre="<?php echo $item["genreTitle"]; ?>"
              data-runtime="<?php echo $item["runtime"]; ?>"
              data-plot="<?php echo $item["Plot"]; ?>"
              >
                <div class="img-box" style="background-image: url('images/<?php echo $item["picFilename"]; ?>');">
                  <div class="overlay">
                    <input class="editbutton" type="submit" id="editmovie" value="Edit Movie Details">
                    <br>
                    <br>
                    <br>
                    <br>
                    <input class="deletebutton" type="button" value="Delete Movie ">
                  </div>
                </div>
              </div>
            </div>
          <?php 
          }
          ?>
        <div id="bookingPopup" class="popupBackground">
            <div class="popupBox">
                <h2 id="popupHeader"></h2>
                <p id="popupMessage">
                  <?php
                  if (isset($_GET['movietitle'])) {
                  }
                  ?>
                </p>
                <button id="popupOkBtn">OK</button>
            </div>
        </div>
    </section>

    <?php
        if (isset($_GET['movieDeleted'])){
            $movietitle = $_GET['movietitle'];
            echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
              $('#popupHeader').text('Movie Deleted');
              $('#popupMessage').text('$movietitle has been deleted');
              $('#bookingPopup').fadeIn(200).css('display', 'flex');
              $('#popupOkBtn').on('click', function () {
              window.location.href = 'manageMovies.php'
              });
            });
            </script>";
          }

        if (isset($_GET['movieUpdated'])){
            $movietitle = $_GET['movietitle'];
            echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
              $('#popupHeader').text('Movie Updated');
              $('#popupMessage').text('$movietitle has been updated');
              $('#bookingPopup').fadeIn(200).css('display', 'flex');
              $('#popupOkBtn').on('click', function () {
              window.location.href = 'manageMovies.php'
              });
            });
            </script>";
          }

        if (isset($_GET['movieInserted'])){
            $movietitle = $_GET['movietitle'];
            echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
              $('#popupHeader').text('Movie Added');
              $('#popupMessage').text('$movietitle has been Added');
              $('#bookingPopup').fadeIn(200).css('display', 'flex');
              $('#popupOkBtn').on('click', function () {
              window.location.href = 'manageMovies.php'
              });
            });
            </script>";
          }
    ?>
  
<?php include_once("adminfooter.php")?>
<script src="js/jquery.js"></script>
<script src="js/movie.js"></script>
<script src="js/editMovie.js"></script>
<script src="js/deleteMovie.js"></script>
</body>

</html>