<?php 
    include "query.php";
    $sql = "SELECT * FROM address WHERE type='vip'";
    $result = $conn->query($sql);
    $finalEthArr = [];
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        logging($row['eths']);    
        $eths = nl2br($row['eths']);
		$ethsArr = explode("\n", $eths);
		foreach ($ethsArr as $key => $eth) {
			$rs = mb_substr($eth, 0, 42);
			if (preg_match('/^0x[a-fA-F0-9]{40}/', $rs)) {
				fetch($rs, $username);
			}
		}
        }
    } else {
        echo "0 results";
    }
    
    function fetch($eths, $username){
        foreach($eths as $key => $i){
            $data = getAddressInfo($i);
            updateTempData($username, $data);
        }
    }
    
    function getAddressInfo($address){
    		$url = 'https://api.ethplorer.io/getAddressInfo/'.$address.'?apiKey=ethplorer.widget';
    		$dataRaw = file_get_contents($url);
    		$data = json_decode($dataRaw, true);
    		
		return $data;
	}
	
	function logging($data){
	    $myfile = fopen("logs.txt", "a") or die("Unable to open file!");
        
        fwrite($myfile, "\n". $data);
        fclose($myfile);
	}
	
	function updateTempData($username, $data){
	    $sql = "UPDATE address SET tempdata='".$data."' WHERE username='".$username."'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            return true;
        } else {
            echo "Error updating record: " . $conn->error;
            return false;
        }
	}
?>