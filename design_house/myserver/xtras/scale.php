<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<script>
function printit() {
  window.print();
}
</script>

<a onclick="printit()">
<svg height="2100" width="1500">
	
	<?php //cmscale
	$x=0;
	$y=100;
	?>
	<line x1="<?php echo $x; ?>" y1="<?php echo $y; ?>" x2="<?php echo $x+50; ?>" y2="<?php echo $y; ?>" stroke="black" />
	<?php
	for ($i=0; $i<0; $i++) {
		$x1=$x;
	for ($j=0; $j<=9; $j++) {
		$y=$y+7.69;
		$x1=$x1+5
	?>
	<line x1="<?php echo $x; ?>" y1="<?php echo $y; ?>" x2="<?php echo $x1; ?>" y2="<?php echo $y; ?>" stroke="black" />
	<?php } }?>
	
	<?php //inchscale
	$x=100;
	$y=100;
	?>
	<line x1="<?php echo $x; ?>" y1="<?php echo $y; ?>" x2="<?php echo $x+70; ?>" y2="<?php echo $y; ?>" stroke="black" />
	<?php
	for ($i=0; $i<=0; $i++) {
		$x1=$x;
	for ($j=0; $j<=7; $j++) {
		$y=$y+24.435;
		$x1=$x1+10
	?>
	<line x1="<?php echo $x; ?>" y1="<?php echo $y; ?>" x2="<?php echo $x1; ?>" y2="<?php echo $y; ?>" stroke="black" />
	<?php } }?>
	
</svg>
</a>
	
</body>
</html>