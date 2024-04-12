<?php
	echo '<path d = "	  M'.	scale($x_ss_m).','.		scale($y_ss_m);
	
	switch ($vertex) {
		
		case 'A':	echo 'l'.	scale($x_ss_edge).','.	-scale($y_ss_edge);
		case 'B':	echo 'a		75,75 0,0,1 '.			 scale($x_ss_hala).','.		scale($y_ss_hala);
		case 'C':	echo 'a		75,75 0,0,1 '.			-scale($x_ss_hala).','.		scale($y_ss_hala);
		case 'D':	echo 'l'.	-scale($x_ss_edge).','.	-scale($y_ss_edge);
		case 'E':	echo 'l		0,'.					-scale($y_ss_cuff);
		case 'F':	echo 'l		0,'.					-scale($y_ss_cuff);										if ($vertex=='A') break;
		
		case 'A':	echo 'l'.	scale($x_ss_edge).','.	-scale($y_ss_edge);										if ($vertex=='B') break;
		case 'B':	echo 'a		75,75 0,0,1 '.			 scale($x_ss_hala).','.		scale($y_ss_hala);			if ($vertex=='C') break;
		case 'C':	echo 'a		75,75 0,0,1 '.			-scale($x_ss_hala).','.		scale($y_ss_hala);			if ($vertex=='D') break;
		case 'D':	echo 'l'.	-scale($x_ss_edge).','.	-scale($y_ss_edge);										if ($vertex=='E') break;
		case 'E':	echo 'l		0,'.					-scale($y_ss_cuff);										if ($vertex=='F') break;
		
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($ss_rotate ".scale($x_ss_m).','.scale($y_ss_m).')" />';
	
?>