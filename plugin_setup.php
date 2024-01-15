<?php

// include_once functions.php;

$pluginName = basename(dirname(__FILE__));
$logFile = $settings['logDirectory']."/".$pluginName.".log";
$myPid = getmypid();
$settingsFile = $settings['configDirectory']."/".$pluginName.".ini";

echo "Plugin Name:  ".$pluginName."<br/> \n";
echo "Logfile:      ".$logFile."<br/> \n";
echo "My PID:       ".$myPid."<br/> \n";
echo "Settings File: ".$settingsFile."<br/> \n";

function logEntry($data) {
	global $logFile,$myPid;
	echo $logFile." ".$myPid;
	$data = $_SERVER['PHP_SELF']." : [".$myPid."] ".$data;
	echo $data;
	$logWrite= fopen($logFile, "a") or die("Unable to open file!");
	echo "B";
	fwrite($logWrite, date('Y-m-d h:i:s A',time()).": ".$data."\n");
	echo "C";
	fclose($logWrite);
	echo "D";
}

echo "attempting to log entry";
logEntry("The settings file name is called: ".$settingsFile);
echo "did the log entry work";
?>

