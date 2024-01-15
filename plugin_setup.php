<?php

error_reporting(E_ALL);
include_once "functions.php";

$pluginName = basename(dirname(__FILE__));
$logFile = $settings['logDirectory']."/".$pluginName.".log";
$myPid = getmypid();
$settingsFile = $settings['configDirectory']."/".$pluginName.".ini";

echo "Plugin Name:  ".$pluginName."<br/> \n";
echo "Logfile:      ".$logFile."<br/> \n";
echo "My PID:       ".$myPid."<br/> \n";
echo "Settings File: ".$settingsFile."<br/> \n";

echo "attempting to log entry"."<br/> \n";
logEntry("The settings file name is called: ".$settingsFile);
echo "did the log entry work"."<br/> \n";
?>

