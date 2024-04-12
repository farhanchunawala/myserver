<?php
echo '<path d = "	  M'.	scale($x_sh_m).','.				 scale($y_sh_m);

switch ($vertex) {
	
	case 'A':			 echo 'l'. scale($x_sh_length - $x_sh_rounding)		.','.-scale($y_sh_collarln);
	case 'B':			 echo 'a   11,11 0,0,0 '. scale($x_sh_rounding)		.','.scale($y_sh_rounding);
	case 'C': if($fd==0) echo 'a   11,11 0,0,0 '. scale($x_sh_rounding)		.','.-scale($y_sh_rounding);
			  else		 echo 'v'. scale($y_sh_height - $y_sh_rounding);
	case 'D': if($fd==0) echo 'l'. scale($x_sh_length - $x_sh_rounding)		.','.scale($y_sh_collarln);
	case 'E': if($fd==0) echo 'v'. scale($y_sh_height - $y_sh_rounding);
	case 'F': if($fd==0) echo 'h'. -scale($x_sh_length);
	case 'G':			 echo 'h'. -scale($x_sh_length);
	case 'H':			 echo 'v'. -scale($y_sh_height - $y_sh_collarln);									if ($vertex=='A') break;
	
	case 'A':			 echo 'l'. scale($x_sh_length - $x_sh_rounding)		.','.-scale($y_sh_collarln);	if ($vertex=='B') break;
	case 'B':			 echo 'a   11,11 0,0,0 '. scale($x_sh_rounding)		.','.scale($y_sh_rounding);		if ($vertex=='C') break;
	case 'C': if($fd==0) echo 'a   11,11 0,0,0 '. scale($x_sh_rounding)		.','.-scale($y_sh_rounding);
			  else		 echo 'v'. scale($y_sh_height - $y_sh_rounding);									if ($vertex=='D') break;
	case 'D': if($fd==0) echo 'l'. scale($x_sh_length - $x_sh_rounding)		.','.scale($y_sh_collarln);		if ($vertex=='E') break;
	case 'E': if($fd==0) echo 'v'. scale($y_sh_height - $y_sh_rounding);									if ($vertex=='F') break;
	case 'F': if($fd==0) echo 'h'. -scale($x_sh_length);													if ($vertex=='G') break;
	case 'G':			 echo 'h'. -scale($x_sh_length);													if ($vertex=='H') break;
	
}
echo "\" fill=$fill opacity=$opacity transform=\"rotate($sh_rotate ".scale($x_sh_m).','.scale($y_sh_m).')" />';
?>