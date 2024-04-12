<?php
	$sr = $_POST['sr'];
	$sr2 = $_GET['sr'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$mobile_no1 = $_POST['mobile_no1'];
	$mobile_no2 = $_POST['mobile_no2'];
	$mobile_no3 = $_POST['mobile_no3'];
	
	if ($sr2==0) {
	$query_csv = "INSERT INTO $custtable (`sr`, `name`, `surname`, `mobile_no1`, `mobile_no2`, `mobile_no3`) 
		VALUES ($sr, \"$name\", \"$surname\", \"$mobile_no1\", \"$mobile_no2\", \"$mobile_no3\")";
	
	} else {
	$query_csv = "UPDATE $custtable SET `sr`=$sr,`name`=\"$name\",`surname`=\"$surname\",
		`mobile_no1`=\"$mobile_no1\",`mobile_no2`=\"$mobile_no2\",`mobile_no3`=\"$mobile_no3\" WHERE sr=$sr";
	}
	
	$result_csv = mysqli_query($dbc, $query_csv) or die('<b>Error customer_info.php/query_csv : </b><br/>'.mysqli_error($dbc));
?>