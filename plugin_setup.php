<?php

error_reporting(E_ALL);
include_once "functions.php";

$debug=true;
$pluginName = basename(dirname(__FILE__));
$logFile = $settings['logDirectory']."/".$pluginName.".log";
$settingsFile = $settings['configDirectory']."/".$pluginName.".cfg";

logEntry("The settings file name is called: ".$settingsFile);
?>

<!DOCTYPE html>
<html>
<head></head>

<div id="beta" class="settings">
<fieldset>
<legend>Alpha Sign Plugin Support Instructions</legend>

<header>
<p><h2>Configuration:</h2>
<ul>
<li>Configure your connection type, Serial, Static text you want to send in front of Artist and song and post text</li>
</ul></p>
</header>

<form method="post" action="http://<?php echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT']?>/plugin.php?plugin=<?php echo $pluginName;?>&page=plugin_setup.php">
<?php 
echo "ENABLE PLUGIN: ";

if($ENABLED == "on" || $ENABLED == 1) {
		echo "<input type=\"checkbox\" checked name=\"ENABLED\"> \n";
	} else {
		echo "<input type=\"checkbox\"  name=\"ENABLED\"> \n";
}

echo "<p/> \n";

?>

<?php
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

<p>STATIC TEXT PRE:
<input type="text" size="64" value="<? if($STATIC_TEXT_PRE !="" ) { echo $STATIC_TEXT_PRE; } else { echo "";}?>" name="STATIC_TEXT_PRE" id="STATIC_TEXT_PRE"></input></p>

<p>STATIC TEXT POST:
<input type="text" size="64" value="<? if($STATIC_TEXT_POST !="" ) { echo $STATIC_TEXT_POST; } else { echo "";}?>" name="STATIC_TEXT_POST" id="STATIC_TEXT_POST"></input></p>

<p>Separator between SongTitle & Song Artist:
<input type="text" value="<? if($SEPARATOR !="" ) { echo $SEPARATOR; } else { echo "-";}?>" name="SEPARATOR" id="SEPARATOR"></input></p>

<p><input id="submit_button" name="submit" type="submit" class="buttons" value="Save Config"></p>

</form>
</fieldset>
</div>
<br />
</html>
