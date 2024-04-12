<?php
	echo '<path d = "	  M'.	scale($x_pf_m).','.					scale($y_pf_m + $y_pf_wtdf);
	
	switch ($vertex) {
		
		case 'A':	echo 'a		500,500 0,0,1 '.						scale($x_pf_fork).','.			-scale($y_pf_wtdf);
		case 'B':	echo 'a		5000,5000 0,0,0 '.						scale($x_pf_thigh_calf).','.	scale($y_pf_tcdf);
		case 'C':	echo 'l'.	scale($x_pf_calf_bottom).','.			scale($y_pf_cbdf);
		case 'D':	echo 'l'.	scale($x_pf_bottomfd).','.				-scale($y_pf_btm);
		case 'E':	echo 'v'.	scale($y_pf_bottomfd);
		case 'F':	echo 'l'.	-scale($x_pf_bottomfd).','.				-scale($y_pf_btm);
		case 'G':	echo 'l'.	-scale($x_pf_calf_bottom).','.			scale($y_pf_cbdf);
		case 'H':	echo 'a		5000,5000 0,0,0 '.						-scale($x_pf_thigh_calf).','.	scale($y_pf_tcdf);
		case 'I':	echo 'a		75,75 0,0,0 '.							-scale($y_pf_fly).','.			-scale($y_pf_fly);
		case 'J':	echo 'l'.	-scale($x_pf_fork - $y_pf_fly).','.		-scale($y_pf_flyslope);
		case 'K':	echo 'v'.	-scale($y_pf_waist);
		
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($sf_rotate ".scale($x_sf_m).','.scale($y_sf_m).')" />';
	
?>
	
	<!--<path d=" M 100,100
	a 500,500 0,0,1 250,-20
	a 5000,5000 0,0,0 400,35
	l 400,10
	l 100,-10
	v 300
	l -100,-10
	l -400,10
	a 5000,5000 0,0,0 -400,35
	a 75,75 0,0,0 -50,-50
	l -200,-5
	v -295
	" fill=lightblue opacity=0.6 transform="rotate(0 1250,415)" />-->
	