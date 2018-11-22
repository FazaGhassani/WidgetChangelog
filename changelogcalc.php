<?php
	#linux
	$var_deviceid = $_POST['deviceid'];
	$var_telemetry = $_POST['telemetry'];
	$var_startdate = $_POST['startdate'];
	$var_endate = $_POST['endate'];
	$var_arrtel = '';

	$i=0;
	$len = count($var_telemetry);
	foreach ($var_telemetry as $key) {
		if($i == $len - 1){
			$var_arrtel .= $key;
		}else{
			$var_arrtel .= $key.',';
		}
		$i++;
	}

	$var_arrtel = preg_replace('/\s/', '', $var_arrtel);
	$startdate = (strtotime($var_startdate)*1000)-21600000;
	$endate = (strtotime($var_endate)*1000)-21600000;

	$command = escapeshellcmd('python3.6 telemetryController2.py --mode exportLog --entity_type DEVICE --entity_id '.$var_deviceid.' --keyList '.$var_arrtel.' --startTs '.$startdate.' --endTs '.$endate.' --interval 1200 --isTelemetry 1 --limit 500 --agg AVG --format XLSX');
	#$output = shell_exec($command);
	echo $command;

	#jangan lupa ganti dir nya buat download file (local sama yang di vm beda)
	#$file = '35.202.49.101\ExportResult\DataLog_'.date("Y-m-d", substr($startdate, 0, 10)).'_sd_'.date("Y-m-d", substr($endate, 0, 10)).'.xlsx';

	#if(file_exists($file)){
	#	header('Content-Type: application/octet-stream');
	#	header("Content-Transfer-Encoding: Binary"); 
	#	header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
	#	header('Expires: 0');
	#	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    #	header('Pragma: public');
    #	ob_clean();
    #	flush(); 
	#	readfile($file);
	#	exit;
	#}

?>