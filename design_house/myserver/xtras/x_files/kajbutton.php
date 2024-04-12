<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kaj Button & Press</title>
	<?php include 'plugins_n_libraries/bootstrapcdn.php'; ?>
</head>
<body>

<?php
	$svr_mode = $_GET['svr_mode'];
	if ($svr_mode==='kkms_kkms' || $svr_mode==='kkms_cnv')	 { $svr_host='www.kkmenswear.com';  $svr_usr='oxlwbg15apsz';  $svr_pwd='KKms#1971'; }
	else													 { $svr_host='localhost';  $svr_usr='root';  $svr_pwd=''; }
	if ($svr_mode==='kkms_kkms' || $svr_mode==='local_kkms') { $custtable='customer';  $entrytable='entry';  $styletable='style'; }
	else													 { $custtable='customer2';  $entrytable='entry2';  $styletable='style2'; }
	
	$dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, 'kkmenswear') or die('Error connecting to MySQL server.');
	
	$sv = $_GET['sv'];
	if ($sv==1) {
		
	}
	
	$query4 = "SELECT * FROM $entrytable WHERE garb_kaj=\"unchecked\" ORDER BY sr ASC";
	$result4 = mysqli_query($dbc, $query4) or die('<b>Error kajbutton.php/query4 : </b><br/>'.mysqli_error($dbc));
	
	$i=0;
	while ($rowq4 = mysqli_fetch_array($result4)) {
		$garb[$i] = $rowq4['garb_id'];
		$sr[$i] = $rowq4['sr'];
		$garb_type[$i] = $rowq4['garb_type'];
		$garb_pairing[$i] = $rowq4['garb_pairing'];
		$garb_description[$i] = $rowq4['garb_description'];
		$garb_button[$i] = $rowq4['garb_button'];
		
		$i++;
	}
	$garbcount = count($garb);
	
	$navtitle ='Kaj Button';
	$navlink = 'kajbutton.php?sv=0';
	include 'navbar.php';
?>

<div class="container-fluid">
	<h1 class="mt-1">Kaj Button</h1>
	
	<form method="post" action="button_view.php?sv=1">   <div class="form-group">
	<table class="table table-striped table-borderless table-sm">
	
	<thead>
		<tr>
			<th>Sr.no</th>
			<th>Description</th>
			<th>Button<button type="submit" class="btn btn-info float-right" value="save" name="submit">Save</button></th>
		</tr>
    </thead>
	
	<tbody>
	
	<?php for($i = 0; $i < $garbcount; $i++) { ?>
		
		<tr>
			<td>	<input type="hidden" id="garb_id<?php echo $i; ?>" name="garb_id<?php echo $i; ?>" value="<?php echo $garb[$i]; ?>">
					<a href="customer_info.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr[$i]; ?>&sv=0"><?php echo $sr[$i]; ?></a>-<?php echo $garb_pairing[$i]; ?>
			</td>
			<td>	<?php echo "$garb_type[$i] - $garb_description[$i]"; ?>
			</td>
			<td>	<input type="text" class="form-control" name="button<?php echo $i; ?>" value="<?php echo $garb_button[$i]; ?>" />
			</td>
		</tr>
		
		<?php }
			mysqli_close($dbc);
		?>
    </tbody>
	
	</table>
	<hr/>
	</div></form>
	
</div>

</body>
</html>