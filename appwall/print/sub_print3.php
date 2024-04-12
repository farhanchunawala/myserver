<?php
	include $fn_cmx2_php;
	
	if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {?>
	
<div class="d-flex flex-wrap">
	<?php  for($i = 1; $i < $garbcount; $i++) {  ?>
	
	<div id="mar3" class="w-50">
		<div class="row mb-n1 no-gutters">
			<div class="col"><?php echo "<h4><b><u>$sr-$garb_pairing[$i] :</u></b><small><span class=\"text-muted\"> ($garb_description[$i])</span></small></h4>"; ?></div>
		</div>
		<div class="row mb-n1 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"><u><?php echo inchtotext($pocketdown) ?></u></div>
		</div>
		<div class="row no-gutters">
			<div class="col">
			<?php
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
			?>
			</div>
			<div class="col"><?php echo inchtotext($collar) ?></div>
			<div class="col">
			<?php
				if ($cuffln[$i]=="0") {
					echo "";
				} else {
					echo inchtotext($cuffbr)." x ".inchtotext($cuffln[$i]);
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
		<div class="row no-gutters">
			<div class="col" style="font-size:20px">
			<?php
				if ($shouldertype[$i]=="noshoulder") {
					echo "NO Shoulder";
				} elseif ($shouldertype[$i]=="vshoulder") {
					echo "V Shoulder";
				} elseif ($shouldertype[$i]=="dvshoulder") {
					echo "DV Shoulder";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($collartype[$i]=="lspc") {
					echo "LSPC";
				} elseif ($collartype[$i]=="rmpc") {
					echo "RMPC";
				} elseif ($collartype[$i]=="mrmpc") {
					echo "MRMPC";
				} elseif ($collartype[$i]=="bc") {
					echo "BC";
				} elseif ($collartype[$i]=="nocollar") {
					echo "NO Collar";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($cufftype[$i]=="nocuff") {
					echo "NO Cuff";
				} elseif ($cufftype[$i]=="cut") {
					echo "Cut";
				} elseif ($cufftype[$i]=="square") {
					echo "SQUARE";
				} elseif ($cufftype[$i]=="round") {
					echo "ROUND";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($pockettype[$i]=="nopocket") {
					echo "NO Pocket";
				} elseif ($pockettype[$i]=="square") {
					echo "SQUARE";
				} elseif ($pockettype[$i]=="v") {
					echo "V";
				} elseif ($pockettype[$i]=="round") {
					echo "ROUND";
				} elseif ($pockettype[$i]=="flap") {
					echo "FLAP";
				} elseif ($pockettype[$i]=="wallet") {
					echo "WALLET";
				} else {
					echo "";
				}
			?>
			</div>
		</div>
	</div>
	
	<?php } ?>
</div>
<hr/>

<div class="d-flex flex-wrap">
<?php  for($i = 1; $i < $garbcount; $i++) {

if (((2 * $y_sf_t3) + (2 * $y_sb_t3) + 0.5) < $y_pana) {
	include $map1_php;
} elseif ((($y_sf_t3 * 2) + ($y_ss_hala * 2) + 0.5) < $y_pana) {
	include $map2_php;
} elseif ((0.5 + $x_sf_length + 0.5 + $x_sb_length + 0.5 + $x_ss_length + 0.5 + $x_ss_length + 0.5) < $x_clothln) {
	include $map3_php;
} else {
	$map = "";
}

} ?>
</div>

<?php } elseif ($garb_type=='pant') {?>
<?php } elseif ($garb_type=='bpyjama') {?>
<?php } elseif ($garb_type=='pyjama') {?>
<?php } elseif ($garb_type=='salwar') {?>
<?php } elseif ($garb_type=='aligard') {?>
<?php } elseif ($garb_type=='churidar') {?>
<?php } ?>

<hr/>