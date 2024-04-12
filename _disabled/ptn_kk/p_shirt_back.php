<?php
	echo '<path d = "	  M'.	scale($x_sb_m).','.					scale($y_sb_m);
	
	if ($backtype=='onepiece') {
		switch ($vertex) {
			
			case 'A':	echo 'l'.	scale($x_sb_length_m_stomach).','.	scale($y_sb_t3_m_t2);
			case 'B':	echo 'l'.	scale($x_sb_stomach_m_hala).','.	scale($y_sb_t2_m_t1);
			case 'C':	echo 'a		36,36 0,0,0 '.						scale($y_sb_t1_m_shoulder).','.		scale($y_sb_t1_m_shoulder);
			case 'D':	echo 'h'.	scale($x_sb_halaline);
			case 'E':	echo 'l'.	scale($x_sb_slope).','.				scale($y_sb_slope_m_rounding);
			case 'F':	echo 'a		30,30 0,0,1 '.						-scale($x_sb_rounding).','.			scale($y_sb_rounding);
			case 'G':	echo 'a		30,30 0,0,1 '.						scale($x_sb_rounding).','.			scale($y_sb_rounding);
			case 'H':	echo 'l'.	-scale($x_sb_slope).','.			scale($y_sb_slope_m_rounding);
			case 'I':	echo 'h'.	-scale($x_sb_halaline);
			case 'J':	echo 'a		36,36 0,0,0 '.						-scale($y_sb_t1_m_shoulder).','.	scale($y_sb_t1_m_shoulder);
			case 'K':	echo 'l'.	-scale($x_sb_stomach_m_hala).','.	scale($y_sb_t2_m_t1);
			case 'L':	echo 'l'.	-scale($x_sb_length_m_stomach).','.	scale($y_sb_t3_m_t2);
			case 'M':	echo 'v'.	-scale($y_sb_t3);
			case 'N':	echo 'v'.	-scale($y_sb_t3);																						if ($vertex=='A') break;
			
			case 'A':	echo 'l'.	scale($x_sb_length_m_stomach).','.	scale($y_sb_t3_m_t2);												if ($vertex=='B') break;
			case 'B':	echo 'l'.	scale($x_sb_stomach_m_hala).','.	scale($y_sb_t2_m_t1);												if ($vertex=='C') break;
			case 'C':	echo 'a		36,36 0,0,0 '.						scale($y_sb_t1_m_shoulder).','.		scale($y_sb_t1_m_shoulder);		if ($vertex=='D') break;
			case 'D':	echo 'h'.	scale($x_sb_halaline);																					if ($vertex=='E') break;
			case 'E':	echo 'l'.	scale($x_sb_slope).','.				scale($y_sb_slope_m_rounding);										if ($vertex=='F') break;
			case 'F':	echo 'a		30,30 0,0,1 '.						-scale($x_sb_rounding).','.			scale($y_sb_rounding);			if ($vertex=='G') break;
			case 'G':	echo 'a		30,30 0,0,1 '.						scale($x_sb_rounding).','.			scale($y_sb_rounding);			if ($vertex=='H') break;
			case 'H':	echo 'l'.	-scale($x_sb_slope).','.			scale($y_sb_slope_m_rounding);										if ($vertex=='I') break;
			case 'I':	echo 'h'.	-scale($x_sb_halaline);																					if ($vertex=='J') break;
			case 'J':	echo 'a		36,36 0,0,0 '.						-scale($y_sb_t1_m_shoulder).','.	scale($y_sb_t1_m_shoulder);		if ($vertex=='K') break;
			case 'K':	echo 'l'.	-scale($x_sb_stomach_m_hala).','.	scale($y_sb_t2_m_t1);												if ($vertex=='L') break;
			case 'L':	echo 'l'.	-scale($x_sb_length_m_stomach).','.	scale($y_sb_t3_m_t2);												if ($vertex=='M') break;
			case 'M':	echo 'v'.	-scale($y_sb_t3);																						if ($vertex=='N') break;
			
		}
	} else {
		switch ($vertex) {
			
			case 'A':	echo 'l'.	scale($x_sb_length_m_stomach).','.	scale($y_sb_t3_m_t2);
			case 'B':	echo 'l'.	scale($x_sb_stomach_m_hala).','.	scale($y_sb_t2_m_t1);
			case 'C':	echo 'a		36,36 0,0,0 '.						scale($y_sb_t1_m_shoulder).','.		scale($y_sb_t1_m_shoulder);
			case 'D':	echo 'h'.	scale($x_sb_halaline);
			case 'E':	echo 'v'.	scale($y_sb_shoulder);
			case 'F':	echo 'v'.	scale($y_sb_shoulder);
			case 'G':	echo 'h'.	-scale($x_sb_halaline);
			case 'H':	echo 'a		36,	36 0,0,0 '.						-scale($y_sb_t1_m_shoulder).','.	scale($y_sb_t1_m_shoulder);
			case 'I':	echo 'l'.	-scale($x_sb_stomach_m_hala).','.	scale($y_sb_t2_m_t1);
			case 'J':	echo 'l'.	-scale($x_sb_length_m_stomach).','.	scale($y_sb_t3_m_t2);
			case 'K':	echo 'v'.	-scale($y_sb_t3);
			case 'L':	echo 'v'.	-scale($y_sb_t3);																						if ($vertex=='A') break;
			
			case 'A':	echo 'l'.	scale($x_sb_length_m_stomach).','.	scale($y_sb_t3_m_t2);												if ($vertex=='B') break;
			case 'B':	echo 'l'.	scale($x_sb_stomach_m_hala).','.	scale($y_sb_t2_m_t1);												if ($vertex=='C') break;
			case 'C':	echo 'a		36,36 0,0,0 '.						scale($y_sb_t1_m_shoulder).','.		scale($y_sb_t1_m_shoulder);		if ($vertex=='D') break;
			case 'D':	echo 'h'.	scale($x_sb_halaline);																					if ($vertex=='E') break;
			case 'E':	echo 'v'.	scale($y_sb_shoulder);																					if ($vertex=='F') break;
			case 'F':	echo 'v'.	scale($y_sb_shoulder);																					if ($vertex=='G') break;
			case 'G':	echo 'h'.	-scale($x_sb_halaline);																					if ($vertex=='H') break;
			case 'H':	echo 'a		36,36 0,0,0 '.						-scale($y_sb_t1_m_shoulder).','.	scale($y_sb_t1_m_shoulder);		if ($vertex=='I') break;
			case 'I':	echo 'l'.	-scale($x_sb_stomach_m_hala).','.	scale($y_sb_t2_m_t1);												if ($vertex=='J') break;
			case 'J':	echo 'l'.	-scale($x_sb_length_m_stomach).','.	scale($y_sb_t3_m_t2);												if ($vertex=='K') break;
			case 'K':	echo 'v'.	-scale($y_sb_t3);																						if ($vertex=='L') break;
			
		}
	}
	
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($sb_rotate ".scale($x_sb_m).','.scale($y_sb_m).')" />';
	
?>