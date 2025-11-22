<?php
session_start(); 
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
require_once("dbinfo.php");

$id = $_SESSION['id'];

$sql = "SELECT * FROM tickets WHERE userFK = '$id' ORDER BY ticketID asc";

$result = $mysqli->query( $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/manageBooking.css">
</head>
<body>
    <?php include_once('header.php'); ?>
    <section id="main">
       <div class="form">
            <div class="bookingsBox">
                <div class="header">Check Bookings</div> 
                    <?php
                    
                        if ($result->num_rows == 0) {
                            echo "<h1>No Bookings made from $_SESSION[userID]:</h1>";
                        }else{
                            echo "<h1>Past Bookings made from $_SESSION[userID]:</h1>";
                            while ($ticket = $result->fetch_assoc()) {
                                $ticketID = $ticket['ticketID'];
                                $sql = "SELECT seat FROM bookedseats WHERE ticketFK = '$ticketID'";
                                $item = $mysqli->query($sql);
                                $seats = [];

                                while ($seat = $item->fetch_assoc()) {
                                    $seats[] = $seat['seat'];
                                }
                                
                    ?>
                            <div class="col">
                                <div class="bookingRow">
                                    <table>
                                        <tr>
                                            <td><img src="images/<?php echo $ticket["picFilename"] ?>" alt="Poster"></td>
                                            <td>
                                                <div class="td2">
                                                <span><strong>Movie: </strong><?php echo $ticket["movieTitle"] ?></span><br>
                                                <span><strong>Movie Date: </strong><?php echo date("d/m/Y",strtotime($ticket['movieDate'])) ?> </span><br>
                                                <span><strong>Total Ticket Price: </strong> 
                                                $<?php echo number_format(($ticket["ticketPrice"] * count ($seats) ),2); ?>
                                                </span><br>

                                                <span><strong>Seats: </strong><?php echo implode(", ", $seats) ?></span><br>
                                                <span><strong>Booking Date: </strong><?php echo date("d/m/Y",strtotime($ticket['bookingDate']))  ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <button class='Cancelbutton' value = "<?php echo $ticket['ticketID']?>" >Cancel</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
            </div>
        </div>
    </section>

    <?php include_once('footer.php'); ?>
    <script src="js/jquery.js"></script>
    <script src="js/manageBooking.js"></script>
</body>

</html>