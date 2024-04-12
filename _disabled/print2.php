<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 4 -->
<head>
	<?php
		$sr=$_GET['sr'];
		$garb_type = $_GET['garb_type'];
		$print=$_GET['print'];
	?>
	<title><?php echo "$sr $garb_type $print"?></title>
	<?php include 'plugs_n_libs/bootstrapcdn.php'; ?>
</head>
<body>
<style>
#marx {
	font-size: 24px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	padding-right: 0px;
}
#mar1 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar3 {
	font-size: 24px;
	border: 2px groove;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 20px;
	padding-right: 0px;
}
#marp {
	font-size: 20px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 10px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	padding-right: 0px;
}
#front {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#back {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#sleeve {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#shoulder {
	font-size: 24px;
	border-style: groove solid solid groove;
	border-width: 3px 5px 5px 3px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
</style>
<script>
function printit() {
  window.print();
}
</script>

<a onclick="printit()">
<?php
	$svr_mode = $_GET['svr_mode'];
	include 'sub/sub_svr_mode.php';
	
	$dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, 'kkmenswear') or die('Error connecting to MySQL server.');
	
	include 'function/fn_inchtotext.php';
	include 'function/fn_shouldertrim.php';
	
	include 'dim/dim_entry.php';
	include 'dim/dim_meas.php';
	include 'dim/dim_style.php';
	
	if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {
		
		for($i = 1; $i <= $garbcount; $i++) {
			include 'dim/dim_shirt.php';
			include 'dim/dim_cloth.php';
		}
		if ($print=='print1')		include 'sub/sub_print1.php';
		elseif ($print=='print2')	include 'sub/sub_print2.php';
		else						include 'sub/sub_print3.php';
		
	} elseif ($garb_type=='pant' || $garb_type=='bpyjama' || $garb_type=='pyjama' || $garb_type=='salwar' || $garb_type=='aligard' || $garb_type=='churidar') {
		
		for($i = 1; $i <= $garbcount; $i++) {
			include 'dim/dim_pant.php';
			include 'dim/dim_cloth.php';
		}
		if ($print=='print1')		include 'sub/sub_print4.php';
		elseif ($print=='print2')	include 'sub/sub_print2.php';
		else						include 'sub/sub_print3.php';
		
	}
	
	mysqli_close($dbc);
?>
</a>

</body>
</html>