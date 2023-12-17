<?php

$pluginName = basename(dirname(__FILE__));
$logFile = $settings['logDirectory']."/".$pluginName.".log";
$myPid = getmypid();
$settingsFile = "

echo "Plugin Name: ".$pluginName."<br/> \n";
echo "Logfile:     ".$logfile."<br/> \n";
echo "My PID:      ".$myPid."<br/> \n";

?>

