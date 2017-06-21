<?php


$response = array();
$content = file_get_contents("php://input");


//$data = json_decode($content, true);
 if($_SERVER["REQUEST_METHOD"]=="POST"){

	$data = json_decode(file_get_contents('php://input'),true);
	print_r($data,true);

	echo "zzzzz".$data;
	
	$beaconID         = $_POST["beaconID"];
	$phoneID          = $_POST["phoneID"];
	$beaconData       = $_POST["beaconData"];
	$signalStrength   = $_POST["signalStrength"];

	$stmt = $link ->prepare("INSERT INTO data (beaconID,phoneID,beaconData,signalStrength) VALUES (?,?,?,?)");
	$data = json_decode($content,true);

   
	$stmt->bind_param('sssi', $beaconID, $phoneID, $beaconData, $signalStrength);

	$arr = array('beaconID' => $beaconID, 'phoneID' => $phoneID, 'beaconData' => $beaconData, 'signalStrength' => $signalStrength);
	echo json_encode($arr);

	
	echo "<br/>";
	$beaconID = $_POST["beaconID"];
	$j 	     = array('beaconID' => $beaconID);
	echo json_encode($j);
	echo "<br/>";

	$phoneID = $_POST["phoneID"];
	$a 		 = array('phoneID' => $phoneID);
	echo json_encode($a);
	echo "<br/>";

	$beaconData = $_POST["beaconData"];
	$b		= array('beaconData' => $beaconData);
	echo json_encode($b);
	echo "<br/>";
	
	
	$signalStrength = $_POST["signalStrength"];
	$d		= array('signalStrength' => $signalStrength);
	echo json_encode($d);
	echo "<br/>";
	
	

	 if($stmt->execute()){
		 
	 $response['error'] = false; 
	 $response['message'] = 'it saved successfully'; 
 }
	 else{ 
		
		 $response['error'] = true; 
		 $response['message'] = 'Please try later';
	 }
}
else{
 	#$response['error'] = false; 
	#$response['message'] = "Wartung fuer ein Signal"; 
}

#echo json_encode($response);


?>