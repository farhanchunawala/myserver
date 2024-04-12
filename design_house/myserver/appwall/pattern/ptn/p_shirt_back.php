<?php
echo '<path d = "	  M'.	scale($x_sb_m).','.					scale($y_sb_m);
switch ($vertex) {
	
	case 'A':									 echo 'l'. scale($x_sb_length - $x_sb_seatln)					.','.scale($y_sb_bottom - $y_sb_seat);
	case 'B':									 echo 'l'. scale($x_sb_seatln - $x_sb_stomachln)				.','.scale($y_sb_seat - $y_sb_stomach);
	case 'C':									 echo 'l'. scale($x_sb_stomachln - $x_sb_chestln)				.','.scale($y_sb_stomach - $y_sb_chest);
	case 'D':									 echo 'a   36,36 0,0,0 '. scale($y_sb_chest - $y_sb_shoulder)	.','.scale($y_sb_chest - $y_sb_shoulder);
	case 'E':					 				 echo 'h'. scale($x_sb_halaline);
	case 'F': if($backtype=='op')				 echo 'l'. scale($x_sb_collarln)								.','.scale($y_sb_shoulder - $y_sb_rounding);
			  else								 echo 'v'.	scale($y_sb_shoulder);
	case 'G': if($backtype=='op')				 echo 'a   30,30 0,0,0 '. -scale($x_sb_rounding)				.','.scale($y_sb_rounding);
			  elseif ($fd==0)					 echo 'v'.	scale($y_sb_shoulder);
			  else								 echo 'h'.	-scale($x_sb_length);
	case 'H': if($fd==0 && $backtype=='op')		 echo 'a   30,30 0,0,1 '. scale($x_sb_rounding)					.','.scale($y_sb_rounding);						
			  elseif ($fd==1 && $backtype=='op') echo 'h'. -scale($x_sb_length - $x_sb_rounding);
	case 'I': if($fd==0 && $backtype=='op')		 echo 'l'. -scale($x_sb_collarln)								.','.scale($y_sb_shoulder - $y_sb_rounding);
	case 'J': if($fd==0)		  				 echo 'h'. -scale($x_sb_halaline);
	case 'K': if($fd==0)						 echo 'a   36,36 0,0,0 '. -scale($y_sb_chest - $y_sb_shoulder)	.','.scale($y_sb_chest - $y_sb_shoulder);
	case 'L': if($fd==0)						 echo 'l'. -scale($x_sb_stomachln - $x_sb_chestln)				.','.scale($y_sb_stomach - $y_sb_chest);
	case 'M': if($fd==0)						 echo 'l'. -scale($x_sb_seatln - $x_sb_stomachln)				.','.scale($y_sb_seat - $y_sb_stomach);
	case 'N': if($fd==0)						 echo 'l'. -scale($x_sb_length - $x_sb_seatln)					.','.scale($y_sb_bottom - $y_sb_seat);
	case 'O': if($fd==0)						 echo 'v'. -scale($y_sb_bottom);
	case 'P':									 echo 'v'. -scale($y_sb_bottom);																				if ($vertex=='A') break;
	
	case 'A':									 echo 'l'. scale($x_sb_length - $x_sb_seatln)					.','.scale($y_sb_bottom - $y_sb_seat);			if ($vertex=='B') break;
	case 'B':									 echo 'l'. scale($x_sb_seatln - $x_sb_stomachln)				.','.scale($y_sb_seat - $y_sb_stomach);			if ($vertex=='C') break;
	case 'C':									 echo 'l'. scale($x_sb_stomachln - $x_sb_chestln)				.','.scale($y_sb_stomach - $y_sb_chest);		if ($vertex=='D') break;
	case 'D':									 echo 'a   36,36 0,0,0 '. scale($y_sb_chest - $y_sb_shoulder)	.','.scale($y_sb_chest - $y_sb_shoulder);		if ($vertex=='E') break;
	case 'E':									 echo 'h'. scale($x_sb_halaline);																				if ($vertex=='F') break;
	case 'F': if($backtype=='op')				 echo 'l'. scale($x_sb_collarln)								.','.scale($y_sb_shoulder - $y_sb_rounding);	
			  else								 echo 'v'.	scale($y_sb_shoulder);																				if ($vertex=='G') break;
	case 'G': if($backtype=='op')				 echo 'a   30,30 0,0,0 '. -scale($x_sb_rounding)				.','.scale($y_sb_rounding);
			  elseif ($fd==0)					 echo 'v'.	scale($y_sb_shoulder);
			  else								 echo 'h'.	-scale($x_sb_length);																				if ($vertex=='H') break;
	case 'H': if($fd==0 && $backtype=='op')		 echo 'a   30,30 0,0,1 '. scale($x_sb_rounding) 				.','.scale($y_sb_rounding);						
			  elseif ($fd==1 && $backtype=='op') echo 'h'. -scale($x_sb_length - $x_sb_rounding);																if ($vertex=='I') break;
	case 'I': if($fd==0 && $backtype=='op') 	 echo 'l'. -scale($x_sb_collarln)								.','.scale($y_sb_shoulder - $y_sb_rounding);	if ($vertex=='J') break;
	case 'J': if($fd==0)						 echo 'h'. -scale($x_sb_halaline);																				if ($vertex=='K') break;
	case 'K': if($fd==0)						 echo 'a   36,36 0,0,0 '. -scale($y_sb_chest - $y_sb_shoulder)			.','.scale($y_sb_chest - $y_sb_shoulder);		if ($vertex=='L') break;
	case 'L': if($fd==0)						 echo 'l'. -scale($x_sb_stomachln - $x_sb_chestln)				.','.scale($y_sb_stomach - $y_sb_chest);		if ($vertex=='M') break;
	case 'M': if($fd==0)						 echo 'l'. -scale($x_sb_seatln - $x_sb_stomachln)				.','.scale($y_sb_seat - $y_sb_stomach);			if ($vertex=='N') break;
	case 'N': if($fd==0)						 echo 'l'. -scale($x_sb_length - $x_sb_seatln)					.','.scale($y_sb_bottom - $y_sb_seat);			if ($vertex=='O') break;
	case 'O': if($fd==0)						 echo 'v'. -scale($y_sb_bottom);																				if ($vertex=='P') break;
	
}
echo "\" fill=$fill opacity=$opacity transform=\"rotate($sb_rotate ".scale($x_sb_m).','.scale($y_sb_m).')" />';
?>