<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location: login.php");
    }
    
    include('query.php');
    $data = $_POST["eths"];
    $username = $_SESSION["username"];
    $data = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $data);
    $data = preg_replace('/\s+/', '', $data);
    $sql = "SELECT username FROM address WHERE username='".$username."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $sql = "UPDATE address SET eths='".$data."' WHERE username='".$username."'";

        if ($conn->query($sql) === TRUE) {
            
               
        }
    }else
    {
        $sql = "INSERT INTO address (`username`, `eths`)
        VALUES ('".$username."', '".$data."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $_SESSION["mes"] = "Updated";
     header("location: account.php");
