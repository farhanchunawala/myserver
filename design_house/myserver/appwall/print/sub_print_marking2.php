<?php		//ALT + SHIFT + 2
	if ($backtype=='op') {
		if		($x_sb_length <= inchtocm(30))								   include $fn_scale_print1x30_php;
		elseif	($x_sb_length >  inchtocm(30) && $x_sb_length <= inchtocm(35)) include $fn_scale_print1x35_php;
		elseif	($x_sb_length >  inchtocm(35) && $x_sb_length <= inchtocm(40)) include $fn_scale_print1x40_php;
		elseif	($x_sb_length >  inchtocm(40) && $x_sb_length <= inchtocm(45)) include $fn_scale_print1x45_php;
		elseif	($x_sb_length >  inchtocm(45) && $x_sb_length <= inchtocm(50)) include $fn_scale_print1x50_php;
	} else {
		if		($x_sf_length <= inchtocm(30))								   include $fn_scale_print1x30_php;
		elseif	($x_sf_length >  inchtocm(30) && $x_sf_length <= inchtocm(35)) include $fn_scale_print1x35_php;
		elseif	($x_sf_length >  inchtocm(35) && $x_sf_length <= inchtocm(40)) include $fn_scale_print1x40_php;
		elseif	($x_sf_length >  inchtocm(40) && $x_sf_length <= inchtocm(45)) include $fn_scale_print1x45_php;
		elseif	($x_sf_length >  inchtocm(45) && $x_sf_length <= inchtocm(50)) include $fn_scale_print1x50_php;
	}
	
	echo '<a onclick="printit()">
	<svg height="2000" width="1500">';
	
	{	//front
	$fd=1;
	$x_sf_m = inchtocm(1);						$y_sf_m = inchtocm(1);
	$vertex = 'A';			$sf_rotate=0;		$fill='lightblue';			$opacity=0.6;
	include $p_shirt_front_php;
		{
		echo '<path d = "
		M  '.scale($x_sf_m + $x_sf_length).','.scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti).'
		
		h  40	h -40
		v  40	v -40
		v  '.(-scale($y_sf_neck + $y_sf_frontpatti) - 15).'   v 15
		h  -15	h  55	h -40
		v  '.scale($y_sf_neck - $y_sb_markback).'
		h  -15	h  55	h -40
		v  '.scale($y_sb_markback).'
		h  -15	h  55	h -40
		v  '.scale($y_sf_frontpatti).'
		
		h  '.-scale($x_sf_collarln).'
		v  40	v -40
		v  '.(-scale($y_sf_shoulder + $y_sf_frontpatti) - 15).'   v 15
		h  -15	h  55	h -40
		v  '.scale($y_sf_shoulder - $y_sb_markback).'
		h  -15	h  55	h -40
		v  '.scale($y_sb_markback + $y_sf_frontpatti).'
		
		h  '.-scale($x_sf_armhole).'
		v  40	v -40
		v  '.(-scale($y_sf_chest + $y_sf_frontpatti) - 15).'   v 15
		h  -15	h  55	h -40
		v  '.scale($y_sf_chest - $y_sf_shoulder).'
		h  -15	h  55	h -40
		v  '.scale($y_sf_shoulder - $y_sb_markback).'
		h  -15	h  55	h -40
		v  '.scale($y_sb_markback + $y_sf_frontpatti).'
		
		h  '.-scale($x_sf_stomachln - $x_sf_chestln).'
		v  40	v -40
		v  '.(-scale($y_sf_stomach + $y_sf_frontpatti) - 15).'   v 15
		h  -15	h  55	h -40
		v  '.scale($y_sf_stomach - $y_sb_markback).'
		h  -15	h  55	h -40
		v  '.scale($y_sb_markback + $y_sf_frontpatti).'
		
		h  '.-scale($x_sf_length - $x_sf_stomachln).'
		v  40	v -40
		v  '.(-scale($y_sf_bottom + $y_sf_frontpatti) - 15).'   v 15
		h  -15	h  55	h -40
		v  '.scale($y_sf_bottom - $y_sb_markback).'
		h  -15	h  55	h -40
		v  '.scale($y_sb_markback).'
		h  -15	h  55	h -40
		v  '.scale($y_sf_frontpatti).'
		h  -15	h  15
		
		" fill=none stroke=darkgrey opacity=1 stroke-width=2 />';
		}
		{
		if ($garb_type=='shirt') {
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom - $y_sb_markback)-5).' x='.(scale($x_sf_m + $x_sf_length)					 +3).' fill=red  font-size=28>'.round($y_sf_neck     - $y_sb_markback ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom - $y_sb_markback)-5).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_collarln) +3).' fill=red  font-size=28>'.round($y_sf_shoulder - $y_sb_markback ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom - $y_sb_markback)-5).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_chestln)  +3).' fill=red  font-size=28>'.round($y_sf_chest    - $y_sb_markback ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom - $y_sb_markback)-5).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_stomachln)+3).' fill=red  font-size=28>'.round($y_sf_stomach  - $y_sb_markback ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom - $y_sb_markback)-5).' x='.(scale($x_sf_m)								 +3).' fill=red  font-size=28>'.round($y_sf_seat     - $y_sb_markback ,1).'</text>';
		
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom)-5).' x='.(scale($x_sf_m + $x_sf_length)+3).' fill=red  font-size=28>'.round($y_sf_neck ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom)-5).' x='.(scale($x_sf_m)				  +3).' fill=red  font-size=28>'.round($y_sf_seat ,1).'</text>';
		}
		
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-7).' x='.(scale($x_sf_m + $x_sf_length)				   +3).' fill=red  font-size=28>'.round($y_sf_neck     + $y_sf_frontpatti ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-7).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_collarln) +3).' fill=red  font-size=28>'.round($y_sf_shoulder + $y_sf_frontpatti ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-7).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_chestln)  +3).' fill=red  font-size=28>'.round($y_sf_chest    + $y_sf_frontpatti ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-7).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_stomachln)+3).' fill=red  font-size=28>'.round($y_sf_stomach  + $y_sf_frontpatti ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-7).' x='.(scale($x_sf_m)+3).' fill=red  font-size=28>'.round($y_sf_seat + $y_sf_frontpatti ,1).'</text>';
		
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-5).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_collarln) +7).' fill=blue  font-size=28 transform="rotate(90 '.scale($x_sf_m + $x_sf_length - $x_sf_collarln) .','.scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti).')">'.round($x_sf_collarln) .'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-5).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_chestln)  +7).' fill=blue  font-size=28 transform="rotate(90 '.scale($x_sf_m + $x_sf_length - $x_sf_chestln)  .','.scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti).')">'.round($x_sf_chestln)  .'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-5).' x='.(scale($x_sf_m + $x_sf_length - $x_sf_stomachln)+7).' fill=blue  font-size=28 transform="rotate(90 '.scale($x_sf_m + $x_sf_length - $x_sf_stomachln).','.scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti).')">'.round($x_sf_stomachln ,1).'</text>';
		echo '<text y='.(scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti)-5).' x='.(scale($x_sf_m)								   +7).' fill=blue  font-size=28 transform="rotate(90 '.scale($x_sf_m)								 .','.scale($y_sf_m + $y_sf_bottom + $y_sf_frontpatti).')">'.round($x_sf_length)   .'</text>';
		}
	}
	
	{	//back
	$x_sb_m = inchtocm(1);						$y_sb_m = inchtocm(1) + $y_sf_bottom + $y_sf_frontpatti + inchtocm(3);
	$vertex = 'A';			$sb_rotate=0;		$fill='lightblue';			$opacity=0.6;
	include $p_shirt_back_php;
		{
		echo '<path d = "
		M  '.scale($x_sb_m + $x_sb_length).','.scale($y_sb_m + $y_sb_bottom).'
		
		h  40	h -55   h  15
		v  15	v -15
		v  '.(-scale($y_sb_shoulder) - 15).'   v 15
		h  -15	h  55	h -40
		
		" fill=none stroke=darkgrey opacity=1 stroke-width=2 />';
		}
		{
		echo '<text x='.(scale($x_sb_m + $x_sb_length)+3).' y='.(scale($y_sb_m + $y_sb_bottom)-5).' fill=red  font-size=28>'.round($y_sb_shoulder ,1).'</text>';
		}
	}
	
	{	//sleeve
	$x_ss_m = inchtocm(1);						$y_ss_m = inchtocm(1) + $y_sf_bottom + $y_sf_frontpatti + inchtocm(3) + $y_sb_bottom + inchtocm(5);
	$vertex = 'A';			$ss_rotate=0;		$fill='lightblue';			$opacity=0.6;
	include $p_shirt_sleeve_php;
		{
		echo '<path d = "
		M  '.scale($x_ss_m + $x_ss_length).','.scale($y_ss_m + $y_ss_cuff).'
		
		h  15	h -15
		v  -15	v  55	v -40
		h  '.-scale($x_ss_hala).'
		v  '.(-scale($y_ss_hala) - 15).'   v  15
		h  40	h -55   h  15
		v  '.(scale($y_ss_hala) + 40).'   v -40
		h  '.(-scale($x_ss_length - $x_ss_hala) - 15).'   h  15
		v  40   v -40
		v  '.(-scale($y_ss_cuff) - 15).'   v  15
		h  40	h -55   h  15
		
		" fill=none stroke=darkgrey opacity=1 stroke-width=2 />';
		}
		{
		echo '<text y='.(scale($y_ss_m + $y_ss_cuff)-5).' x='.(scale($x_ss_m + $x_ss_length - $x_ss_hala)+3).' fill=red  font-size=28>'.round($y_ss_hala ,1).'</text>';
		echo '<text y='.(scale($y_ss_m + $y_ss_cuff)-5).' x='.(scale($x_ss_m)							 +3).' fill=red  font-size=28>'.round($y_ss_cuff ,1).'</text>';
		
		echo '<text y='.(scale($y_ss_m + $y_ss_cuff)-5).' x='.(scale($x_ss_m + $x_ss_length - $x_ss_hala)+7).' fill=blue  font-size=28 transform="rotate(90 '.scale($x_ss_m + $x_ss_length - $x_ss_hala).','.scale($y_ss_m + $y_ss_cuff).')">'.round($x_ss_hala ,1).'</text>';
		echo '<text y='.(scale($y_ss_m + $y_ss_cuff)-5).' x='.(scale($x_ss_m)							 +7).' fill=blue  font-size=28 transform="rotate(90 '.scale($x_ss_m)							.','.scale($y_ss_m + $y_ss_cuff).')">'.round($x_ss_length ,1).'</text>';
		}
	}
	
	echo '</svg>
	</a>';
?>