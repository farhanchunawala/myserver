<?php
	($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
	include $atb_style_php;
?>

<div id="accordion<?php echo $stylename ?>">
<div class="card"><div class="card-header" style="background-color:lightgrey"><a class="btn" data-bs-toggle="collapse" href="#collapse<?php echo $stylename ?>" style="color:black"><b><?php echo "$stylename x $garbcount"; ?></b></a></div>
<div id="collapse<?php echo $stylename ?>" class="collapse show" data-bs-parent="#accordion<?php echo $stylename ?>"><div class="card-body px-2 py-0">
	<?php
		include $tb_garb_info_php; ?>
		<div id="accordionstyle<?php echo $stylename ?>">
		<?php include $tb_garb_fit_php;
		include $tb_garb_style_php;
		include $tb_garb_sp_php;
	?></div>
</div></div></div></div>