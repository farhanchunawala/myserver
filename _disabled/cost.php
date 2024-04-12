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
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
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

<div class="container">
	<h1 class="mt-1 text-center text-white">Buttons</h1>
	
	<form method="post" action="button_select.php?sv=1">   <div class="form-group">
	<table class="table table-striped table-sm text-center">
	
	<?php
		$shirt_sp = 400;
		$cutting = 30;
		$karigari_shirt = 95;
		$karigari = $karigari_shirt;
		$thread = 5;
		$collar = 0;
		$cuff = 0;
		$kaj_patti = 0;
		$chak_patti = 0;
		$kaj = 8;
		$buttons = 5;
		$press = 6;
		
		$sp = $shirt_sp;
		$cp = $cutting + $karigari + $thread + $kaj + $buttons + $press;
		$profit = $sp - $cp;
	?>
	<thead>
		<tr>
			<th>Shirt</th>
			<th><?php echo "$karigari"?></th>
		</tr>
    </thead>
	
	<tbody>
		
		<tr>
			<td>Karigari</td>
			<td><?php echo "$karigari"?></td>
		</tr>
		<tr>
			<td>Profit</td>
			<td><?php echo "$profit"?></td>
		</tr>
		
		
    </tbody>
	
	<?php mysqli_close($dbc); ?>
	
	</table>
	</div></form>
	<hr/>
	
</div>

</body>
</html>