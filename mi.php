<?php  

$s = "localhost";
$u = "root";
$pw = "*Se1del#L1nux*";
$d = "smarttray";

 $link = new mysqli($s, $u, $pw, $d) or die ("Fehler im System");
 	#SELECT data2.beaconData, count(*) as number FROM data
	#INNER JOIN data2 ON data2.beaconID = data.beaconID GROUP BY data2.beaconData
 $query  =  "SELECT * FROM data WHERE timestamp BETWEEN '2017-06-14 10:00:00' AND '2017-06-14 11:00:00'";  
 $result = mysqli_query($link, $query);  
 $chart_data = '';
 
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ timestamp:'".$row["timestamp"]."', signalStrength:".$row["signalStrength"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>mi</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Graphik</h2>
   <h3 align="center">smart</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'timestamp',
 ykeys:[  'signalStrength'],
 labels:['signalStrength'],
 hideHover:'auto',
 stacked:true
});
</script>
