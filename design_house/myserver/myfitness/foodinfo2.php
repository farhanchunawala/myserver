<!DOCTYPE html>
<html lang="en">
<head>
	<?php $food_id=$_GET['food_id'];  echo "<title>$food_id Info</title>";
	$fdir='../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>
<?php
	error_reporting(E_ALL & ~E_NOTICE);
	// $navtitle='Food Info';  $navlink=$foodinfo_php."?svr_mode=$svr_mode&sv=0";  include $navbar_php;
	
	if ($_GET['sv']==1) {
		$foodInfos = json_decode($_POST['foodInfos']);
		
		$food_id = $foodInfos[0]->food_id;
		$food_id2 = $_GET['food_id'];
		
		$myArr=$foodInfos;  $tbl='food';  $whr="WHERE food_id=$food_id";
		if ($food_id2==1)		include $pdo_insert_php;
		elseif ($food_id!=1)	include $pdo_update_php;
	}
?>

<h1 class="pb-3">Fabric Info</h1>
<div class="container-fluid" style="width:1000px">
	<form method="post" action=<?php echo $foodinfo_php."?food_id=$food_id&svr_mode=$svr_mode&sv=1";?> >
		<input type="hidden" id="foodInfos"	name="foodInfos"	value="">
		<div class="form-group form-inline d-flex flex-wrap align-content-around" id="fmg_foodInfo"></div>
	</form>
</div>

<script>
	"use strict";
	var fdir = '../';
	//var foodInfos=[];	var foodInfo ={};
	
	let url		= new URL(window.location.href);
	let svr_mode= url.searchParams.get("svr_mode");
	let food_id		= url.searchParams.get("food_id");
</script>
<script src="<?php echo $loaddoc_js; ?>"></script>
<script src="<?php echo $fmg1_js; ?>"></script>
<script>
	function foodInfo(xhttp) {
		foodInfos = JSON.parse(xhttp.responseText);
		fmg1(foodInfos, 'fmg_foodInfo', 'foodInfos');
	}
</script>
<script>
	loadDoc(fdir+'qry/pdo_select.php?svr_mode='+svr_mode, foodInfo, 'sql='+encodeURIComponent('SELECT * FROM food WHERE food_id='+food_id));
</script>
<?php mysqli_close($dbc); ?>

</body>
</html>