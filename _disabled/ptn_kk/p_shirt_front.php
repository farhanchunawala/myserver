<?php
	echo '<path d = "	  M'.	scale($x_sf_m).','.					scale($y_sf_m);
	
	switch ($vertex) {
		
		case 'A':	echo 'l'.	scale($x_sf_length_m_stomach).','.	scale($y_sf_t3_m_t2);
		case 'B':	echo 'l'.	scale($x_sf_stomach_m_hala).','.	scale($y_sf_t2_m_t1);
		case 'C':	echo 'a		30,30 0,0,0 '.						scale($y_sf_t1_m_shoulder).','.		scale($y_sf_t1_m_shoulder);
		case 'D':	echo 'h'.	scale($x_sf_halaline);
		case 'E':	echo 'l'.	scale($x_sf_slope).','.				scale($y_sf_shoulder_m_collar);
		case 'F':	echo 'v'.	scale($y_sf_collarln);
		case 'G':	echo 'v'.	scale($y_sf_collarln);
		case 'H':	echo 'l'.	-scale($x_sf_slope).','.			scale($y_sf_shoulder_m_collar);
		case 'I':	echo 'h'.	-scale($x_sf_halaline);
		case 'J':	echo 'a		30,30 0,0,0 '.						-scale($y_sf_t1_m_shoulder).','.	scale($y_sf_t1_m_shoulder);
		case 'K':	echo 'l'.	-scale($x_sf_stomach_m_hala).','.	scale($y_sf_t2_m_t1);
		case 'L':	echo 'l'.	-scale($x_sf_length_m_stomach).','.	scale($y_sf_t3_m_t2);
		case 'M':	echo 'v'.	-scale($y_sf_t3);
		case 'N':	echo 'v'.	-scale($y_sf_t3);																						if ($vertex=='A') break;
		
		case 'A':	echo 'l'.	scale($x_sf_length_m_stomach).','.	scale($y_sf_t3_m_t2);												if ($vertex=='B') break;
		case 'B':	echo 'l'.	scale($x_sf_stomach_m_hala).','.	scale($y_sf_t2_m_t1);												if ($vertex=='C') break;
		case 'C':	echo 'a		30,30 0,0,0 '.						scale($y_sf_t1_m_shoulder).','.		scale($y_sf_t1_m_shoulder);		if ($vertex=='D') break;
		case 'D':	echo 'h'.	scale($x_sf_halaline);																					if ($vertex=='E') break;
		case 'E':	echo 'l'.	scale($x_sf_slope).','.				scale($y_sf_shoulder_m_collar);										if ($vertex=='F') break;
		case 'F':	echo 'v'.	scale($y_sf_collarln);																					if ($vertex=='G') break;
		case 'G':	echo 'v'.	scale($y_sf_collarln);																					if ($vertex=='H') break;
		case 'H':	echo 'l'.	-scale($x_sf_slope).','.			scale($y_sf_shoulder_m_collar);										if ($vertex=='I') break;
		case 'I':	echo 'h'.	-scale($x_sf_halaline);																					if ($vertex=='J') break;
		case 'J':	echo 'a		30,30 0,0,0 '.						-scale($y_sf_t1_m_shoulder).','.	scale($y_sf_t1_m_shoulder);		if ($vertex=='K') break;
		case 'K':	echo 'l'.	-scale($x_sf_stomach_m_hala).','.	scale($y_sf_t2_m_t1);												if ($vertex=='L') break;
		case 'L':	echo 'l'.	-scale($x_sf_length_m_stomach).','.	scale($y_sf_t3_m_t2);												if ($vertex=='M') break;
		case 'M':	echo 'v'.	-scale($y_sf_t3);																						if ($vertex=='N') break;
		
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($sf_rotate ".scale($x_sf_m).','.scale($y_sf_m).')" />';
	
?>
	