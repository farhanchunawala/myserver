<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customer List</title>
	<?php include 'plugins_n_libraries/bootstrapcdn.php'; ?>
</head>
<body>

<?php
	$svr_mode = $_GET['svr_mode'];
	include 'svr_mode.php';
	
	$navtitle = 'Customer List';
	$navlink = 'customer_list.php';
	include 'navbar.php';
	
	$search = $_POST['search'];
	
	$dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, 'kkmenswear') or die('Error connecting to MySQL server.');
	
	if (ctype_digit($search)) {
		$query1 = "SELECT * FROM $custtable WHERE sr=$search OR mobile_no1=$search";
	} elseif (strlen("$search")==1) {
		$query1 = "SELECT * FROM $custtable WHERE name LIKE \"$search%\" OR surname LIKE \"$search%\"";
	} else {
		$query1 = "SELECT * FROM $custtable WHERE name LIKE \"%$search%\" OR surname LIKE \"%$search%\"";
	}
	
	include 'cust_listtable.php';
?>

</body>
</html>