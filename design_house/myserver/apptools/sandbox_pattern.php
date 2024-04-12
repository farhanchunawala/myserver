<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pattern Sandbox</title>
	<?php $svr_mode=$_GET['svr_mode'];  $fdir='../';  include $fdir.'svr_mode.php'; ?>
</head>
<body>

<?php
	include 'function/fn_shouldertrim.php';
	include 'function/fn_cmx22.php';
	
	$garb_type = 'shirt';
	$sr = 99;
	include 'dimension/measure.php';
	include 'dimension/style.php';
	for($i = 1; $i <= 1; $i++) {
		include 'dimension/dim'."_$garb_type".'_front.php';
	}
	
	$xm = 10;
	$ym = 10;
	
?>

<svg width="1500" height="2100">
	
	<?php
		$x_sf_m = 100;
		$y_sf_m = 100;
		$vertex = 'A';
		$sf_rotate = 0;
		$fill = 'lightblue';
		$opacity = 1;
		include 'pattern/shirt_front_half.php';
		
		mysqli_close($dbc);
	?>
	
</svg>

</body>
</html>