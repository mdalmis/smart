
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
#$link, "SELECT data.id, data.timestamp, data.signalStrength, data2.beaconData, data3.scannerData
	#FROM data
	#INNER JOIN data2 ON data2.beaconID = data.beaconID 
	#INNER JOIN data3 ON data3.phoneID = data.phoneID WHERE data.phoneID = '$argument'");

	$ergebnis = mysqli_query($link, "SELECT data.id, data.timestamp, data.signalStrength, data3.scannerData, data2.beaconData 
	FROM data
	INNER JOIN data3 ON data3.phoneID = data.phoneID
	INNER JOIN data2 ON data2.beaconID = data.beaconID WHERE data.beaconID = '$argument'  ORDER BY data.id DESC");
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "<table>";
# echo "Beacon Filter Ergebnisse für Beacon : $argument";
 echo "<br/>";
	echo  "<br/> id &emsp;&emsp;  datum &emsp;&emsp;&emsp;&emsp;
	Signalstärke &emsp;&emsp; Stapler &emsp;&emsp;&emsp; &emsp; Ort ";
	   echo "<br/>";
    echo "\n&thinsp;&thinsp;&thinsp;&thinsp;";
	
	
	
while(($row = mysqli_fetch_object($ergebnis)) && ($i<=50))
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
	echo "<td>",$row->beaconData,"</td>";
    echo "\n&thinsp;&thinsp;";
    echo "<td>",$row->scannerData,"</td>";
    echo "\n&thinsp;&thinsp;";
  
   
    echo "</tr>";
    echo "<br/>";
    echo "</table>";
	}
	
}
 //function ends

	$beac1='E2:AC:7C:55:4D:7A'; //Schubmaßstapler-H2
	$beac2='E4:CE:8A:1D:CB:7F'; //Ameise-Versand
	$beac3='DA:BE:E6:46:AF:77'; //Ameise-SP1
	$beac4='DB:95:CF:5F:94:8D'; //Ameise-EX
	$beac5='FF:ED:CF:15:61:1A'; //Ameise-SP2
	$beac6='E4:EE:88:D9:9A:48'; //Ameise1-LED
	$beac7='D3:95:39:87:87:d0'; //Ameise2-LED
	$beac8='FE:A7:95:C6:A9:6D'; //Schubmaßstapler-BSH1
	$beac9='FE:AA:33:9E:DC:E6'; //Schubmaßstapler-BSH2
	$beac10='DD:C8:4A:78:B4:3C'; //Schubmaßstapler-Lager
	$beac11='C7:D3:44:05:24:0E'; //StaplerMitFahrerstand-LED-Lager
	$beac12='CE:C9:80:19:F8:2E'; //Schmalgang1-Versand
	$beac13='E3:FE:C8:9B:E3:01'; //Schmalgang2-Versand
	$beac14='CE:9E:57:5A:27:10'; //StaplerMitFahrerstand-?
	$beac15='E3:18:98:88:4F:22'; //ImTrayLED
	$beac16='F6:8E:F9:02:17:3E'; //ImLED
	
 if(isset($_POST['beaconID'])){
	 $beaconID = $_POST['beaconID'];

	 switch($beaconID){
		case 'beac1':
		ausgabe($beac1);
		break;
		case 'beac2':
		ausgabe($beac2);
		break;
		case 'beac3':
		ausgabe($beac3);
		break;
		case 'beac4':
		ausgabe($beac4);
		break;
		case 'beac5':
		ausgabe($beac5);
		break;
		case 'beac6':
		ausgabe($beac6);
		break;
		case 'beac7':
		ausgabe($beac7);
		break;
		case 'beac8':
		ausgabe($beac8);
		break;
		case 'beac9':
		ausgabe($beac9);
		break;
		case 'beac10':
		ausgabe($beac10);
		break;
		case 'beac11':
		ausgabe($beac11);
		break;
		case 'beac12':
		ausgabe($beac12);
		break;
		case 'beac13':
		ausgabe($beac13);
		break;
		case 'beac14':
		ausgabe($beac14);
		break;
		case 'beac15':
		ausgabe($beac15);
		break;
		case 'beac16':
		ausgabe($beac16);
		break;
	 }
 }
 
 
 
 ?>
 