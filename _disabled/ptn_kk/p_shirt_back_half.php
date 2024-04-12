<?php
	echo '<path d = "	  M'.	scale($x_sb_m).','.					scale($y_sb_m);
	if ($backtype=='onepiece') {
		switch ($vertex) {
			
			case 'A':	echo 'l'.	scale($x_sb_length - $x_sb_stomachln).','.	scale($y_sb_seat - $y_sb_stomach);
			case 'B':	echo 'l'.	scale($x_sb_stomachln - $x_sb_chestln).','.	scale($y_sb_stomach - $y_sb_chest);
			case 'C':	echo 'a		36,36 0,0,0 '.						scale($y_sb_chest - $y_sb_shoulder).','.scale($y_sb_chest - $y_sb_shoulder);
			case 'D':	echo 'h'.	scale($x_sb_halaline);
			case 'E':	echo 'l'.	scale($x_sb_collarln).','.				scale($y_sb_shoulder - $y_sb_rounding);
			case 'F':	echo 'a		30,30 0,0,0 '.						-scale($x_sb_rounding).','.scale($y_sb_rounding);
			case 'G':	echo 'h'.	-scale($x_sb_length - $x_sb_rounding);
			case 'H':	echo 'v'.	-scale($y_sb_seat);																				if ($vertex=='A') break;
			
			case 'A':	echo 'l'.	scale($x_sb_length - $x_sb_stomachln).','.	scale($y_sb_seat - $y_sb_stomach);										if ($vertex=='B') break;
			case 'B':	echo 'l'.	scale($x_sb_stomachln - $x_sb_chestln).','.	scale($y_sb_stomach - $y_sb_chest);										if ($vertex=='C') break;
			case 'C':	echo 'a		36,36 0,0,0 '.						scale($y_sb_chest - $y_sb_shoulder).','.scale($y_sb_chest - $y_sb_shoulder);	if ($vertex=='D') break;
			case 'D':	echo 'h'.	scale($x_sb_halaline);																			if ($vertex=='E') break;
			case 'E':	echo 'l'.	scale($x_sb_collarln).','.				scale($y_sb_shoulder - $y_sb_rounding);								if ($vertex=='F') break;
			case 'F':	echo 'a		30,30 0,0,0 '.						-scale($x_sb_rounding).','.scale($y_sb_rounding);			if ($vertex=='G') break;
			case 'G':	echo 'h'.	-scale($x_sb_length - $x_sb_rounding);																if ($vertex=='H') break;
			
		}
	} else {
		switch ($vertex) {
			
			case 'A':	echo 'l'.	scale($x_sb_length - $x_sb_stomachln).','.	scale($y_sb_seat - $y_sb_stomach);
			case 'B':	echo 'l'.	scale($x_sb_stomachln - $x_sb_chestln).','.	scale($y_sb_stomach - $y_sb_chest);
			case 'C':	echo 'a		36,36 0,0,0 '.						scale($y_sb_chest - $y_sb_shoulder).','.	scale($y_sb_chest - $y_sb_shoulder);
			case 'D':	echo 'h'.	scale($x_sb_halaline);
			case 'E':	echo 'v'.	scale($y_sb_shoulder);
			case 'F':	echo 'h'.	-scale($x_sb_length);
			case 'G':	echo 'v'.	-scale($y_sb_seat);																					if ($vertex=='A') break;
			
			case 'A':	echo 'l'.	scale($x_sb_length - $x_sb_stomachln).','.	scale($y_sb_seat - $y_sb_stomach);											if ($vertex=='B') break;
			case 'B':	echo 'l'.	scale($x_sb_stomachln - $x_sb_chestln).','.	scale($y_sb_stomach - $y_sb_chest);											if ($vertex=='C') break;
			case 'C':	echo 'a		36,36 0,0,0 '.						scale($y_sb_chest - $y_sb_shoulder).','.	scale($y_sb_chest - $y_sb_shoulder);		if ($vertex=='D') break;
			case 'D':	echo 'h'.	scale($x_sb_halaline);																				if ($vertex=='E') break;
			case 'E':	echo 'v'.	scale($y_sb_shoulder);																				if ($vertex=='F') break;
			case 'F':	echo 'h'.	-scale($x_sb_length);																				if ($vertex=='G') break;
			
		}
	}
	echo "\" fill=$fill opacity=$opacity transform=\"rotate($sb_rotate ".scale($x_sb_m).','.scale($y_sb_m).')" />';
	
?>