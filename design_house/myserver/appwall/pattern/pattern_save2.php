<!DOCTYPE html>
<html lang="en">
<head>
	<?php $sr=$_GET['sr'];  echo "<title>$sr Entry Save</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>
<?php
	$myStyles = json_decode($_POST['mystyles']);
	if ($myStyles) foreach($myStyles as $key => $myStyle) if ($myStyle->garbcount>=0 && $myStyle->garbcount!='') include $sub_pattern_sv_php;
	
	$sr = $_POST['sr'];
	$sr2 = $_GET['sr'];
	
	$custInfos = json_decode($_POST['custInfos']);
	$myArr=$custInfos;  $tbl='cust';  $whr="WHERE sr=$sr";
	if ($sr2==0)		include $pdo_insert_php;
	elseif ($sr!=0)	include $pdo_update_php;
	
	$query11 = "SELECT `sr` FROM `meas` WHERE sr=$sr";
	$result11 = mysqli_query($dbc, $query11) or die('<b>Error measurement_save.php/query11 : </b><br/>'.mysqli_error($dbc));
	$rowq11 = mysqli_fetch_array($result11);
	
	$bodyMeass = json_decode($_POST['bodyMeass']);
	$myArr=$bodyMeass;  $tbl='meas';  $whr="WHERE sr=$sr";
	if (!isset($rowq11['sr']))	include $pdo_insert_php;
	elseif ($sr!=0)				include $pdo_update_php;
	
	mysqli_close($dbc);  $pdo=null;
?>
<script>
function printit() {
  window.print();
}
</script>

</body>
</html>