<?php
	$fd=0;
	$x_sf_m = 0.5;									$y_sf_m = $y_pana;
	$vertex = 'O';			$sf_rotate=0;			$fill='lightblue';		$opacity=1;
	include $p_shirt_front_php;
	
	$x_sb_m = 0.5;									$y_sb_m = 0;
	$vertex = 'A';			$sb_rotate=0;			$fill='lightblue';		$opacity=1;
	include $p_shirt_back_php;
	
	$x_ss_m = $x_clothln - $x_ss_hala - 0.5;		$y_ss_m = 0;
	$vertex = 'B';			$ss_rotate=0;			$fill='lightblue';		$opacity=1;
	include $p_shirt_sleeve_php;
	
	$x_ss_m = $x_clothln - $x_ss_hala - 0.5;		$y_ss_m = $y_pana;
	$vertex = 'D';			$ss_rotate=0;			$fill='lightblue';		$opacity=1;
	include $p_shirt_sleeve_php;
	
	$x_sh_m = $x_clothln - 0.5;						$y_sh_m = (2 * $y_ss_hala) + 3;
	$vertex = 'E';			$sh_rotate=0;			$fill='lightblue';		$opacity=1;
	include $p_shirt_shoulder_php;
	
	include $dim_map_grid_php;
	
?>