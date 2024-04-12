<?php
	// $svr_mode="local_kkms";  $sr=37;  $stylename='kurta_0';  $garbtype='kurta';  $garbcount=3;
	$svr_mode=$_GET["svr_mode"];  $sr=$_GET["sr"];  $stylename=$_GET["stylename"];  $garbtype=$_GET["garbtype"];  $garbcount=$_GET["garbcount"];
	$garb_category = ($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? 'top' :  'btm' ;
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
	include $atb_style_php;
	
	$qry='atb_style';  $arr='atb_style_ptn'.$garb_category;  $select='*';  $table='style';  $whr="WHERE sr=$sr AND stylename=\"$stylename\"";  $order_by='';  $limit='';  $qm='fe';
	include $query_select_php;
	
	// $qry='atb_style';  $arr='atb_style_notes';  $select='*';  $table='style';  $whr="WHERE sr=$sr AND stylename=\"$stylename\"";  $order_by='';  $limit='';  $qm=2;
	// include $query_select_php;
	
	if ($garb_category=='top') {
		
		class garbStyle {
			function __construct($sub_style, $collar_type, $cuff_ln, $cuff_type, $pocket_type, $shoulder_type, $taweez_type) {
				$garb_category='top';
				include '../../appwall/arr/atb_style.php';
				foreach ($atb_style_ptntop as $var) $this->$var = $$var;
			}
		}
		$garbStyle = new garbStyle($sub_style, $collar_type, $cuff_ln, $cuff_type, $pocket_type, $shoulder_type, $taweez_type);
		
	} else {
		
		class garbStyle {
			function __construct($sub_style, $belt_type, $chainfly, $pocket_type, $pocket, $backpocket, $watchpocket, $bottom_type, $crease) {
				$garb_category='btm';
				include '../../appwall/arr/atb_style.php';
				foreach ($atb_style_ptnbtm as $var) $this->$var = $$var;
			}
		}
		$garbStyle = new garbStyle($sub_style, $belt_type, $chainfly, $pocket_type, $pocket, $backpocket, $watchpocket, $bottom_type, $crease);
		
	}
	
	mysqli_close($dbc);
	$myJSON = json_encode($garbStyle);
	echo $myJSON;
?>