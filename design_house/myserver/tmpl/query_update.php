<?php
	$query_msv = "UPDATE cust SET sr=$sr,".$atb_cust2[0].'="'.${$atb_cust2[0]}.'",'.$atb_cust2[1] .'="'.${$atb_cust2[1]} .'",'.
		$atb_cust2[2] .'="'.${$atb_cust2[2]} .'",'.$atb_cust2[3] .'="'.${$atb_cust2[3]} .'",'.$atb_cust2[4] .'="'.${$atb_cust2[4]} .'"';
	
	$query_csv = "UPDATE $custtable SET `sr`=$sr, `name`=\"$name\", `surname`=\"$surname\", 
		`mobile_no1`=\"$mobile_no1\", `mobile_no2`=\"$mobile_no2\", `mobile_no3`=\"$mobile_no3\" WHERE sr=$sr";
?>