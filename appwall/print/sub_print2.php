<?php if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {?>

<div id='mar1'>
	<div class="row mb-2 no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row mb-n4 no-gutters">
		<div class="col"><?php //echo "<span class=\"border border-dark pr-1 pl-1\"><b>$count</b></span>"; ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "(".inchtotext($hala).")" ?></div>
		<div class="col"><?php echo inchtotext($t1) ?></div>
		<div class="col"><?php echo inchtotext($t2) ?></div>
		<div class="col"><?php echo inchtotext($t3) ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><u></u></div>
	</div>
	<div class="row mb-n1 no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><u><?php echo inchtotext($pocketdown) ?></u></div>
	</div>
	<div class="row mb-1 no-gutters">
		<div class="col"> <?php
			if ($garb_style=='bshirt') {
					echo "<span class=\"border border-dark pr-1 pl-1\"><b>Bshirt :</b></span>";
				} elseif ($garb_style=='bshirtsc') {
					echo "<span class=\"border border-dark pr-1 pl-1\"><b>Bshirt-sc :</b></span>";
				} elseif ($garb_style=='oshirt') {
					echo "<u><b>ᴼshirt : </b></u>";
				} elseif ($garb_style=='round') {
					echo "<span class=\"border-left border-bottom rounded-circle border-dark p-1\"><b>$garb_type :</b></span>";
				} else {
					echo "<span class=\"border border-dark pr-1 pl-1\"><b>$garb_type :</b></span>";
				}
		?> </div>
		<div class="col"><?php echo inchtotext($length) ?></div>
		<div class="col"><?php echo inchtotext($shoulder) ?></div>
		<div class="col"><?php echo inchtotext($sleeve) ?></div>
		<div class="col"><?php echo inchtotext($chest) ?></div>
		<div class="col"><?php echo inchtotext($stomach) ?></div>
		<div class="col"><?php echo inchtotext($seat) ?></div>
		<div class="col"><?php echo inchtotext($collar) ?></div>
		<div class="col">
		<?php
			if ($cuffln[1]=="0") {
				echo "";
			} else {
				echo inchtotext($cuffbr)." x ".inchtotext($cuffln[1]);
			}
		?>
		</div>
		<div class="col">
		<?php
			if ($pocket=="pocketa") {
				echo "4 x 4½";
			} elseif ($pocket=="pocketb") {
				echo "4¼ x 4¾";
			} elseif ($pocket=="pocketc") {
				echo "4½ x 5¼";
			} elseif ($pocket=="pocketd") {
				echo "4¾ x 5½";
			} elseif ($pocket=="pockete") {
				echo "5 x 5¾";
			} elseif ($pocket=="pocketf") {
				echo "5¼ x 6";
			} elseif ($pocket=="pocketg") {
				echo "5½ x 6¼";
			} elseif ($pocket=="pocketh") {
				echo "5¾ x 6½";
			} else {
				echo "";
			}
		?>
		</div>
	</div>
	<div class="row mb-n3 no-gutters">
		<div class="col">
			<?php if ($sleevefit=="slm") {
				echo "SL= ".inchtotext($biceps);
			} elseif ($sleevefit=="sl") {
				echo "SL ".inchtotext($biceps);
			} elseif ($sleevefit=="slp") {
				echo "SL+ ".inchtotext($biceps);
			} elseif ($sleevefit=="sm") {
				echo "SM ".inchtotext($biceps);
			} elseif ($sleevefit=="smp") {
				echo "SM+ ".inchtotext($biceps);
			} elseif ($sleevefit=="sf") {
				echo "SF ".inchtotext($biceps);
			} elseif ($sleevefit=="sfp") {
				echo "SF+ ".inchtotext($biceps);
			} else {
				echo inchtotext($biceps);
			} ?>
		</div>
		<div class="col"></div>
		<div class="col" style="font-size:19px">
			<?php if ($shouldertype[1]=="noshoulder") {
				echo "NO Shoulder";
			} elseif ($shouldertype[1]=="vshoulder") {
				echo "V Shoulder";
			} elseif ($shouldertype[1]=="dvshoulder") {
				echo "DV Shoulder";
			} else {
				echo "";
			} ?>
		</div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col" style="font-size:19px">
			<?php if ($collartype[1]=="lspc") {
				echo "LSPC";
			} elseif ($collartype[1]=="rmpc") {
				echo "RMPC";
			} elseif ($collartype[1]=="mrmpc") {
				echo "MRMPC";
			} elseif ($collartype[1]=="bc") {
				echo "BC";
			} elseif ($collartype[1]=="nocollar") {
				echo "NO Collar";
			} else {
				echo "";
			} ?>
		</div>
		<div class="col" style="font-size:19px">
			<?php if ($cufftype[1]=="nocuff") {
				echo "NO Cuff";
			} elseif ($cufftype[1]=="cut") {
				echo "Cut";
			} elseif ($cufftype[1]=="square") {
				echo "SQUARE";
			} elseif ($cufftype[1]=="round") {
				echo "ROUND";
			} else {
				echo "";
			} ?>
		</div>
		<div class="col" style="font-size:19px">
			<?php if ($pockettype[1]=="nopocket") {
				echo "NO Pocket";
			} elseif ($pockettype[1]=="square") {
				echo "SQUARE";
			} elseif ($pockettype[1]=="v") {
				echo "V";
			} elseif ($pockettype[1]=="round") {
				echo "ROUND";
			} elseif ($pockettype[1]=="flap") {
				echo "FLAP";
			} elseif ($pockettype[1]=="wallet") {
				echo "WALLET";
			} else {
				echo "";
			} ?>
		</div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col" style="font-size:15px">
		<?php if ($shouldertype[1]!='regular') echo 'shoulder';  ?>
		</div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col" style="font-size:15px">collar</div>
		<div class="col" style="font-size:15px">cuff</div>
		<div class="col" style="font-size:15px">pocket</div>
	</div>
</div>

<?php } elseif ($garb_type=='pant' || $garb_type=='bpyjama') {?>

<div id='mar1'>
	<div class="row mb-n2 no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col "><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row mb-n4 no-gutters">
		<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$count</b></span>"; ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col">
			<?php if ($plits=="0") {
				echo "<u>No plts</u>";
			} else {
				echo "<u>$plits"."plts</u>";
			} ?>
		</div>
	</div>
	<div class="row mb-n2 no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "<u>5~</u>" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row mb-n2 no-gutters">
		<div class="col"><?php echo "<u><b>Pant : </b></u>" ?></div>
		<div class="col"><?php echo "$length" ?></div>
		<div class="col"><?php echo "$fork" ?></div>
		<div class="col"><?php echo "$waist" ?></div>
		<div class="col"><?php echo "$seat" ?></div>
		<div class="col"><?php echo "<u>$thighs_fix</u>" ?></div>
		<div class="col"><?php echo "<u>$calfln</u>" ?></div>
		<div class="col"><?php echo "$bottom" ?></div>
		<div class="col"><?php echo "$cuttingfactor" ?></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col">
			<?php if ($crease=="fc") {
				echo "FC";
			} elseif ($crease=="sc") {
				echo "SC";
			} ?>
		</div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$thighs_loose" ?></div>
		<div class="col"><?php echo "$calf" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$pocket" ?></div>
		<div class="col">
			<?php if ($belt=="lbelt") {
				echo "L blt";
			} elseif ($belt=="cbelt") {
				echo "C blt";
			} ?>
		</div>
		<div class="col"><?php if ($garb_type=='pant') echo "$back_pocket"."B" ?></div>
		<div class="col"><?php echo "$watch_pocket"."W" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
</div>

<?php } elseif ($garb_type=='pyjama') {?>

<div id=<?php echo "$mar" ?>>
	<div class="row mb-n2 no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col "><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$pyjama_t1" ?></div>
		<div class="col"><?php echo "$pyjama_t1" ?></div>
		<div class="col"></div>
	</div>
	<div class="row mb-n2 no-gutters">
		<div class="col">
		<?php
			if ($pyjama_type=="l") {
				echo "<b><sup>lastic</sup>Pyjama :</b>";
			} elseif ($pyjama_type=="ln") {
				echo "<b><sup>lastic+Nari</sup>Pyjama :</b>";
			} else {
				echo "<b>Npyjama :</b>";
			}
		?>
		</div>
		<div class="col"><?php echo "$pyjama_length" ?></div>
		<div class="col"><?php echo "$pyjama_waist" ?></div>
		<div class="col"><?php echo "<u>$pyjama_knee_length</u>" ?></div>
		<div class="col"><?php echo "$pyjama_bottom" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$pyjama_knee" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$pyjama_side_pocket" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
</div>

<?php } elseif ($garb_type=='salwar') {?>

<div id=<?php echo "$mar" ?>>
	<div class="row mb-n2 no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col "><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters mb-n2">
		<div class="col">
		<?php
			if ($salwar_type=="l") {
				echo "<b><sup>lastic</sup>Salwar :</b>";
			} elseif ($salwar_type=="ln") {
				echo "<b><sup>lastic+Nari</sup>Salwar :</b>";
			} else {
				echo "<b>Salwar :</b>";
			}
		?>
		</div>
		<div class="col"><?php echo inchtotext($salwar_length) ?></div>
		<div class="col"><?php echo inchtotext($salwar_bottom) ?></div>
		<div class="col"><?php echo inchtotext($salwar_waist) ?></div>
		<div class="col"></div>
		<div class="col"><u><?php echo inchtotext($salwar_t1) ?></u></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters mb-n3">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo inchtotext($salwar_t2) ?></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "(".$salwar_chain_pocket."=CP)" ?></div>
		<div class="col"><?php echo $salwar_watch_pocket."W" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
</div>

<?php } elseif ($garb_type=='aligard') {?>

<div id=<?php echo "$mar" ?>>
	<div class="row mb-n2 no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col "><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$aligard_t1" ?></div>
		<div class="col"><?php echo "$aligard_t1" ?></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"><?php echo "<u><b>aligard : </b></u>" ?></div>
		<div class="col"><?php echo "$aligard_length" ?></div>
		<div class="col"><?php echo "$aligard_length_fix" ?></div>
		<div class="col"><?php echo "$aligard_waist" ?></div>
		<div class="col"><?php echo "$aligard_knee_length" ?></div>
		<div class="col"><?php echo "$aligard_knee_loose" ?></div>
		<div class="col"><?php echo "$aligard_calf_length" ?></div>
		<div class="col"><?php echo "$aligard_calf_loose" ?></div>
		<div class="col"><?php echo "$aligard_bottom" ?></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$aligard_chain_pocket" ?></div>
		<div class="col"><?php echo "$aligard_chain_fly" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
</div>

<?php } elseif ($garb_type=='churidar') {?>

<div id=<?php echo "$mar" ?>>
	<div class="row mb-n2 no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col "><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$churidar_t1" ?></div>
		<div class="col"><?php echo "$churidar_t1" ?></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row mb-n2 no-gutters">
		<div class="col"><?php echo "<u><b>churidar : </b></u>" ?></div>
		<div class="col"><?php echo "$churidar_length" ?></div>
		<div class="col"><?php echo "$churidar_length_fix" ?></div>
		<div class="col"><?php echo "$churidar_waist" ?></div>
		<div class="col"><u><?php echo "$churidar_knee_length" ?></u></div>
		<div class="col"><u><?php echo "$churidar_calf_length1" ?></u></div>
		<div class="col"><u><?php echo "$churidar_calf_length2" ?></u></div>
		<div class="col"><u><?php echo "$churidar_calf_length3" ?></u></div>
		<div class="col"><u><?php echo "$churidar_calf_length4" ?></u></div>
		<div class="col"><u><?php echo "$churidar_bottom1" ?></u></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$churidar_knee_loose" ?></div>
		<div class="col"><?php echo "$churidar_calf_loose1" ?></div>
		<div class="col"><?php echo "$churidar_calf_loose2" ?></div>
		<div class="col"><?php echo "$churidar_calf_loose3" ?></div>
		<div class="col"><?php echo "$churidar_calf_loose4" ?></div>
		<div class="col"><?php echo "$churidar_bottom2" ?></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
</div>

<?php } ?>

<hr/>
