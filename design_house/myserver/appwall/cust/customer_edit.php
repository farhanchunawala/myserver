<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$sr=$_GET['sr'];
		$csv=$_GET['csv'];
		$msv=$_GET['msv'];
	?>
	<title><?php echo "$sr Edit"?></title>
	<?php $svr_mode=$_GET['svr_mode'];  $fdir='../../';  include $fdir.'svr/svr_mode.php'; ?>
</head>
<body>

<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include 'function/fn_texttoinch.php';
	include 'function/fn_inchtotext1.php';
	include 'function/fn_inchtotextround.php';
	
	{	
		if ($csv==1) include 'sub/sub_customer_save.php';
		if ($msv==1) include 'save/measurement_save.php';
		
		$query1 = "SELECT * FROM $custtable WHERE sr=$sr";
		
		$result1 = mysqli_query($dbc, $query1) or die('<b>Error customer_edit.php/query1 : </b><br/>'.mysqli_error($dbc));
		
		$rowq1 = mysqli_fetch_array($result1);
		
		
		$query4 = "SELECT garb_type FROM $entrytable WHERE sr=$sr AND (garb_type='shirt' OR garb_type='kurta' OR garb_type='pathani' OR garb_type='kandura') ORDER BY garb_id DESC LIMIT 1";
		
		$result4 = mysqli_query($dbc, $query4) or die('<b>Error customer_edit.php/query4 : </b><br/>'.mysqli_error($dbc));
		
		$rowq4 = mysqli_fetch_array($result4);
		
		
		$name = $rowq1['name'];
		$surname = $rowq1['surname'];
		$mobile_no1 = $rowq1['mobile_no1'];
		$mobile_no2 = $rowq1['mobile_no2'];
		$mobile_no3 = $rowq1['mobile_no3'];
		
		
		$acn_shirt = $acn_kurta = $acn_pathani = $acn_kandura = "";
		$act_shirt = $act_kurta = $act_pathani = $act_kandura = "fade";
		if (isset($rowq4['garb_type'])) {
			if ($rowq4['garb_type']=="kurta")	$acn_kurta = $act_kurta = "active";
			elseif ($rowq4['garb_type']=="pathani")	$acn_pathani = $act_pathani = "active";
			elseif ($rowq4['garb_type']=="kandura")	$acn_kandura = $act_kandura = "active";
		} else $acn_shirt = $act_shirt = "active";
		
	}
	
?>

<div class="container-fluid p-5">
	
	<form method="post" action="customer_edit.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>&csv=1&msv=0">
		<div class="form-group">
			
			<div class="row p-3 no-gutters">
				<div class="col">  <label for="sr">Sr. No.</label>
					<input tabindex="21" type="text" class="form-control" name="sr" value="<?php echo $sr; ?>" style="width:75%" />
				</div>
				<div class="col">  <label for="name">Name</label>
					<input tabindex="22" type="text" class="form-control" name="name" value="<?php echo $name; ?>" style="width:75%" />
				</div>
				<div class="col">  <label for="surname">Surname</label>
					<input tabindex="23" type="text" class="form-control" name="surname" value="<?php echo $surname; ?>" style="width:75%" />
				</div>
				<div class="col">  <label for="mobile_no1">Mobile-no1</label>
					<input tabindex="24" type="text" class="form-control" name="mobile_no1" value="<?php echo $mobile_no1; ?>" style="width:75%" />
				</div>
				<div class="col">  <label for="mobile_no2">Mobile-no2</label>
					<input tabindex="25" type="text" class="form-control" name="mobile_no2" value="<?php echo $mobile_no2; ?>" style="width:75%" />
				</div>
				<div class="col">  <label for="mobile_no3">Mobile-no3</label>
					<input tabindex="26" type="text" class="form-control" name="mobile_no3" value="<?php echo $mobile_no3; ?>" style="width:75%" />
				</div>
				<div class="col p-2 mt-4">
					<button tabindex="27" type="submit" class="btn btn-info" value="save" name="submit_customer_info">Save</button>
				</div>
			</div>
			
		</div>
	</form>

<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item">  <a class="nav-link <?php echo $acn_shirt; ?>" data-toggle="tab" href="#shirt" tabindex="1">Shirt</a>  </li>
	<li class="nav-item">  <a class="nav-link <?php echo $acn_kurta; ?>" data-toggle="tab" href="#kurta" tabindex="2">Kurta</a>  </li>
	<li class="nav-item">  <a class="nav-link <?php echo $acn_pathani; ?>" data-toggle="tab" href="#pathani" tabindex="3">Pathani</a>  </li>
	<li class="nav-item">  <a class="nav-link <?php echo $acn_kandura; ?>" data-toggle="tab" href="#kandura" tabindex="4">Kandura</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#pant" tabindex="5">Pant</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#bpyjama" tabindex="6">Bpyjama</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#pyjama" tabindex="7">Pyjama</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#salwar" tabindex="8">Salwar</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#aligard" tabindex="9">Aligard</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#churidar" tabindex="10">Churidar</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#safari" tabindex="11">Safari</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#suit" tabindex="12">Suit</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#waistcoat" tabindex="13">waistcoat</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#sadri" tabindex="14">sadri</a>  </li>
	<li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#sherwani" tabindex="15">Sherwani</a>   </li>
</ul>

<div><div><div><div>
<div class="tab-content">
	
	<div class="tab-pane container-fluid <?php echo $act_shirt; ?>" id="shirt">
		<?php
			$garb_type = 'shirt';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid <?php echo $act_kurta; ?>" id="kurta">
		<?php
			$garb_type = 'kurta';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid <?php echo $act_pathani; ?>" id="pathani">
		<?php
			$garb_type = 'pathani';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid <?php echo $act_kandura; ?>" id="kandura">
		<?php
			$garb_type = 'kandura';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="pant">
		<?php
			$garb_type = 'pant';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="bpyjama">
		<?php
			$garb_type = 'bpyjama';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="pyjama">
		<?php
			$garb_type = 'pyjama';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="salwar">
		<?php
			$garb_type = 'salwar';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="aligard">
		<?php
			$garb_type = 'aligard';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
	<div class="tab-pane container-fluid fade" id="churidar">
		<?php
			$garb_type = 'churidar';
			include 'dim/dim_meas.php';
			include 'sub/sub_info.php';
		?>
	</div>
	
</div>
</div></div></div></div>
</div>

<?php mysqli_close($dbc); ?>

</body>
</html>