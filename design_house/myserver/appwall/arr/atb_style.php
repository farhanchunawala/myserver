<?php
	$atb_style_info	= array('stylename', 'garbtype', 'garbstyle', 'garbsubstyle');
	
	$atb_style_fit		= array('length', 'sleeve_ln', 'pocket_down', 'hala', 't_chest', 't_stomach', 't_seat', 't_bottom', 'collar', 'cuff_br', 
									'fork_ln', 'fork_losing', 'thigh_losing', 'lower_thigh_losing', 'calf_losing', 'bottom', 'cuttingfactor', 'pleats');
	$atb_style_fittop = array('length', 'sleeve_ln', 'pocket_down', 'hala', 't_chest', 't_stomach', 't_seat', 't_bottom', 'collar', 'cuff_br');
	$atb_style_fitbtm = array('length', 'fork_ln', 'fork_losing', 'thigh_losing', 'lower_thigh_losing', 'calf_losing', 'bottom', 'cuttingfactor', 'pleats');
	
	$atb_style_ptn		= array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type', 'taweez_type', 
									'belt_type', 'chainfly', 'pocket', 'backpocket', 'watchpocket', 'bottom_type', 'crease');
	$atb_style_ptntop = array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type', 'taweez_type');
	$atb_style_ptnbtm	= array('sub_style', 'belt_type', 'chainfly', 'pocket_type', 'pocket', 'backpocket', 'watchpocket', 'bottom_type', 'crease');
	
	$atb_style_notes	= array('note1', 'note2', 'note3');
	
	$atb_styletop		= array_merge($atb_style_info,	$atb_style_fittop, $atb_style_ptntop,	$atb_style_notes);
	$atb_stylebtm		= array_merge($atb_style_info,	$atb_style_fitbtm, $atb_style_ptnbtm,	$atb_style_notes);
	$atb_style1			= array_merge($atb_style_info,	$atb_style_fit,	 $atb_style_ptn,		$atb_style_notes);
?>
