<!DOCTYPE html>
<html lang="en">
<head>
	<?php $sr=$_GET['sr']; ?>
	<title><?php echo "$sr Entry"?></title>
	<?php include 'plugs_n_libs/bootstrapcdn.php'; ?>
</head>
<body>

<?php
	$svr_mode = $_GET['svr_mode'];
	if ($svr_mode==='kkms_kkms' || $svr_mode==='kkms_cnv')	 { $svr_host='www.kkmenswear.com';  $svr_usr='oxlwbg15apsz';  $svr_pwd='KKms#1971'; }
	else													 { $svr_host='localhost';  $svr_usr='root';  $svr_pwd=''; }
	
	if ($svr_mode==='kkms_kkms' || $svr_mode==='local_kkms') { $custtable='customer';  $entrytable='entry';  $styletable='style'; }
	else													 { $custtable='customer2';  $entrytable='entry2';  $styletable='style2'; }
	
	{	$dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, 'kkmenswear') or die('Error connecting to MySQL server.');
	
		$query1 = "SELECT * FROM $custtable WHERE sr=$sr";
		
		$result1 = mysqli_query($dbc, $query1) or die('Error querying database query1.');
		
		$rowq1 = mysqli_fetch_array($result1);
		
		mysqli_close($dbc);
	}
?>
<div class="container-fluid p-5">
	
	<form method="post" action="pattern.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>">
	<div class="form-group">
	
	<div class="row no-gutters p-4">
		<div class="col-10">
			<h2><?php echo $rowq1['sr']; ?> &nbsp <?php echo $rowq1['name']; ?> <?php echo $rowq1['surname']; ?></h2>
		</div>
		<div class="col-2 mt-2">
			<button tabindex="20" type="submit" class="btn btn-info" value="save" name="submit">Save</button>
		</div>
	</div>
	
	<div class="row p-3 no-gutters">
		<div class="col">   <label for="shirt_count">Shirt</label>
			<input tabindex="01" type="text" class="form-control" name="shirt_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="kurta_count">Kurta</label>
			<input tabindex="02" type="text" class="form-control" name="kurta_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="pathani_count">Pathani</label>
			<input tabindex="03" type="text" class="form-control" name="pathani_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="kandura_count">Kandura</label>
			<input tabindex="04" type="text" class="form-control" name="kandura_count" value="" style="width:75%" />
		</div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row p-3 no-gutters">
		<div class="col">   <label for="pant_count">Pant</label>
			<input tabindex="07" type="text" class="form-control" name="pant_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="bpyjama_count">Bpyjama</label>
			<input tabindex="08" type="text" class="form-control" name="bpyjama_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="pyjama_count">Pyjama</label>
			<input tabindex="09" type="text" class="form-control" name="pyjama_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="salwar_count">Salwar</label>
			<input tabindex="10" type="text" class="form-control" name="salwar_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="aligard_count">Aligard</label>
			<input tabindex="11" type="text" class="form-control" name="aligard_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="churidar_count">Churidar</label>
			<input tabindex="12" type="text" class="form-control" name="churidar_count" value="" style="width:75%" />
		</div>
	</div>
	
	</div>
	</form>
	
</div>

</body>
</html>