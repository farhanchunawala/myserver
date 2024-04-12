<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$meas = $_GET['meas'];
	?>
	<title><?php echo "$meas table";?></title>
	<?php include '../plugins_n_libraries/bootstrapcdn.php'; ?>
	<style>
	th {
		padding: 5px;
		background-color: lightgrey;
		position: -webkit-sticky;
		position: sticky;
		top: 0;
		white-space: nowrap;
		font-weight: bold;
	}
	thead td {
			font-weight: bold;
		}
	td {
		white-space: nowrap;
	}
	</style>
</head>
<body>

<?php
	include '../function/fn_inchround.php';
	include '../function/fn_inchtotext.php';
	include '../function/fn_inchtotextround.php';
	include '../function/fn_array_mode.php';
	include '../function/fn_arr_rdsrtstr.php';
	include '../function/fn_arr_inch_rdsrtstr.php';
?>
<div class="d-flex flex-nowrap">
<?php
	if ($meas==='length' || $meas==='shoulder' || $meas==='sleeve' || $meas==='hala' || $meas==='chest' || $meas==='stomach' || $meas==='seat' || $meas==='collar' || $meas==='cuff') {
		$garb_type = 'shirt';
		include 'cal_dimensions.php';
		include 'cal_subtable.php';
		
		$garb_type = 'pathani';
		include 'cal_dimensions.php';
		include 'cal_subtable.php';
		
		$garb_type = 'kurta';
		include 'cal_dimensions.php';
		include 'cal_subtable.php';
		
		$garb_type = 'kandura';
		include 'cal_dimensions.php';
		include 'cal_subtable.php';
	}
	if ($meas==='length' || $meas==='fork' || $meas==='waist' || $meas==='seat' || $meas==='thigh_fix' || $meas==='kneeln' || $meas==='calfln' || $meas==='bottom' || $meas==='cuttingfactor') {
		
		$garb_type = 'pant';
		include 'cal_dimensions.php';
		include 'cal_subtable.php';
		
		$garb_type = 'bpyjama';
		include 'cal_dimensions.php';
		include 'cal_subtable.php';
		
		if ($meas!='seat' && $meas!='thigh_fix' && $meas!='cuttingfactor' && $meas!='calfln') {
			$garb_type = 'pyjama';
			include 'cal_dimensions.php';
			include 'cal_subtable.php';
		}
		
		if ($meas!='seat' && $meas!='thigh_fix' && $meas!='cuttingfactor' && $meas!='kneeln' && $meas!='calfln') {
			$garb_type = 'salwar';
			include 'cal_dimensions.php';
			include 'cal_subtable.php';
		}
		
		if ($meas!='seat' && $meas!='thigh_fix' && $meas!='cuttingfactor') {
			$garb_type = 'aligard';
			include 'cal_dimensions.php';
			include 'cal_subtable.php';
		}
		
	}
?>
</div>

</body>
</html>