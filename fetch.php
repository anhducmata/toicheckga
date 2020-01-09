<?php 
    session_start();
    include("query.php");
    require_once("para.php");
    error_reporting(0);
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    $sv = 3;
    if($_SESSION["package_type"] != ''){
        $sv = 10;
    }
	$ethsArr = [];
	$finalEthArr = [];
    $is_have = false;
    $eths = $_POST["eths"];
	if($eths){
		$eths = nl2br($eths);
		$ethsArr = explode("\n", $eths);
		foreach ($ethsArr as $key => $eth) {
			$result = mb_substr($eth, 0, 42);
			if (preg_match('/^0x[a-fA-F0-9]{40}/', $result)) {
                if($key%2 == 0){
                    $result = 'https://api.ethplorer.io/getAddressInfo/'.$result.'?apiKey=mgc34103pcN90';
                }else{
                    $result = 'https://api.ethplorer.io/getAddressInfo/'.$result.'?apiKey=yuknmr6581fIrPtm52';
                }
                array_push($finalEthArr, $result);
			}
		}
		$is_have = true;
    }
    if($_SESSION['package_type'] != ''){
        $finalEthArr = array_slice($finalEthArr, 0, 49);
    }
    $arr_out = array_chunk($finalEthArr,$sv);
    $arr_total = [];
    
    foreach($arr_out as $key => $i){
        $curr = getAddressInfoPara($i);
        array_push($arr_total, $curr);
    }
    echo json_encode($arr_total);

    function getAddressInfoPara($arr_address){
        $data = new ParallelGet($arr_address);
        return $data;
    }