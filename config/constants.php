<?php 
    //Start Session
     session_start();


    //Create Constants to Store Non Repeating Values
     define('SITEURL', 'http://localhost/Project_2023-Hangout1/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    
    $conn = mysqli_connect('localhost', 'root', '','food-order') or die(mysqli_error($conn)); //Database Connection
    $db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error($conn)); //SElecting Database


?>