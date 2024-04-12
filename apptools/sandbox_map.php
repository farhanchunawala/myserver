<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pattern Sandbox</title>
	<?php $svr_mode=$_GET['svr_mode'];  $fdir='../';  include $fdir.'svr_mode.php'; ?>
</head>
<body>
<script>
function printit() {
  window.print();
}
</script>

<?php
	function inchtopx($x) {
		$a = $x;
		$a = $a * 195.52;
			return $a;
	}
	
	$xm = inchtopx(0.75);
	$ym = inchtopx(0.25);
?>

<a onclick="printit()">
<svg width="1500" height="2100">
<?php
	include 'pattern/p_hexagon.php';
	
	mysqli_close($dbc);
?>
</svg>
</a>

</body>
</html>