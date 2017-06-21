<?php  

$s = "localhost";
$u = "root";
$pw = "*Se1del#L1nux*";
$d = "smarttray";
	 #$connect = mysqli_connect("localhost", "root", "", "testing");  
	 
 
 $link = new mysqli($s, $u, $pw, $d) or die ("Fehler im System");
 
  #$query  =  "SELECT data2.beaconData, count(*) as number FROM data
	#		INNER JOIN data2 ON data2.beaconID = data.beaconID GROUP BY data2.beaconData";  
			
 $query = "SELECT data3.scannerData, count(*) as number FROM data 
 INNER JOIN data3 ON data3.phoneID = data.phoneID GROUP BY data3.scannerData";  
 $result = mysqli_query($link, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Scanner</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['scannerData', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["scannerData"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'ScannerListe',  
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
                <h3 align="center">Fronhausen Scanner</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
     </body>  
	  </html>