<?php
echo '<path d = "	  M'.	scale($x_ss_m).','.		scale($y_ss_m);

switch ($vertex) {
	
	case 'A':			 echo 'l'. scale($x_ss_length - $x_ss_hala).','.	-scale($y_ss_hala - $y_ss_cuff);
	case 'B':			 echo 'a   75,75 0,0,1 '. scale($x_ss_hala).','.	scale($y_ss_hala);
	case 'C': if($fd==0) echo 'a   75,75 0,0,1 '. -scale($x_ss_hala).','.	scale($y_ss_hala);
			  else		 echo 'h'. -scale($x_ss_length);
	case 'D': if($fd==0) echo 'l'. -scale($x_ss_length - $x_ss_hala).','.	-scale($y_ss_hala - $y_ss_cuff);
	case 'E': if($fd==0) echo 'l   0,'.										-scale($y_ss_cuff);
	case 'F':			 echo 'l   0,'.										-scale($y_ss_cuff);					if ($vertex=='A') break;
	
	case 'A':			 echo 'l'. scale($x_ss_length - $x_ss_hala).','.	-scale($y_ss_hala - $y_ss_cuff);	if ($vertex=='B') break;
	case 'B':			 echo 'a   75,75 0,0,1 '. scale($x_ss_hala).','.	scale($y_ss_hala);					if ($vertex=='C') break;
	case 'C': if($fd==0) echo 'a   75,75 0,0,1 '. -scale($x_ss_hala).','.	scale($y_ss_hala);			
			  else		 echo 'h'. -scale($x_ss_length);														if ($vertex=='D') break;
	case 'D': if($fd==0) echo 'l'. -scale($x_ss_length - $x_ss_hala).','.	-scale($y_ss_hala - $y_ss_cuff);	if ($vertex=='E') break;
	case 'E': if($fd==0) echo 'l   0,'.										-scale($y_ss_cuff);					if ($vertex=='F') break;
	
}
	
	echo "\" fill=$fill opacity=$opacity transform=\" ";
	//if ($mirror=='1') echo 'translate(0,'.scale($y_ss_m + $y_ss_hala*2).') scale(1,-1) ';
	echo "rotate($ss_rotate ".scale($x_ss_m).','.scale($y_ss_m).')" />';
	
?>