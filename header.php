    <header>
        <nav>
            <label for="hamburger">&#9776;</label>
            <input type="checkbox" id="hamburger" />
            <img id="logo" src="images/logo.png" alt="Logo">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="Movie.php">Movies</a></li>
                <li><a href="#">Location</a></li>
                <li><a href='manageBookings.php'>Bookings</a></li>
                <?php 
                    if( isset( $_SESSION['userID'] ) && $_SESSION['userID'] == "admin") {
                        echo "<li><a href='manageMovies.php'>Admin Page</a></li>";
                    }
                ?>
                
            </ul>
            <ul id="login">
                <?php 
                    if(  isset( $_SESSION['userID'] )   ) {
                        echo "<li><a href='updateAccount.php'>Update Particulars </a></li>";
                    }
                    else {
                        echo "<li><a href='signup.php'>Sign Up</a></li>";
                    }
                ?>
                <p class="line">|</p>
                <?php 
                    if(  isset( $_SESSION['userID']  )   ) {
                        echo "<li><a href='doLogout.php'>Logout</a></li>";
                    }
                    else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>