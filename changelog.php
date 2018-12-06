<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

	<form action="changelogcalc.php" method="POST">
		<fieldset>
			<legend>CHANGELOG</legend>
			<label for="DeviceId"> Device ID: </label>
			<!-- <input type="text" name="deviceid" onkeyup="showHint(this.value)"> -->
			<?php include('jsontest.php'); ?>
		</br></br>
		<div id="txtHint"></div>
		</br>
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
		<br/>
		<div>
			<label for="Mode">Mode: </label>
			<select name="mode">
				<option value="NONE">None</option>
				<option value="MIN">Min</option>
				<option value="MAX">Max</option>
				<option value="AVG">Average</option>
				<option value="SUM">Sum</option>
				<option value="COUNT">Count</option>
			</select>
		</div>
		<br/>
		<div>
			<label for="Interval">Interval (minute): </label>
			<input type="number" min="0" max="100" name="interval">
		</div>
		<br/>
		<div class="buttons">
			<input type="submit" name="Export" value="XLSX" class="B_Export">
			<input type="submit" name="Export" value="CSV" class="B_Export">
		</div>
		</fieldset>
	</form>
	
</body>
</html>