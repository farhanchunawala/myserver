<?php			//ALT + SHIFT + 3
	$query5 = "SELECT * FROM $styletable WHERE sr=$sr AND garb_type=\"$garb_type\" ORDER BY style_id DESC LIMIT 1";
	$result5 = mysqli_query($dbc, $query5) or die('<b>Error pattern_table.php/query5 : </b><br/>'.mysqli_error($dbc));
	$rowq5 = mysqli_fetch_array($result5);
?>
<div class="mr-5">
<table class="table table-borderless table-sm">
	
	<thead>
		<tr>
			<th><?php echo $garb_type.' x '.${"$garb_type".'_count'}; ?></th>
			<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>
			<th><input tabindex="<?php echo $tx.'01'; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_description'."$c"; ?> value="" style="width:120px" /></th>
			<?php } ?>
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
				} else $pair2 = "";
			?>
			<td><input tabindex="<?php echo $tx.'02'; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_pairing'."$c"; ?> value="<?php echo $pair2; ?>" style="width:120px" /></td>
			<?php } ?>
		</tr>
		<tr>   <td>Submit Date</td>
			<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>
			<td><input tabindex="<?php echo $tx.'03'; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_submit_date'."$c"; ?> value="" placeholder="yy-mm-dd" style="width:120px" /></td>
			<?php } ?>
		</tr>
		<tr>   <td>Pana</td>
			<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>   <td>
				<input tabindex="<?php echo $tx.'04'; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_pana'."$c"; ?> value="" style="width:75px" />
				<input tabindex="<?php echo $tx.'04'; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_panafd'."$c"; ?> value="" style="width:40px" />
			</td>   <?php } ?>
		</tr>
		<tr>   <td>Cloth L</td>
			<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) { ?>   <td>
				<input tabindex="<?php echo $tx.'05'; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_clothln'."$c"; ?> value="" style="width:75px" />
				<input tabindex="<?php echo $tx.'05'; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_clothfd'."$c"; ?> value="" style="width:40px" />
			</td>   <?php } ?>
		</tr>
		
		<?php if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') { ?>
			
			<tr>   <td>Collar Type</td>
				<?php for ($c = 1; $c <= ${"$garb_type".'_count'}; $c++) {
					$s_collartype_rmpc = $s_collartype_mrmpc = $s_collartype_lspc = $s_collartype_bc = $s_collartype_nocollar = "";
					if ($c==1 && isset($rowq5['top_collartype'])) {
						if     ($rowq5['top_collartype']=="rmpc")		$s_collartype_rmpc = "selected";
						elseif ($rowq5['top_collartype']=="mrmpc")		$s_collartype_mrmpc = "selected";
						elseif ($rowq5['top_collartype']=="lspc")		$s_collartype_lspc = "selected";
						elseif ($rowq5['top_collartype']=="bc")			$s_collartype_bc = "selected";
						elseif ($rowq5['top_collartype']=="nocollar")	$s_collartype_nocollar = "selected";
					}
				?>
				<td><select tabindex="<?php echo $tx.'06'; ?>" class="form-control" name=<?php echo "$garb_type".'_collartype'."$c"; ?> style="width:120px">
					<option value="default">Default</option>
					<option value="rmpc" <?php echo $s_collartype_rmpc; ?>>RMPC</option>
					<?php if ($svr_mode==='kkms_cnv' || $svr_mode==='local_cnv') { ?><option value="mrmpc" <?php echo $s_collartype_mrmpc; ?>>MRMPC</option><?php } ?>
					<option value="lspc" <?php echo $s_collartype_lspc; ?>>LSPC</option>
					<option value="bc" <?php echo $s_collartype_bc; ?>>BC</option>
					<option value="nocollar" <?php echo $s_collartype_nocollar; ?>>No Collar</option>
				</select></td>
				<?php } ?>
			</tr>
			<tr>   <td>Cuff L</td>
				<?php for ($c = 01; $c <= ${"$garb_type".'_count'}; $c++) {
					$s_cuffln12mm = $s_cuffln25mm = $s_cuffln38mm = $s_cuffln50mm = $s_cuffln57mm = $s_cuffln63mm = $s_cuffln76mm = "";
					if ($c==1 && isset($rowq5['top_cuffln'])) {
						if     ($rowq5['top_cuffln']=="0.5")	$s_cuffln12mm = "selected";
						elseif ($rowq5['top_cuffln']=="1")		$s_cuffln25mm = "selected";
						elseif ($rowq5['top_cuffln']=="1.5")	$s_cuffln38mm = "selected";
						elseif ($rowq5['top_cuffln']=="2")		$s_cuffln50mm = "selected";
						elseif ($rowq5['top_cuffln']=="2.25")	$s_cuffln57mm = "selected";
						elseif ($rowq5['top_cuffln']=="2.5")	$s_cuffln63mm = "selected";
						elseif ($rowq5['top_cuffln']=="3")		$s_cuffln76mm = "selected";
					}
				?>
				<td><select tabindex="<?php echo $tx.'07'; ?>" class="form-control" name=<?php echo "$garb_type".'_cuffln'."$c"; ?> style="width:120px">
					<option value="default">Default</option>
					<?php if ($svr_mode==='kkms_cnv' || $svr_mode==='local_cnv') { ?>
					<option value="0.5" <?php echo $s_cuffln12mm; ?>>½</option>
					<option value="1" <?php echo $s_cuffln25mm; ?>>1</option>
					<option value="1.5" <?php echo $s_cuffln38mm; ?>>1½</option>
					<option value="2" <?php echo $s_cuffln50mm; ?>>2</option>
					<?php } ?>
					<option value="2.25" <?php echo $s_cuffln57mm; ?>>2¼</option>
					<option value="2.5" <?php echo $s_cuffln63mm; ?>>2½</option>
					<?php if ($svr_mode==='kkms_cnv' || $svr_mode==='local_cnv') { ?><option value="3" <?php echo $s_cuffln76mm; ?>>3</option><?php } ?>
				</select></td>
				<?php } ?>
			</tr>
			<tr>   <td>Cuff Type</td>
				<?php for ($c = 01; $c <= ${"$garb_type".'_count'}; $c++) {
					$s_cufftype_cut = $s_cufftype_square = $s_cufftype_round = $s_cufftype_nocuff = $s_cufftype_halfsleeve = "";
					if ($c==1 && isset($rowq5['top_cufftype'])) {
						if     ($rowq5['top_cufftype']=="cut")			$s_cufftype_cut = "selected";
						elseif ($rowq5['top_cufftype']=="square")		$s_cufftype_square = "selected";
						elseif ($rowq5['top_cufftype']=="round")		$s_cufftype_round = "selected";
						elseif ($rowq5['top_cufftype']=="nocuff")		$s_cufftype_nocuff = "selected";
						elseif ($rowq5['top_cufftype']=="halfsleeve")	$s_cufftype_halfsleeve = "selected";
					}
				?>
				<td><select tabindex="<?php echo $tx.'08'; ?>" class="form-control" name=<?php echo "$garb_type".'_cufftype'."$c"; ?> style="width:120px">
					<option value="default">Default</option>
					<option value="cut" <?php echo $s_cufftype_cut; ?>>Cut</option>
					<option value="square" <?php echo $s_cufftype_square; ?>>Square</option>
					<?php if ($svr_mode==='kkms_cnv' || $svr_mode==='local_cnv') { ?><option value="round" <?php echo $s_cufftype_round; ?>>Round</option><?php } ?>
					<option value="nocuff" <?php echo $s_cufftype_nocuff; ?>>No Cuff</option>
					<option value="halfsleeve" <?php echo $s_cufftype_halfsleeve; ?>>Half Sleeve</option>
				</select></td>
				<?php } ?>
			</tr>
			<tr>   <td>Pocket Type</td>
				<?php for ($c = 01; $c <= ${"$garb_type".'_count'}; $c++) {
					$s_pockettype_nopocket = $s_pockettype_v = $s_pockettype_square = $s_pockettype_round = $s_pockettype_flap = $s_pockettype_wallet = "";
					if ($c==1 && isset($rowq5['top_pockettype'])) {
						if ($rowq5['top_pockettype']=="nopocket")	$s_pockettype_nopocket = "selected";
						elseif ($rowq5['top_pockettype']=="v")		$s_pockettype_v = "selected";
						elseif ($rowq5['top_pockettype']=="square")	$s_pockettype_square = "selected";
						elseif ($rowq5['top_pockettype']=="round")	$s_pockettype_round = "selected";
						elseif ($rowq5['top_pockettype']=="flap")	$s_pockettype_flap = "selected";
						elseif ($rowq5['top_pockettype']=="wallet")	$s_pockettype_wallet = "selected";
					}
				?>
				<td><select tabindex="<?php echo $tx.'09'; ?>" class="form-control" name=<?php echo "$garb_type".'_pockettype'."$c"; ?> style="width:120px">
					<option value="default">Default</option>
					<option value="nopocket" <?php echo $s_pockettype_nopocket; ?>>No Pocket</option>
					<option value="v" <?php echo $s_pockettype_v; ?>>V</option>
					<option value="square" <?php echo $s_pockettype_square; ?>>Square</option>
					<option value="round" <?php echo $s_pockettype_round; ?>>Round</option>
					<?php if ($svr_mode==='kkms_cnv' || $svr_mode==='local_cnv') { ?>
					<option value="flap" <?php echo $s_pockettype_flap; ?>>Flap</option>
					<option value="wallet" <?php echo $s_pockettype_wallet; ?>>Wallet</option>
					<?php } ?>
				</select></td>
				<?php } ?>
			</tr>
			<tr>   <td>Shoulder Type</td>
				<?php for ($c = 01; $c <= ${"$garb_type".'_count'}; $c++) {
					$s_shouldertype_regular = $s_shouldertype_noshoulder = $s_shouldertype_vshoulder = $s_shouldertype_dvshoulder = "";
					if ($c==1 && isset($rowq5['top_shouldertype'])) {
						if     ($rowq5['top_shouldertype']=="regular")		$s_shouldertype_regular = "selected";
						elseif ($rowq5['top_shouldertype']=="noshoulder")	$s_shouldertype_noshoulder = "selected";
						elseif ($rowq5['top_shouldertype']=="vshoulder")	$s_shouldertype_vshoulder = "selected";
						elseif ($rowq5['top_shouldertype']=="dvshoulder")	$s_shouldertype_dvshoulder = "selected";
					}
				?>
				<td><select tabindex="<?php echo $tx.'10'; ?>" class="form-control" name=<?php echo "$garb_type".'_shouldertype'."$c"; ?> style="width:120px">
					<option value="default">Default</option>
					<option value="regular" <?php echo $s_shouldertype_regular; ?>>Regular</option>
					<option value="noshoulder" <?php echo $s_shouldertype_noshoulder; ?>>No Shoulder</option>
					<option value="vshoulder" <?php echo $s_shouldertype_vshoulder; ?>>V Shoulder</option>
					<option value="dvshoulder" <?php echo $s_shouldertype_dvshoulder; ?>>DV Shoulder</option>
				</select></td>
				<?php } ?>
			</tr>
			<?php if ($garb_type!='shirt') { ?>
			<tr>   <td>Taweez Type</td>
				<?php for ($c = 01; $c <= ${"$garb_type".'_count'}; $c++) {
					$s_taweeztype_v = $s_taweeztype_square = "";
					if ($c==1 && isset($rowq5['top_taweeztype'])) {
						if     ($rowq5['top_taweeztype']=="v")		$s_taweeztype_v = "selected";
						elseif ($rowq5['top_taweeztype']=="square")	$s_taweeztype_square = "selected";
					}
				?>
				<td><select tabindex="<?php echo $tx.'11'; ?>" class="form-control" name=<?php echo "$garb_type".'_taweeztype'."$c"; ?> style="width:120px">
					<option value="default">Default</option>
					<option value="v" <?php echo $s_taweeztype_v; ?>>V</option>
					<option value="square" <?php echo $s_taweeztype_square; ?>>Square</option>
				</select></td>
				<?php } ?>
			</tr>
			<?php } ?>
			<tr>   <td>Button</td>
				<?php for ($c = 01; $c <= ${"$garb_type".'_count'}; $c++) { ?>
				<td><input tabindex="<?php echo $tx.'12'; ?>" type="text" class="form-control" name=<?php echo "$garb_type".'_button'."$c"; ?> value="" style="width:120px" /></td>
				<?php } ?>
			</tr>
			
		<?php } elseif ($garb_type=='pant' || $garb_type=='bpyjama') { ?>
			
			<tr>   <td>Crease</td>
				<?php for ($c = 01; $c <= ${"$garb_type".'_count'}; $c++) {
					$s_crease_fc = $s_crease_sc = "";
					if ($c==1 && isset($rowq5['bottom_crease'])) {
						if     ($rowq5['bottom_crease']=="fc") $s_crease_fc = "selected";
						elseif ($rowq5['bottom_crease']=="sc") $s_crease_sc = "selected";
					}
				?>
				<td><select tabindex="<?php echo $tx.'01'; ?>" class="form-control" name=<?php echo "$garb_type".'_crease'."$c"; ?> style="width:120px">
					<option value="default">Default</option>
					<option value="fc" <?php echo $s_crease_fc; ?>>FC</option>
					<option value="sc" <?php echo $s_crease_sc; ?>>SC</option>
				</select></td>
				<?php } ?>
			</tr>
			
		<?php } ?>
		
	</tbody>
	
</table>
</div>