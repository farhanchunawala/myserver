<?php
	$query11 = "SELECT `sr` FROM `meas` WHERE sr=$sr ";
	$result11 = mysqli_query($dbc, $query11) or die('<b>Error measurement_save.php/query11 : </b><br/>'.mysqli_error($dbc));
	$rowq11 = mysqli_fetch_array($result11);
	
	include $atb_meas_php;
	foreach ($$arr as $var) $$var = $_POST[$var];
	
	$table = 'meas';
	$qry = 'msv';
	$whr = "sr=$sr";
	$ec = count($$arr);
	if (!isset($rowq11['sr']))	include $query_insert_php;
	else								include $query_update_php;
?>