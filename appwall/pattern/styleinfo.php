<?php
	if (isset($_GET['svr_mode']))	{ $svr_mode=$_GET["svr_mode"];	$sr=$_GET["sr"];	}
	else									{ $svr_mode="local_kkms";			$sr=37;				}
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	include $atb_style_php;
	
	class myStylesTop {
		function __construct($stylename, $garbtype, $garbstyle, $garbsubstyle, 
		$length, $sleeve_ln, $pocket_down, $hala, $t_chest, $t_stomach, $t_seat, $t_bottom, $collar, $cuff_br, 
		$sub_style, $collar_type, $cuff_ln, $cuff_type, $pocket_type, $shoulder_type, $taweez_type, 
		$note1, $note2, $note3, $garbcount) {
			include '../../appwall/arr/atb_style.php';
			foreach ($atb_styletop as $var) $this->$var = $$var;
			$this->garbcount = $garbcount;
		}
	}
	class myStylesBtm {
		function __construct($stylename, $garbtype, $garbstyle, $garbsubstyle, 
		$length, $fork_ln, $fork_losing, $thigh_losing, $lower_thigh_losing, $calf_losing, $bottom, $cuttingfactor, $pleats, 
		$sub_style, $belt_type, $chainfly, $pocket_type, $pocket, $backpocket, $watchpocket, $bottom_type, $crease, 
		$note1, $note2, $note3, $garbcount) {
			include '../../appwall/arr/atb_style.php';
			foreach ($atb_stylebtm as $var) $this->$var = $$var;
			$this->garbcount = $garbcount;
		}
	}
	
	$qry_style = "SELECT * FROM style WHERE sr=$sr";
	$result_style = mysqli_query($dbc, $qry_style) or die('<b>Error '.$filepath.'/'.$qry_style.' : </b><br/>'.mysqli_error($dbc));
	$i=0;
	while ($rq_style = mysqli_fetch_array($result_style)) {
		foreach ($atb_style1 as $var) {
			$$var			= $rq_style[$var];
			$garbcount	= 0;
		}
		if ($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura')	{
			$mystyles[$i] = new myStylesTop($stylename, $garbtype, $garbstyle, $garbsubstyle, 
				$length, $sleeve_ln, $pocket_down, $hala, $t_chest, $t_stomach, $t_seat, $t_bottom, $collar, $cuff_br, 
				$sub_style, $collar_type, $cuff_ln, $cuff_type, $pocket_type, $shoulder_type, $taweez_type, 
				$note1, $note2, $note3, $garbcount);
		} else {
			$mystyles[$i] = new myStylesBtm($stylename, $garbtype, $garbstyle, $garbsubstyle, 
				$length, $fork_ln, $fork_losing, $thigh_losing, $lower_thigh_losing, $calf_losing, $bottom, $cuttingfactor, $pleats, 
				$sub_style, $belt_type, $chainfly, $pocket_type, $pocket, $backpocket, $watchpocket, $bottom_type, $crease, 
				$note1, $note2, $note3, $garbcount);
		}
		$i++;
	}
	
	mysqli_close($dbc);
	$myJSON = json_encode($mystyles);
	echo $myJSON;
?>
