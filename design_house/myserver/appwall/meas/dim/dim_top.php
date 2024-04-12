<?php
	$fitpct = 9;
	$backtype = '';
	
	{	//front
		
		$y_sf_frontpatti = ($garbtype=='shirt') ? inchtocm(2) : '0';
		
		$x_sf_collarln = inchtocm(2);
		$x_sf_chestln = $hala;
		$x_sf_stomachln = $shoulder_ln;
		
		if ($garbtype=='shirt') {
			if ($sub_style=='oshirt') $x_sf_length = $length + inchtocm(1.125);
			else 					  $x_sf_length = $length + inchtocm(0.75 + 1.25);
		} elseif ($garbtype=='kurta') $x_sf_length = $length + inchtocm(0.75 + 0.75);
		
		if ($garbtype=='shirt') $x_sf_seatln = $x_sf_length;
		else					 $x_sf_seatln = $length;
		
		$y_sf_neck = inchtocm(2.25);
		if ($garbtype=='shirt') $y_sf_shoulder = $shoulder_ln/2 + inchtocm(0.5);
		else 					 $y_sf_shoulder = $shoulder_ln/2;
		$y_sf_chest = ($chest + $chest*$fitpct/100 + inchtocm(5))/4;
		$y_sf_stomach = ($stomach + $stomach*$fitpct/100 + inchtocm(5))/4;
		$y_sf_seat = ($seat + $seat*$fitpct/100 + inchtocm(5))/4;
		if ($garbtype=='shirt') $y_sf_bottom = $y_sf_seat;
		else					 $y_sf_bottom = ($seat + $seat*$fitpct/100*2 + inchtocm(5))/4;
		
		$x_sf_armhole = $x_sf_chestln - $x_sf_collarln;
		$x_sf_halaline = $x_sf_armhole - ($y_sf_chest - $y_sf_shoulder);
		
	}
	{	//back
		
		$y_sb_markback = ($garbtype=='shirt') ? inchtocm(1) : '0'; 
		
		if ($backtype=='op') {
			
			if ($collartype=='bc' || $collartype=='nocollar')	$x_sb_rounding = inchtocm(1.125);
			else												$x_sb_rounding = inchtocm(1.750);
			$x_sb_collarln = inchtocm(2);
			$x_sb_length = $x_sf_length + inchtocm(2.5);
			$x_sb_chestln = $x_sf_chestln + inchtocm(2.5);
			$x_sb_stomachln = $x_sf_stomachln + inchtocm(2.5);
			$x_sb_seatln = $x_sf_seatln + inchtocm(2.5);
			
			$y_sb_rounding = inchtocm(2.5);
			$y_sb_shoulder = shouldertrim($shoulder_ln)/2 + inchtocm(0.25);
			$y_sb_chest = $y_sf_chest - $y_sb_markback;
			
			$x_sb_halaline = $x_sb_chestln - $x_sb_collarln - ($y_sb_chest - $y_sb_shoulder);
			//$x_sb_halaline = $x_sb_chestln - inchtocm(2.5) - ($y_sb_chest - $y_sb_shoulder);
			
		} else {
			
			$x_sb_length = $x_sf_length - inchtocm(2.5);
			$x_sb_chestln = $x_sf_chestln - inchtocm(2.5);
			$x_sb_stomachln = $x_sf_stomachln - inchtocm(2.5);
			$x_sb_seatln = $x_sf_seatln - inchtocm(2.5);
			
			$y_sb_shoulder = $shoulder_ln/2 + inchtocm(0.5);
			$y_sb_chest = $y_sf_chest - $y_sb_markback;
			
			$x_sb_halaline = $x_sb_chestln - ($y_sb_chest - $y_sb_shoulder);
			
		}
		
		$y_sb_stomach = $y_sf_stomach - $y_sb_markback;
		$y_sb_seat = $y_sf_seat - $y_sb_markback;
		$y_sb_bottom = $y_sf_bottom - $y_sb_markback;
		
	}
	{	//sleeve
		
		$cuffln[1] = inchtocm(2.375); $cuffbr = inchtocm(9.5);
		$x_ss_hala = inchtocm(4.5);
		$x_ss_length = $sleeve_ln - ($cuffln[1] - inchtocm(1)) + inchtocm(1);
		//$x_ss_length = $sleeve - ($cuffln[$i] - 1) + 1;
		//$x_ss_length2 = $sleeve - ($cuffln[$i] - 1) + 1 + 0.5;
		
		$y_ss_hala = $hala;
		//if ($cufftype[$i]=='nocuff')	$y_ss_cuff = $cuffbr/2 + inchtocm(0.5);
		//else							$y_ss_cuff = $cuffbr/2 + inchtocm(1);
		
	}
	{	//shoulder
		
		$x_sh_markshoulder = inchtocm(2.5);
		
		$x_sh_rounding = inchtocm(2.5);
		$x_sh_length = $shoulder_ln/2 + inchtocm(0.5);
		
		$y_sh_rounding = inchtocm(1.75);
		$y_sh_collarln = inchtocm(2);
		$y_sh_height = inchtocm(6);
		
	}
?>