//var_dbs	  - $dbc, $svr_mode, $svr_host, $svr_usr, $svr_pwd
//var_entry	  -	$queryc, $resultc, $rowqc, $entrytable, $garb, $button, $query, $result, $query4, $result4, $rowq4, $sr, $garb_type, $garb_pairing, 
				$garb_description, $garb_submit_date, $garb_button
//var_ex	  - $navtitle, $navlink, $sv, $garbcount, $i
//inc		  - plugins_n_libraries/bootstrapcdn.php, svr_mode.php, navbar.php
//a			  - entrybook.php

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Press</title>
	<?php include 'plugins_n_libraries/bootstrapcdn.php'; ?>
</head>
<body>

<?php
	$svr_mode = $_GET['svr_mode'];
	include 'svr_mode.php';
	
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
			$button[$i] = $_POST["button$i"];
			
			$query = "UPDATE $entrytable SET `garb_button`=\"$button[$i]\" WHERE garb_id=$garb[$i]";
			$result = mysqli_query($dbc, $query) or die('Error querying database.');
		}
		
	}
	
	$query4 = "SELECT * FROM $entrytable WHERE garb_button=\"unchecked\" && garb_sewing=\"checked\" ORDER BY sr ASC";
	$result4 = mysqli_query($dbc, $query4) or die('Error querying database query4');
	
	$i=0;
	while ($rowq4 = mysqli_fetch_array($result4)) {
		$garb[$i] = $rowq4['garb_id'];
		$sr[$i] = $rowq4['sr'];
		$garb_type[$i] = $rowq4['garb_type'];
		$garb_pairing[$i] = $rowq4['garb_pairing'];
		$garb_description[$i] = $rowq4['garb_description'];
		$garb_submit_date[$i] = $rowq4['garb_submit_date'];
		$garb_button[$i] = $rowq4['garb_button'];
		$i++;
	}
	if (isset($garb)) $garbcount = count($garb); else $garbcount = 0;
	
	$navtitle ='Entry Book';
	$navlink = 'entrybook.php?sv=0';
	include 'navbar.php';
?>

<div class="container-fluid">
	<h1 class="mt-1">Entry Book</h1>
	
	<form method="post" action="entrybook.php?sv=1">   <div class="form-group">
	<table class="table table-striped table-borderless table-sm">
	
	<thead>
		<tr>
			<th>Sr.no</th>
			<th>Description</th>
			<th>Submit Date</th>
			<th>Kaj &nbsp <button type="submit" class="btn btn-info" value="save" name="submit">Save</button></th>
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
			<td>	<?php echo $garb_submit_date[$i]; ?>
			</td>
			<td>	<div class="form-check-inline">   <label class="form-check-label" for="button<?php echo $g; ?>">
						<input type="hidden"							id="button<?php echo $i; ?>" name="button<?php echo $i; ?>" value="unchecked">
						<input type="checkbox" class="form-check-input" id="button<?php echo $i; ?>" name="button<?php echo $i; ?>" value="checked" <?php echo "$garb_button[$i]"; ?>>
			</label>   </div>   </td>
			</td>
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