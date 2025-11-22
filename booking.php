<?php 
require_once("dbinfo.php");
session_start();

if(isset($_GET['movieID'])){
    $movieID = $_GET['movieID'];
    $_POST["title"] = $_GET['title'];
    $_POST["poster"] = $_GET['poster'];
    $_POST["price"] = $_GET['ticketPrice'];
    $movieDate = $_GET['movieDate'];
    $genre = $_GET['genre'];
    $runtime = $_GET['runtime'];
    $plot = $_GET['plot'];
}else{  
    $movieID = $_POST['movieID'];
    $_SESSION['movieID'] = $movieID;
    $_SESSION['title'] = $_POST["title"];
    $_SESSION['poster'] = $_POST["poster"];
    $_SESSION['ticketPrice'] = $_POST["price"];
    $movieDate = date('Y-m-d');
    $plot = $_POST['plot'];
    $genre = $_POST['genre'];
    $runtime = $_POST['runtime'];
}
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket Booking</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>
    <?php include_once("header.php") ?>

    <div id="movieDetails" 
        data-movieid="<?php echo $_SESSION['movieID']; ?>"
        data-title="<?php echo $_SESSION['title']; ?>"
        data-poster="<?php echo $_SESSION['poster']; ?>"
        data-ticketprice="<?php echo $_SESSION['ticketPrice']; ?>"
        data-moviedate="<?php echo $movieDate; ?>"
        data-genre="<?php 
        if (isset($_GET['genre'])){
            echo $genre;
        } else{
            echo $_POST['genre'];
        }
        ?>"
        data-runtime="<?php 
        if (isset($_GET['runtime'])){
            echo $runtime;
        } else{
            echo $_POST['runtime'];
        }
        ?>"
        data-plot="<?php 
        if (isset($_GET['plot'])){
            echo $plot;
        } else{
            echo $_POST['plot'];
        }
        ?>" >
    </div>
    <section id="main">
        <div class="container">
            <div class="ticketbox">
                <h1>Book Your Movie Ticket</h1>

                <input type="hidden" name="time" value="<?php echo date('H:i:s'); ?>">
                <label for="movieDate">Select Movie Date:</label>
                <input type="date" id="movieDate" name="movieDate"
                value="<?php echo $movieDate?>"
                min="<?php echo date('Y-m-d') ?>">
                <br>
                <br>
                <br>
                <p class="screen">Screen</p>
                <div class="seats" id="seatsContainer">
                    <?php
                    for ($i = 0; $i < 9; $i++) {
                        for ($j = 0; $j < 8; $j++) {

                            $row = chr($i + 65);
                            $col = $j + 1;

                            $seatID = $row . $col;

                            $_SESSION['seatID'] = $seatID;
                            $sql = "SELECT * FROM bookedseats 
                            WHERE seat = '$seatID' 
                            AND movieFK = '$movieID'    
                            AND movieDate = '$movieDate'";

                            $result = $mysqli->query($sql);

                            if ($result->num_rows > 0) {
                            echo "<div class='seat booked' data-seatid='$seatID'>$seatID</div>";
                            } else {
                            echo "<div class='seat' data-seatid='$seatID'>$seatID</div>";
                            }
                        }
                    }
                    ?>
                </div>

                <p id="selectedSeatsText">Selected Seats: 0</p>

                <button id="bookButton" data-seatID="$seatID" disabled>Book Tickets</button>
            </div>

            <div class="bigmovieBox">
                <div class="movieBox">
                    <img src="images/<?php echo $_POST['poster']; ?>" alt="">
                </div>
                <div class="movieBox2">
                    <p><strong>Movie Title:</strong> <?php echo $_POST['title']; ?></p>
                    <p><strong>Movie Description:</strong> <?php echo $plot ?></p>
                    <p><strong>Genre:</strong> <?php echo $genre ?></p>
                    <p><strong>Movie Price:</strong> $<?php echo number_format(($_SESSION['ticketPrice']) ,2) ?></p>
                    <p><strong>Runtime:</strong> <?php echo $runtime ?> mins</p>
                </div>
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
    <?php include_once("footer.php") ?>
    <script src="js/jquery.js"></script>
    <script src="js/booking.js"></script>
</body>
</html>