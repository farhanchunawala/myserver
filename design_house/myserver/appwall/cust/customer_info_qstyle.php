<?php
	// $svr_mode="local_kkms";  $sr=30;
	$svr_mode=$_REQUEST["svr_mode"];  $sr=$_REQUEST["sr"];
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	$query_sfit = "SELECT * FROM style WHERE sr=$sr";
	$result_sfit = mysqli_query($dbc, $query_sfit) or die('<b>Error customer_info.php/query_sfit : </b><br/>'.mysqli_error($dbc));
	$i=0;
	while ($rowq_sfit = mysqli_fetch_array($result_sfit)) {
		$stylename[$i] = $rowq_sfit['stylename'];
		$i++;
	}
	
	mysqli_close($dbc);
	$myJSON = json_encode($stylename);
	echo $myJSON;
?>