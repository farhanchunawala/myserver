<?php
	$atb_style_entryid = array('garb_id', 'sr', 'pairing', 'description', 'submit_date');
	
	$atb_style_entrysp = array('fabric_id', 'pana', 'clothln', 'fabric_spo', 'fabric_spd', 'fabric_sp', 'stitching_spo', 'stitching_spd', 'stitching_sp', 
		'pattern_id', 'pattern_spo', 'pattern_spd', 'pattern_sp', 'emb_id', 'emb_spo', 'emb_spd', 'emb_sp');
	
	$atb_style_entrysp2 = array('fabric_id', 'pana', 'clothln', 'fabric_sp', 'stitching_sp', 'pattern_id', 'pattern_sp', 'emb_id', 'emb_sp');
	
	$atb_style_styleinfo = array('stylename', 'garbtype', 'garbstyle', 'garbsubstyle');
	
	$atb_style_fittop 	= array('length', 'sleeve_ln', 'pocket_down', 'hala', 't_chest', 't_stomach', 't_seat', 't_bottom', 'collar', 'cuff_br');
	$atb_style_fitshirt 	= array('length', 'sleeve_ln', 'pocket_down', 'hala', 't_chest', 't_stomach', 't_seat', 't_bottom', 'collar', 'cuff_br');
	$atb_style_fitkurta 	= array('length', 'sleeve_ln', 'pocket_down', 'hala', 't_chest', 't_stomach', 't_seat', 't_bottom', 'collar', 'cuff_br');
	$atb_style_fitkandura= array('length', 'sleeve_ln', 'pocket_down', 'hala', 't_chest', 't_stomach', 't_seat', 't_bottom', 'collar', 'cuff_br');
	$atb_style_fitbtm 	= array('length', 'fork_ln', 'fork_losing', 'thigh_losing', 'lower_thigh_losing', 'calf_losing', 'bottom', 'cuttingfactor', 'pleats');
	$atb_style_fitpant 	= array('length', 'fork_ln', 'fork_losing', 'thigh_losing', 'lower_thigh_losing', 'calf_losing', 'bottom', 'cuttingfactor', 'pleats');
	$atb_style_fitsalwar = array('length', 'fork_ln', 'fork_losing', 'thigh_losing', 'lower_thigh_losing', 'calf_losing', 'bottom', 'pleats');
	
	$atb_style_ptntop 	= array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type', 'taweez_type');
	$atb_style_ptnshirt 	= array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type');
	$atb_style_ptnkurta 	= array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type', 'taweez_type');
	$atb_style_ptnkandura= array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type', 'taweez_type');
	$atb_style_ptnbtm		= array('sub_style', 'belt_type', 'chainfly', 'pocket_type', 'pocket', 'backpocket', 'watchpocket', 'bottom_type', 'crease');
	$atb_style_ptnpant 	= array('belt_type', 'pocket_type', 'backpocket', 'watchpocket', 'crease');
	$atb_style_ptnsalwar = array('sub_style', 'belt_type', 'chainfly', 'pocket_type', 'pocket', 'backpocket', 'watchpocket', 'bottom_type');
	
	$atb_style_notes = array('note1', 'note2', 'note3');
	
	if ($garb_category=='top') $ar_sub_style		= array('oshirt', 'bshirt', 'bshirtsc', 'straight', 'round', 'kali');
	else								$ar_sub_style		= array('nokali', 'kali');
										$ar_collar_type	= array('rmpc', 'mrmpc', 'lspc', 'bc', 'nocollar');
										$ar_cuff_ln			= array('1.27', '2.54', '3.81', '5.08', '5.72', '6.35', '7.62');
										$ar_cuff_type		= array('cut', 'square', 'round', 'nocuff', 'halfsleeve');
	if ($garb_category=='top') $ar_pocket_type	= array('nopocket', 'v', 'square', 'round', 'flap', 'wallet');
	else					   		$ar_pocket_type	= array('xp', 'sp', 'cp');
										$ar_shoulder_type	= array('regular', 'noshoulder', 'vshoulder', 'dvshoulder');
										$ar_taweez_type	= array('v', 'square');
										$ar_belt_type		= array('lbelt', 'cbelt', 'nari_lastic', 'nari', 'lastic');
										$ar_chainfly		= array('no', 'yes');
										$ar_pocket			= array('0', '1', '2');
										$ar_backpocket		= array('0', '1', '2');
										$ar_watchpocket	= array('0', '1', '2');
										$ar_crease			= array('fc', 'sc');
										$ar_bottom_type	= array('nocanvas', 'canvas');
	
	// $atb_style_sv1 	 =array_merge($atb_style_styleinfo,									${'atb_style_fit'.$garbtype}, ${'atb_style_ptn'.$garbtype}, $atb_style_notes);
	
?>