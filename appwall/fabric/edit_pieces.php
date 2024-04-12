<!DOCTYPE html>
<html lang="en">
<head>
	<?php $fabric_id=$_GET['fabric_id'];  echo "<title>$fabric_id Info</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>

<?php
	error_reporting(E_ALL & ~E_NOTICE);
	$navtitle='Fabric Inventory';  $navlink=$fabric_inventory_php."?svr_mode=$svr_mode&srh=0";  include $navbar_php;
	
	include $atb_fabric_php;
	
	$query11 = "SELECT * FROM fabric WHERE fabric_id=$fabric_id";
	$result11 = mysqli_query($dbc, $query11) or die('<b>Error fabric_info.php/query1 : </b><br/>'.mysqli_error($dbc));
	$rowq11 = mysqli_fetch_array($result11);
	
		$query5 = "SELECT * FROM fabricpiece WHERE fabric_id=$fabric_id";
		$result5 = mysqli_query($dbc, $query5) or die('<b>Error fabric_info.php/query1 : </b><br/>'.mysqli_error($dbc));
		$piececount=mysqli_num_rows($result5);
		$c=1;
		while ($rowq5 = mysqli_fetch_array($result5)) {
			foreach ($atb_fabricpiece3 as $var) ${$var.$c} = $rowq5[$var];
			$c++;
		}
	
?>

<h1 class="pb-3">Fabric Info</h1>
<div class="container-fluid pl-5 pr-5" style="width:500px">
	
	<form method="post" action=<?php echo $fabric_info_php."?fabric_id=$fabric_id&svr_mode=$svr_mode&fsv=2";?> >
	<div class="form-group"><div class="d-flex flex-wrap align-content-around">
	<?php for ($c=1; $c<=$piececount; $c++) { ?>
		<div class="p-4"><label for="garbtype">Pana (in)</label>
		<input type="text" class="form-control p-2" name="pana" value="<?php echo ${'pana'.$c} ?>" style="width:80px" /></div>
		<div class="p-4"><label for="garbtype">Clothln (m)</label>
		<input type="text" class="form-control p-2" name="clothln" value="<?php echo ${'clothln'.$c} ?>" style="width:80px" /></div>
		<div class="p-4"><label for="garbtype">location</label>
		<input type="text" class="form-control p-2" name="location" value="<?php echo ${'location'.$c} ?>" style="width:80px" /></div>
	<?php } ?>
	<button type="submit" class="btn btn-info mx-4 my-5 p-2" name="submit" value="save" style="height:42px">Save & Add Piece</button>
	</div></div>
	
	<hr/>
	</form>
	
</div>

<?php mysqli_close($dbc); ?>

</body>
</html>