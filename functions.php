<?php

function logEntry($data) {
	global $logFile,$myPid;
	$data = $_SERVER['PHP_SELF']." : [".$myPid."] ".$data;
	$logWrite= fopen($logFile, "a") or die("Unable to open file!");
	fwrite($logWrite, date('Y-m-d h:i:s A',time()).": ".$data."\n");
	fclose($logWrite);
}

?>

