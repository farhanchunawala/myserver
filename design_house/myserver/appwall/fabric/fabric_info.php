<!DOCTYPE html>
<html lang="en">
<head>
	<?php $fabric_id=$_GET['fabric_id'];  echo "<title>$fabric_id Info</title>";
	$fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
	<!--<style>body { overflow: hidden; }</style>-->
</head>
<body>

<?php
	error_reporting(E_ALL & ~E_NOTICE);
	$navtitle='Fabric Inventory';  $navlink=$fabric_inventory_php."?svr_mode=$svr_mode&srh=0";  include $navbar_php;
	
	include $atb_fabric_php;
	
	$query11 = "SELECT * FROM fabric WHERE fabric_id=$fabric_id";
	$result11 = mysqli_query($dbc, $query11) or die('<b>Error fabric_info.php/query1 : </b><br/>'.mysqli_error($dbc));
	$rowq11 = mysqli_fetch_array($result11);
	if ($_GET['fsv']==1) {
		foreach ($atb_fabric2 as $var) $$var = $_POST[$var];
		$qry='fabric_sv';  $arr='atb_fabric';  $table='fabric';  $whr="fabric_id=$fabric_id";
		if (isset($rowq11['fabric_id'])) include $query_update_php;
		else 							 			include $query_insert_php;
		
		$query5 = "SELECT * FROM fabricpiece WHERE fabric_id=$fabric_id";
		$result5 = mysqli_query($dbc, $query5) or die('<b>Error fabric_info.php/query1 : </b><br/>'.mysqli_error($dbc));
		$piececount=mysqli_num_rows($result5);
		for ($c=0; $c<=$piececount; $c++) {
			foreach ($atb_fabricpiece4 as $var) $$var=$_POST[$var.$c];
			$qry='fabricpiece_sv';  $arr='atb_fabricpiece2';  $table='fabricpiece';  $whr="piece_id=$piece_id";
			if ($piece_id==0 && $clothln!=0) include $query_insert_php;
			else										include $query_update_php;
		}
	}
	
	if ($fabric_id==0) {
		$query4 = "SELECT * FROM fabric ORDER BY fabric_id DESC LIMIT 1";
		$result4 = mysqli_query($dbc, $query4) or die('<b>Error pattern.php/query4 : </b><br/>'.mysqli_error($dbc));
		$rowq4 = mysqli_fetch_array($result4);
		$fabric_id = $rowq4['fabric_id']+1;
	} else {
		$query1 = "SELECT * FROM fabric WHERE fabric_id=$fabric_id";
		$result1 = mysqli_query($dbc, $query1) or die('<b>Error fabric_info.php/query1 : </b><br/>'.mysqli_error($dbc));
		$rowq1 = mysqli_fetch_array($result1);
		foreach ($atb_fabric2 as $var) $$var=$rowq1[$var];
		
		$query5 = "SELECT * FROM fabricpiece WHERE fabric_id=$fabric_id";
		$result5 = mysqli_query($dbc, $query5) or die('<b>Error fabric_info.php/query1 : </b><br/>'.mysqli_error($dbc));
		$piececount=mysqli_num_rows($result5);
		$c=1;
		while ($rowq5 = mysqli_fetch_array($result5)) {
			foreach ($atb_fabricpiece4 as $var) ${$var.$c}=$rowq5[$var];
			$c++;
		}
	}
	
?>

<h1 class="pb-3">Fabric Info</h1>
<div class="container-fluid" style="width:480px">
	
	<form method="post" action=<?php echo $fabric_info_php."?fabric_id=$fabric_id&svr_mode=$svr_mode&fsv=1";?> >
	<div class="form-group">
		<div class="d-flex flex-wrap align-content-around">
			<?php foreach($atb_fabric2 as $var) { ?> <div class="p-3">
				<label for="<?php echo $var; ?>"><?php echo ucwords($var); ?></label>
				<input type="text" class="form-control p-2" name="<?php echo $var; ?>" value="<?php echo $$var; ?>" style="width:80px" />
			</div> <?php } ?>
		</div>
	</div><hr/>
		<?php for ($c=1; $c<=$piececount; $c++) { ?>
		<div class="form-group py-2"><div class="d-flex flex-wrap align-content-around">
			<input type="hidden" id="piece_id<?php echo $c; ?>" name="piece_id<?php echo $c; ?>" value="<?php echo ${'piece_id'.$c}; ?>">
			<div class="px-3"><label for="pana">Pana (in)</label>
			<input type="text" class="form-control" name="pana<?php echo $c; ?>" value="<?php echo ${'pana'.$c} ?>" style="width:80px" /></div>
			<div class="px-3"><label for="clothln">Clothln (m)</label>
			<input type="text" class="form-control" name="clothln<?php echo $c; ?>" value="<?php echo ${'clothln'.$c} ?>" style="width:80px" /></div>
			<div class="px-3"><label for="location">location</label>
			<input type="text" class="form-control" name="location<?php echo $c; ?>" value="<?php echo ${'location'.$c} ?>" style="width:80px" /></div>
		</div></div>
		<?php } ?>
		<div class="form-group py-2"><div class="d-flex flex-wrap align-content-around">
			<input type="hidden" id="piece_id0" name="piece_id0" value="0">
			<div class="px-3"><label for="pana">Pana (in)</label>
			<input type="text" class="form-control" name="pana0" value="" style="width:80px" /></div>
			<div class="px-3"><label for="clothln">Clothln (m)</label>
			<input type="text" class="form-control" name="clothln0" value="" style="width:80px" /></div>
			<div class="px-3"><label for="location">location</label>
			<input type="text" class="form-control" name="location0" value="" style="width:80px" /></div>
			<button type="submit" class="btn btn-info mx-4 my-5 p-2" name="submit" value="save" style="height:42px">Save & Add Piece</button>
		</div></div>
		<hr/>
	</form>
	
	<a href=<?php echo $cardtemplate_php."?svr_mode=$svr_mode&fabric_id=$fabric_id&bh=zm";?> >ZM Template</a><hr/>
	<a href=<?php echo $cardtemplate_php."?svr_mode=$svr_mode&fabric_id=$fabric_id&bh=kk";?> >KK Template</a><hr/>
	
</div>

<?php mysqli_close($dbc); ?>

</body>
</html>