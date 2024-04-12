<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Tools</title>
	<?php $svr_mode='local_kkms';  $fdir='../';  include $fdir.'svr_mode.php'; ?>
</head>
<body>

<?php $navtitle='Tool Wall';  $navlink=$apptools_php;  include $navbar_php; ?>
	
	<h1 class="pb-4">KK App Wall</h1>
	<div class="container-fluid m-n2">
	<div class="d-flex flex-wrap align-content-around">
		<a class="btn btn-outline-secondary m-2" href=<?php echo $codefinder_php."?svr_mode=$svr_mode&cf=0";?> style="width:94px; height:94px; display:flex; justify-content:center; align-items:center"><b>Code Finder</b></a>
		<a class="btn btn-outline-secondary m-2" href=<?php echo $sandbox_map_php	 ."?svr_mode=$svr_mode";?> style="width:94px; height:94px; display:flex; justify-content:center; align-items:center"><b>Sandbox Map</b></a>
		<a class="btn btn-outline-secondary m-2" href=<?php echo $sandbox_pattern_php."?svr_mode=$svr_mode";?> style="width:94px; height:94px; display:flex; justify-content:center; align-items:center"><b>Sandbox Pattern</b></a>
	</div>
	</div>
	
</body>
</html>