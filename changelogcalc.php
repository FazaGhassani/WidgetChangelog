<?php
	
	$var_deviceid = $_POST['deviceid'];
	$var_telemetry = $_POST['telemetry'];
	$var_date1 = $_POST['date1'];
	$var_date2 = $_POST['date2'];
	$var_time1 = $_POST['time1'];
	$var_time2 = $_POST['time2'];
	$var_startdate = $var_date1.'T'.$var_time1;
	$var_endate = $var_date2.'T'.$var_time2;
	$var_arrtel = '[';

	$i=0;
	$len = count($var_telemetry);
	foreach ($var_telemetry as $key) {
		if($i == $len - 1){
			$var_arrtel .= $key.']';
		}else{
			$var_arrtel .= $key.',';
		}
		$i++;
	}

	$var_arrtel = preg_replace('/\s/', '', $var_arrtel);
	$startdate = (strtotime($var_startdate)*1000)-21600000;
	$endate = (strtotime($var_endate)*1000)-21600000;

	#echo $var_deviceid;
	#echo '<br/>';
	#echo $var_arrtel;
	#echo '<br/>';
	#echo $startdate;
	#echo '<br/>';
	#echo $endate;
	#echo '<br/>';

	$command = escapeshellcmd('python telemetryController.py --mode exportLog --entity_type DEVICE --entity_id '.$var_deviceid.' --keyList '.$var_arrtel.' --startTs '.$startdate.' --endTs '.$endate.' --interval 1200 --isTelemetry 1 --limit 500 --agg AVG --format XLSX');
	echo $command;
	$output = shell_exec($command);
	echo $output;

	$file = 'C:\xampp\htdocs\scripts\ExportResult\DataLog_'.date("Y-m-d", substr($startdate, 0, 10)).'_sd_'.date("Y-m-d", substr($endate, 0, 10)).'.xlsx';
	if(file_exists($file)){
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    	header('Pragma: public');
    	ob_clean();
    	flush(); 
		readfile($file);
		exit;
	}

	#echo $var_deviceid;
	#echo '<br/>';
	#echo strtotime($var_startdate)*1000; //change datenow into unix timestamp
	#echo '<br/>';
	#echo date("Y-m-d H:i:s", substr(strtotime($var_startdate)*1000, 0, 10));
	#echo '<br/>';
	#echo strtotime($var_endate)*1000;
	#echo '<br/>';
	#echo date("Y-m-d H:i:s", substr(strtotime($var_endate)*1000, 0, 10));
	#echo '<br/>';
	#foreach($var_telemetry as $selectedOption)
    # 	echo $selectedOption."\n";
?>