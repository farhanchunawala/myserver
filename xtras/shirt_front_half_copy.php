<?php
	echo '<path d = "	  M'.scale($x_sf_m).','.					scale($y_sf_m);
	
	switch ($vertex) {
		
		case 'A':	echo 'l'.	scale($x_sf_length_m_stomach).','.	scale($y_sf_t3_m_t2);
		case 'B':	echo 'l'.	scale($x_sf_stomach_m_hala).','.	scale($y_sf_t2_m_t1);
		case 'C':	echo 'a		75,75 0,0,0 '.						scale($y_sf_t1_m_shoulder).','.	scale($y_sf_t1_m_shoulder);
		case 'D':	echo 'h'.	scale($x_sf_halaline);
		case 'E':	echo 'l'.	scale($x_sf_slope).','.				scale($y_sf_shoulder_m_collar);
		case 'F':	echo 'v'.	scale($y_sf_collarln);
		case 'G':	echo 'h'.	-scale($x_sf_length);
		case 'H':	echo 'v'.	-scale($y_sf_t3);																					if ($vertex=='A') break;
		
		case 'A':	echo 'l'.	scale($x_sf_length_m_stomach).','.	scale($y_sf_t3_m_t2);											if ($vertex=='B') break;
		case 'B':	echo 'l'.	scale($x_sf_stomach_m_hala).','.	scale($y_sf_t2_m_t1);											if ($vertex=='C') break;
		case 'C':	echo 'a		75,75 0,0,0 '.						scale($y_sf_t1_m_shoulder).','.	scale($y_sf_t1_m_shoulder);		if ($vertex=='D') break;
		case 'D':	echo 'h'.	scale($x_sf_halaline);																				if ($vertex=='E') break;
		case 'E':	echo 'l'.	scale($x_sf_slope).','.				scale($y_sf_shoulder_m_collar);									if ($vertex=='F') break;
		case 'F':	echo 'v'.	scale($y_sf_collarln);																				if ($vertex=='G') break;
		case 'G':	echo 'h'.	-scale($x_sf_length);																				if ($vertex=='H') break;
		
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($sf_rotate ".scale($x_sf_m).','.scale($y_sf_m).')" />';
	
?>

<!--
<?php
	
	{	$dim_name = 'Slope';				//	x_sf_slope
		$dim_size = '13px';
		$arrow_xm = scale($xm + $x_sf_length_m_stomach + $x_sf_stomach_m_hala + $y_sf_t1_m_shoulder + $x_sf_halaline);
		$arrow_ym = scale($ym);
		$arrow_ln = scale($x_sf_slope);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Hala Line';			//	x_sf_halaline
		$dim_size = '15px';
		$arrow_xm = scale($xm + $x_sf_length_m_stomach + $x_sf_stomach_m_hala + $y_sf_t1_m_shoulder);
		$arrow_ym = scale($ym);
		$arrow_ln = scale($x_sf_halaline);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Hala Rounding';		//	y_sf_t1_m_shoulder
		$dim_size = '11px';
		$arrow_xm = scale($xm + $x_sf_length_m_stomach + $x_sf_stomach_m_hala);
		$arrow_ym = scale($ym);
		$arrow_ln = scale($y_sf_t1_m_shoulder);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Stomach - Hala';		//	x_sf_stomach_m_hala
		$dim_size = '15px';
		$arrow_xm = scale($xm + $x_sf_length_m_stomach);
		$arrow_ym = scale($ym);
		$arrow_ln = scale($x_sf_stomach_m_hala);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Length - Stomach';		//	x_sf_length_m_stomach
		$dim_size = '15px';
		$arrow_xm = scale($xm);
		$arrow_ym = scale($ym);
		$arrow_ln = scale($x_sf_length_m_stomach);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Length';				//	x_sf_length
		$dim_size = '15px';
		$arrow_xm = scale($xm);
		$arrow_ym = scale($ym + $y_sf_t3);
		$arrow_ln = scale($x_sf_length);
		$extl = 0;
		$extr = 0;
		$arrow_level = 1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	
	{	$dim_name = 'T1 - Shoulder';		//	y_sf_t1_m_shoulder
		$dim_size = '11px';
		$arrow_xm = scale($xm + $x_sf_length);
		$arrow_ym = scale($ym + $y_sf_t3 - $y_sf_collarln - $y_sf_shoulder_m_collar - $y_sf_t1_m_shoulder);
		$arrow_ln = scale($y_sf_t1_m_shoulder);
		$extl = scale($x_sf_slope);
		$extr = 0;
		$arrow_level = -2;
		$arrow_rotate = 90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Shoulder - Collar';	//	y_sf_shoulder_m_collar
		$dim_size = '15px';
		$arrow_xm = scale($xm + $x_sf_length);
		$arrow_ym = scale($ym + $y_sf_t3 - $y_sf_collarln - $y_sf_shoulder_m_collar);
		$arrow_ln = scale($y_sf_shoulder_m_collar);
		$extl = scale($x_sf_slope);
		$extr = 0;
		$arrow_level = -2;
		$arrow_rotate = 90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Collar ln';			//	y_sf_collarln
		$dim_size = '15px';
		$arrow_xm = scale($xm + $x_sf_length);
		$arrow_ym = scale($ym + $y_sf_t3 - $y_sf_collarln);
		$arrow_ln = scale($y_sf_collarln);
		$extl = 0;
		$extr = 0;
		$arrow_level = -2;
		$arrow_rotate = 90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Front patti';			//	y_sf_frontpatti
		$dim_size = '9px';
		$arrow_xm = scale($xm + $x_sf_length);
		$arrow_ym = scale($ym + $y_sf_t3 - $y_sf_frontpatti);
		$arrow_ln = scale($y_sf_frontpatti);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'T1';					//	y_sf_t1
		$dim_size = '15px';
		$arrow_xm = scale($xm);
		$arrow_ym = scale($ym + $y_sf_t3);
		$arrow_ln = scale($y_sf_t1);
		$extl = scale($x_sf_stomach_m_hala + $x_sf_length_m_stomach);
		$extr = scale($x_sf_stomach_m_hala + $x_sf_length_m_stomach);
		$arrow_level = -1;
		$arrow_rotate = -90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'T2';					//	y_sf_t2
		$dim_size = '15px';
		$arrow_xm = scale($xm);
		$arrow_ym = scale($ym + $y_sf_t3);
		$arrow_ln = scale($y_sf_t2);
		$extl = scale($x_sf_length_m_stomach);
		$extr = scale($x_sf_length_m_stomach);
		$arrow_level = -2;
		$arrow_rotate = -90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'T3';					//	y_sf_t3
		$dim_size = '15px';
		$arrow_xm = scale($xm);
		$arrow_ym = scale($ym + $y_sf_t3);
		$arrow_ln = scale($y_sf_t3);
		$extl = 0;
		$extr = 0;
		$arrow_level = -3;
		$arrow_rotate = -90;
		include 'dimension/dimension_arrow.php';
	}
	
?>
-->
