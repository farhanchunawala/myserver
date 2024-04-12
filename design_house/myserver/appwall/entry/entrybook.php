<!DOCTYPE html>
<html lang="en">
<head><title>Entry Book</title>
	<?php $fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>

<?php
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
	
	$navtitle='Entry Book';  $navlink=$entrybook_php."?svr_mode=$svr_mode";  include $navbar_php;
?>

<div class="container-fluid">
	<h1 class="mt-1">Entry Book</h1>
	<form method="post" action=<?php echo $entrybook_php."?svr_mode=$svr_mode&sv=1";?> >   <div class="form-group">
	<table class="table table-striped table-borderless table-sm">
	
	<thead>
		<tr>
			<th>Sr.no</th>
			<th>Description</th>
			<th>Submit Date</th>
			<th>In Process</th>
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
				<button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"><span class="caret"></span></button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype$garbtype[$i]&garb_id=$garb_id[$i]&print=print_marking";?> target="_blank">Print Marking</a>
					<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype$garbtype[$i]&garb_id=$garb_id[$i]&print=print_map";    ?> target="_blank">Print Map</a>
					<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype$garbtype[$i]&garb_id=$garb_id[$i]&print=print_cslip";  ?> target="_blank">Print Cslip</a>
					<a class="dropdown-item" href=<?php echo $print_php."?svr_mode=$svr_mode&sr=$sr[$i]&garbtype$garbtype[$i]&garb_id=$garb_id[$i]&print=print_kslip";  ?> target="_blank">Print Kslip</a>
				</div>
			</div></td>
		</tr>
		<?php } mysqli_close($dbc); ?>
    </tbody>
	
	</table>
	</div></form>
</div>

</body>
</html>