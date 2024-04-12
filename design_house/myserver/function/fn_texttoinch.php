<?php
	function texttoinch($x) {
		
		$a = $x;
		if     (strstr($a,"+")) $a = $a + 0.125;
		elseif (strstr($a,"=")) $a = $a - 0.125;
		
		return $a;
	}
	/*$a = str_replace(".25",".250",$a);
	$a = str_replace(".50",".500",$a);
	$a = str_replace(".75",".750",$a);*/
?>