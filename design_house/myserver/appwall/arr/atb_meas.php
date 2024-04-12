<?php
	$atb_meas_sr = array('sr');
	$atb_meas_measdate = array('measure_date');
	
	$atb_meas2 = array('neck', 'delt', 'biceps', 'forearm', 
		'chest', 'stomach', 'waist', 'seat', 
		'thigh', 'lower_thigh', 'calf', 'ankle', 
		'shoulder_ln', 'arm_ln', 'pec', 'lat', 
		'half_delt', 'chest_ln', 'stomach_ln', 'seat_ln', 
		'knee_ln', 'lower_thigh_ln', 'calf_ln', 'ground_ln');
		
	$atb_meas1 = array_merge($atb_meas_sr, $atb_meas2);
	$atb_meas = array_merge($atb_meas_sr, $atb_meas_measdate, $atb_meas2);
?>