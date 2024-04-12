<!DOCTYPE html>
<html lang="en">
<head><title>Task Tracker</title>
	<?php $fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>
<?php
	$navtitle='Task Tracker';  $navlink=$tasktracker_php."?svr_mode=$svr_mode&sv=0&task=cutting";  include $navbar_php;
	
	{	//garbstatus
		$arr_garbentry = array('garb_id', 'sr', 'garbtype', 'pairing', 'description', 'submit_date');
		$arr_garbop = array('cutting', 'sewing', 'kaj', 'button', 'press', 'delivery');
		
		$query4 = "SELECT * FROM entry INNER JOIN task ON entry.garb_id=task.garb_id ORDER BY submit_date";
		$result4 = mysqli_query($dbc, $query4) or die('<b>Error entrybook.php/query4: </b><br/>'.mysqli_error($dbc));
		$i=0;
		while ($rowq4 = mysqli_fetch_array($result4)) {
			foreach ($arr_garbentry as $var) $$var[$i] = $rowq4[$var];
			$process[$i]="Not Started";
			foreach ($arr_garbop as $var) {  $$var[$i] = $rowq4[$var];
				if($$var[$i]==1) $process[$i]="In $var"; elseif($$var[$i]==2) $process[$i]="Done $var"; }
			$i++;
		}	$garbcount = count($garb_id);
	}
	{	//tasktrack
		$task = $_GET['task'];
		$acn_cutting = $acn_sewing = $acn_kaj = $acn_button = $acn_press = $acn_delivery = '';
		$act_cutting = $act_sewing = $act_kaj = $act_button = $act_press = $act_delivery = 'fade';
		if     ($task=='cutting')  $acn_cutting = $act_cutting ='active';
		elseif ($task=='sewing')   $acn_sewing  = $act_sewing  ='active';
		elseif ($task=='kaj')	   $acn_kaj     = $act_kaj     ='active';
		elseif ($task=='button')   $acn_button  = $act_button  ='active';
		elseif ($task=='press')	   $acn_press   = $act_press   ='active';
		elseif ($task=='delivery') $acn_delivery= $act_delivery='active';
		
		$sv = $_GET['sv'];
		if ($sv==1) { $garbcount = $_GET['garbcount'];
			for($i=1; $i<=$garbcount; $i++) {
				$garb[$i]   = $_POST['garb_id'.$i];
				$tasksv[$i] = $_POST[$task.$i];
				
				$qryu_task = "UPDATE task SET $task=\"$tasksv[$i]\" WHERE garb_id=$garb[$i]";
				$resultu_task = mysqli_query($dbc, $qryu_task) or die('<b>Error tasktracker.php/qryu_task : </b><br/>'.mysqli_error($dbc));
			}
		}
	}
?><h1 class="mt-1">Task Tracker</h1>

<div id="accordion">
<div><div class="card-header"><a class="card-link" data-bs-toggle="collapse" href="#collapse1" style="color:black"><b>Garb Status</b></a></div>
<div id="collapse1" class="collapse" data-bs-parent="#accordion"><div class="card-body px-2 py-0">
	
	<div class="container-fluid">
		<form method="post" action=<?php echo $entrybook_php."?svr_mode=$svr_mode&sv=1"?> >   <div class="form-group">
		<table class="table table-striped table-borderless table-sm">
		
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Desc</th>
				<th>Submit</th>
				<th>Process</th>
				<th><button type="submit" class="btn btn-info" value="save" name="submit">Save</button></th>
			</tr>
		</thead>
		<tbody>
			<?php for($i = 0; $i < $garbcount; $i++) { ?>
			<tr>
				<td><input type="hidden" id="garb_id<?php echo $i; ?>" name="garb_id<?php echo $i; ?>" value="<?php echo $garb_id[$i]; ?>">
					<a href=<?php echo $customer_info_php."?svr_mode=$svr_mode&sr=$sr[$i]&sv=0";?> ><?php echo $sr[$i]; ?></a>-<?php echo $pairing[$i]; ?>
				</td>
				<td><?php echo "$garbtype[$i] - $description[$i]"; ?></td>
				<td><?php echo $submit_date[$i]; ?></td>
				<td><i><?php echo $process[$i]; ?></i></td>
				<td><div class="btn-group"><a href=<?php echo $pattern_edit_php."?garb_id=$garb_id[$i]";?> class="btn btn-info btn-sm" role="button">Edit</a>
					<button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><span class="caret"></span></button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype=$garbtype[$i]&garb_id=$garb_id[$i]&print=print_marking";?> target="_blank">Print Marking</a>
						<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype=$garbtype[$i]&garb_id=$garb_id[$i]&print=print_map";?>     target="_blank">Print Map</a>
						<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype=$garbtype[$i]&garb_id=$garb_id[$i]&print=print_cslip";?>   target="_blank">Print Cslip</a>
						<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype=$garbtype[$i]&garb_id=$garb_id[$i]&print=print_kslip";?>   target="_blank">Print Kslip</a>
						<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype=$garbtype[$i]&garb_id=$garb_id[$i]&print=print_marking2";?> target="_blank">Print Marking2</a>
					</div>
				</div></td>
			</tr>
			<?php } ?>
		</tbody>
		
		</table>
		</div></form>
	</div>

</div></div></div>
</div>

<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item"><a class="nav-link p-2 <?php echo $acn_cutting; ?>" data-bs-toggle="tab" href="#cutting" >Cut</a></li>
	<li class="nav-item"><a class="nav-link p-2 <?php echo $acn_sewing;  ?>" data-bs-toggle="tab" href="#sewing"  >Sew</a></li>
	<li class="nav-item"><a class="nav-link p-2 <?php echo $acn_kaj;     ?>" data-bs-toggle="tab" href="#kaj"     >Kaj</a></li>
	<li class="nav-item"><a class="nav-link p-2 <?php echo $acn_button;  ?>" data-bs-toggle="tab" href="#button"  >Btn</a></li>
	<li class="nav-item"><a class="nav-link p-2 <?php echo $acn_press;   ?>" data-bs-toggle="tab" href="#press"   >Prs</a></li>
	<li class="nav-item"><a class="nav-link p-2 <?php echo $acn_delivery;?>" data-bs-toggle="tab" href="#delivery">Dlv</a></li>
</ul>
<div class="tab-content">
	
	<div class="tab-pane container-fluid <?php echo $act_cutting; ?>" id="cutting"><?php
		$task='cutting';	$task_pv='';			include $sub_tasktrack_php;	?></div>
	
	<div class="tab-pane container-fluid <?php echo $act_sewing; ?>" id="sewing"><?php
		$task='sewing';	$task_pv='cutting';	include $sub_tasktrack_php;	?></div>
	
	<div class="tab-pane container-fluid <?php echo $act_kaj; ?>" id="kaj"><?php
		$task='kaj';		$task_pv='sewing';	include $sub_tasktrack_php;	?></div>
	
	<div class="tab-pane container-fluid <?php echo $act_button; ?>" id="button"><?php
		$task='button';	$task_pv='kaj';		include $sub_tasktrack_php;	?></div>
	
	<div class="tab-pane container-fluid <?php echo $act_press; ?>" id="press"><?php
		$task='press';		$task_pv='button';	include $sub_tasktrack_php;	?></div>
	
	<div class="tab-pane container-fluid <?php echo $act_delivery; ?>" id="delivery"><?php
		$task='delivery';	$task_pv='press';		include $sub_tasktrack_php;	?></div>
	
</div>

<?php mysqli_close($dbc); ?>
</body>
</html>