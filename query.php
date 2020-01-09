<?php
    session_start();
    error_reporting(0);
    $servername = "localhost";
    $username = "u878982544_eth";
    $password = "anhducmata1603";
    $dbname = "u878982544_eth";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    ?>