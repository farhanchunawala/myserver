<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 6 -->
<head>
	<title>Style</title>
	<?php $svr_mode=$_GET['svr_mode'];  $fdir='../../';  include $fdir.'svr/svr_mode.php'; ?>
</head>
<body>
<style>
th {padding: 5px;
	background-color: lightgrey;
	position: -webkit-sticky;
	position: sticky;
	top: 0;
	white-space: nowrap;
}
td {white-space: nowrap;
}
</style>

<?php
	$query2 = "SELECT * FROM `meas` WHERE sr=$sr";
	$result2 = mysqli_query($dbc, $query2) or die('<b>Error pattern.php/query2 : </b><br/>'.mysqli_error($dbc));
	$rowq2 = mysqli_fetch_array($result2);
	
	$query4 = "SELECT * FROM $entrytable WHERE sr=$sr AND (garb_type='shirt' OR garb_type='kurta' OR garb_type='pathani' OR garb_type='kandura') ORDER BY garb_id DESC LIMIT 1";
	$result4 = mysqli_query($dbc, $query4) or die('<b>Error pattern.php/query4 : </b><br/>'.mysqli_error($dbc));
	$rowq4 = mysqli_fetch_array($result4);
	
	$pair = isset($rowq4['garb_pairing']) ? ord($rowq4['garb_pairing']) : 122;
	
	$a_garbstyle = array('kandura', 'shirt', 'pant', 'kurta', 'pyjama', 'salwar', 'aligard', 'churidar');
	foreach ($a_garbstyle as $var) ${$var.'_count'} = $_POST[$var.'_count'];
?>
<div class="container-fluid">
	<form class="form-inline" method="post" action=<?php echo $pattern_save_php."?svr_mode=$svr_mode&sr=$sr";
		foreach ($a_garbstyle as $var) echo '&'.$var.'c='.${$var.'_count'}; ?>">
	<div class="form-group"><div class="d-flex flex-nowrap bg-light">
	
	<?php $tx = -1;
	foreach ($a_garbstyle as $var) {
		if (${$var.'_count'} >= 1) {
			$garb_type = $var;
			$tx=$tx+1;
			include $sub_pattern_table_php;
		}
	}
	
	mysqli_close($dbc); ?>
	<div class="col-2 mt-2"><button type="submit" class="btn btn-info" value="save" name="submit">Save</button></div>
	
	</div></div>
	</form>
</div>

</body>
</html>