<?php
	include $atb_cust_php;
	
	$sr = $_POST['sr'];
	$sr2 = $_GET['sr'];
	foreach ($atb_cust2 as $var) $$var = $_POST[$var];
	
	if ($sr2==0) {
	$query_csv = 'INSERT INTO cust (sr,'.$atb_cust2[0] .','.$atb_cust2[1] .','.$atb_cust2[2] .','.$atb_cust2[3] .','.$atb_cust2[4] .') 
		VALUES ('.$sr.',"'.${$atb_cust2[0]} .'","'.${$atb_cust2[1]} .'","'.${$atb_cust2[2]} .'","'.${$atb_cust2[3]} .'","'.${$atb_cust2[4]} .'")';
	} else {
	$query_csv = "UPDATE cust SET sr=$sr,".$atb_cust2[0].'="'.${$atb_cust2[0]}.'",'.$atb_cust2[1] .'="'.${$atb_cust2[1]} .'",'.
		$atb_cust2[2] .'="'.${$atb_cust2[2]} .'",'.$atb_cust2[3] .'="'.${$atb_cust2[3]} .'",'.
		$atb_cust2[4] .'="'.${$atb_cust2[4]} .'" WHERE sr='.$sr;
	}
	
	$result_csv = mysqli_query($dbc, $query_csv) or die('<b>Error customer_info.php/query_csv : </b><br/>'.mysqli_error($dbc));
?>