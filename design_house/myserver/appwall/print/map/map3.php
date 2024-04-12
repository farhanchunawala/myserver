<?php
	$fd=0;
	$x_sf_m = 0.5;																$y_sf_m = $y_pana;
	$vertex = 'O';			$sf_rotate = 0;			$fill = 'lightblue';		$opacity = 1;
	include $p_shirt_front_php;
	
	$x_sb_m = 0.5 + $x_sf_length + 0.5;											$y_sb_m = $y_pana;
	$vertex = 'N';			$sb_rotate = 0;			$fill = 'lightblue';		$opacity = 1;
	include $p_shirt_back_php;
	
	$x_ss_m = 0.5 + $x_sf_length + 0.5 + $x_sb_length + 0.5 + $x_ss_hala;		$y_ss_m = $y_pana;
	$vertex = 'B';			$ss_rotate = 180;		$fill = 'lightblue';		$opacity = 1;
	include $p_shirt_sleeve_php;
	
	$x_ss_m = $x_clothln - $x_ss_hala - 0.5;									$y_ss_m = $y_pana;
	$vertex = 'D';			$ss_rotate = 0;			$fill = 'lightblue';		$opacity = 1;
	include $p_shirt_sleeve_php;
	
	$x_sh_m = 0.5 + $x_sf_length + 0.5;											$y_sh_m = $y_pana - $y_sb_bottom * 2 - 0.5;
	$vertex = 'H';			$sh_rotate = 0;			$fill = 'lightblue';		$opacity = 1;
	include $p_shirt_shoulder_php;
	
	include $dim_map_grid_php;
	
?>