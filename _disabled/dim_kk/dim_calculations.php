<?php
	
	$t1_diff = $t1 - $chest/4;
	$t2_diff = $t2 - $stomach/4;
	$t3_diff = $t3 - $seat/4;
	
	$t1_diffround = inchtotextround($t1_diff,3);
	$t2_diffround = inchtotextround($t2_diff,3);
	$t3_diffround = inchtotextround($t3_diff,3);
	
	if ($t1==0) $t1_percent = $t2_percent = $t3_percent = 0;
	else {
		$t1_percent = round($t1_diff * 100 / ($chest/4));
		$t2_percent = round($t2_diff * 100 / ($stomach/4));
		$t3_percent = round($t3_diff * 100 / ($seat/4));
	}
	
?>