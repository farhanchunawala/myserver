<?php
	
	$backtype = '';
	
	{	//front
		
		$y_sf_frontpatti = ($garb_type=='shirt') ? '2' : '0';
		
		$x_sf_collarln = 2;
		$x_sf_chestln = $hala;
		$x_sf_stomachln = $shoulder;
		
		if ($garb_type=='shirt') {
			if ($garb_style=='oshirt')	$x_sf_length = $length + 1.125;
			else 						$x_sf_length = $length + 0.75 + 1.25;
		} else							$x_sf_length = $length + 0.75 + 0.75;
		
		$y_sf_neck = 2.25;
		if ($garb_type=='shirt') 	$y_sf_shoulder = shouldertrim($shoulder) / 2 + 0.5;
		else 						$y_sf_shoulder = shouldertrim($shoulder) / 2;
		$y_sf_chest = $t1;
		$y_sf_stomach = $t2;
		$y_sf_seat = $t3;
		
		$x_sf_armhole = $x_sf_chestln - $x_sf_collarln;
		$x_sf_halaline = $x_sf_armhole - ($y_sf_chest - $y_sf_shoulder);
		
	}
	{	//back
		
		$y_sb_markback = ($garb_type=='shirt') ? '1' : '0'; 
		
		if ($backtype=='onepiece') {
			
			if ($collartype=='bc' || $collartype=='nocollar')	$x_sb_rounding = 1.125;
			else												$x_sb_rounding = 1.750;
			$x_sb_collarln = 2;
			$x_sb_length = $x_sf_length + 2.5;
			$x_sb_chestln = $x_sf_chestln + 2.5;
			$x_sb_stomachln = $x_sf_stomachln + 2.5;
			
			$y_sb_rounding = 2.5;
			$y_sb_shoulder = shouldertrim($shoulder) / 2 + 0.25;
			$y_sb_chest = $t1 - $y_sb_markback;
			
			$x_sb_halaline = $x_sb_chestln - $x_sb_collarln - ($y_sb_chest - $y_sb_shoulder);
			
		} else {
			
			$x_sb_length = $x_sf_length - 2.5;
			$x_sb_chestln = $x_sf_chestln - 2.5;
			$x_sb_stomachln = $x_sf_stomachln - 2.5;
			
			if ($garb_type=='shirt') 	$y_sb_shoulder = shouldertrim($shoulder) / 2 + 0.5;
			else 						$y_sb_shoulder = shouldertrim($shoulder) / 2;
			$y_sb_chest = $t1 - $y_sb_markback;
			
			$x_sb_halaline = $x_sb_chestln - ($y_sb_chest - $y_sb_shoulder);
			
		}
		
		$y_sb_stomach = $t2 - $y_sb_markback;
		$y_sb_seat = $t3 - $y_sb_markback;
		
	}
	{	//sleeve
		
		$x_ss_hala = 4.5;
		$x_ss_length = $sleeve - ($cuffln[$i] - 1) + 1;
		//$x_ss_length2 = $sleeve - ($cuffln[$i] - 1) + 1 + 0.5;
		
		$y_ss_hala = $hala;
		if ($cufftype[$i]=='nocuff')	$y_ss_cuff = $cuffbr / 2 + 0.5;
		else							$y_ss_cuff = $cuffbr / 2 + 1;
		
	}
	{	//shoulder
		
		$x_sh_markshoulder = 2.5;
		
		$x_sh_rounding = 2.5;
		$x_sh_length = shouldertrim($shoulder) / 2 + 0.5;
		
		$y_sh_rounding = 1.75;
		$y_sh_collarln = 2;
		$y_sh_height = 6;
		
	}
	
?>