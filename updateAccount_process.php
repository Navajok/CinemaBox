<?php
session_start();
// CONNECT

    require_once("dbinfo.php");


    $femail = $_POST["email"];
    $fmobile = $_POST["mobilenumber"];

    // CHECK IF userID ALREADY EXISTS
    $sql = "SELECT * FROM users 
            WHERE email = '$femail'";

    //DO IT

    $result = $mysqli->query($sql); 

    if ($result -> num_rows ==0){
        // email NOT FOUND IN DATABASE
        
        $id= $_SESSION['id'];
        $sql = "UPDATE users 
                SET email='$femail' , mobile ='$fmobile' 
                WHERE ID = '$id' ";

    
        //DO IT
        $result = $mysqli->query($sql); 

        header("Location: updateAccount.php?success=" . time());
    }
    else{
        header("Location: updateAccount.php?error=" . time()  . "&e=$femail");
    }

?>
