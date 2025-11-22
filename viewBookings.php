<?php
session_start();
require_once("dbinfo.php");

if (isset($_GET['userID'])){
    
    $userid = $_GET['userID'];

    $sql = "SELECT ID FROM users WHERE userID = '$userid'";

    $results = $mysqli->query($sql);

    if ($results->num_rows > 0) {
        $user = $results->fetch_assoc();

        $id = $user['ID'];

        $sql = "SELECT * FROM tickets WHERE userFK = '$id' ORDER BY ticketID asc";

        $result = $mysqli->query( $sql);
    } else{
        echo "<script>document.getElementById('error').innerHTML = 'User does not Exist!';</script>";
    }
}

?>
<!DOCTYPE html>     
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/viewBookings.css">
</head>
<body>
    <?php include_once("adminheader.php")?>
    <section id="main">
       <div class="form">
            <div class="bookingsBox">
                <div class="header">Check User Bookings</div> 
                <input type="text" id="Particulars" placeholder="Please enter UserID"/>
                <input type="submit" id="checkbutton" class="button" value="Check">
                <div id='error' class="err_label"></div>
                    <?php
                    if (isset($_GET['userID'])){
                        if ($results->num_rows == 0){
                            echo "<h1>User '$userid' does not exist!</h1>";
                        }
                        elseif ($result->num_rows == 0) {
                            echo "<h1>No Bookings made from $userid:</h1>";
                        }else{
                            echo "<h1>Past Bookings made from $userid:</h1>";
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
                                            </td>
                                            
                                        </tr>
                                    </table>
                                </div>
                            </div>
                    <?php
                            }
                        }
                    }
                    ?>
            </div>
        </div>
    </section>

<?php include_once("adminfooter.php")?>
<script src="js/jquery.js"></script>
<script src="js/viewBookings.js"></script>
</body>

</html>