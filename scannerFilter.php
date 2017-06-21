
 <?php
 

 header("Content-Type: text/html; charset=utf-8");
 
// function starts
 function ausgabe($argument){
$s = "localhost";
$u = "root";
$pw = "*Se1del#L1nux*";
$d = "smarttray";
$i = 0;
$link = new mysqli($s, $u, $pw, $d) or die ("Fehler im System");

if($link->connect_error) {
    die("Connection fail_ed: ".$link->connect_error);
}
else{
	#echo "connected_connect_";
}	
	#SELECT data.id, data.timestamp, data.signalStrength, data.phoneID, data2.beaconData 
	#FROM data2 LEFT JOIN data ON data2.beaconID = data.beaconID WHERE data.beaconID = '$argument'  ORDER BY data.id DESC

	$ergebnis = mysqli_query($link, "SELECT data.id, data.timestamp, data.signalStrength, data2.beaconData, data3.scannerData
	FROM data
	INNER JOIN data2 ON data2.beaconID = data.beaconID 
	INNER JOIN data3 ON data3.phoneID = data.phoneID WHERE data.phoneID = '$argument' ORDER BY data.id DESC");
	
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "<table>";
 #echo "Scanner Filter Ergebnisse für Scanner : $argument";
 echo "<br/>";
	echo  "<br/> id &emsp;&emsp;  datum &emsp;&emsp;&emsp;&emsp;
	Signalstärke &emsp;&emsp; Ort &emsp;&emsp;&emsp; &emsp; Stapler ";
	   echo "<br/>";
    echo "\n&thinsp;&thinsp;&thinsp;&thinsp;";
while(($row = mysqli_fetch_object($ergebnis)) && ($i<=200))
{
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$i=1+$i;
    echo "<tr>";
    echo "<td>",$row->id,"</td>";
    echo "&thinsp;&thinsp;&thinsp;&thinsp;";
    echo "<td>",$row->timestamp,"</td>";
    echo "\n&thinsp;&thinsp;&thinsp;&thinsp;";
	echo "<td>",$row->signalStrength,"</td>";
    echo "\n&thinsp;&thinsp;";	 
	echo "<td>",$row->scannerData,"</td>";
    echo "\n&thinsp;&thinsp;";
	echo "<td>",$row->beaconData,"</td>";
    echo "\n&thinsp;&thinsp;&thinsp;&thinsp;";
   
	
   #echo "<td>",$row->phoneID,"</td>";
    #echo "\n&thinsp;&thinsp;";
    echo "</tr>";
    echo "<br/>";
    echo "</table>";
	}
	
}
 //function ends
$scn1='FHSTSCN001..........:';//AUFSTECKEN
$scn2='FHSTSCN002..........:';//VERSAND
$scn3='FHSTSCN003..........:';//STUFENPRESSE
$scn4='FHSTSCN004..........:';//ENTFETTUNG
 if(isset($_POST['phoneID'])){
	 $phoneID = $_POST['phoneID'];

	 switch($phoneID){
		case 'scn1':
		ausgabe($scn1);
		break;
		case 'scn2':
		ausgabe($scn2);
		break;
		case 'scn3':
		ausgabe($scn3);
		break;
		case 'scn4':
		ausgabe($scn4);
		break;
	 }
 }
 
 
 
 ?>
 