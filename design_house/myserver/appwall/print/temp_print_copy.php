<!--	parent
notepad++ C:/xampp/htdocs/myserver/entrybook.php
-->
<!--	children
notepad++ C:/xampp/htdocs/myserver/plugs_n_libs/bootstrapcdn.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_svr_mode.php

notepad++ C:/xampp/htdocs/myserver/customer_info.php
notepad++ C:/xampp/htdocs/myserver/dim/dim_entry.php
notepad++ C:/xampp/htdocs/myserver/dim/dim_style.php
notepad++ C:/xampp/htdocs/myserver/dim/dim_meas.php
notepad++ C:/xampp/htdocs/myserver/dim/dim_top.php
notepad++ C:/xampp/htdocs/myserver/dim/dim_btm.php
notepad++ C:/xampp/htdocs/myserver/dim/dim_cloth.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_print_marking.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_print_map.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_print_cslip.php
notepad++ C:/xampp/htdocs/myserver/sub/sub_print_kslip.php
-->

<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 4 -->
<head>
	<?php
		$sr=$_GET['sr'];
		$garbtype = $_GET['garbtype'];
		$garb_id = $_GET['garb_id'];
		$print=$_GET['print'];
	?>
	<title><?php echo "$sr $garbtype $print"?></title>
	<?php $svr_mode=$_GET['svr_mode'];  $fdir='../../';  include $fdir.'svr_mode.php'; ?>
</head>
<body>
<style>
#marx {
	font-size: 24px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	padding-right: 0px;
}
#mar1 {
	font-size: 20px;
	border: 1px solid black;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar3 {
	font-size: 24px;
	border: 2px groove;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 20px;
	padding-right: 0px;
}
#marp {
	font-size: 20px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 10px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	padding-right: 0px;
}
#front {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#back {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#sleeve {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#shoulder {
	font-size: 24px;
	border-style: groove solid solid groove;
	border-width: 3px 5px 5px 3px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
</style>

<a onclick="printit()">
<?php
	if ($print=='print_map') include $fn_x2_php;
	include $fn_inchtocm_php;
	include $fn_inchtotext_php;
	include $fn_cmtoinchtext_php;
	//include $fn_shouldertrim_php;
	
	($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
	//include $dim_entry_php;
	include $dim_style_php;
	include $dim_meas_php;
	$garbcount=1;
	
	for($i=1; $i<=$garbcount; $i++) {
		include ${'dim_'.$garb_category.'_php'};
		//include $dim_cloth_php;
	}
	if     ($print=='print_marking') include $sub_print_marking_php;
	elseif ($print=='print_marking2') include $sub_print_marking2_php;
	elseif ($print=='print_map')	 include $sub_print_map_php;
	elseif ($print=='print_cslip')	 include $sub_print_cslip_php;
	else							 include $sub_print_kslip_php;
	
	mysqli_close($dbc);
?>
</a>

<script>
function printit() {
  window.print();
}
</script>

</body>
</html>