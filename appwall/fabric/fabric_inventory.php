<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fabric Inventory</title>
	<?php $fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>

<?php $srh=$_GET['srh'];
	$navtitle='New';  $navlink=$fabric_info_php."?svr_mode=$svr_mode&fabric_id=0&fsv=0";  include $navbar_php;
?>
<div class="container">
	<h1 class="m-5"> &nbsp </h1>
	
	<table class="table table-striped">
		<thead>
		<tr>
			<th>ID</th>
			<th>ID Code</th>
			<th>Brand</th>
			<th>Name</th>
			<th>Fabric Type</th>
			<th>Color</th>
			<th>Texture</th>
			<th>Composition</th>
			<th>Supplier</th>
			<th>Cost</th>
			<th>First Price</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if ($srh==1) {
				$search = $_POST['search'];
				if (ctype_digit($search))		$query1 = "SELECT * FROM fabric WHERE fabric_id=$search OR mobile_no1=$search";
				elseif (strlen("$search")==1)	$query1 = "SELECT * FROM fabric WHERE name LIKE \"$search%\" OR brand LIKE \"$search%\"";
				else									$query1 = "SELECT * FROM fabric WHERE name LIKE \"%$search%\" OR brand LIKE \"%$search%\"";
			} else									$query1 = "SELECT * FROM fabric ORDER BY fabric_id"; 
			$result1 = mysqli_query($dbc, $query1) or die('Error querying database query1.');
			while ($rowq1 = mysqli_fetch_array($result1)) {
				$fabric_id = $rowq1['fabric_id'];
				$id_code = $rowq1['id_code'];
				$brand = $rowq1['brand'];
				$name = $rowq1['name'];
				$fabric_type = $rowq1['fabric_type'];
				$color = $rowq1['color'];
				$texture = $rowq1['texture'];
				$composition = $rowq1['composition'];
				$supplier = $rowq1['supplier'];
				$cp = $rowq1['cp'];
				$fp = $rowq1['fp'];
				
				echo "<tr>
					<td><a href=$fabric_info_php?svr_mode=$svr_mode&fabric_id=$fabric_id&fsv=0&psv=0>$fabric_id</a></td>
					<td>$id_code</td>
					<td>$brand</td>
					<td>$name</td>
					<td>$fabric_type</td>
					<td>$color</td>
					<td>$texture</td>
					<td>$composition</td>
					<td>$supplier</td>
					<td>$cp</td>
					<td>$fp</td>
				</tr>";
			}
			
			mysqli_close($dbc);
		?>
		</tbody>
	</table>
	
</div>

</body>
</html>