<!--	parent
notepad++ C:/xampp/htdocs/myserver/pattern.php
-->
<!--	children
notepad++ C:/xampp/htdocs/myserver/arr/atb_meas.php.php
-->

<?php
	include 'arr/atb_meas.php';
	
	$query11 = "SELECT `sr` FROM `meas` WHERE sr=$sr ";
	$result11 = mysqli_query($dbc, $query11) or die('<b>Error measurement_save.php/query11 : </b><br/>'.mysqli_error($dbc));
	$rowq11 = mysqli_fetch_array($result11);
	
	foreach ($atb_meas2 as $var) $$var = $_POST[$var];
	$measure_date = date("y-m-d");
	
	if (!isset($rowq11['sr'])) {
	$query_msv = 'INSERT INTO `meas` (sr,measure_date,'.$atb_meas2[0] .','.$atb_meas2[1] .','.$atb_meas2[2] .','.$atb_meas2[3] .','.$atb_meas2[4] .','.
		$atb_meas2[5] .','.$atb_meas2[6] .','.$atb_meas2[7] .','.$atb_meas2[8] .','.$atb_meas2[9] .','.$atb_meas2[10].','.$atb_meas2[11].','.$atb_meas2[12].','.
		$atb_meas2[13].','.$atb_meas2[14].','.$atb_meas2[15].','.$atb_meas2[16].','.$atb_meas2[17].','.$atb_meas2[18].','.$atb_meas2[19].','.$atb_meas2[20].','.
		$atb_meas2[21].','.$atb_meas2[22].','.$atb_meas2[23].') 
		VALUES ('.$sr.',"'.$measure_date   .'","'.${$atb_meas2[0]} .'","'.${$atb_meas2[1]} .'","'.${$atb_meas2[2]} .'","'.${$atb_meas2[3]} .'","'.
		${$atb_meas2[4]} .'","'.${$atb_meas2[5]} .'","'.${$atb_meas2[6]} .'","'.${$atb_meas2[7]} .'","'.${$atb_meas2[8]} .'","'.${$atb_meas2[9]} .'","'.
		${$atb_meas2[10]}.'","'.${$atb_meas2[11]}.'","'.${$atb_meas2[12]}.'","'.${$atb_meas2[13]}.'","'.${$atb_meas2[14]}.'","'.${$atb_meas2[15]}.'","'.
		${$atb_meas2[16]}.'","'.${$atb_meas2[17]}.'","'.${$atb_meas2[18]}.'","'.${$atb_meas2[19]}.'","'.${$atb_meas2[20]}.'","'.${$atb_meas2[21]}.'","'.
		${$atb_meas2[22]}.'","'.${$atb_meas2[23]}.'")';
	} else {
	$query_msv = 'UPDATE `meas` SET measure_date="'.$measure_date.'",'.$atb_meas2[0].'="'.${$atb_meas2[0]}.'",'.
		$atb_meas2[1] .'="'.${$atb_meas2[1]} .'",'.$atb_meas2[2] .'="'.${$atb_meas2[2]} .'",'.$atb_meas2[3] .'="'.${$atb_meas2[3]} .'",'.
		$atb_meas2[4] .'="'.${$atb_meas2[4]} .'",'.$atb_meas2[5] .'="'.${$atb_meas2[5]} .'",'.$atb_meas2[6] .'="'.${$atb_meas2[6]} .'",'.
		$atb_meas2[7] .'="'.${$atb_meas2[7]} .'",'.$atb_meas2[8] .'="'.${$atb_meas2[8]} .'",'.$atb_meas2[9] .'="'.${$atb_meas2[9]} .'",'.
		$atb_meas2[10].'="'.${$atb_meas2[10]}.'",'.$atb_meas2[11].'="'.${$atb_meas2[11]}.'",'.$atb_meas2[12].'="'.${$atb_meas2[12]}.'",'.
		$atb_meas2[13].'="'.${$atb_meas2[13]}.'",'.$atb_meas2[14].'="'.${$atb_meas2[14]}.'",'.$atb_meas2[15].'="'.${$atb_meas2[15]}.'",'.
		$atb_meas2[16].'="'.${$atb_meas2[16]}.'",'.$atb_meas2[17].'="'.${$atb_meas2[17]}.'",'.$atb_meas2[18].'="'.${$atb_meas2[18]}.'",'.
		$atb_meas2[19].'="'.${$atb_meas2[19]}.'",'.$atb_meas2[20].'="'.${$atb_meas2[20]}.'",'.$atb_meas2[21].'="'.${$atb_meas2[21]}.'",'.
		$atb_meas2[22].'="'.${$atb_meas2[22]}.'",'.$atb_meas2[23].'="'.${$atb_meas2[23]}.'" WHERE sr='.$sr;
	} $result_msv = mysqli_query($dbc, $query_msv) or die('<b>Error query_msv : </b>'.mysqli_error($dbc));
	
?>