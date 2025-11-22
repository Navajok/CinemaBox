<?php 
require_once("dbinfo.php");
$sql = "SELECT * from genres";

$items = $mysqli->query($sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movies</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/editMovie.css">
</head>
<body>
    <?php include_once("adminheader.php")?>
    <section id="main">
        <div class="container">
            <div class="bigmovieBox">
                <div class="movieBox">
                    <img src="images/poster.jpg" alt="">
                </div>
                <form id="edit" action="insert_process.php" method="POST" class="movieBox1" >
                    <p><strong>Poster:</strong></p>
                    <input type="text" name="poster" id="poster" placeholder="Enter Poster File name">
                    <div id="poster_err" class="err_label"></div>

                    <p><strong>Movie Title:</strong></p>
                    <input type="text" name="title" id="title" placeholder="Enter Movie Title">
                    <div id="title_err" class="err_label"></div>

                    <p><strong>Movie Description:</strong></p>
                    <textarea rows="10" name="plot" id="plot" placeholder="Enter Movie Description"></textarea>
                    <div id="plot_err" class="err_label"></div>

                    <p><strong>Genre:</strong></p>
                    <select name="genre" id="genre">
                        <?php
                        while ($item = $items->fetch_assoc()) {
                            $sel="";
                            if($item['genreTitle'] == $genre){
                                $sel = "selected";
                            }
                            echo "<option value=' " . $item['genreID'] . " '$sel>" . $item['genreID'] .'. '. $item['genreTitle'] . "</option>";
                        }
                        ?>
                    </select>

                    <p><strong>Movie Price($):</strong></p>
                    <input type="text" name="price" id="price" placeholder="Enter Movie Price($)">
                    <div id="price_err" class="err_label"></div>

                    <p><strong>Runtime(mins):</strong></p>
                    <input type="text" name="runtime" id="runtime" placeholder="Enter Runtime(mins)">
                    <div id="runtime_err" class="err_label"></div>

                    <input type="submit" class="submitbtn" value="Add Movie">
                </form>
            </div>
        </div>
        <div id="bookingPopup" class="popupBackground">
            <div class="popupBox">
                <h2>🎉 Booking Confirmed!</h2>
                <p id="popupMessage"></p>
                <button id="popupOkBtn">OK</button>
            </div>
        </div>
    </section>
    <?php include_once("adminfooter.php")?>
    <script src="js/jquery.js"></script>
    <script src="js/editMovie_process.js"></script>
</body>
</html>