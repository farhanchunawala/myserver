<?php
	
	for ($r=scale(10); $r<=scale($x_clothln); $r=$r+scale(10)) { ?>
		<line x1="<?php echo $r-scale(5); ?>" y1="0" x2="<?php echo $r-scale(5); ?>" y2="<?php echo scale($y_pana); ?>" style="stroke:darkgrey;stroke-width:1" opacity="0.4"/>
		<line x1="<?php echo $r; ?>" y1="0" x2="<?php echo $r; ?>" y2="<?php echo scale($y_pana); ?>" style="stroke:darkgrey;stroke-width:1" opacity="0.8"/>
	<?php } ?>
	<?php for ($r=scale(10); $r<=scale($y_pana); $r=$r+scale(10)) { ?>
		<line x1=0 y1="<?php echo $r-scale(5); ?>" x2="<?php echo scale($x_clothln); ?>" y2="<?php echo $r-scale(5); ?>" style="stroke:darkgrey;stroke-width:1" opacity="0.4"/>
		<line x1="0" y1=<?php echo $r; ?> x2="<?php echo scale($x_clothln); ?>" y2="<?php echo $r; ?>" style="stroke:darkgrey;stroke-width:1" opacity="0.8"/>
	<?php } ?>
		<line x1="0" y1="<?php echo scale($y_pana)/2; ?>" x2="<?php echo scale($x_clothln); ?>" y2="<?php echo scale($y_pana)/2; ?>" style="stroke:lightgreen;stroke-width:1.5" opacity="0.8"/>
			
		<path
		d="M<?php echo 0; ?>,<?php echo scale($y_pana)+2; ?>
		v 15	h <?php echo scale($x_clothln)+30; ?>	v -15
		z" fill="yellow" opacity="0.3" stroke="black" />
		<line x1="0" y1="<?php echo scale($y_pana)+2; ?>" x2="<?php echo scale($x_clothln)+2; ?>" y2="<?php echo scale($y_pana)+2; ?>" style="stroke:black;stroke-width:1" opacity="0.4"/>
	<?php for ($r=0; $r<=scale($x_clothln)+2; $r=$r+10*2) { ?>
		<line x1="<?php echo $r; ?>" y1="<?php echo scale($y_pana)+2; ?>" x2="<?php echo $r; ?>" y2="<?php echo scale($y_pana)+15; ?>" style="stroke:black;stroke-width:1" opacity="0.4"/>
	<?php }
	for ($r=0; $r<=scale($x_clothln)+2; $r=$r+50*2) { ?>
		<line x1="<?php echo $r; ?>" y1="<?php echo scale($y_pana)+2; ?>" x2="<?php echo $r; ?>" y2="<?php echo scale($y_pana)+15; ?>" style="stroke:black;stroke-width:1" opacity="0.8"/>
	<?php }
	
?>