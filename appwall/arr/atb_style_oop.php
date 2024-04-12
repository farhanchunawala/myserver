<?php
	class kurta {
		public $sub_style;
		public $collar_type;
		public $cuff_ln;
		public $cuff_type;
		public $pocket_type;
		public $shoulder_type;
		public $taweez_type;
		
		function set_sub_style($sub_style) 			{ $this->sub_style = $sub_style; }
		function set_collar_type($collar_type) 	{ $this->collar_type = $collar_type; }
		function set_cuff_ln($cuff_ln) 				{ $this->cuff_ln = $cuff_ln; }
		function set_cuff_type($cuff_type) 			{ $this->cuff_type = $cuff_type; }
		function set_pocket_type($pocket_type) 	{ $this->pocket_type = $pocket_type; }
		function set_shoulder_type($shoulder_type){ $this->shoulder_type = $shoulder_type; }
		function set_taweez_type($taweez_type) 	{ $this->taweez_type = $taweez_type; }
		
		function get_sub_style()		{ return $this->sub_style; }
		function get_collar_type()		{ return $this->collar_type; }
		function get_cuff_ln()			{ return $this->cuff_ln; }
		function get_cuff_type()		{ return $this->cuff_type; }
		function get_pocket_type()		{ return $this->pocket_type; }
		function get_shoulder_type()	{ return $this->shoulder_type; }
		function get_taweez_type()		{ return $this->taweez_type; }
	}
	
	$atb_style_ptnshirt 	= array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type');
	$atb_style_ptnkurta 	= array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type', 'taweez_type');
	$atb_style_ptnkandura= array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type', 'taweez_type');
	$atb_style_ptnpant 	= array('belt_type', 'pocket_type', 'backpocket', 'watchpocket', 'crease');
	$atb_style_ptnsalwar = array('sub_style', 'belt_type', 'chainfly', 'pocket_type', 'pocket', 'backpocket', 'watchpocket', 'bottom_type');
	
	if     ($garbtype=='shirt') 	$ar_sub_style		= array('oshirt', 'bshirt', 'bshirtsc');
	elseif ($garbtype=='kurta') 	$ar_sub_style		= array('straight', 'round', 'kali');
	elseif ($garbtype=='salwar')	$ar_sub_style		= array('nokali', 'kali');
											$ar_collar_type	= array('rmpc', 'mrmpc', 'lspc', 'bc', 'nocollar');
											$ar_cuff_ln			= array('12', '25', '38', '50', '57', '63', '76');
											$ar_cuff_type		= array('cut', 'square', 'round', 'nocuff', 'halfsleeve');
	if ($garb_category=='top') 	$ar_pocket_type	= array('nopocket', 'v', 'square', 'round', 'flap', 'wallet');
	elseif ($garbtype=='pant') 	$ar_pocket_type	= array('xp', 'sp');
	else					   			$ar_pocket_type	= array('sp', 'cp');
											$ar_shoulder_type	= array('regular', 'noshoulder', 'vshoulder', 'dvshoulder');
											$ar_taweez_type	= array('v', 'square');
	if ($garbtype=='pant') 			$ar_belt_type		= array('lbelt', 'cbelt');
	else				   				$ar_belt_type		= array('belt', 'nari_lastic', 'nari', 'lastic');
											$ar_chainfly		= array('no', 'yes');
											$ar_pocket			= array('0', '1', '2');
											$ar_backpocket		= array('0', '1', '2');
											$ar_watchpocket	= array('0', '1', '2');
											$ar_crease			= array('fc', 'sc');
											$ar_bottom_type	= array('nocanvas', 'canvas');
	
	/* $kurta_straight = new kurta();
	$kurta_round = new kurta();
	$kurta_straight->set_collar_type('rmpc');
	$kurta_round->set_collar_type('bc'); */
	
	/* echo $kurta_straight->get_collar_type()."<br>";
	echo $kurta_round-->get_collar_type(); */
?>