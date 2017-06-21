<?php  

$s = "localhost";
$u = "root";
$pw = "*Se1del#L1nux*";
$d = "smarttray";
	 #$connect = mysqli_connect("localhost", "root", "", "testing");  
	 
 
 $link = new mysqli($s, $u, $pw, $d) or die ("Fehler im System");
 
    #"SELECT data.id, data.timestamp, data.signalStrength, data2.beaconData, data3.scannerData
	#FROM data
	#INNER JOIN data2 ON data2.beaconID = data.beaconID 
	#INNER JOIN data3 ON data3.phoneID = data.phoneID WHERE data.phoneID = '$argument' ORDER BY data.id DESC"
	
 $query  =  "SELECT data2.beaconData, count(*) as number FROM data
			INNER JOIN data2 ON data2.beaconID = data.beaconID GROUP BY data2.beaconData";  
 $result = mysqli_query($link, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Beacon</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['beaconData', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["beaconData"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'BeaconListe',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Fronhausen Beacon</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
     </body>  
	  </html>