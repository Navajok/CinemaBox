<link rel="stylesheet" href="css/footer.css">
<footer>
    <div class="footersection">
        <div class="footercolumn">
            <h3>Legal:</h3>
            <div class="legal">
                <ul>
                    <li><a href="https://www.instagram.com">Privacy Policy</a></li>
                    <li><a href="https://www.instagram.com">Terms of Use</a></li>
                </ul>
            </div>
            <h3>Contact Us:</h3>
            <p>✉️ Email: <a href="mailto:CinemaBox@gmail.com" class="dwline">CinemaBox@gmail.com</a></p>
            <br>
            <p>📞 Phone: +65 90922171</p>
        </div>

        <div class="footercolumn">
            <h3>Opening Hours:</h3>
            <p>Monday - Friday: 10:00 AM - 9:00 PM </p>
            <br>
            <p>Saturday: 10:00 AM - 11:00 PM</p>
            <br>
            <p>Sunday: 10:00 AM - 11:00 PM</p>
        </div>
        
        <div class="footercolumn">
            <h3>Find us at:</h3>
            <div class="socialmedialink">
                <a href="https://www.instagram.com"><img src="images/instagram.webp" alt="Instagram" /></a>
                <a href="http://facebook.com"><img src="images/facebook.webp" alt="Facebook" /></a>
                <a href="http://twitter.com"><img src="images/X.jpg" alt="Twitter" /></a>
                <a href="https://www.tiktok.com/"><img src="images/tiktok.webp" alt="tiktok" /></a>
            </div>
        </div>
        
        <div class="footercolumn" id="quicklinks">
            <h3>Quick Links:</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="Movie.php">Movies</a></li>
                <li><a href="#">Locations</a></li>
                <li><a href="manageBookings.php">Manage Bookings</a></li>
                <?php 
                    if(  isset( $_SESSION['userID']  )   ) {
                        echo "<li><a href='updateAccount.php'>Update Particulars </a></li>";
                    }
                    else {
                        echo "<li><a href='signup.php'>Sign Up</a></li>";
                    }
                ?>
                <?php 
                    if(  isset( $_SESSION['userID']  )   ) {
                        echo "<li><a href='doLogout.php'>Logout</a></li>";
                    }
                    else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                ?>
                <?php 
                    if( isset( $_SESSION['userID'] ) && $_SESSION['userID'] == "admin") {
                        echo "<li><a href='manageMovies.php'>Admin Page</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
    <p class="copyright">Copyright &copy; 2025 CinemaBox All Rights Reserved</p>
</footer>