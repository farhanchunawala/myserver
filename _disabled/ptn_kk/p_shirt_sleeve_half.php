<?php
	echo '<path d = "	  M'.		scale($x_ss_m).','.		scale($y_ss_m);
	
	switch ($vertex) {
		
		case 'A':	echo 'l'.		scale($x_ss_length - $x_ss_hala).','.		-scale($y_ss_hala - $y_ss_cuff);
		case 'B':	echo 'a			75,75 0,0,1 '.				scale($x_ss_hala).','.		scale($y_ss_hala);
		case 'C':	echo 'h'.		-scale($x_ss_length);
		case 'D':	echo 'l 0,'.	-scale($y_ss_cuff);																	if ($vertex=='A') break;
		
		case 'A':	echo 'l'.		scale($x_ss_length - $x_ss_hala).','.		-scale($y_ss_hala - $y_ss_cuff);										if ($vertex=='B') break;
		case 'B':	echo 'a			75,75 0,0,0 '.				scale($x_ss_hala).','.		scale($y_ss_hala);			if ($vertex=='C') break;
		case 'C':	echo 'h'.		-scale($x_ss_length);																if ($vertex=='D') break;
		
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($ss_rotate ".scale($x_ss_m).','.scale($y_ss_m).')" />';
	
?>