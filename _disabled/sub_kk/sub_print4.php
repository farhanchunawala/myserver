<?php
	if ($x_pf_length <= 30 ) include 'function/fn_scale_print1x30.php';
	elseif ($x_pf_length > 30 && $x_pf_length <= 35) include 'function/fn_scale_print1x35.php';
	elseif ($x_pf_length > 35 && $x_pf_length <= 40) include 'function/fn_scale_print1x40.php';
	elseif ($x_pf_length > 40 && $x_pf_length <= 45) include 'function/fn_scale_print1x45.php';
	elseif ($x_pf_length > 45 && $x_pf_length <= 50) include 'function/fn_scale_print1x50.php';
	
	echo '<a onclick="printit()">
	<svg height="2000" width="1500">';
	
	{	//front
	$x_pf_m = 1.5;
	$y_pf_m = 1.5;
	$vertex = 'A';
	$sb_rotate = 0;
	$fill = 'lightblue';
	$opacity = 0.6;
	include 'pattern/pant_front.php';
	
	echo '<path d = "
	M  '.scale($x_pf_m).','.scale($y_pf_m + $y_pf_wtdf + $y_pf_waist + 2.25).'
	v  40   v -40
	v  '.-scale($y_pf_cf + 2).'  v  '.scale($y_pf_wtdf + 2).'
	h -15	h  55	h -40
	v  '.scale($y_pf_waist).'
	h -15	h  55	h -40
	v  '.scale($y_pf_fly + $y_pf_flyslope).'
	h -15   h  15
	
	h  '.scale($x_pf_fork).'
	v  40   v -40
	v  '.-scale($y_pf_cf + 2).'  v  '.scale(2).'
	h -15	h  55	h -40
	v  '.scale($y_pf_center_thigh).'
	h -15	h  55	h -40
	v  '.scale($y_pf_center_thigh - $y_pf_fly - $y_pb_forkmark).'
	h -15	h  55	h -40
	v  '.scale($y_pb_forkmark).'
	h -15	h  55	h -40
	v  '.scale($y_pf_fly).'
	
	h  '.scale($x_pf_thigh_calf).'
	v  40   v -40
	v  '.-scale($y_pf_cf + 2).'  v  '.scale($y_pf_tcdf + 2).'
	h -15	h  55	h -40
	v  '.scale($y_pf_center_calf).'
	h -15	h  55	h -40
	v  '.scale($y_pf_center_calf).'
	h -15	h  55	h -40
	v  '.scale($y_pf_tcdf).'
	
	h  '.scale($x_pf_calf_bottom).'
	v  40   v -40
	v  '.-scale($y_pf_cf + 2).'  v  '.scale($y_pf_tcdf + $y_pf_cbdf + 2).'
	h -15	h  55	h -40
	v  '.scale($y_pf_center_bottom).'
	h -15	h  55	h -40
	v  '.scale($y_pf_center_bottom).'
	h -15	h  55	h -40
	v  '.scale($y_pf_tcdf + $y_pf_cbdf).'
	
	h  '.scale($x_pf_bottomfd).'
	h  40	h -40
	v  40	v -40
	v '.-scale($y_pf_cf + 2).'  v  '.scale($y_pf_cf + 2).'
	
	" fill=none stroke=darkgrey opacity=1 stroke-width=2 transform="rotate(0 1250,415)" />';
	
	echo '<text x='.(scale($x_pf_m + $x_pf_length - $x_pf_bottomfd) + 3).' y='.(scale($y_pf_m + $y_pf_tcdf + $y_pf_cbdf) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_center_thigh - $y_pf_center_bottom + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_length - $x_pf_bottomfd) + 3).' y='.(scale($y_pf_m + $y_pf_center_thigh) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_center_thigh + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_length - $x_pf_bottomfd) + 3).' y='.(scale($y_pf_m + $y_pf_center_thigh + $y_pf_center_bottom) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_center_thigh + $y_pf_center_bottom + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_length - $x_pf_bottomfd) + 3).' y='.(scale($y_pf_m + $y_pf_cf) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_cf + 2).'</text>';
	
	echo '<text x='.(scale($x_pf_m + $x_pf_calfln) + 3).' y='.(scale($y_pf_m + $y_pf_tcdf) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_center_thigh - $y_pf_center_calf + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_calfln) + 3).' y='.(scale($y_pf_m + $y_pf_center_thigh) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_center_thigh + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_calfln) + 3).' y='.(scale($y_pf_m + $y_pf_center_thigh + $y_pf_center_calf) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_center_thigh + $y_pf_center_calf + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_calfln) + 3).' y='.(scale($y_pf_m + $y_pf_cf) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_cf + 2).'</text>';
	
	echo '<text x='.(scale($x_pf_m + $x_pf_fork) + 3).' y='.(scale($y_pf_m) - 5).' fill=red  font-size=28>'.inchtotext(2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_fork) + 3).' y='.(scale($y_pf_m + $y_pf_center_thigh) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_center_thigh + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_fork) + 3).' y='.(scale($y_pf_m + $y_pf_cf - $y_pf_fly - $y_pb_forkmark) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_cf - $y_pf_fly - $y_pb_forkmark + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_fork) + 3).' y='.(scale($y_pf_m + $y_pf_cf - $y_pf_fly) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_cf - $y_pf_fly + 2).'</text>';
	echo '<text x='.(scale($x_pf_m + $x_pf_fork) + 3).' y='.(scale($y_pf_m + $y_pf_cf) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_cf + 2).'</text>';
	
	echo '<text x='.(scale($x_pf_m) + 3).' y='.(scale($y_pf_m + $y_pf_wtdf) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_center_thigh - $y_pf_wtdf + 2).'</text>';
	echo '<text x='.(scale($x_pf_m) + 3).' y='.(scale($y_pf_m + $y_pf_wtdf + $y_pf_waist) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_wtdf + $y_pf_waist + 2).'</text>';
	echo '<text x='.(scale($x_pf_m) + 3).' y='.(scale($y_pf_m + $y_pf_cf) - 5).' fill=red  font-size=28>'.inchtotext($y_pf_cf + 2).'</text>';
	
	}
	{	//back
	
	/*include 'pattern/pant_front.php';
	include 'pattern/pant_back.php';
	
	echo '<path d = "
	M  1250,450
	
	h  40	h -40
	v  40	v -40
	v -400  v  400
	
	h -100
	v  40   v -40
	v -400  v  75
	h -15	h  55	h -40
	v  140
	h -15	h  55	h -40
	v  140
	h -15	h  55	h -40
	v  45
	
	h -400
	v  40   v -40
	v -400  v  65
	h -15	h  55	h -40
	v  150
	h -15	h  55	h -40
	v  150
	h -15	h  55	h -40
	v  35
	
	h -400
	v  40   v -40
	v -400  v  30
	h -15	h  55	h -40
	v  185
	h -15	h  55	h -40
	v  125
	h -15	h  55	h -40
	v  10
	h -15	h  55	h -40
	v  50
	
	h -250
	v  40   v -40
	v -400  v  50
	h -15	h  55	h -40
	v  300
	h -15	h  55	h -40
	v  50
	h -15   h  15
	
	" fill=none stroke=darkgrey opacity=1 stroke-width=2 transform="rotate(180 1250,415)" />';*/
	
	}
	
	echo '</svg>
	</a>';
	
?>