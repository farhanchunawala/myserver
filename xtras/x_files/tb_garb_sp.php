<div class="card"><div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapsesp<?php echo $stylename ?>" style="color:black"><b>SP</b></a></div>
<div id="collapsesp<?php echo $stylename ?>" class="collapse show" data-bs-parent="#accordionstyle<?php echo $stylename ?>"><div class="card-body px-2 py-0">
	
	<table class="table table-borderless table-sm">
		<thead><tr><th></th></tr></thead>
		<tbody>
			<?php include $atb_style_php;
			foreach ($atb_style_entrysp2 as $x) {
				echo '<tr><td>'.$x.'</td><td><div class="btn-group">';
				for ($c = 1; $c <= $garbcount; $c++) {
					if ($x=='pana' || $x=='clothln') {
						echo	'<input tabindex="'.$tx.'04" type="text" class="form-control p-1" name="'.$stylename.'_'.$x.$c.'" value="" style="width:70px" />
								<input tabindex="'.$tx.'04" type="text" class="form-control p-1" name="'.$stylename.'_'.$x.'fd'.$c.'" value="" style="width:50px" />';
					} elseif ($x=='fabric_sp' || $x=='stitching_sp' || $x=='pattern_sp' || $x=='emb_sp') {
						echo	'<input tabindex="'.$tx.'04" type="text" class="form-control p-1" name="'.$stylename.'_'.$x.$c.'" value="" style="width:52px" />
								<input tabindex="'.$tx.'04" type="text" class="form-control p-0" name="'.$stylename.'_'.$x.'o'.$c.'" value="" style="width:34px" placeholder="code" />
								<input tabindex="'.$tx.'04" type="text" class="form-control p-0" name="'.$stylename.'_'.$x.'d'.$c.'" value="" style="width:34px" />';
					} else {
						echo	'<input tabindex="'.$tx.'04" type="text" class="form-control p-2" name="'.$stylename.'_'.$x.$c.'" value="" style="width:120px" />';
					}
				}
				echo '</div></td></tr>';
			} ?>
		</tbody>
	</table>
	
</div></div></div>