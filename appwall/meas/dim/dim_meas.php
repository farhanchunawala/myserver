<?php
	($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
	
	include $atb_meas_php;
	
	$qrys_meas = "SELECT * FROM meas WHERE sr=$sr ";
	$res_meas  = mysqli_query($dbc, $qrys_meas) or die('<b>Error dim/dim_meas.php/qrys_meas : </b><br/>'.mysqli_error($dbc));
	$rq_meas   = mysqli_fetch_array($res_meas);
	foreach ($atb_meas2 as $var) $$var = $rq_meas[$var];
	$measure_date = strtotime($rq_meas['measure_date']);
	
	/*$a_styleshirt = array('bshirt', 'bshirtsc', 'round');
	$a_stylekurta = array('bshirt', 'bshirtsc', 'round');
	$a_stylekandura = array('bshirt', 'bshirtsc', 'round');
	$a_stylepant = array('l', 'ln', 'b');
	$a_stylepyjama = array('l', 'ln', 'b');
	$a_stylesalwar = array('l', 'ln', 'b');
	$a_stylealigard = array('l', 'ln', 'b');
	$a_stylechuridar = array('l', 'ln', 'b');*/
	
	//$count = $rowq2['garb_count'];
	//$garb_style = $rowq2['garb_style'];
	
	//foreach (${'a_style'.$garb_type} as $var) ($garb_style=="$var") ? ${'s_garb_style_'.$var}="selected" :  ${'s_garb_style_'.$var}="";
	
?>