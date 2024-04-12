<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 3 -->
<head>
	<?php $sr=$_GET['sr']; //$garb_id=$_GET['garb_id']; ?>
	<title><?php echo "$sr Entry Save"?></title>
	<?php $svr_mode=$_GET['svr_mode'];  $fdir='../../';  include $fdir.'svr/svr_mode.php'; ?>
	<style>
		#svg {
			margin-left:auto;
			margin-right:auto;
			display:block;
		}
		@font-face { font-family:"futura"; 		 src:url("futura/futura_medium_bt.ttf") }
		@font-face { font-family:"futura_bold";  src:url("futura/futura_bold.ttf")  	}
		@font-face { font-family:"futura_heavy"; src:url("futura/futura_heavy.ttf") 	}
		
		* 			  { font-family:"futura"; 	   }
		.futura_bold  { font-family:"futura_bold"; }
		.futura_heavy { font-family:"futura_heavy";}
		.strike_through  { text-decoration:line-through; }
	</style>
	<style>
		h1 {text-align:center; font-size:120px;}
		h2 {text-align:center; font-size:20px; letter-spacing:2px; line-height: 1.4;}
	</style>
</head>
<body>
<?php
	$obj = json_decode($_POST['mystyles_count']);
	
	foreach($obj as $key => $var) {
		
		//if ($var->garbcount > 0) include $sub_pattern_sv_php;
		// foreach($var as $k => $v) {
			// echo $k . " => " . $v . "<br>";
		// }
	}
	
	//include $sub_cust_save_php;
	// $arr='atb_meas1';  include $sub_meas_save_php;
	
	{	//pattern_save
		// $query_sstyle = "SELECT * FROM style WHERE sr=$sr";
		// $result_sstyle = mysqli_query($dbc, $query_sstyle) or die('<b>Error pattern_save.php/query_sstyle : </b><br/>'.mysqli_error($dbc));
		// while ($rowq_sstyle = mysqli_fetch_array($result_sstyle)) {
			// $stylename = $rowq_sstyle['stylename'];
			// $a_garbstyle[$stylename]['stylename']    = $rowq_sstyle['stylename'];
			// $a_garbstyle[$stylename]['garbtype']     = $rowq_sstyle['garbtype'];
			// $a_garbstyle[$stylename]['garbstyle']    = $rowq_sstyle['garbstyle'];
			// $a_garbstyle[$stylename]['garbsubstyle'] = $rowq_sstyle['garbsubstyle'];
		// }
		// foreach ($a_garbstyle as $var) {
			// $garbcount = $_GET[$var['stylename'].'c'];
			// if ($garbcount >= '0') include $sub_pattern_sv_php;
		// }
	}
	
	// include $sub_sp_php;
	
	mysqli_close($dbc);
?>
<script>
function printit() {
  window.print();
}
</script>

</body>
</html>