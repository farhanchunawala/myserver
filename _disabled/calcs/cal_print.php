<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 4 -->
<head>
	<?php
		$sr = $_GET['sr'];
		$garb_type = $_GET['garb_type'];
	?>
	<title><?php echo "$sr $garb_type"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
thead td {
		font-weight: bold;
	}
#colx {
		font-weight: bold;
	}
</style>
</head>
<body>

<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	include '../function/fn_inchtotext.php';
	include '../function/fn_shouldertrim.php';
	
	include '../dimension/measure_arr.php';
?>

<table class="table table-striped table-borderless table-sm">
	<thead>
		<tr>
			<td></td>
			<td>Shirt</td>
		</tr>
	</thead>
	<tbody>
		<tr><td id='colx'>length</td>
			<td><?php echo $length['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Shoulder</td>
			<td><?php echo $shoulder['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Sleeve</td>
			<td><?php echo $sleeve['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Sleeve Fit</td>
			<td><?php echo $sleevefit['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Hala</td>
			<td><?php echo $hala['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Chest</td>
			<td><?php echo $chest['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>T1</td>
			<td><?php echo $t1['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Stomach</td>
			<td><?php echo $stomach['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>T2</td>
			<td><?php echo $t2['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Seat</td>
			<td><?php echo $seat['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>T3</td>
			<td><?php echo $t3['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Collar</td>
			<td><?php echo $collar['shirt']; ?></td>
		</tr>
		<tr><td id='colx'>Cuff</td>
			<td><?php echo $cuffbr['shirt']; ?></td>
		</tr>
		<tr><td></td><td></td></tr>
		<tr><td></td><td></td></tr>
		<tr><td></td><td></td></tr>
		<tr><td></td><td></td></tr>
		<tr>
			<td></td>
		</tr>
		<!--<tr>
			<td id='colx'></td>
			<td id='colx'>Pant</td>
			<td id='colx'>Bpyjama</td>
			<td id='colx'>Pyjama</td>
			<td id='colx'>Salwar</td>
		</tr>
		<tr><td id='colx'>length</td>
		</tr>-->
		
	</tbody>
</table>

<?php mysqli_close($dbc); ?>

</body>
</html>