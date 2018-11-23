<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<script type="text/javascript">
		function showHint(str) {
    		if (str.length == 0) { 
        		document.getElementById("txtHint").innerHTML = "";
        		return;
    		} else {
        		var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
            		if (this.readyState == 4 && this.status == 200) {
                		document.getElementById("txtHint").innerHTML = this.responseText;
            		}
        		};
        		xmlhttp.open("GET", "getvar.php?q=" + str, true);
        		xmlhttp.send();
    		}
		}
	</script>
</head>
<body>

	<form action="changelogcalc.php" method="POST">
		<fieldset>
			<legend>CHANGELOG</legend>
			<label for="DeviceId"> Device ID: </label>
			<input type="text" name="deviceid" onkeyup="showHint(this.value)">
		</br></br>
		<div>			
			<label for ="StartDate"> Start Date:</label>
			<input type="date" name="date1">
			<input type="time" name="time1">
		</div>
		<div>
			<label for="EndDate">End Date: </label>
			<input type="date" name="date2">
			<input type="time" name="time2">
		</div>
		<div id="txtHint"></div>
		<input type="submit" value="Export" class="B_Export">
		</fieldset>
	</form>
</body>
</html>