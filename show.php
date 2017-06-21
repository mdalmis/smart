<!DOCTYPE html>
<html>
<head>
<title> smarttray  </title>
</head>
</html>

<?php

include (dirname(__FILE__) .'/connect.php');

header('Content-type: text/html; charset=utf-8');

$page = $_SERVER['PHP_SELF'];
$sec = "5";
header("Refresh: $sec; url=$page");

$ergebnis = mysqli_query($link,"SELECT * FROM data ORDER BY id DESC ");

echo "<table>";
	echo "<br/> Scanner : FHSTSCN001 = Aufstecken, FHSTSCN002 = Versand, FHSTSCN003 = Stufenpresse, FHSTSCN004 = Entfettung <br/> <br/> ";
echo "<table> <br/> id &emsp;&emsp; &thinsp;&thinsp;Datum &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
Beacon &emsp;&emsp;&emsp;&emsp; Scanner &emsp;&emsp;&emsp; &emsp; Signalstearke  \n&thinsp;&thinsp;&thinsp;&thinsp;";
$i=0;
while(($row = mysqli_fetch_object($ergebnis)) && ($i<=100))
{
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