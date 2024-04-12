<?php
	$atb_entry = array('garb_id', 'sr', 'stylename', 'garbtype', 'garbstyle', 'garbsubstyle', 'pairing', 'description', 
		'book_date', 'submit_date', 'pana', 'clothln');
		
	$atb_entry_sv1 = array('sr', 'stylename', 'garbtype', 'garbstyle', 'garbsubstyle', 'pairing', 'description', 'submit_date', 
		'pana', 'clothln');
		
	$atb_entry_styleinfo = array('stylename', 'garbtype', 'garbstyle', 'garbsubstyle');
	
	$atb_entry_desc = array('garb_id', 'pairing', 'description', 'submit_date', 'pana', 'clothln');
	
	include $atb_style2_php;
	$atb_entrystyle_sv1=array_merge($atb_style_entryid,	$atb_style_styleinfo,	${'atb_style_fit'.$garbtype}, ${'atb_style_ptn'.$garbtype}, $atb_style_notes, $atb_style_entrysp);
	
?>