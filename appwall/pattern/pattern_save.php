<!DOCTYPE html>
<html lang="en">
<head>
	<?php $sr=$_GET['sr'];  echo "<title>$sr Entry Save</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>
<?php
	$myStyles = json_decode($_POST['mystyles_count']);
	if ($myStyles) foreach($myStyles as $key => $myStyle) if ($myStyle->garbcount >= 0) include $sub_pattern_sv_php;
	
	include $sub_cust_save_php;
	$arr='atb_meas1';  include $sub_meas_save_php;
	
	mysqli_close($dbc);
?>
<script>
function printit() {
  window.print();
}
</script>

</body>
</html>