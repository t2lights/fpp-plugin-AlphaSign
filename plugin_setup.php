<?php

$pluginName = basename(dirname(__FILE__));
$logFile = $settings['logDirectory']."/".$pluginName.".log";
$myPid = getmypid();
$settingsFile = $settings['configDirectory']."/"."plugin.".$pluginName.".ini";

echo "Plugin Name:  ".$pluginName."<br/> \n";
echo "Logfile:      ".$logFile."<br/> \n";
echo "My PID:       ".$myPid."<br/> \n";
echo "Settings File: ".$settingsFile."<br/> \n";

?>

