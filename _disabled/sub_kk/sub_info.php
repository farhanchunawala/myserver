<div class="container-fluid mt-2">   <form method="post" action="customer_edit.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>&csv=0&msv=1&garb_type=<?php echo "$garb_type"; ?>">   <div class="form-group">	
		
		<div class="row p-3 no-gutters">
			<div class="col">   <label for="measure_date">Date</label>
				<input type="text" class="form-control" name="measure_date" value="<?php echo date( 'd M Y', $measure_date ); ?>" style="width:75%" />
			</div>
			<div class="col"></div>
			<div class="col">
				<?php if ($garb_type=='shirt') { ?>
					<label for="garb_style">Style</label>
					<select tabindex="60" class="form-control" name="garb_style" style="width:75%">
						<option value="oshirt">Oshirt</option>
						<option value="bshirt" <?php echo $s_garb_style_bshirt; ?>>Bshirt</option>
						<option value="bshirtsc" <?php echo $s_garb_style_bshirtsc; ?>>Bshirt SC</option>
					</select>
				<?php } elseif ($garb_type=='kurta' || $garb_type=='pathani') { ?>
					<label for="garb_style">Style</label>
					<select tabindex="60" class="form-control" name="garb_style" style="width:75%">
						<option value="square">Square</option>
						<option value="round" <?php echo $s_garb_style_round; ?>>Round</option>
					</select>
				<?php } elseif ($garb_type=='pyjama' || $garb_type=='salwar' || $garb_type=='aligard' || $garb_type=='churidar') { ?>
					<label for="garb_style">Style</label>
					<select tabindex="60" class="form-control" name="garb_style" style="width:75%">
						<option value="n">N <?php echo $garb_type; ?></option>
						<option value="l" <?php echo $s_garb_style_l; ?>>L <?php echo $garb_type; ?></option>
						<option value="ln" <?php echo $s_garb_style_ln; ?>>L+N <?php echo $garb_type; ?></option>
						<option value="b" <?php echo $s_garb_style_b; ?>>B <?php echo $garb_type; ?></option>
					</select>
				<?php } ?>
			</div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">   <div class="btn-group p-2 mt-4">
				<button tabindex="98" type="submit" class="btn btn-info" value="save" name="submit">Save</button>
				<button tabindex="99" type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
					<span class="caret"></span>
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="calculations/clone_print.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>&garb_type=<?php echo $garb_type; ?>" target="_blank">Clone Print</a>
					<a class="dropdown-item" href="entry.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>" target="_blank">Entry</a>
					<a class="dropdown-item" href="print2.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>&garb_type=<?php echo $garb_type; ?>&print=print1" target="_blank">Print1</a>
					<a class="dropdown-item" href="print2.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>&garb_type=<?php echo $garb_type; ?>&print=print2" target="_blank">Print2</a>
					<a class="dropdown-item" href="print2.php?svr_mode=<?php echo $svr_mode; ?>&sr=<?php echo $sr; ?>&garb_type=<?php echo $garb_type; ?>&print=print3" target="_blank">Print3</a>
				</div>
			</div>   </div>
		</div>
		
	<?php if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') { ?>
		
		<div class="row p-3 no-gutters">
			<div class="col">   <label for="length">Length</label>
				<input tabindex="61" type="text" class="form-control" name="length" value="<?php echo inchtotext($length); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="shoulder">Shoulder</label>
				<input tabindex="62" type="text" class="form-control" name="shoulder" value="<?php echo inchtotext($shoulder); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="sleeve">Sleeve</label>
				<input tabindex="63" type="text" class="form-control" name="sleeve" value="<?php echo inchtotext($sleeve); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="chest">Chest</label>
				<input tabindex="64" type="text" class="form-control" name="chest" value="<?php echo inchtotext($chest); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="stomach">Stomach</label>
				<input tabindex="65" type="text" class="form-control" name="stomach" value="<?php echo inchtotext($stomach); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="seat">Seat</label>
				<input tabindex="66" type="text" class="form-control" name="seat" value="<?php echo inchtotext($seat); ?>" style="width:75%" />
			</div>
		</div>
		
		<div class="row p-3 no-gutters">
			<div class="col">   <label for="sleevefit">Sleeve Fit</label>
				<select tabindex="87" class="form-control" name="sleevefit" style="width:75%">
					<option value="slm">SL=</option>
					<option value="sl" <?php echo $s_sleevefit_sl; ?>>SL</option>
					<option value="slp" <?php echo $s_sleevefit_slp; ?>>SL+</option>
					<option value="sm" <?php echo $s_sleevefit_sm; ?>>SM</option>
					<option value="smp" <?php echo $s_sleevefit_smp; ?>>SM+</option>
					<option value="sf" <?php echo $s_sleevefit_sf; ?>>SF</option>
					<option value="sfp" <?php echo $s_sleevefit_sfp; ?>>SF+</option>
				</select>
			</div>
			<div class="col">   <label for="biceps">Biceps</label>
				<input tabindex="680" type="text" class="form-control" name="biceps" value="<?php echo inchtotext($biceps); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="hala">Hala</label>
				<input tabindex="89" type="text" class="form-control" name="hala" value="<?php echo inchtotext($hala); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="t1">t1</label>
				<input tabindex="90" type="text" class="form-control" name="t1" value="<?php echo inchtotext($t1); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="t2">t2</label>
				<input tabindex="91" type="text" class="form-control" name="t2" value="<?php echo inchtotext($t2); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="t3">t3</label>
				<input tabindex="92" type="text" class="form-control" name="t3" value="<?php echo inchtotext($t3); ?>" style="width:75%" />
			</div>
		</div>
		
		<div class="row p-3 no-gutters">
			<div class="col">   <label for="sleeve_loose">Sleeve Loose</label>
				<input tabindex="730" type="text" class="form-control" name="sleeve_loose" value="<?php echo inchtotext($sleeve_loose); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="halfsleeve_loose">Halfsleeve Loose</label>
				<input tabindex="740" type="text" class="form-control" name="halfsleeve_loose" value="<?php echo inchtotext($halfsleeve_loose); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="collar">Collar</label>
				<input tabindex="75" type="text" class="form-control" name="collar" value="<?php echo inchtotext($collar); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="cuffbr">Cuff B</label>
				<input tabindex="76" type="text" class="form-control" name="cuffbr" value="<?php echo $cuffbr; ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="pocketdown">Pocket Down</label>
				<input tabindex="77" type="text" class="form-control" name="pocketdown" value="<?php echo inchtotext($pocketdown); ?>" style="width:75%" />
			</div>
			<div class="col">   <label for="pocket">Pocket</label>
				<select tabindex="78" class="form-control" name="pocket" style="width:75%">
					<option value="nopocket">No Pocket</option>
					<option value="pocketa" <?php echo $s_pocket_pocketa; ?>>4 x 4½</option>
					<option value="pocketb" <?php echo $s_pocket_pocketb; ?>>4¼ x 4¾</option>
					<option value="pocketc" <?php echo $s_pocket_pocketc; ?>>4½ x 5¼</option>
					<option value="pocketd" <?php echo $s_pocket_pocketd; ?>>4¾ x 5½</option>
					<option value="pockete" <?php echo $s_pocket_pockete; ?>>5 x 5¾</option>
					<option value="pocketf" <?php echo $s_pocket_pocketf; ?>>5¼ x 6</option>
					<option value="pocketg" <?php echo $s_pocket_pocketg; ?>>5½ x 6¼</option>
					<option value="pocketh" <?php echo $s_pocket_pocketh; ?>>5¾ x 6½</option>
				</select>
			</div>
		</div>
		
	<?php } elseif ($garb_type=='pant' || $garb_type=='bpyjama' || $garb_type=='pyjama' || $garb_type=='salwar' || $garb_type=='aligard' || $garb_type=='churidar') { ?>
		
		<div class="row p-3">
			<div class="col">   <div class="row no-gutters">
				<div class="col">   <label for="length">Length</label>
					<input tabindex="61" type="text" class="form-control" name="length" value="<?php echo inchtotext($length); ?>" />
				</div>
				<?php if ($garb_type=='churidar') { ?>
				<div class="col">   <label for="length_fix">Fix Length</label>
					<input tabindex="61" type="text" class="form-control" name="length_fix" value="<?php echo inchtotext($length_fix); ?>" />
				</div>
				<?php } ?>
				<div class="col-2"></div>
			</div>   </div>
			<div class="col">   <label for="fork">Fork</label>
				<input tabindex="62" type="text" class="form-control" name="fork" value="<?php echo inchtotext($fork); ?>" style="width:85%" />
			</div>
			<div class="col">   <label for="waist">Waist</label>
				<input tabindex="63" type="text" class="form-control" name="waist" value="<?php echo inchtotext($waist); ?>" style="width:85%" />
			</div>
			<div class="col">   <?php if ($garb_type=='pant' || $garb_type=='bpyjama') { ?>   <label for="seat">Seat</label>
				<input tabindex="64" type="text" class="form-control" name="seat" value="<?php echo inchtotext($seat); ?>" style="width:85%" />
			<?php } ?>   </div>
			<div class="col">   <label for="pleats"><?php echo ($garb_type=='pant' || $garb_type=='bpyjama') ? 'Pleats' : 'Gher'; ?></label>
				<input tabindex="89" type="text" class="form-control" name="pleats" value="<?php echo inchtotext($pleats); ?>" style="width:85%" />
			</div>
			<div class="col">   <div class="row no-gutters">
				<div class="col">   <label for="bottom">Bottom</label>
					<input tabindex="77" type="text" class="form-control" name="bottom" value="<?php echo inchtotext($bottom); ?>" />
				</div>
				<?php if ($garb_type=='churidar') { ?>
				<div class="col">   <label for="bottom2">Bottom2</label>
					<input tabindex="78" type="text" class="form-control" name="bottom2" value="<?php echo inchtotext($bottom2); ?>" />
				</div>
				<?php } ?>
				<div class="col-2"></div>
			</div>   </div>
		</div>
		
		<div class="row p-3">
			<div class="col">   <?php if ($garb_type=='pant' || $garb_type=='bpyjama') { ?>   <div class="row no-gutters">
				<div class="col">   <label for="thigh_fix">Thigh Fix</label>
					<input tabindex="65" type="text" class="form-control" name="thigh_fix" value="<?php echo inchtotext($thigh_fix); ?>" />
				</div>
				<div class="col">   <label for="thigh_loose">Loose</label>
					<input tabindex="66" type="text" class="form-control" name="thigh_loose" value="<?php echo inchtotext($thigh_loose); ?>" />
				</div>
				<div class="col-2"></div>
			</div>   <?php } ?>   </div>
			<div class="col">   <div class="row no-gutters">
				<div class="col">   <label for="kneeln">Knee Ln</label>
					<input tabindex="67" type="text" class="form-control" name="kneeln" value="<?php echo inchtotext($kneeln); ?>" />
				</div>
				<div class="col">   <label for="knee_loose">Loose</label>
					<input tabindex="68" type="text" class="form-control" name="knee_loose" value="<?php echo inchtotext($knee_loose); ?>" />
				</div>
				<div class="col-2"></div>
			</div>   </div>
			<div class="col">   <?php if ($garb_type=='pant' || $garb_type=='bpyjama' || $garb_type=='aligard' || $garb_type=='churidar') { ?>   <div class="row no-gutters">
				<div class="col">   <label for="calfln">Calf Ln</label>
					<input tabindex="69" type="text" class="form-control" name="calfln" value="<?php echo inchtotext($calfln); ?>" />
				</div>
				<div class="col">   <label for="calf_loose">Loose</label>
					<input tabindex="70" type="text" class="form-control" name="calf_loose" value="<?php echo inchtotext($calf_loose); ?>" />
				</div>
				<div class="col-2"></div>
			</div>   <?php } ?>   </div>
			<div class="col">   <?php if ($garb_type=='churidar') { ?>   <div class="row no-gutters">
				<div class="col">   <label for="calfln2">Calf Ln2</label>
					<input tabindex="71" type="text" class="form-control" name="calfln2" value="<?php echo inchtotext($calfln2); ?>" />
				</div>
				<div class="col">   <label for="calf_loose2">Loose2</label>
					<input tabindex="72" type="text" class="form-control" name="calf_loose2" value="<?php echo inchtotext($calf_loose2); ?>" />
				</div>
				<div class="col-2"></div>
			</div>   <?php } ?>   </div>
			<div class="col">   <?php if ($garb_type=='churidar') { ?>   <div class="row no-gutters">
				<div class="col">   <label for="calfln3">Calf Ln3</label>
					<input tabindex="73" type="text" class="form-control" name="calfln3" value="<?php echo inchtotext($calfln3); ?>" />
				</div>
				<div class="col">   <label for="calf_loose3">Loose3</label>
					<input tabindex="74" type="text" class="form-control" name="calf_loose3" value="<?php echo inchtotext($calf_loose3); ?>" />
				</div>
				<div class="col-2"></div>
			</div>   <?php } ?>   </div>
			<div class="col">
			<?php if ($garb_type=='pant' || $garb_type=='bpyjama') { ?>
				<label for="cuttingfactor">CF</label>
				<input tabindex="80" type="text" class="form-control" name="cuttingfactor" value="<?php echo inchtotext($cuttingfactor); ?>" style="width:85%" />
			<?php } elseif ($garb_type=='churidar') { ?>
			<div class="row no-gutters">
				<div class="col">   <label for="calfln4">Calf Ln4</label>
					<input tabindex="75" type="text" class="form-control" name="calfln4" value="<?php echo inchtotext($calfln4); ?>" />
				</div>
				<div class="col">   <label for="calf_loose4">Loose4</label>
					<input tabindex="76" type="text" class="form-control" name="calf_loose4" value="<?php echo inchtotext($calf_loose4); ?>" />
				</div>
				<div class="col-2"></div>
			</div>
			<?php } ?>
			</div>
		</div>
		<!--
		<div class="row p-3">
			<div class="col">   <?php if ($garb_type=='pant' || $garb_type=='bpyjama') { ?>   <label for="belt">Belt</label>
				<select tabindex="81" class="form-control" name="belt_style" style="width:85%">
					<option value="cbelt">C Belt</option>
					<option value="lbelt" <?php echo $s_belt_style_lbelt; ?>>L Belt</option>
				</select>
			<?php } ?>   </div>
			<div class="col">   <div class="row no-gutters">
				<div class="col">   <label for="pocket_style">Pocket</label>
					<select tabindex="82" class="form-control" name="pocket_style">
						<option value="xp">Xp</option>
						<option value="sp" <?php echo $s_pocket_style_sp; ?>>SP</option>
						<option value="lp" <?php echo $s_pocket_style_lp; ?>>LP</option>
						<option value="wp" <?php echo $s_pocket_style_wp; ?>>WP</option>
					</select>
				</div>
				<div class="col-3">   <label for="pocket">&nbsp </label>
					<input tabindex="83" type="text" class="form-control" name="pocket" value="<?php echo $pocket; ?>" />
				</div>
				<div class="col-2"></div>
			</div>   </div>
			<div class="col">   <?php if ($garb_type=='pant') { ?>   <label for="backpocket">Back Pocket</label>
				<input tabindex="84" type="text" class="form-control" name="backpocket" value="<?php echo $backpocket; ?>" style="width:85%" />
			<?php } ?>   </div>
			<div class="col">   <label for="watchpocket">Watch Pocket</label>
				<input tabindex="85" type="text" class="form-control" name="watchpocket" value="<?php echo $watchpocket; ?>" style="width:85%" />
			</div>
			<div class="col">   <?php if ($garb_type=='aligard') { ?>   <label for="chainfly">Chain Fly</label>
				<input tabindex="86" type="text" class="form-control" name="chainfly" value="<?php echo $chainfly; ?>" style="width:75%" />
			<?php } ?>   </div>
			<div class="col"></div>
		</div>
		-->
	<?php } ?>
	
</div>   </form>   </div>