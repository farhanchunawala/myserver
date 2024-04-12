<div class="mr-5">
<table class="table table-borderless table-sm">
	
	<thead>
		<tr>
			<th><?php echo $garb_type.' x '.${"$garb_type".'_count'}; ?></th>
			<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>   <th>
				<input tabindex="121<?php echo $c; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_description'."$c"; ?> value="" style="width:120px" />
			</th>   <?php } ?>
		</tr>
	</thead>
	
	<tbody>
		
		<tr>   <td>Pairing</td>
			<?php
				for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {
						if ($pair==122 || $pair=="") {
							$pair = 97;
							$pair2 = chr($pair);
						} else {
							$pair = $pair + 1;
							$pair2 = chr($pair);
						}
					} else {
						$pair2 = "";
					}
			?>
			<td>
				<input tabindex="122<?php echo $c; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_pairing'."$c"; ?> value="<?php echo $pair2; ?>" style="width:120px" />
			</td>
			<?php } ?>
		</tr>
		<tr>   <td>Submit Date</td>
			<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>   <td>
				<input tabindex="123<?php echo $c; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_submit_date'."$c"; ?> value="" placeholder="yy-mm-dd" style="width:120px" />
			</td>   <?php } ?>
		</tr>
		<tr>   <td>Pana</td>
			<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>   <td>
				<input tabindex="124<?php echo $c; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_pana'."$c"; ?> value="" style="width:75px" />
				<input tabindex="124<?php echo $c; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_panafd'."$c"; ?> value="" style="width:40px" />
			</td>   <?php } ?>
		</tr>
		<tr>   <td>Cloth L</td>
			<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>   <td>
				<input tabindex="125<?php echo $c; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_clothln'."$c"; ?> value="" style="width:75px" />
				<input tabindex="125<?php echo $c; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_clothfd'."$c"; ?> value="" style="width:40px" />
			</td>   <?php } ?>
		</tr>
		
		<?php if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') { ?>
		
			<tr>   <td>Collar Type</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					${'s'."$garb_type".'_collartype_rmpc'} = ${'s'."$garb_type".'_collartype_mrmpc'} = ${'s'."$garb_type".'_collartype_lspc'} = ${'s'."$garb_type".'_collartype_bc'} = ${'s'."$garb_type".'_collartype_nocollar'} = "";
					if ($c==1) {
						if ($rowq3["$garb_type".'_collartype']=="rmpc") {
							${'s'."$garb_type".'_collartype_rmpc'} = "selected";
						} elseif ($rowq3["$garb_type".'_collartype']=="mrmpc") {
							${'s'."$garb_type".'_collartype_mrmpc'} = "selected";
						} elseif ($rowq3["$garb_type".'_collartype']=="lspc") {
							${'s'."$garb_type".'_collartype_lspc'} = "selected";
						} elseif ($rowq3["$garb_type".'_collartype']=="bc") {
							${'s'."$garb_type".'_collartype_bc'} = "selected";
						} elseif ($rowq3["$garb_type".'_collartype']=="nocollar") {
							${'s'."$garb_type".'_collartype_nocollar'} = "selected";
						}
					}
				?>
				<td>
					<select tabindex="126<?php echo $c; ?>" class="form-control" name=<?php echo "$garb_type".'_collartype'."$c"; ?> style="width:120px">
						<option value="default">Default</option>
						<option value="rmpc" <?php echo ${'s'."$garb_type".'_collartype_rmpc'}; ?>>RMPC</option>
						<option value="mrmpc" <?php echo ${'s'."$garb_type".'_collartype_mrmpc'}; ?>>MRMPC</option>
						<option value="lspc" <?php echo ${'s'."$garb_type".'_collartype_lspc'}; ?>>LSPC</option>
						<option value="bc" <?php echo ${'s'."$garb_type".'_collartype_bc'}; ?>>BC</option>
						<option value="nocollar" <?php echo ${'s'."$garb_type".'_collartype_nocollar'}; ?>>No Collar</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff L</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					${'s'."$garb_type".'_cuffln_a'} = ${'s'."$garb_type".'_cuffln_b'} = ${'s'."$garb_type".'_cuffln_c'} = ${'s'."$garb_type".'_cuffln_d'} = ${'s'."$garb_type".'_cuffln_e'} = ${'s'."$garb_type".'_cuffln_f'} = ${'s'."$garb_type".'_cuffln_g'} = "";
					if ($c==1) {
						if ($rowq3["$garb_type".'_cuffln']=="0.5") {
							${'s'."$garb_type".'_cuffln_a'} = "selected";
						} elseif ($rowq3["$garb_type".'_cuffln']=="1") {
							${'s'."$garb_type".'_cuffln_b'} = "selected";
						} elseif ($rowq3["$garb_type".'_cuffln']=="1.5") {
							${'s'."$garb_type".'_cuffln_c'} = "selected";
						} elseif ($rowq3["$garb_type".'_cuffln']=="2") {
							${'s'."$garb_type".'_cuffln_d'} = "selected";
						} elseif ($rowq3["$garb_type".'_cuffln']=="2.25") {
							${'s'."$garb_type".'_cuffln_e'} = "selected";
						} elseif ($rowq3["$garb_type".'_cuffln']=="2.5") {
							${'s'."$garb_type".'_cuffln_f'} = "selected";
						} elseif ($rowq3["$garb_type".'_cuffln']=="3") {
							${'s'."$garb_type".'_cuffln_g'} = "selected";
						}
					}
				?>
				<td>
					<select tabindex="127<?php echo $c; ?>" class="form-control" name=<?php echo "$garb_type".'_cuffln'."$c"; ?> style="width:120px">
						<option value="default">Default</option>
						<option value="0.5" <?php echo ${'s'."$garb_type".'_cuffln_a'}; ?>>½</option>
						<option value="1" <?php echo ${'s'."$garb_type".'_cuffln_b'}; ?>>1</option>
						<option value="1.5" <?php echo ${'s'."$garb_type".'_cuffln_c'}; ?>>1½</option>
						<option value="2" <?php echo ${'s'."$garb_type".'_cuffln_d'}; ?>>2</option>
						<option value="2.25" <?php echo ${'s'."$garb_type".'_cuffln_e'}; ?>>2¼</option>
						<option value="2.5" <?php echo ${'s'."$garb_type".'_cuffln_f'}; ?>>2½</option>
						<option value="3" <?php echo ${'s'."$garb_type".'_cuffln_g'}; ?>>3</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff Type</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					${'s'."$garb_type".'_cufftype_cut'} = ${'s'."$garb_type".'_cufftype_square'} = ${'s'."$garb_type".'_cufftype_round'} = ${'s'."$garb_type".'_cufftype_nocuff'} = ${'s'."$garb_type".'_cufftype_halfsleeve'} = "";
					if ($c==1) {
						if ($rowq3["$garb_type".'_cufftype']=="cut") {
							${'s'."$garb_type".'_cufftype_cut'} = "selected";
						} elseif ($rowq3["$garb_type".'_cufftype']=="square") {
							${'s'."$garb_type".'_cufftype_square'} = "selected";
						} elseif ($rowq3["$garb_type".'_cufftype']=="round") {
							${'s'."$garb_type".'_cufftype_round'} = "selected";
						} elseif ($rowq3["$garb_type".'_cufftype']=="nocuff") {
							${'s'."$garb_type".'_cufftype_nocuff'} = "selected";
						} elseif ($rowq3["$garb_type".'_cufftype']=="halfsleeve") {
							${'s'."$garb_type".'_cufftype_halfsleeve'} = "selected";
						}
					}
				?>
				<td>
					<select tabindex="128<?php echo $c; ?>" class="form-control" name=<?php echo "$garb_type".'_cufftype'."$c"; ?> style="width:120px">
						<option value="default">Default</option>
						<option value="cut" <?php echo ${'s'."$garb_type".'_cufftype_cut'}; ?>>Cut</option>
						<option value="square" <?php echo ${'s'."$garb_type".'_cufftype_square'}; ?>>Square</option>
						<option value="round" <?php echo ${'s'."$garb_type".'_cufftype_round'}; ?>>Round</option>
						<option value="nocuff" <?php echo ${'s'."$garb_type".'_cufftype_nocuff'}; ?>>No Cuff</option>
						<option value="halfsleeve" <?php echo ${'s'."$garb_type".'_cufftype_halfsleeve'}; ?>>Half Sleeve</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pocket Type</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					${'s'."$garb_type".'_pockettype_nopocket'} = ${'s'."$garb_type".'_pockettype_v'} = ${'s'."$garb_type".'_pockettype_square'} = ${'s'."$garb_type".'_pockettype_round'} = ${'s'."$garb_type".'_pockettype_flap'} = ${'s'."$garb_type".'_pockettype_wallet'} = "";
					if ($c==1) {
						if ($rowq3["$garb_type".'_pockettype']=="nopocket") {
							${'s'."$garb_type".'_pockettype_nopocket'} = "selected";
						} elseif ($rowq3["$garb_type".'_pockettype']=="v") {
							${'s'."$garb_type".'_pockettype_v'} = "selected";
						} elseif ($rowq3["$garb_type".'_pockettype']=="square") {
							${'s'."$garb_type".'_pockettype_square'} = "selected";
						} elseif ($rowq3["$garb_type".'_pockettype']=="round") {
							${'s'."$garb_type".'_pockettype_round'} = "selected";
						} elseif ($rowq3["$garb_type".'_pockettype']=="flap") {
							${'s'."$garb_type".'_pockettype_flap'} = "selected";
						} elseif ($rowq3["$garb_type".'_pockettype']=="wallet") {
							${'s'."$garb_type".'_pockettype_wallet'} = "selected";
						}
					}
				?>
				<td>
					<select tabindex="129<?php echo $c; ?>" class="form-control" name=<?php echo "$garb_type".'_pockettype'."$c"; ?> style="width:120px">
						<option value="default">Default</option>
						<option value="nopocket" <?php echo ${'s'."$garb_type".'_pockettype_nopocket'}; ?>>No Pocket</option>
						<option value="v" <?php echo ${'s'."$garb_type".'_pockettype_v'}; ?>>V</option>
						<option value="square" <?php echo ${'s'."$garb_type".'_pockettype_square'}; ?>>Square</option>
						<option value="round" <?php echo ${'s'."$garb_type".'_pockettype_round'}; ?>>Round</option>
						<option value="flap" <?php echo ${'s'."$garb_type".'_pockettype_flap'}; ?>>Flap</option>
						<option value="wallet" <?php echo ${'s'."$garb_type".'_pockettype_wallet'}; ?>>Wallet</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Shoulder Type</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					${'s'."$garb_type".'_shouldertype_regular'} = ${'s'."$garb_type".'_shouldertype_noshoulder'} = ${'s'."$garb_type".'_shouldertype_vshoulder'} = ${'s'."$garb_type".'_shouldertype_dvshoulder'} = "";
					if ($c==1) {
						if ($rowq3["$garb_type".'_shouldertype']=="regular") {
							${'s'."$garb_type".'_shouldertype_regular'} = "selected";
						} elseif ($rowq3["$garb_type".'_shouldertype']=="noshoulder") {
							${'s'."$garb_type".'_shouldertype_noshoulder'} = "selected";
						} elseif ($rowq3["$garb_type".'_shouldertype']=="vshoulder") {
							${'s'."$garb_type".'_shouldertype_vshoulder'} = "selected";
						} elseif ($rowq3["$garb_type".'_shouldertype']=="dvshoulder") {
							${'s'."$garb_type".'_shouldertype_dvshoulder'} = "selected";
						}
					}
				?>
				<td>
					<select tabindex="130<?php echo $c; ?>" class="form-control" name=<?php echo "$garb_type".'_shouldertype'."$c"; ?> style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo ${'s'."$garb_type".'_shouldertype_regular'}; ?>>Regular</option>
						<option value="noshoulder" <?php echo ${'s'."$garb_type".'_shouldertype_noshoulder'}; ?>>No Shoulder</option>
						<option value="vshoulder" <?php echo ${'s'."$garb_type".'_shouldertype_vshoulder'}; ?>>V Shoulder</option>
						<option value="dvshoulder" <?php echo ${'s'."$garb_type".'_shouldertype_dvshoulder'}; ?>>DV Shoulder</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<?php if ($garb_type!='shirt') { ?>
			<tr>   <td>Taweez Type</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					${'s'."$garb_type".'_taweeztype_v'} = ${'s'."$garb_type".'_taweeztype_square'} = "";
					if ($c==1) {
						if ($rowq3["$garb_type".'_taweeztype']=="v") {
							${'s'."$garb_type".'_taweeztype_v'} = "selected";
						} elseif ($rowq3["$garb_type".'_taweeztype']=="square") {
							${'s'."$garb_type".'_taweeztype_square'} = "selected";
						}
					}
				?>
				<td>
					<select tabindex="261<?php echo $c; ?>" class="form-control" name="kurta_taweeztype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="v" <?php echo ${'s'."$garb_type".'_taweeztype_v'}; ?>>V</option>
						<option value="square" <?php echo ${'s'."$garb_type".'_taweeztype_square'}; ?>>Square</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<?php } ?>
			<tr>   <td>Button</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>   <td>
					<input tabindex="131<?php echo $c; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_button'."$c"; ?> value="" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			
		<?php } elseif ($garb_type=='pant' || $garb_type=='bpyjama') { ?>
			
			<tr>   <td>Crease</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					${'s'."$garb_type".'_crease_fc'} = ${'s'."$garb_type".'_crease_sc'} = "";
					if ($c==1) {
						if ($rowq3["$garb_type".'_crease']=="fc") {
							${'s'."$garb_type".'_crease_fc'} = "selected";
						} elseif ($rowq3["$garb_type".'_crease']=="sc") {
							${'s'."$garb_type".'_crease_sc'} = "selected";
						}
					}
				?>
				<td>
					<select tabindex="176<?php echo $c; ?>" class="form-control" name=<?php echo "$garb_type".'_crease'."$c"; ?> style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo ${'s'."$garb_type".'_crease_fc'}; ?>>FC</option>
						<option value="noshoulder" <?php echo ${'s'."$garb_type".'_crease_sc'}; ?>>SC</option>
					</select>
				</td>   <?php } ?>
			</tr>
			
		<?php } ?>
		
	</tbody>
	
</table>
</div>
