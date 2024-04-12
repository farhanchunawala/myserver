<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$garb_type = $_GET['garb_type'];
		$meas = $_GET['meas'];
	?>
	<title><?php echo "$meas - $garb_type";?></title>
	<?php include '../plugins_n_libraries/bootstrapcdn.php'; ?>
	<style>
		thead td {
			font-weight: bold;
		}
	</style>
</head>
<body>

<?php include 'cal_dimensions.php'; ?>

<svg width="1000" height="1300" style="border: 1px solid black"><?php
	for ($r=0; $r<=1300; $r=$r+50) {
		echo "<line  x1=$r  y1=0  x2=$r  y2=1300 stroke=grey stroke-width=1 opacity=0.4 />";
		echo "<line  x1=0  y1=$r  x2=1300  y2=$r stroke=grey stroke-width=1 opacity=0.4 />";
	}
	$s = -50;
	
	$meas_cstr = 'meas_valct';
	$meas_cstr_name = "$meas";
	$max_valct = max($meas_valct);
	include 'dim_graph.php';
	
	if ($meas==='chest' || $meas==='stomach' || $meas==='seat') {
		
		$meas_cstr = 'measy4_valct';
		$meas_cstr_name = "$meas/4";
		$max_valct = max($measy4_valct);
		include 'dim_graph.php';
		
		$meas_cstr = 'tamda_valct';
		$meas_cstr_name = "$tt";
		$max_valct = max($tamda_valct);
		include 'dim_graph.php';
		
		$meas_cstr = 'tamda_m_meas_valct';
		$meas_cstr_name = "$meas losing";
		$max_valct = max($tamda_m_meas_valct);
		include 'dim_graph.php';
		
		$meas_cstr = 'tamda_m_meas_percent_valct';
		$meas_cstr_name = "$meas losing percent";
		$max_valct = max($tamda_m_meas_percent_valct);
		include 'dim_graph.php';
	}
	
?></svg>

</body>
</html>