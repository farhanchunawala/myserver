<?php
	echo '<path d = "	  M'.	scale($x_sh_m).','.					scale($y_sh_m);
	
	switch ($vertex) {
		
		case 'A':	echo 'l'.	scale($x_sh_length - $x_sh_rounding).','.				-scale($y_sh_collarln);
		case 'B':	echo 'a		11,11 0,0,0 '.						scale($x_sh_rounding).','.	scale($y_sh_rounding);
		case 'C':	echo 'v'.	scale($y_sh_height - $y_sh_rounding);
		case 'D':	echo 'h'.	-scale($x_sh_length);
		case 'E':	echo 'v'.	-scale($y_sh_height - $y_sh_collarln);																if ($vertex=='A') break;
		
		case 'A':	echo 'l'.	scale($x_sh_length - $x_sh_rounding).','.				-scale($y_sh_collarln);									if ($vertex=='B') break;
		case 'B':	echo 'a		11,11 0,0,0 '.						scale($x_sh_rounding).','.	scale($y_sh_rounding);		if ($vertex=='C') break;
		case 'C':	echo 'v'.	scale($y_sh_height - $y_sh_rounding);																if ($vertex=='D') break;
		case 'D':	echo 'h'.	-scale($x_sh_length);																		if ($vertex=='E') break;
		
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($sh_rotate ".scale($x_sh_m).','.scale($y_sh_m).')" />';
	
?>
	