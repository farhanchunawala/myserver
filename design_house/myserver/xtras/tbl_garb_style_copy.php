<?php
	$query5 = "SELECT * FROM style WHERE sr=$sr AND stylename=\"$stylename\""; //ORDER BY garb_id DESC LIMIT 1";
	$result5 = mysqli_query($dbc, $query5) or die('<b>Error pattern_table.php/query5 : </b><br/>'.mysqli_error($dbc));
	$rowq_5 = mysqli_fetch_array($result5);
?>
<div id="accordionstyle<?php echo $stylename ?>">
<div class="card"><div class="card-header"><a class="card-link" data-toggle="collapse" href="#collapsestyle<?php echo $stylename ?>" style="color:black"><b>Style</b></a></div>
<div id="collapsestyle<?php echo $stylename ?>" class="collapse show" data-parent="#accordionstyle<?php echo $stylename ?>"><div class="card-body px-2 py-0">
	
	<table class="table table-borderless table-sm">
		<thead><tr><th></th></tr></thead>
		<tbody>
			<?php foreach (${'atb_style_ptn'.$garbtype} as $ar_ptn) { ?>
				<tr><td><?php echo $ar_ptn; ?></td>
					
					<?php for ($c = 01; $c <= $garbcount; $c++) {
						
						foreach (${'a_'.$ar_ptn} as $var) {
							${'s_'.$ar_ptn.'_'.$var} = "";
						}
						
						if ($c==1 && isset($rowq_5[$ar_ptn])) {
							foreach (${'a_'.$ar_ptn} as $var) {
								($rowq_5[$ar_ptn]=="$var") ? ${'s_'.$ar_ptn.'_'.$var}="selected" :  ${'s_'.$ar_ptn.'_'.$var}="";
							}
						}
						?>
						
						<td>
							<select tabindex="<?php echo $tx.'06'; ?>" class="form-control p-0" name=<?php echo $stylename.'_'.$ar_ptn.$c; ?> style="width:120px">
							<option value="default">Default</option>
							<?php foreach (${'a_'.$ar_ptn} as $var) {
								echo "<option value=$var ".${'s_'.$ar_ptn.'_'.$var}." >$var</option>";
							} ?>
							</select>
						</td>
						
					<?php } ?>
					
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
</div></div></div></div>