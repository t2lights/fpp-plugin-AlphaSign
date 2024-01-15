<?php

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

?>

