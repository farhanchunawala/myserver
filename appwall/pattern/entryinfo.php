<?php
	// $svr_mode="local_kkms";  $sr=37;  $garb_id=609;
	$svr_mode=$_REQUEST["svr_mode"];  $sr=$_REQUEST["sr"];  $garb_id=$_REQUEST["garb_id"];
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	include $atb_entry2_php;
	
	class myEntryTop {
		function __construct($garb_id, $sr, $pairing, $description, $entry_date, $submit_date, 
		$fabric_id, $pana, $clothln, $fabric_spo, $fabric_spd, $fabric_sp, $stitching_spo, $stitching_spd, $stitching_sp, 
		$pattern_id, $pattern_spo, $pattern_spd, $pattern_sp, $emb_id, $emb_spo, $emb_spd, $emb_sp, 
		$stylename, $garbtype, $garbstyle, $garbsubstyle, 
		$length, $sleeve_ln, $pocket_down, $hala, $t_chest, $t_stomach, $t_seat, $t_bottom, $collar, $cuff_br, 
		$sub_style, $collar_type, $cuff_ln, $cuff_type, $pocket_type, $shoulder_type, $taweez_type, 
		$note1, $note2, $note3) {
			$atb_style_php = '../../appwall/arr/atb_style.php';
			include '../../appwall/arr/atb_entry2.php';
			foreach ($atb_entry_info as $var) $this->$var = $$var;
			foreach ($atb_style_entrysp as $var) $this->$var = $$var;
			foreach ($atb_styletop as $var) $this->$var = $$var;
		}
	}
	class myEntryBtm {
		function __construct($garb_id, $sr, $pairing, $description, $entry_date, $submit_date, 
		$fabric_id, $pana, $clothln, $fabric_spo, $fabric_spd, $fabric_sp, $stitching_spo, $stitching_spd, $stitching_sp, 
		$pattern_id, $pattern_spo, $pattern_spd, $pattern_sp, $emb_id, $emb_spo, $emb_spd, $emb_sp, 
		$stylename, $garbtype, $garbstyle, $garbsubstyle, 
		$length, $fork_ln, $fork_losing, $thigh_losing, $lower_thigh_losing, $calf_losing, $bottom, $cuttingfactor, $pleats, 
		$sub_style, $belt_type, $chainfly, $pocket_type, $pocket, $backpocket, $watchpocket, $bottom_type, $crease, 
		$note1, $note2, $note3) {
			$atb_style_php = '../../appwall/arr/atb_style.php';
			include '../../appwall/arr/atb_entry2.php';
			foreach ($atb_entry_info as $var) $this->$var = $$var;
			foreach ($atb_style_entrysp as $var) $this->$var = $$var;
			foreach ($atb_stylebtm as $var) $this->$var = $$var;
		}
	}
	
	$qry_entry = "SELECT * FROM entry WHERE garb_id=$garb_id";
	$result_entry = mysqli_query($dbc, $qry_entry) or die('<b>Error '.$filepath.'/'.$qry_entry.' : </b><br/>'.mysqli_error($dbc));
	$rq_entry = mysqli_fetch_array($result_entry);
	foreach ($atb_entry as $var) $$var = $rq_entry[$var];
	
	if ($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura')	{
		$myEntry = new myEntryTop($garb_id, $sr, $pairing, $description, $entry_date, $submit_date, 
			$fabric_id, $pana, $clothln, $fabric_spo, $fabric_spd, $fabric_sp, $stitching_spo, $stitching_spd, $stitching_sp, 
			$pattern_id, $pattern_spo, $pattern_spd, $pattern_sp, $emb_id, $emb_spo, $emb_spd, $emb_sp, 
			$stylename, $garbtype, $garbstyle, $garbsubstyle, 
			$length, $sleeve_ln, $pocket_down, $hala, $t_chest, $t_stomach, $t_seat, $t_bottom, $collar, $cuff_br, 
			$sub_style, $collar_type, $cuff_ln, $cuff_type, $pocket_type, $shoulder_type, $taweez_type, 
			$note1, $note2, $note3);
	} else {
		$myEntry = new myEntryBtm($garb_id, $sr, $pairing, $description, $entry_date, $submit_date, 
			$fabric_id, $pana, $clothln, $fabric_spo, $fabric_spd, $fabric_sp, $stitching_spo, $stitching_spd, $stitching_sp, 
			$pattern_id, $pattern_spo, $pattern_spd, $pattern_sp, $emb_id, $emb_spo, $emb_spd, $emb_sp, 
			$stylename, $garbtype, $garbstyle, $garbsubstyle, 
			$length, $fork_ln, $fork_losing, $thigh_losing, $lower_thigh_losing, $calf_losing, $bottom, $cuttingfactor, $pleats, 
			$sub_style, $belt_type, $chainfly, $pocket_type, $pocket, $backpocket, $watchpocket, $bottom_type, $crease, 
			$note1, $note2, $note3);
	}
	
	mysqli_close($dbc);
	$myJSON = json_encode($myEntry);
	echo $myJSON;
?>