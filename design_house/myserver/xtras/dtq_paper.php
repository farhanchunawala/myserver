<!DOCTYPE html>
<html lang="en">
<head>
	<title>DTQ PF</title>
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
<div class="container-fluid m-5">

	<div class="row">
		<div class="col"><b>MHSSCE, IT<br/>Examination seat number:<br/>Name of the subject:<br/>Signature of the candidate:</b></div>
		<div class="col"><b><br/>Semester<br/><br/>Current page number / total pages:  &nbsp &nbsp /</b></div>
	</div>
	-------------------------------------------------------------- write below ----------------------------------------------------------------------------
	
	<svg height="1350" width="970">
	<?php
		function inchtopx($x) {
			$a = $x;
			$a = $a * 195.52;
				return $a;
		}
		
		for ($r=0; $r<=2300; $r=$r+inchtopx(0.31)) {
			echo "<line  x1=0  y1=$r  x2=1300  y2=$r stroke=grey stroke-width=1 opacity=0.4 />";
		}
		
	?>
	</svg>
	
</div>
</a>
</body>
</html>