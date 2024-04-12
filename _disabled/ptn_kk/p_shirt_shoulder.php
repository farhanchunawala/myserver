<?php
	echo '<path d = "	  M'.	scale($x_sh_m).','.				 scale($y_sh_m);
	
	switch ($vertex) {
		
		case 'A':	echo 'l'.	scale($x_sh_slope).','.			-scale($y_sh_slope);
		case 'B':	echo 'a		11,11 0,0,0 '.					 scale($x_sh_rounding).','.		scale($y_sh_rounding);
		case 'C':	echo 'a		11,11 0,0,0 '.					 scale($x_sh_rounding).','.		-scale($y_sh_rounding);
		case 'D':	echo 'l'.	 scale($x_sh_slope).','.		 scale($y_sh_slope);
		case 'E':	echo 'v'.	 scale($y_sh_height_m_slope);
		case 'F':	echo 'h'.	-scale($x_sh_length);
		case 'G':	echo 'h'.	-scale($x_sh_length);
		case 'H':	echo 'v'.	-scale($y_sh_height_m_slope);																if ($vertex=='A') break;
		
		case 'A':	echo 'l'.	scale($x_sh_slope).','.			-scale($y_sh_slope);										if ($vertex=='B') break;
		case 'B':	echo 'a		11,11 0,0,0 '.					 scale($x_sh_rounding).','.		scale($y_sh_rounding);		if ($vertex=='C') break;
		case 'C':	echo 'a		11,11 0,0,0 '.					 scale($x_sh_rounding).','.		-scale($y_sh_rounding);		if ($vertex=='D') break;
		case 'D':	echo 'l'.	scale($x_sh_slope).','.			 scale($y_sh_slope);										if ($vertex=='E') break;
		case 'E':	echo 'v'.	scale($y_sh_height_m_slope);																if ($vertex=='F') break;
		case 'F':	echo 'h'.	-scale($x_sh_length);																		if ($vertex=='G') break;
		case 'G':	echo 'h'.	-scale($x_sh_length);																		if ($vertex=='H') break;
		
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($sh_rotate ".scale($x_sh_m).','.scale($y_sh_m).')" />';
	
?>