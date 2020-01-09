<?php
    session_start();
    include('query.php');
    
    function getAccountEths($uid){
    $sql = 'SELECT eths FROM `address` WHERE username="'.$uid.'"';
    $data = '';
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $data = $row["eths"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    $data_orginal = $data;
    $data = trim($data);
    $data = preg_replace('/\s+/', '', $data);
    $data_arr = str_split($data,42);
    return $data_orginal;
    }
    
