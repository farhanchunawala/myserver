<?php
	// $svr_mode="local_kkms";  $sr=37;  $stylename='salwar_aligard';  $garbtype='salwar';  $garbcount=3;
	$svr_mode=$_GET["svr_mode"];  $sr=$_GET["sr"];  $stylename=$_GET["stylename"];  $garbtype=$_GET["garbtype"];  $garbcount=$_GET["garbcount"];
	$garb_category = ($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? 'top' :  'btm' ;
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
	include $atb_style_php;
	
	$qry='atb_style_fit'.$garb_category;  $arr='atb_style_fit'.$garb_category;  $select='*';  $table='style';  $whr="WHERE sr=$sr AND stylename=\"$stylename\"";  $order_by='';  $limit='';  $qm='fe';
	include $query_select_php;
	
	if ($garb_category=='top') {
		
		class styleFit {
			function __construct($length, $sleeve_ln, $pocket_down, $hala, $t_chest, $t_stomach, $t_seat, $t_bottom, $collar, $cuff_br) {
				$garb_category='top';
				include '../../appwall/arr/atb_style.php';
				foreach ($atb_style_fittop as $var) $this->$var = $$var;
			}
		}
		$myObj = new styleFit($length, $sleeve_ln, $pocket_down, $hala, $t_chest, $t_stomach, $t_seat, $t_bottom, $collar, $cuff_br);
		
	} else {
		
		class styleFit {
			function __construct($length, $fork_ln, $fork_losing, $thigh_losing, $lower_thigh_losing, $calf_losing, $bottom, $cuttingfactor, $pleats) {
				$garb_category='btm';
				include '../../appwall/arr/atb_style.php';
				foreach ($atb_style_fitbtm as $var) $this->$var = $$var;
			}
		}
		$myObj = new styleFit($length, $fork_ln, $fork_losing, $thigh_losing, $lower_thigh_losing, $calf_losing, $bottom, $cuttingfactor, $pleats);
		
	}
	
	mysqli_close($dbc);
	$myJSON = json_encode($myObj);
	echo $myJSON;
?>