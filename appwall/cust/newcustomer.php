<!--	parent
notepad++ C:/xampp/htdocs/myserver/appwall/cust/customerlist.php
-->
<!--	children
notepad++ C:/xampp/htdocs/myserver/svr_mode.php
-->
<!DOCTYPE html>			<!-- alt + shift + 6 -->
<html lang="en">
<head>
	<title>New Customer</title>
	<?php $fdir='../../';  include $fdir.'svr/filepath.php';  include $bootstrapcdn_php;
	$svr_mode=$_GET['svr_mode'];  include $svr_mode_php; ?>
</head>
<body>
<?php include $atb_cust_php; ?>

<div class="container-fluid pl-3 pr-3">
	
	<form method="post" action=<?php echo $customer_info_php."?svr_mode=$svr_mode&sr=0&cs=0&csv=1";?> >
	<div class="form-group">
	
	<div class="d-flex flex-wrap align-content-around">
		<div class="p-4"><label for="sr">Sr</label>
			<input type="text" class="form-control" name="sr" value="" style="width:150px" />
		</div>
		<?php foreach($atb_cust2 as $var) { ?> <div class="p-4">
			<label for="<?php echo $var; ?>"><?php echo ucwords($var); ?></label>
			<input type="text" class="form-control" name="<?php echo $var; ?>" value="" style="width:150px" />
		</div> <?php } ?>
		<button type="submit" class="btn btn-info my-5 mx-4" value="save" name="submit" style="height:45px">Save</button>
	</div>
	
	</div>
	</form>
	
</div>

<?php mysqli_close($dbc); ?>
</body>
</html>