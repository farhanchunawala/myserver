<?php
	$atb_entry_info = array('garb_id', 'sr', 'pairing', 'description', 'entry_date', 'submit_date');
	
	$atb_style_entrysp = array('fabric_id', 'pana', 'clothln', 'fabric_spo', 'fabric_spd', 'fabric_sp', 'stitching_spo', 'stitching_spd', 
		'stitching_sp', 'pattern_id', 'pattern_spo', 'pattern_spd', 'pattern_sp', 'emb_id', 'emb_spo', 'emb_spd', 'emb_sp');
	
	include $atb_style_php;
	
	$atb_entry = array_merge($atb_entry_info, $atb_style1, $atb_style_entrysp);
?>