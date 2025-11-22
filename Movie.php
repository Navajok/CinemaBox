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
    <title>Movies</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/movie.css">
</head>
<body>
  <?php include_once("header.php") ?>
      <section id="main">
      

        <div class="topbar">
          <div class="searchContainer">
            <input type="text" class="searchBar" placeholder="Search..." id="searchInput">
            <button type="button" class="searchButton"><img src="images/search.png" alt=""></button>
          </div>
        </div>

        <div class="grid-container">
          <?php while ($item = $items->fetch_assoc()) { ?>
            <form action="booking.php" method="post" class="form">
              <div class="movie" data-title="<?php echo $item["Title"]; ?>" data-genre="<?php echo $item["genreTitle"]; ?>">
                <div class="img-box" style="background-image: url('images/<?php echo $item["picFilename"]; ?>');">
                  <div class="overlay">
                    <h3><?php echo $item["Title"]; ?></h3>
                    <p><?php echo $item["genreTitle"]; ?></p>
                    <br>
                    <p><?php echo $item["runtime"]; ?> mins</p>
                    <br>
                    <p>English</p>
                    <br>
                    <input type="hidden" name="movieID" value="<?php echo $item["movieID"]; ?>">
                    <input type="hidden" name="title" value="<?php echo $item["Title"]; ?>">
                    <input type="hidden" name="poster" value="<?php echo $item["picFilename"]; ?>">
                    <input type="hidden" name="plot" value="<?php echo $item["Plot"]; ?>">
                    <input type="hidden" name="price" value="<?php echo $item["moviePrice"]; ?>">
                    <input type="hidden" name="genre" value="<?php echo $item["genreTitle"]; ?>">
                    <input type="hidden" name="runtime" value="<?php echo $item["runtime"]; ?>">
                    <input class="bookButton" type="submit" value="Book Now">
                  </div>
                </div>
              </div>
            </form>
          <?php 
          }
          ?>  

    </section>
  <?php include_once("footer.php") ?>
  <script src="js/jquery.js"></script>
  <script src="js/movie.js"></script>
</body>

</html>