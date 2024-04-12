<!DOCTYPE html>
<html lang="en">
<head>
	<title>Customer List</title>
	<?php $fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php; 
	$svr_mode=$_GET['svr_mode'];  $srh=$_GET['srh']; ?>
</head>
<body>
<?php $navtitle='New';  $navlink=$customer_info1_php."?svr_mode=$svr_mode&sr=0&sv=insert";  include $navbar_php; ?>

<div class="container">
	<h1 class="m-5"> &nbsp </h1>
	<div id='listtable'></div>
</div>

<script>
	let url		= new URL(window.location.href);
	let svr_mode= url.searchParams.get("svr_mode");
	let srh		= url.searchParams.get("srh");
</script>
<script src="<?php echo $loaddoc_js		?>"></script>
<script src="<?php echo $custtable_js	?>"></script>

</body>
</html>