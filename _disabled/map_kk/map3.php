<div id="marp">
	<?php echo "<u><b>$sr-$garb_pairing[$i]:</b></u> $garb_description[$i] ($pana[$i]p $clothln[$i]cm)"; ?><br/>
	<svg width="<?php echo scale($x_clothln)+2; ?>" height="<?php echo scale($y_pana)+17; ?>" style="border: 1px solid black">
	
	<?php
		$x_sf_m = 0.5;
		$y_sf_m = $y_pana;
		$vertex = 'M';
		$sf_rotate = 0;
		$fill = 'lightblue';
		$opacity = 1;
		include 'pattern/shirt_front.php';
		
		$x_sb_m = 0.5 + $x_sf_length + 0.5;
		$y_sb_m = $y_pana;
		$vertex = 'K';
		$sb_rotate = 0;
		$fill = 'lightblue';
		$opacity = 1;
		include 'pattern/shirt_back.php';
		
		$x_ss_m = 0.5 + $x_sf_length + 0.5 + $x_sb_length + 0.5 + $x_ss_hala;
		$y_ss_m = $y_pana;
		$vertex = 'B';
		$ss_rotate = 180;
		$fill = 'lightblue';
		$opacity = 1;
		include 'pattern/shirt_sleeve.php';
		
		$x_ss_m = $x_clothln - $x_ss_hala - 0.5;
		$y_ss_m = $y_pana;
		$vertex = 'D';
		$ss_rotate = 0;
		$fill = 'lightblue';
		$opacity = 1;
		include 'pattern/shirt_sleeve.php';
		
		$x_sh_m = 0.5 + $x_sf_length + 0.5;
		$y_sh_m = $y_pana - $y_sb_t3 * 2 - 0.5;
		$vertex = 'H';
		$sh_rotate = 0;
		$fill = 'lightblue';
		$opacity = 1;
		include 'pattern/shirt_shoulder.php';
		
		include 'dimension/map_grids.php';
		
	?>
	
	</svg>
</div>