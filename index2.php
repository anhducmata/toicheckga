<?php 
    session_start();
    error_reporting(0);
    include("query.php");
    require_once("para.php");
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    $sv = 1;
    if($_SESSION["package_type"] != ''){
        $sv = 1;
    }
    
    $rawEthUrl = "https://etherscan.io/tokenholdingsHandler.ashx?&a=0xddbd2b932c763ba5b1b7ae3b362eac3e8d40121a&q=&p=2&f=0&h=0&sort=total_price_usd&order=desc&pUsd24hrs=288.27&pBtc24hrs=0.02794&pUsd=294.36&fav=&langMsg=A%20total%20of%20XX%20tokenSS%20found&langFilter=Filtered%20by%20XX&langFirst=First&langPage=Page%20X%20of%20Y&langLast=Last";
    $jsons = json_decode(file_get_contents($rawEthUrl));
    echo file_get_contents($rawEthUrl);
    ?>
