<?php
	$arrow_levelpx = $arrow_level * 25;
	$dimx = $arrow_xm + $arrow_ln/2;
	$dimy = $arrow_ym - 8 + $arrow_levelpx;
	if ($arrow_level < 0) {
		$ext_dl = abs($arrow_levelpx) + $extl - 0;
		$ext_dr = abs($arrow_levelpx) + $extr - 0;
		$ext_ul = 20;
		$ext_ur = 20;
	} else {
		$ext_dl = 20;
		$ext_dr = 20;
		$ext_ul = abs($arrow_levelpx) + $extl - 0;
		$ext_ur = abs($arrow_levelpx) + $extr - 0;
	}
	
?>
	
	<text text-anchor="middle" x="<?php echo $dimx; ?>" y="<?php echo $dimy; ?>" fill="grey" font-size="<?php echo $dim_size; ?>" transform="rotate(<?php echo $arrow_rotate; ?> <?php echo $arrow_xm; ?>,<?php echo $arrow_ym; ?>)"><?php echo $dim_name; ?></text>
	<path d="M <?php echo $arrow_xm + 20; ?> , <?php echo $arrow_ym + $arrow_levelpx; ?>
	l 0 , 4
	l -20 , -4
	l 0 , <?php echo $ext_dl; ?>
	l 0 , <?php echo -$ext_dl -$ext_ul; ?>
	l 0 , <?php echo $ext_ul; ?>
	l 20 , -4
	l 0 , 4
	l <?php echo $arrow_ln - 40; ?> , 0
	l 0 , 4
	l 20 , -4
	l 0 , <?php echo $ext_dr; ?>
	l 0 , <?php echo -$ext_dr -$ext_ur; ?>
	l 0 , <?php echo $ext_ur; ?>
	l -20 , -4
	l 0 , 4
	" stroke="grey" fill="grey" transform="rotate(<?php echo $arrow_rotate; ?> <?php echo $arrow_xm; ?>,<?php echo $arrow_ym; ?>)" />
	