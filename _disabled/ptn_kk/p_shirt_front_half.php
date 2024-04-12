<?php
	echo '<path d = "	  M'.scale($x_sf_m).','.					scale($y_sf_m);
	
	switch ($vertex) {
		
		case 'A':	echo 'l'.	scale($x_sf_length - $x_sf_stomachln).','.	scale($y_sf_seat - $y_sf_stomach);
		case 'B':	echo 'l'.	scale($x_sf_stomachln - $x_sf_chestln).','.	scale($y_sf_stomach - $y_sf_chest);
		case 'C':	echo 'a		75,75 0,0,0 '.						scale($y_sf_chest - $y_sf_shoulder).','.	scale($y_sf_chest - $y_sf_shoulder);
		case 'D':	echo 'h'.	scale($x_sf_halaline);
		case 'E':	echo 'l'.	scale($x_sf_collarln).','.				scale($y_sf_shoulder - $y_sf_neck);
		case 'F':	echo 'v'.	scale($y_sf_neck + $y_sf_frontpatti);
		case 'G':	echo 'h'.	-scale($x_sf_length);
		case 'H':	echo 'v'.	-scale($y_sf_seat + $y_sf_frontpatti);																					if ($vertex=='A') break;
		
		case 'A':	echo 'l'.	scale($x_sf_length - $x_sf_stomachln).','.	scale($y_sf_seat - $y_sf_stomach);						if ($vertex=='B') break;
		case 'B':	echo 'l'.	scale($x_sf_stomachln - $x_sf_chestln).','.	scale($y_sf_stomach - $y_sf_chest);								if ($vertex=='C') break;
		case 'C':	echo 'a		75,75 0,0,0 '.						scale($y_sf_chest - $y_sf_shoulder).','.	scale($y_sf_chest - $y_sf_shoulder);		if ($vertex=='D') break;
		case 'D':	echo 'h'.	scale($x_sf_halaline);																				if ($vertex=='E') break;
		case 'E':	echo 'l'.	scale($x_sf_collarln).','.				scale($y_sf_shoulder - $y_sf_neck);									if ($vertex=='F') break;
		case 'F':	echo 'v'.	scale($y_sf_neck + $y_sf_frontpatti);																				if ($vertex=='G') break;
		case 'G':	echo 'h'.	-scale($x_sf_length);																				if ($vertex=='H') break;
		
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($sf_rotate ".scale($x_sf_m).','.scale($y_sf_m).')" />';
	
?>

<!--
<?php
	
	{	$dim_name = 'Slope';				//	x_sf_collarln
		$dim_size = '13px';
		$arrow_xm = scale($xm + $x_sf_length - $x_sf_stomachln + ($x_sf_stomachln - $x_sf_chestln) + ($y_sf_chest - $y_sf_shoulder) + $x_sf_halaline);
		$arrow_ym = scale($ym);
		$arrow_ln = scale($x_sf_collarln);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Hala Line';			//	x_sf_halaline
		$dim_size = '15px';
		$arrow_xm = scale($xm + $x_sf_length - $x_sf_stomachln + ($x_sf_stomachln - $x_sf_chestln) + ($y_sf_chest - $y_sf_shoulder));
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
		$arrow_xm = scale($xm + $x_sf_length - $x_sf_stomachln + ($x_sf_stomachln - $x_sf_chestln));
		$arrow_ym = scale($ym);
		$arrow_ln = scale($y_sf_chest - $y_sf_shoulder);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Stomach - Hala';		//	x_sf_stomachln - x_sf_chestln
		$dim_size = '15px';
		$arrow_xm = scale($xm + $x_sf_length - $x_sf_stomachln);
		$arrow_ym = scale($ym);
		$arrow_ln = scale($x_sf_stomachln - $x_sf_chestln);
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
		$arrow_ln = scale($x_sf_length - $x_sf_stomachln);
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Length';				//	x_sf_length
		$dim_size = '15px';
		$arrow_xm = scale($xm);
		$arrow_ym = scale($ym + $y_sf_seat);
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
		$arrow_ym = scale($ym + $y_sf_seat - $y_sf_neck - ($y_sf_shoulder - $y_sf_neck) - ($y_sf_chest - $y_sf_shoulder));
		$arrow_ln = scale($y_sf_chest - $y_sf_shoulder);
		$extl = scale($x_sf_collarln);
		$extr = 0;
		$arrow_level = -2;
		$arrow_rotate = 90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Shoulder - Collar';	//	y_sf_shoulder_m_collar
		$dim_size = '15px';
		$arrow_xm = scale($xm + $x_sf_length);
		$arrow_ym = scale($ym + $y_sf_seat - $y_sf_neck - ($y_sf_shoulder - $y_sf_neck));
		$arrow_ln = scale($y_sf_shoulder - $y_sf_neck);
		$extl = scale($x_sf_collarln);
		$extr = 0;
		$arrow_level = -2;
		$arrow_rotate = 90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Collar ln';			//	y_sf_collarln
		$dim_size = '15px';
		$arrow_xm = scale($xm + $x_sf_length);
		$arrow_ym = scale($ym + $y_sf_seat - $y_sf_neck);
		$arrow_ln = scale($y_sf_neck);
		$extl = 0;
		$extr = 0;
		$arrow_level = -2;
		$arrow_rotate = 90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'Front patti';			//	y_sf_frontpatti
		$dim_size = '9px';
		$arrow_xm = scale($xm + $x_sf_length);
		$arrow_ym = scale($ym + $y_sf_seat - $y_sf_frontpatti);
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
		$arrow_ym = scale($ym + $y_sf_seat);
		$arrow_ln = scale($y_sf_chest);
		$extl = scale(($x_sf_stomachln - $x_sf_chestln) + $x_sf_length - $x_sf_stomachln);
		$extr = scale(($x_sf_stomachln - $x_sf_chestln) + $x_sf_length - $x_sf_stomachln);
		$arrow_level = -1;
		$arrow_rotate = -90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'T2';					//	y_sf_t2
		$dim_size = '15px';
		$arrow_xm = scale($xm);
		$arrow_ym = scale($ym + $y_sf_seat);
		$arrow_ln = scale($y_sf_stomach);
		$extl = scale($x_sf_length - $x_sf_stomachln);
		$extr = scale($x_sf_length - $x_sf_stomachln);
		$arrow_level = -2;
		$arrow_rotate = -90;
		include 'dimension/dimension_arrow.php';
	}
	{	$dim_name = 'T3';					//	y_sf_t3
		$dim_size = '15px';
		$arrow_xm = scale($xm);
		$arrow_ym = scale($ym + $y_sf_seat);
		$arrow_ln = scale($y_sf_seat);
		$extl = 0;
		$extr = 0;
		$arrow_level = -3;
		$arrow_rotate = -90;
		include 'dimension/dimension_arrow.php';
	}
	
?>
-->
