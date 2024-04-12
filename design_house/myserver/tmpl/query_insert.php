<?php
	$query_csv = "INSERT INTO $custtable (`sr`, `name`, `surname`, `mobile_no1`, `mobile_no2`, `mobile_no3`) 
		VALUES ($sr, \"$name\", \"$surname\", \"$mobile_no1\", \"$mobile_no2\", \"$mobile_no3\")";
			
	$query_msv = 'INSERT INTO cust (sr,'.$atb_cust2[0] .','.$atb_cust2[1] .','.$atb_cust2[2] .','.$atb_cust2[3] .','.$atb_cust2[4] .') 
		VALUES ('.$sr.',"'.${$atb_cust2[0]} .'","'.${$atb_cust2[1]} .'","'.${$atb_cust2[2]} .'","'.${$atb_cust2[3]} .'","'.${$atb_cust2[4]} .'")';
?>