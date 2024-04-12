<?php
	
	if ($garb_type=='shirt') {
		if ($garb_style=='oshirt')	$x_sf_length = $length + 1.125;
		else 						$x_sf_length = $length + 0.75 + 1.25;
	} else {						$x_sf_length = $length + 0.75 + 0.75;	}
	$y_sf_frontpatti = ($garb_type=='shirt') ? '2' : '0';
	$y_sf_collarln = 2.25 + $y_sf_frontpatti;
	
	$x_sf_slope = 2;
	if ($garb_type=='shirt') $y_sf_shoulder = shouldertrim($shoulder) / 2 + 0.5 + $y_sf_frontpatti;
	else $y_sf_shoulder = shouldertrim($shoulder) / 2 + $y_sf_frontpatti;
	$y_sf_shoulder_m_collar = $y_sf_shoulder - $y_sf_collarln;
	
	$x_sf_hala = $hala;
	$x_sf_hala_m_slope = $x_sf_hala - $x_sf_slope;
	$y_sf_t1 = $t1 + $y_sf_frontpatti;
	$y_sf_t1_m_shoulder = $y_sf_t1 - $y_sf_shoulder;
	$x_sf_halaline = $x_sf_hala_m_slope - $y_sf_t1_m_shoulder;
	
	$x_sf_stomachln = $shoulder;
	$x_sf_stomach_m_hala = $x_sf_stomachln - $x_sf_hala;
	$y_sf_t2 = $t2 + $y_sf_frontpatti;
	$y_sf_t2_m_t1 = $y_sf_t2 - $y_sf_t1;
	
	$x_sf_length_m_stomach = $x_sf_length - $x_sf_stomachln;
	$y_sf_t3 = $t3 + $y_sf_frontpatti;
	$y_sf_t3_m_t2 = $y_sf_t3 - $y_sf_t2;
	
?>