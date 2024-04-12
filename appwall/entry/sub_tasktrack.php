<?php
	$garb = [];
	if     ($task=='cutting')					 $qrys_task2 = "SELECT * FROM entry INNER JOIN task ON entry.garb_id=task.garb_id WHERE task.$task!=2 ORDER BY $task DESC, submit_date, sr, garbtype";
	elseif ($task=='sewing' || $task=='delivery')$qrys_task2 = "SELECT * FROM entry INNER JOIN task ON entry.garb_id=task.garb_id WHERE task.$task!=2 && task.$task_pv=2 ORDER BY $task DESC, submit_date, sr, garbtype";
	elseif ($task=='kaj' || $task=='button')	 $qrys_task2 = "SELECT * FROM entry INNER JOIN task ON entry.garb_id=task.garb_id WHERE task.$task!=2 && task.$task_pv=2 && (garbtype=\"shirt\" || garbtype=\"kurta\" || garbtype=\"kandura\") ORDER BY $task DESC, sr, garbtype";
	elseif ($task=='press')						 $qrys_task2 = "SELECT * FROM entry INNER JOIN task ON entry.garb_id=task.garb_id WHERE task.$task!=2 && task.$task_pv=2 || (task.$task!=2 && task.sewing=2 && (garbtype!=\"shirt\" || garbtype!=\"kurta\" || garbtype!=\"kandura\")) ORDER BY $task DESC, sr, garbtype";
	else										 $qrys_task2 = "SELECT * FROM entry INNER JOIN task ON entry.garb_id=task.garb_id WHERE task.$task!=2 && task.$task_pv=2 ORDER BY $task DESC, sr, garbtype";
	$results_task2 = mysqli_query($dbc, $qrys_task2) or die('<b>Error garbop.php/qrys_task2 : </b><br/>'.mysqli_error($dbc));
	$i=1; $ctst=0; $ctdn=0;
	while ($rq_task2 = mysqli_fetch_array($results_task2)) {
		$garb[$i] 		  = $rq_task2['garb_id'];
		$sr[$i] 		  = $rq_task2['sr'];
		$stylename[$i] 	  = $rq_task2['stylename'];
		$garbtype[$i]	  = $rq_task2['garbtype'];
		$garbstyle[$i] 	  = $rq_task2['garbstyle'];
		$garbsubstyle[$i] = $rq_task2['garbsubstyle'];
		$pairing[$i]	  = $rq_task2['pairing'];
		$description[$i]  = $rq_task2['description'];
		$submit_date[$i]  = $rq_task2['submit_date'];
		
		if ($rq_task2[$task]=='2') {$ckdn_task[$i]='checked';} 				  else $ckdn_task[$i]='unchecked';
		if ($rq_task2[$task]=='1') {$ckst_task[$i]='checked'; $ctdn=$ctdn+1;} else $ckst_task[$i]='unchecked';
		if ($rq_task2[$task]=='0') 												   $ctst=$ctst+1;
		$i++;
	} $garbcount = count($garb);
?>

<div class="container-fluid">
	<form method="post" action=<?php echo $tasktracker_php."?svr_mode=$svr_mode&task=$task&garbcount=$garbcount&sv=1";?> >   <div class="form-group">
	
	<table class="table table-striped table-borderless table-sm">
	<thead>
		<tr><th><?php echo "$task &nbsp"; ?><button type="submit" class="btn btn-info" value="save" name="submit">Save</button></th>  <th><b>count:</b></th> </tr>
		<tr><th>Sr.</th>  <th>Desc</th>  <th>Submit</th><th>  <?php echo "Done : ".$ctdn;?></th></tr>
	</thead>
	<tbody>
		<?php
		for($i=1; $i<=$ctdn; $i++) { ?>
		
		<tr>
			<td><input type="hidden" id="garb_id<?php echo $i; ?>" name="garb_id<?php echo $i; ?>" value="<?php echo $garb[$i]; ?>">
				<a href=<?php echo $customer_info_php."?svr_mode=$svr_mode&sr=$sr[$i]&sv=0";?> ><?php echo $sr[$i]; ?></a>-<?php echo $pairing[$i]; ?>
			</td>
			<td><?php echo "$garbtype[$i] - $description[$i]"; ?></td>
			<td><?php echo $submit_date[$i]; ?></td>
			<td><div class="form-check-inline"><label class="form-check-label" for="<?php echo $task.$i; ?>">
				<input type="hidden"							id="<?php echo $task.$i; ?>" name="<?php echo $task.$i; ?>" value="1">
				<input type="checkbox" class="form-check-input" id="<?php echo $task.$i; ?>" name="<?php echo $task.$i; ?>" value="2" <?php echo $ckdn_task[$i]; ?>><?php echo ($task=='delivery') ? "Deliver" : "Done" ;?>
			</label></div></td>
		</tr>
		<?php } ?>
	</tbody>
	</table>
	
	<table class="table table-striped table-borderless table-sm">
	<thead><tr>
		<th>Sr.</th>    <th>Desc</th>    <th>Submit</th>
		<th><?php echo ($task=='delivery') ? "Pack : ".$ctst : "Send : ".$ctst;?></th>
	</tr></thead>
	<tbody>
		<?php  $j=$i;
		for($i = $j; $i <= ($ctst+$ctdn); $i++) { ?>
		<tr>
			<td><input type="hidden" id="garb_id<?php echo $i; ?>" name="garb_id<?php echo $i; ?>" value="<?php echo $garb[$i]; ?>">
				<a href=<?php echo $customer_info_php."?svr_mode=$svr_mode&sr=$sr[$i]&sv=0";?> ><?php echo $sr[$i]; ?></a>-<?php echo $pairing[$i]; ?>
			</td>
			<td><?php echo "$garbtype[$i] - $description[$i]"; ?></td>
			<td><?php echo $submit_date[$i]; ?></td>
			<td><div class="form-check-inline"><label class="form-check-label" for="<?php echo $task.$i; ?>">
				<input type="hidden"							id="<?php echo $task.$i; ?>" name="<?php echo $task.$i; ?>" value="0">
				<input type="checkbox" class="form-check-input" id="<?php echo $task.$i; ?>" name="<?php echo $task.$i; ?>" value="1" <?php echo $ckst_task[$i]; ?>><?php echo ($task=='delivery') ? "Pack" : "send" ;?>
			</label></div></td>
		</tr>
		<?php } ?>
    </tbody>
	</table>
	
	</div></form>
</div>