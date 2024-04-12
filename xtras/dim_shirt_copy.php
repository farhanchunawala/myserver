<?php
	
	$backtype = '';
	
	{	//front
		
		if ($garb_type=='shirt') {
			if ($garb_style=='oshirt')	$x_sf_length = $length + 1.125;
			else 						$x_sf_length = $length + 0.75 + 1.25;
		} else {						$x_sf_length = $length + 0.75 + 0.75;	}
		$y_sf_frontpatti = ($garb_type=='shirt') ? '2' : '0';
		$y_sf_neck = 2.25;
		
		$x_sf_collarln = 2;
		if ($garb_type=='shirt') $y_sf_shoulder = shouldertrim($shoulder) / 2 + 0.5;
		else $y_sf_shoulder = shouldertrim($shoulder) / 2;
		
		$x_sf_chestln = $hala;
		$x_sf_armhole = $x_sf_chestln - $x_sf_collarln;
		$y_sf_chest = $t1;
		$x_sf_halaline = $x_sf_armhole - ($y_sf_chest - $y_sf_shoulder);
		
		$x_sf_stomachln = $shoulder;
		$y_sf_stomach = $t2;
		
		$y_sf_seat = $t3;
		
	}
	{	//back
		
		$y_sb_markback = ($garb_type=='shirt') ? '1' : '0'; 
		
		if ($backtype=='onepiece') {
			
			$x_sb_length = $x_sf_length + 2.5;
			if ($collartype=='bc' || $collartype=='nocollar')	$x_sb_rounding = 1.125;
			else												$x_sb_rounding = 1.750;
			$y_sb_rounding = 2.5;
			$x_sb_length_m_rounding = $x_sb_length - $x_sb_rounding;
			
			$x_sb_slope = 2;
			$y_sb_shoulder = shouldertrim($shoulder) / 2 + 0.25;
			$y_sb_slope_m_rounding = $y_sb_shoulder - $y_sb_rounding;
			
			$y_sb_t1 = $t1 - $y_sb_markback;
			$y_sb_t1_m_shoulder = $y_sb_t1 - $y_sb_shoulder;
			
			$x_sb_halaline = $x_sf_chestln + 2.5 - $x_sb_slope - $y_sb_t1_m_shoulder;
			
		} else {
			
			$x_sb_length = $x_sf_length - 2.5;
			if ($garb_type=='shirt') $y_sb_shoulder = shouldertrim($shoulder) / 2 + 0.5;
			else $y_sb_shoulder = shouldertrim($shoulder) / 2;
			
			$y_sb_t1 = $t1 - $y_sb_markback;
			$y_sb_t1_m_shoulder = $y_sb_t1 - $y_sb_shoulder;
			
			$x_sb_halaline = $x_sf_chestln - 2.5 - $y_sb_t1_m_shoulder;
			
		}
		
		$x_sb_stomach_m_hala = $x_sf_stomachln - $x_sf_chestln;
		$y_sb_t2 = $t2 - $y_sb_markback;
		$y_sb_t2_m_t1 = $y_sb_t2 - $y_sb_t1;
		
		$x_sb_length_m_stomach = $x_sf_length - $x_sf_stomachln;
		$y_sb_t3 = $t3 - $y_sb_markback;
		$y_sb_t3_m_t2 = $y_sb_t3 - $y_sb_t2;
		
	}
	{	//sleeve
		
		$x_ss_length = $sleeve - ($cuffln[$i] - 1) + 1;
		//$x_ss_length2 = $sleeve - ($cuffln[$i] - 1) + 1 + 0.5;
		if ($cufftype[$i]=='nocuff')	$y_ss_cuff = $cuffbr / 2 + 0.5;
		else							$y_ss_cuff = $cuffbr / 2 + 1;
		$y_ss_cuffx2 = $y_ss_cuff * 2;
		
		$x_ss_hala = 4.5;
		$y_ss_hala = $hala;
		$y_ss_halax2 = 2 * $y_ss_hala;
		
		$x_ss_edge = $x_ss_length - $x_ss_hala;
		$y_ss_edge = $y_ss_hala - $y_ss_cuff;
		
	}
	{	//shoulder
		
		$x_sh_markshoulder = 2.5;
		
		$x_sh_length = shouldertrim($shoulder) / 2 + 0.5;
		$y_sh_height = 6;
		$y_sh_slope = 2;
		$y_sh_height_m_slope = $y_sh_height - $y_sh_slope;
		
		$x_sh_rounding = 2.5;
		$x_sh_slope = $x_sh_length - $x_sh_rounding;
		$y_sh_rounding = 1.75;
		$y_sh_height_m_rounding = $y_sh_height - $y_sh_rounding;
		
	}
	
?>