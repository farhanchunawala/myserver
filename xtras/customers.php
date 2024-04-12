<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customers</title>
	<?php include 'plugins_n_libraries/bootstrapcdn.php'; ?>
	<!--<link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css">
	<script src="libraries/jquery.min.js"></script>
	<script src="libraries/popper.min.js"></script>
	<script src="libraries/bootstrap/js/bootstrap.min.js"></script>-->
</head>
<body>

<?php
	$svr_mode = 'local_kkms';
	include 'svr_mode.php';
	
	$navtitle = 'New';
	$navlink = "customer_info.php?svr_mode=$svr_mode&sr=0&csv=0&msv=0";
	include 'navbar.php';
	
	$dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	$query1 = "SELECT * FROM $custtable";
	
	include 'cust_listtable.php';
?>

</body>
</html>