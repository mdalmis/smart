<!DOCTYPE html>
<html>
<head>
<title> smarttray  </title>
</head>
<body>
<?php
 
$s = "localhost";
$u = "root";
$pw = "*Se1del#L1nux*";
$d = "smarttray";
	
$link = new mysqli($s, $u, $pw, $d) or die ("Fehler im System");

if($link->connect_error) {
    die("Connection fail_ed: ".$link->connect_error);
}
else{
	#echo "connected_connect_";
}


?>
</body>
</html>