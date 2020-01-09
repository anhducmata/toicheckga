<?php
    error_reporting(0);
    session_start();
    include('query.php');

$sql = "SELECT * FROM user WHERE username='".$_POST["username"]."' AND password='".md5($_POST["password"])."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION["username"] = $_POST["username"];
        if($row["type"] != ''){
            $_SESSION["can_check"] = "ok";    
        }
        if($row["package_type"] != ''){
            $_SESSION["package_type"] = "vip";    
        }
        header("location: index.php");
    }
}else{
    header("location: login.php");
}
$conn->close();