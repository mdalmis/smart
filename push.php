
 <?php
 /**
 * Short description for file
 *
 * @category   smarttray
 * @author     Mihriban Dalmis 
 * @license    Seidel GMBH
 * @link       -
 * @since      13.04.2017
 */
 
header('Content-type: text/html; charset=utf-8');
ini_set("allow_url_fopen", true);




include (dirname(__FILE__) .'/connect.php');
include (dirname(__FILE__) .'/send.php');
#++++++++++++++++-------------------------


#++++++++++++++++-------------------------
$b = is_writable( "\\172.20.10.17\smarttray" ); //boolean value
if(b==true){
	#echo "es ist writable   ";
}else{
	"is not";
}

//Write the data

#+++++++++++
$page = $_SERVER['PHP_SELF'];
$sec = "5";
header("Refresh: $sec; url=$page");

if($link->connect_error){
    die("Fehler : ".$link->connect_error);
}  
if (!$link) {
    die('Not connected : ' . mysql_error());
}



$ergebnis = mysqli_query($link,"SELECT * FROM data ORDER BY id DESC ");

echo "<table>";
	echo  "<br/> id &emsp;&emsp;  datum &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	beaconID &emsp;&emsp;&emsp;&emsp; ScannerName &emsp; Signalstärke
	";
	

?>

 

