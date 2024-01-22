<?php

$pluginName = basename(dirname(__FILE__));
$DEBUG=true;

include_once("/opt/fpp/www/config.php");
include_once("/opt/fpp/www/common.php");
include_once("functions.php");

$logFile = $settings['logDirectory']."/".$pluginName.".log";
$pluginConfigFile = $settings['configDirectory'] . "/plugin." .$pluginName;

logEntry("Log filename is:".$logFile);

//argv[0] is  the program
//argv[1] is the first argument in the registration this will be --list

$callbackRegisters = "media\n";

$FPPD_COMMAND = $argv[1];

if($FPPD_COMMAND == "--list") {
	logEntry("FPPD List Registration request: responded:". $callbackRegisters);
	echo $callbackRegisters;
	exit(0);
}

if($FPPD_COMMAND == "--type") {
	logEntry("DEBUG: type callback requested");
	exit(0);
} else {
	logEntry($argv[0]." called with no parameteres");
	exit(0);
}
?>
