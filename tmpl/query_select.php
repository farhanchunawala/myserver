<?php
	$querys_cust = "SELECT * FROM cust WHERE sr=$sr ORDER BY sr ASC LIMIT 1";
	$result_cust = mysqli_query($dbc, $querys_cust) or die('<b>Error bodymeasure.php/querys_cust: </b><br/>'.mysqli_error($dbc));
	$rq_cust     = mysqli_fetch_array($result_cust);
	foreach ($atb_cust2 as $var) $$var = $rq_cust[$var];
	
?>