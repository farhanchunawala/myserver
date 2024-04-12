<?php
	($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
	
	include $atb_meas_php;
	
	$qrys_meas = "SELECT * FROM meas WHERE sr=$sr ";
	$res_meas  = mysqli_query($dbc, $qrys_meas) or die('<b>Error dim/dim_meas.php/qrys_meas : </b><br/>'.mysqli_error($dbc));
	$rq_meas   = mysqli_fetch_array($res_meas);
	foreach ($atb_meas2 as $var) $$var = $rq_meas[$var];
	
?>