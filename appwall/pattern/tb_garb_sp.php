<?php
	if (isset($_GET['svr_mode']))	{ $svr_mode=$_GET["svr_mode"];	$sr=$_GET["sr"];	}
	else									{ $svr_mode="local_kkms";			$sr=37;				}
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	$fabric_id = $pana = $clothln = $fabric_sp = $stitching_sp = $pattern_id = $pattern_sp = $emb_id = $emb_sp = '';
	
	class garbSp {
		function __construct($fabric_id, $pana, $clothln, $fabric_sp, $stitching_sp, $pattern_id, $pattern_sp, $emb_id, $emb_sp) {
			$garb_category='top';
			include '../../appwall/arr/atb_style2.php';
			foreach ($atb_style_entrysp2 as $var) $this->$var = $$var;
		}
	}
	$myObj = new garbSp($fabric_id, $pana, $clothln, $fabric_sp, $stitching_sp, $pattern_id, $pattern_sp, $emb_id, $emb_sp);
	
	mysqli_close($dbc);
	$myJSON = json_encode($myObj);
	echo $myJSON;
?>