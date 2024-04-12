<!DOCTYPE html>
<html lang="en">
<head> <title>Z&M App Wall</title>
	<?php $fdir='../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;  $svr_mode='local_kkms'; ?>
</head>
<body>
<?php $navtitle='ZOLL & METÉR';  $navlink=$appwall2_php;  include $navbar_php; ?>
	
	<h1 class="pb-4">ZM App Wall</h1>
	<div class="container-fluid m-n2">
	<div class="d-flex flex-wrap align-content-around">
		<a class="btn btn-outline-secondary m-2" href=<?php echo $customerlist_php	   ."?svr_mode=$svr_mode&srh=0";?>					style="width:94px; height:94px; display:flex; justify-content:center; align-items:center" ><b>Customer List</b></a>
		<a class="btn btn-outline-secondary m-2" href=<?php echo $tasktracker_php	   ."?svr_mode=$svr_mode&task=cutting&sv=0";?>	style="width:94px; height:94px; display:flex; justify-content:center; align-items:center" ><b>Task Tracker</b></a>
		<a class="btn btn-outline-secondary m-2" href=<?php echo $fabric_inventory_php."?svr_mode=$svr_mode&srh=0";?>		  	 		style="width:94px; height:94px; display:flex; justify-content:center; align-items:center" ><b>Fabric Inventory</b></a>
	</div><hr/>
	<div class="d-flex flex-wrap align-content-around">
		<a class="btn btn-outline-secondary m-2" href=<?php echo $designer_php			."?svr_mode=local_designhouse";?>				style="width:94px; height:94px; display:flex; justify-content:center; align-items:center" ><b>Designer</b></a>
		<a class="btn btn-outline-secondary m-2" href=<?php echo $designlist_php		."?svr_mode=local_designhouse";?>				style="width:94px; height:94px; display:flex; justify-content:center; align-items:center" ><b>Design List</b></a>
	</div>
	</div>
	
</body>
</html>