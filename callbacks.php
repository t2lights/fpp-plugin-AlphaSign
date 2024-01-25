<?php

$pluginName = basename(dirname(__FILE__));
$DEBUG=true;

$skipJSsettings = 1;	// need this so config does not print out JavaScript arrays
include_once("/opt/fpp/www/config.php");
include_once("/opt/fpp/www/common.php");
include_once("functions.php");

$ENABLED="";

$logFile = $settings['logDirectory']."/".$pluginName.".log";
$pluginConfigFile = $settings['configDirectory'] . "/plugin." . $pluginName;

if (file_exists($pluginConfigFile)) {
	$pluginSettings = parse_ini_file($pluginConfigFile);
}

logEntry("DEBUG: plugin config file: ".$pluginConfigFile);

$ENABLED = urldecode($pluginSettings['ENABLED']);
$DEVICE= urldecode($pluginSettings['DEVICE']);	
$STATIC_TEXT_PRE = urldecode($pluginSettings['STATIC_TEXT_PRE']);
$STATIC_TEXT_POST = urldecode($pluginSettings['STATIC_TEXT_POST']);
$SEPARATOR = urldecode($pluginSettings['SEPARATOR']);	

//arg0 is  the program
//arg1 is the first argument in the registration this will be --list

if($ENABLED != "on" && $ENABLED != "1") {
	logEntry("Plugin Status: DISABLED Please enable in Plugin Setup to use & Restart FPPD Daemon");
	exit(0);
}

$FPPD_COMMAND = $argv[1];

if($FPPD_COMMAND == "--list") {
	echo "media\n";
	logEntry("FPPD List Registration request: responded: media");
	exit(0);
}

if($FPPD_COMMAND == "--type") {
	if($DEBUG) {
		logEntry("DEBUG: type callback requested");
	}
	//we got a register request message from the daemon
	$forkResult = fork($argv);
	if($DEBUG) {
		logEntry("DEBUG: Fork Result: ".$forkResult);
	}
	exit(0);
} else {
	logEntry($argv[0]." called with no parameteres");
	exit(0);
}
?>
