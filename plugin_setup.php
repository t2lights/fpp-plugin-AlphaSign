<?php

error_reporting(E_ALL);
include_once "functions.php";

$debug=true;
$pluginName = basename(dirname(__FILE__));
$logFile = $settings['logDirectory']."/".$pluginName.".log";
$settingsFile = $settings['configDirectory']."/".$pluginName.".cfg";

echo $settingsFile."<br/> \n";
echo $pluginName."<br/> \n";
echo $logFile."<br/> \n";
logEntry("The settings file name is called: ".$settingsFile);
?>

//=================================================================================================================

<html>
<head></head>

<div id="beta" class="settings">
<fieldset>
<legend>Alpha Sign Support Instructions</legend>

<p>Known Issues:
<ul>
<li>None known</ul>

<p>Configuration:
<ul>
<li>Configure your connection type, Serial, Static text you want to send in front of Artist and song and post text, loop time if you want looping and color</li>
</ul>

<form method="post" action="http://<? echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT']?>/plugin.php?plugin=<?php echo $pluginName;?>&page=plugin_setup.php">
<?php 
echo "ENABLE PLUGIN: ";

if($ENABLED == "on" || $ENABLED == 1) {
		echo "<input type=\"checkbox\" checked name=\"ENABLED\"> \n";
//PrintSettingCheckbox("Radio Station", "ENABLED", $restart = 0, $reboot = 0, "ON", "OFF", $pluginName = $pluginName, $callbackName = "");
	} else {
		echo "<input type=\"checkbox\"  name=\"ENABLED\"> \n";
}


echo "<p/> \n";

?>
<!--  
Manually Set Station ID<br>
<p><label for="STATION_ID">Station ID:</label>
<input type="text" value="<? if($STATION_ID !="" ) { echo $STATION_ID; } else { echo "";};?>" name="STATION_ID" id="STATION_ID"></input>
(Expected format: up to 8 characters)
</p>
-->
<?

echo "Connection type: \n";

echo "<select name=\"DEVICE_CONNECTION_TYPE\"> \n";
                        if($DEVICE_CONNECTION_TYPE != "")
                        {
				switch ($DEVICE_CONNECTION_TYPE)
				{
					case "SERIAL":
                                		echo "<option selected value=\"".$DEVICE_CONNECTION_TYPE."\">".$DEVICE_CONNECTION_TYPE."</option> \n";
                                //		echo "<option value=\"IP\">IP</option> \n";
                                		break;
					case "IP":
                                		echo "<option selected value=\"".$DEVICE_CONNECTION_TYPE."\">".$DEVICE_CONNECTION_TYPE."</option> \n";
                                		echo "<option value=\"SERIAL\">SERIAL</option> \n";
                        			break;
			
				
	
				}
	
			} else {

                                echo "<option value=\"SERIAL\">SERIAL</option> \n";
                          //      echo "<option value=\"IP\">IP</option> \n";
			}
                
        
echo "</select> \n";
echo "<p/> \n";

echo "<p/> \n";
echo "SERIAL DEVICE: \n";
echo "<select name=\"DEVICE\"> \n";
        foreach(scandir("/dev/") as $fileName)
        {
                if (preg_match("/^ttyUSB[0-9]+/", $fileName)) {
			if($DEVICE == $filename)
			{
                        	echo "<option selected value=\"".$fileName."\">".$fileName."</option> \n";
			} else {
                       		echo "<option value=\"".$fileName."\">".$fileName."</option> \n";
			}
                }
        }
echo "</select> \n";
?>

<p/>
<!--  
IP: 
<input type="text" value="<? if($IP !="" ) { echo $IP; } else { echo "";}?>" name="IP" id="IP"></input>

<p/>

PORT:
<input type="text" value="<? if($PORT !="" ) { echo $PORT; } else { echo "";}?>" name="PORT" id="PORT"></input>

<p/>
-->
STATIC TEXT PRE:
<input type="text" size="64" value="<? if($STATIC_TEXT_PRE !="" ) { echo $STATIC_TEXT_PRE; } else { echo "";}?>" name="STATIC_TEXT_PRE" id="STATIC_TEXT_PRE"></input>


<p/>

STATIC TEXT POST:
<input type="text" size="64" value="<? if($STATIC_TEXT_POST !="" ) { echo $STATIC_TEXT_POST; } else { echo "";}?>" name="STATIC_TEXT_POST" id="STATIC_TEXT_POST"></input>

<p/>
<!-- 
LOOP time (in secs):
<input type="text" value="<? if($LOOPTIME !="" ) { echo $LOOPTIME; } else { echo "10";}?>" name="LOOPTIME" id="LOOPTIME"></input>


<p/>

LOOP:
<?
echo "<select name=\"LOOPMESSAGE\"> \n";

		switch ($LOOPMESSAGE) {

			case "YES":
				echo "<option selected value=\"".$LOOPMESSAGE."\">".$LOOPMESSAGE."</option> \n";
                echo "<option value=\"NO\">NO</option> \n";
            	break;

			case "NO":
				echo "<option selected value=\"".$LOOPMESSAGE."\">".$LOOPMESSAGE."</option> \n";
                echo "<option value=\"YES\">YES</option> \n";
                break;
                
			default:
                  echo "<option value=\"NO\">NO</option> \n";
                  echo "<option value=\"YES\">YES</option> \n";
				break;
				}
                
        
echo "</select> \n";
?>
-->
<p/>
<!--  
COLOR:
-->
<?

//create an array of color here
//echo "<select name=\"COLOR\"> \n";
 //                     echo "<option value=\"YELLOW\">YELLOW</option> \n";
  //                    echo "<option value=\"GREEN\">GREEN</option> \n";
   //                   echo "<option value=\"RAINBOW\">RAINBOW</option> \n";


//echo "</select> \n";


?>


<p/>

Separator between SongTitle & Song Artist:
<input type="text" value="<? if($SEPARATOR !="" ) { echo $SEPARATOR; } else { echo "-";}?>" name="SEPARATOR" id="SEPARATOR"></input>

<p/>
<input id="submit_button" name="submit" type="submit" class="buttons" value="Save Config">


<p>To report a bug, please file it against the BetaBrite plugin project on Git: https://github.com/LightsOnHudson/FPP-Plugin-BetaBrite

<p>
<?
 if(file_exists($pluginUpdateFile))
 {
 	//echo "updating plugin included";
	include $pluginUpdateFile;
}
?>
<p>To report a bug, please file it against <?php echo $gitURL;?>
</form>

</fieldset>
</div>
<br />
</html>
