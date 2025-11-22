
<?php 
session_start();
    require_once("dbinfo.php");

    $sql = "SELECT * FROM moviebanner";

    $result = $mysqli->query($sql);
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>  
    <?php include_once("header.php") ?>
    <section id="main">
        <div class="slideshow-container">
            <?php 
            $rows = [];
            while ( $results = $result->fetch_assoc() ) {
                $rows[] = $results['banner'];
            ?>

            <div class="slide">
                <img src="images/<?php echo $results['banner']?>">
                <span class="title">
                    <?php echo $results['Title']?>
                </span>
                <span class="description">
                    <?php echo $results['description']?>
                </span>
            </div>

            <?php
            }
            ?>
            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
            <div class="navigation">
                <?php
                foreach ($rows as $index => $row) {
                    echo "<span class='dot' onclick='currentSlide(" . $index + 1 .")'></span>";
                }
                ?>
            </div>

        </div>
    </section>
    <?php include_once("footer.php") ?>
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>
</body>
</html>
