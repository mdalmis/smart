
 <?php

include (dirname(__FILE__) .'/connect.php');
header("Content-Type: text/html; charset=utf-8");

 
  if(isset($_POST['time1'], $_POST['time2'])){

	$time1 = $_POST['time1'];
	$time2 = $_POST['time2'];
	echo "Sie haben die Werte zwischen $time1 und $time2 gesucht";
  $ergebnis = mysqli_query($link, "SELECT * FROM data WHERE timestamp BETWEEN '$time1' AND '$time2'");
  
}
$i=0;
#  $ergebnis = mysqli_query($link, "SELECT * FROM data BETWEEN 'time1' AND 'time2'");
	error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "<table>";
 #echo "Filter Ergebnisse für Zwischenzeit : $time1 and $time2";
 echo "<br/>";
	echo  "<br/> id &emsp;&emsp;  datum &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	beaconID &emsp;&emsp;&emsp;&emsp; ScannerName &emsp;&emsp;&emsp; &emsp; Signalstärke";
	
    echo "\n&thinsp;&thinsp;&thinsp;&thinsp;";
	
	
while($row = mysqli_fetch_object($ergebnis))
{
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$i=1+$i;
    echo "<tr>";

    echo "<td>",$row->id,"</td>";
    echo "&thinsp;&thinsp;&thinsp;&thinsp;";
    echo "<td>",$row->timestamp,"</td>";
    echo "\n&thinsp;&thinsp;&thinsp;&thinsp;";
    echo "<td>",$row->beaconID,"</td>";
    echo "\n&thinsp;&thinsp;&thinsp;&thinsp;";
    echo "<td>",$row->phoneID,"</td>";
    echo "\n&thinsp;&thinsp;";
    echo "<td>",$row->beaconData,"</td>";
    echo "\n&thinsp;&thinsp;";
    echo "<td>",$row->signalStrength,"</td>";
    echo "\n&thinsp;&thinsp;";
    echo "</tr>";
    echo "<br/>";
    echo "</table>";
	}
	
 ?>
 