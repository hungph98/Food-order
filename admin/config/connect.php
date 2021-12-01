<?php
    //Start Session
    session_start();

    define("SITEURL", "http://localhost:81/food-order/" );
    $severname = "localhost";
    $username = "root";
    $password = "";
    $db_name = "food-order";

    //Connection database
    $conn = mysqli_connect($severname,$username,$password,$db_name);
    if(!$conn){
        echo "Connection Database Failed";
    }
?>