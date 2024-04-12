<!DOCTYPE html>
<html lang="en">
<head>
	<title>KK App Wall 2</title>
	<?php include 'plugs_n_libs/bootstrapcdn.php'; ?>
</head>
<body>

<?php
	$svr_mode = 'local_cnv';
	include 'sub/sub_svr_mode.php';
	
	$navtitle = 'KK App Wall 2';
	$navlink = 'appwall.php';
	include 'sub/sub_navbar.php';
	
	include 'sub/sub_appwall.php';
?>

</body>
</html>