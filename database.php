
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


#echo "connected";
echo "<br/>";
echo " FHSTSCN001 = Aufstecken, FHSTSCN002 = Versand, FHSTSCN003 = Stufenpresse, FHSTSCN004 = Entfettung";
echo "<br/>";
echo "<br/>";

?>
  <!DOCTYPE html>
  
<html>
    <head>
	      
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
   <form method="post" action ="beaconFilter.php">
	 <legend>Stapler: </legend>
        <select name = "beaconID">	
			<option> </option>
			<option value= "beac1">Schubmaßstapler-H2</option>   
            <option value= "beac2">Ameise-Versand</option>
		    <option value= "beac3">Ameise-SP</option>
			<option value= "beac4">Ameise-EX</option>
			<option value= "beac5">Ameise-SP</option>
			<option value= "beac6">Ameise1-LED</option>
            <option value= "beac7">Ameise2-LED</option>
		    <option value= "beac8">Schubmasstapler-BSH1</option>
			<option value= "beac9">Schubmasstapler-BSH2</option>
			<option value= "beac10">Schubmasstapler-Lager</option>
			<option value= "beac11">StaplerMitFahrerstand-LED-Lager</option>
			<option value= "beac12">Schmalgang1-Versand</option>
            <option value= "beac13">Schmalgang2-Versand</option>
		    <option value= "beac14">StaplerMitFahrerstand-?</option>
			<option value= "beac15">ImTrayLED</option>
			<option value= "beac16">ImLED</option>
        </select>
		<input type="submit" name="submit" value="nach Stapler filtern"/>
		</form>
		
		<form method="post" action ="scannerFilter.php">
     
	  <legend>Ort: </legend>
	  <select name = "phoneID">
		<option> </option>
            <option value= "scn1">Aufstecken&thinsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
            <option value= "scn2">Versand</option>
		    <option value= "scn3">Stufenpresse</option>
			<option value= "scn4">Entfettung</option>
        </select>
		<input type="submit" name="submit" value="nach Ort filtern"/>
		
		</form>

<form method="post" action="timestamp.php">
<br>
<legend>Zeit bitte in der Format: "YYYY-MM-TT HH:MM:SS" eingeben: </legend>

 von:&thinsp;&thinsp;<input type="timestamp" name="time1" id = "time1"/>
 bis:&thinsp;&thinsp;<input type="timestamp" name="time2" id = "time2"/>
 </select>
 <input type="submit" name = "submit" value = "nach Zeiten filtern"/>
 </form>
 <br/>
<form method = "post" action = "show.php">
<input type = "submit" name = "zeigen" value = "aktuelle Daten zeigen"/>
</form>

  </body>
  </html>
  <br />
