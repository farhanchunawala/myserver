<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cutting</title>
	<?php include 'plugs_n_libs/bootstrapcdn.php'; ?>
</head>
<body>

<?php
	$svr_mode = $_GET['svr_mode'];
	include 'sub/sub_svr_mode.php';
	
	$dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, 'kkmenswear') or die('Error connecting to MySQL server.');
	
	$sv = $_GET['sv'];
	if ($sv==1) {
		
		$queryc = "SELECT * FROM $entrytable ORDER BY garb_id DESC";
		$resultc = mysqli_query($dbc, $queryc) or die('Error querying database queryc.');
		
		$i=0;
		while ($rowqc = mysqli_fetch_array($resultc)) {
			$garb[$i] = $rowqc['garb_id'];
			$i++;
		}
		$garbcount = count($garb);
		
		for($i = 0; $i < $garbcount; $i++) {
			$garb[$i] = $_POST["garb_id$i"];
			$master[$i] = $_POST["master$i"];
			
			$query = "UPDATE $entrytable SET `garb_master`=\"$master[$i]\" WHERE garb_id=$garb[$i]";
			$result = mysqli_query($dbc, $query) or die('Error querying database.');
		
		}
	}
	
	$query4 = "SELECT * FROM $entrytable WHERE garb_cutting=\"unchecked\" ORDER BY garb_submit_date ASC";
	
	$result4 = mysqli_query($dbc, $query4)
	or die('Error querying database query4');
	
	$i=0;
	while ($rowq4 = mysqli_fetch_array($result4)) {
		$garb[$i] = $rowq4['garb_id'];
		$sr[$i] = $rowq4['sr'];
		$garb_type[$i] = $rowq4['garb_type'];
		$garb_pairing[$i] = $rowq4['garb_pairing'];
		$garb_description[$i] = $rowq4['garb_description'];
		$garb_submit_date[$i] = $rowq4['garb_submit_date'];
		$garb_master[$i] = $rowq4['garb_master'];
		
		$i++;
	}
	$garbcount = count($garb);
	
	$navtitle ='Cutting';
	$navlink = 'cutting.php?sv=0';
	include 'navbar.php';
?>

<div class="container-fluid">
	<h1 class="mt-1">Cutting</h1>
	
	<form method="post" action="entrybook.php?sv=1">   <div class="form-group">
	<table class="table table-striped table-borderless table-sm">
	
	<thead>
		<tr>
			<th>Sr.no</th>
			<th>Description</th>
			<th>Submit</th>
			<th>Master<button type="submit" class="btn btn-info float-right" value="save" name="submit">Save</button></th>
		</tr>
    </thead>
	
	<tbody>
	
	<?php
		for($i = 0; $i < $garbcount; $i++) {
			
			$s_master_shahid = "";
			if ($garb_master[$i]=="shahid") {
				$s_master_shahid = "selected";
			}
			
		?>
		
		<tr>
			<td>   <input type="hidden" id="garb_id<?php echo $i; ?>" name="garb_id<?php echo $i; ?>" value="<?php echo $garb[$i]; ?>">
				<a href="customer_info.php?sr=<?php echo $sr[$i]; ?>&sv=0"><?php echo $sr[$i]; ?></a>-<?php echo $garb_pairing[$i]; ?>
			</td>
			<td>	<?php echo "$garb_type[$i] - $garb_description[$i]"; ?>
			</td>
			<td>	<?php echo $garb_submit_date[$i]; ?>
			</td>
			<td>	<select tabindex="10" class="form-control" name="master<?php echo $i; ?>" style="width:75%">
						<option value="default">Default</option>
						<option value="shahid" <?php echo $s_master_shahid; ?>>Shahid</option>
			</select>   </td>
		</tr>
		
		<?php }
			mysqli_close($dbc);
		?>
    </tbody>
	
	</table>
	</div></form>
	
</div>

</body>
</html>