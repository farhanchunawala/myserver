<!DOCTYPE html>
<html lang="en">
<head>
	<title>Button View</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<script>
function printit() {
  window.print();
}
</script>

<?php
	function zero1pad($x) {
		$a = $x;
		if(strlen($a)==2){
			$a = str_replace("1","01",$a);
			$a = str_replace("2","02",$a);
			$a = str_replace("3","03",$a);
			$a = str_replace("4","04",$a);
			$a = str_replace("5","05",$a);
			$a = str_replace("6","06",$a);
			$a = str_replace("7","07",$a);
			$a = str_replace("8","08",$a);
			$a = str_replace("9","09",$a);
		}
			return $a;
	}
	
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	$sv = $_GET['sv'];
	
	$query4 = "SELECT * FROM entry WHERE garb_kbp=\"unchecked\" ORDER BY sr ASC";
		
	$result4 = mysqli_query($dbc, $query4)
	or die('Error querying database query4');
	
	$i=0;
	while ($rowq4 = mysqli_fetch_array($result4)) {
		$garb[$i] = $rowq4['garb_id'];
		/*$sr[$i] = $rowq4['sr'];
		$garb_type[$i] = $rowq4['garb_type'];
		$garb_pairing[$i] = $rowq4['garb_pairing'];
		$garb_color[$i] = $rowq4['garb_color'];
		$garb_description[$i] = $rowq4['garb_description'];
		$garb_button[$i] = $rowq4['garb_button'];*/
		$i++;
	}
	$garbcount = count($garb);
	
	if ($sv==1) {
		
		for($i = 0; $i < $garbcount; $i++) {
			
			$button = zero1pad($_POST["button$i"]);
			
			$query = "UPDATE `entry` SET `garb_button`=\"$button\" WHERE garb_id=$garb[$i]";
			
			$result = mysqli_query($dbc, $query)
				or die('Error querying database.');
		}
	}
?>

<nav class="navbar bg-dark navbar-dark fixed-top">
	
	<a href="button_view.php"><h2 class="navbar-brand mb-1">Button View</h2></a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	<ul class="navbar-nav">
		
		<li class="nav-item">
			<a class="nav-link" href="customer_list.php">Customer List</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="entrybook.php?sv=0">Entry Book</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="cutting.php?sv=0">Cutting</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="sewing.php?sv=0">Sewing</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="kajbutton.php?sv=0">Kaj Button</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="press.php?sv=0">Press</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="packing.php?sv=0">Packing</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="deliver.php?sv=0">Deliver</a>
		</li>
		
	</ul>
	</div>
	
</nav>

<a onclick="printit()">
<div class="container">
	<h1 class="mt-1 text-center text-white">Buttons</h1>
	
	<form method="post" action="button_select.php?sv=1">   <div class="form-group">
	<table class="table table-striped table-sm text-center">
	
	<thead>
		<tr>
			<th>Sr.no</th>
			<th>Description</th>
			<th>Button</th>
		</tr>
    </thead>
	
	<tbody>
	
	<?php
		$query5 = "SELECT * FROM entry ORDER BY garb_button ASC";
		
		$result5 = mysqli_query($dbc, $query5)
		or die('Error querying database query5');
		
		$i=0;
		while ($rowq5 = mysqli_fetch_array($result5)) {
			$garb[$i] = $rowq5['garb_id'];
			$sr[$i] = $rowq5['sr'];
			$garb_type[$i] = $rowq5['garb_type'];
			$garb_pairing[$i] = $rowq5['garb_pairing'];
			$garb_color[$i] = $rowq5['garb_color'];
			$garb_description[$i] = $rowq5['garb_description'];
			$garb_button[$i] = $rowq5['garb_button'];
			$i++;
		}
		$garbcount = count($garb);
		
		for($i = 0; $i < $garbcount; $i++) { ?>
		
		<tr>
			<td>   <input type="hidden" id="garb_id" name="garb_id" value="<?php echo $garb_id[$i]; ?>">
					<a href="customer_info.php?sr=<?php echo $sr[$i]; ?>&sv=0"><?php echo $sr[$i]; ?></a>-<?php echo $garb_pairing[$i]; ?>
			</td>
			<td>   <?php echo "$garb_type[$i] $garb_color[$i] $garb_description[$i]"; ?>
			</td>
			<td>   <b><?php echo "$garb_button[$i]"; ?></b> <img src="buttons/<?php echo "$garb_button[$i]";?>.jpg" height="100" width="100">
			</td>
		</tr>
		
		<?php }
			mysqli_close($dbc);
		?>
    </tbody>
	
	</table>
	</div></form>
	<hr/>
	
</div>
</a>


</body>
</html>