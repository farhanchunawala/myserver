<!DOCTYPE html>
<html lang="en">
<head> <title>My Fitness</title>
	<?php $fdir='../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;  $svr_mode='svr_myfitness'; ?>
	<script id='svr_mode_script' ></script>
</head>
<body>
<?php $navtitle='My Fitness';  $navlink=$myfitness_php;  include $navbar_php; ?>
	
	<h1 class="pb-4">ZM App Wall</h1>
	<div class="container-fluid m-n2">
	<div class="d-flex flex-wrap align-content-around">
		<a class="btn btn-outline-secondary m-2" href=<?php echo $ingredientlist_php."?svr_mode=$svr_mode&srh=0";?> style="width:94px; height:94px; display:flex; justify-content:center; align-items:center" ><b>Ingredient List</b></a>
		<a class="btn btn-outline-secondary m-2" href=<?php echo $dishlist_php."?svr_mode=$svr_mode&srh=0";?> style="width:94px; height:94px; display:flex; justify-content:center; align-items:center" ><b>Dish List</b></a>
		<a class="btn btn-outline-secondary m-2" href=<?php echo $nutrient_calc_php."?svr_mode=$svr_mode&srh=0";?> style="width:94px; height:94px; display:flex; justify-content:center; align-items:center" ><b>Nutrient Calc</b></a>
	</div>
	</div>
	
</body>
</html>