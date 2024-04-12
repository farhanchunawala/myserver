<?php if ($type=='shirt') {?>

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
				if ($shirt_type=="bshirt") {
					echo "<span class=\"border border-dark pr-1 pl-1\"><b>Bshirt :</b></span>";
				} else {
					echo "<u><b>ᴼshirt : </b></u>";
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

if (((2 * $y_front_t3p2) + (2 * $y_back_t3) + 0.5) < $y_pana) {
	$map = "map1";
} elseif (((2 * $y_front_t3p2) + ($y_sleeve_halax2) + 0.5) < $y_pana) {
	$map = "map2";
} elseif ((0.5 + $x_front_length1 + 0.5 + $x_back_length1 + 0.5 + $x_sleeve_length2 + 0.5 + $x_sleeve_length2 + 0.5) < $x_clothln) {
	$map = "map3";
} else {
	$map = "";
}

if ($map=="map1") {
	include $map1_php;
?>

<?php } elseif ($map=="map2") {
	$x_mapfront_m = 0.5;
	$y_mapfront_m = $y_pana;
	
	$x_mapback_m = $x_clothln - 0.8;
	$y_mapback_m = $y_pana - $y_back_t3;
	
	$x_mapsleeve_m1 = $x_sleeve_hala + 0.5;
	$y_mapsleeve_m1 = 0;
	$x_mapsleeve_m2 = $x_clothln - $x_sleeve_hala - 0.8;
	$y_mapsleeve_m2 = 0;
	
	$x_mapshoulder_m = $x_clothln - 0.8;
	$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
?>
<div id="marp">
<?php echo "<b><u>$sr-$garb_pairing[$i]</u></b>"; ?><br/>
<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
	
	<path
	d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
	l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo  -cmx2($y_front_t1mshoulder); ?>
	h<?php echo cmx2($x_front_halaline); ?>
	l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	v<?php echo -cmx2($y_front_collarlp2); ?>
	v<?php echo -cmx2($y_front_collarlp2); ?>
	l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	h<?php echo -cmx2($x_front_halaline); ?>
	a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	v<?php echo cmx2($y_front_t3p2); ?>
	v<?php echo cmx2($y_front_t3p2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	h<?php echo -cmx2($x_back_halaline); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	h<?php echo cmx2($x_back_halaline); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
	a75,75 0,0,0 <?php echo cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>
	a75,75 0,0,0 <?php echo -cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
	fill="teal"
	transform="rotate(180,<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>)" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	a75,75 0,0,0 <?php echo cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>
	a75,75 0,0,0 <?php echo -cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapshoulder_m); ?>,<?php echo cmx2($y_mapshoulder_m); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	v<?php echo cmx2($y_shoulder_heightmslope); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
	fill="teal" />
</svg>
</div>

<?php } elseif ($map=="map3") {
	$x_mapfront_m = 0.5;
	$y_mapfront_m = $y_pana;
	
	$x_mapback_m = 0.5 + $x_front_length1 + 0.5;
	$y_mapback_m = $y_pana;
	
	$x_mapsleeve_m1 = 0.5 + $x_front_length1 + 0.5 + $x_back_length1 + 0.5 + $x_sleeve_hala;
	$y_mapsleeve_m1 = $y_pana;
	$x_mapsleeve_m2 = $x_clothln - $x_sleeve_hala - 0.8;
	$y_mapsleeve_m2 = $y_pana;
	
	$x_mapshoulder_m = 0.5 + $x_front_length1 + 0.5;
	$y_mapshoulder_m = $y_pana - $y_back_t3 * 2 - 0.5;
?>
<div id="marp">
<?php echo "<b><u>$sr-$garb_pairing[$i]</u></b>"; ?><br/>
<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
	
	<path
	d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
	l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	h<?php echo cmx2($x_front_halaline); ?>
	l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	v<?php echo -cmx2($y_front_collarlp2); ?>
	v<?php echo -cmx2($y_front_collarlp2); ?>
	l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	h<?php echo -cmx2($x_front_halaline); ?>
	a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	v<?php echo cmx2($y_front_t3p2); ?>
	v<?php echo cmx2($y_front_t3p2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	h<?php echo cmx2($x_back_halaline); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	h<?php echo -cmx2($x_back_halaline); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	a75,75 0,0,0 <?php echo cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>
	a75,75 0,0,0 <?php echo -cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>"
	fill="teal"
	transform="rotate(180,<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>)" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
	a75,75 0,0,0 <?php echo cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>
	a75,75 0,0,0 <?php echo -cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapshoulder_m) ?>,<?php echo cmx2($y_mapshoulder_m); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	v-<?php echo cmx2($y_shoulder_heightmslope); ?>
	l-<?php echo cmx2($x_shoulder_slope); ?>,-<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 -<?php echo cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 -<?php echo cmx2($x_shoulder_rounding); ?>,-<?php echo cmx2($y_shoulder_rounding); ?>
	l-<?php echo cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	v<?php echo cmx2($y_shoulder_heightmslope); ?>"
	fill="teal" />
	
</svg>
</div>

<?php }

} ?>
</div>

<?php } elseif ($type=='kurta') {?>

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
			<div class="col"><u><?php echo inchtotext($kurta_pocketdown) ?></u></div>
		</div>
		<div class="row no-gutters">
			<div class="col">
			<?php
				if ($kurta_type=="round") {
				echo "<span class=\"border-left border-bottom rounded-circle border-dark p-1\"><b>kurta :</b></span>";
			} else {
				echo "<span class=\"border border-dark pr-1 pl-1\"><b>kurta :</b></span>";
			}
		?>
			</div>
			<div class="col"><?php echo inchtotext($kurta_collar) ?></div>
			<div class="col">
			<?php
				if ($kurta_cuffln[$i]=="0") {
					echo "";
				} else {
					echo inchtotext($kurta_cuffbr)." x ".inchtotext($kurta_cuffln[$i]);
				}
			?>
			</div>
			<div class="col">
			<?php
				if ($kurta_pocket=="pocketa") {
					echo "4 x 4½";
				} elseif ($kurta_pocket=="pocketb") {
					echo "4¼ x 4¾";
				} elseif ($kurta_pocket=="pocketc") {
					echo "4½ x 5¼";
				} elseif ($kurta_pocket=="pocketd") {
					echo "4¾ x 5½";
				} elseif ($kurta_pocket=="pockete") {
					echo "5 x 5¾";
				} elseif ($kurta_pocket=="pocketf") {
					echo "5¼ x 6";
				} elseif ($kurta_pocket=="pocketg") {
					echo "5½ x 6¼";
				} elseif ($kurta_pocket=="pocketh") {
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
				if ($kurta_shouldertype[$i]=="noshoulder") {
					echo "NO Shoulder";
				} elseif ($kurta_shouldertype[$i]=="vshoulder") {
					echo "V Shoulder";
				} elseif ($kurta_shouldertype[$i]=="dvshoulder") {
					echo "DV Shoulder";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($kurta_collartype[$i]=="lspc") {
					echo "LSPC";
				} elseif ($kurta_collartype[$i]=="rmpc") {
					echo "RMPC";
				} elseif ($kurta_collartype[$i]=="mrmpc") {
					echo "MRMPC";
				} elseif ($kurta_collartype[$i]=="bc") {
					echo "BC";
				} elseif ($kurta_collartype[$i]=="nocollar") {
					echo "NO Collar";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($kurta_cufftype[$i]=="nocuff") {
					echo "NO Cuff";
				} elseif ($kurta_cufftype[$i]=="cut") {
					echo "Cut";
				} elseif ($kurta_cufftype[$i]=="square") {
					echo "SQUARE";
				} elseif ($kurta_cufftype[$i]=="round") {
					echo "ROUND";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($kurta_pockettype[$i]=="nopocket") {
					echo "NO Pocket";
				} elseif ($kurta_pockettype[$i]=="square") {
					echo "SQUARE";
				} elseif ($kurta_pockettype[$i]=="v") {
					echo "V";
				} elseif ($kurta_pockettype[$i]=="round") {
					echo "ROUND";
				} elseif ($kurta_pockettype[$i]=="flap") {
					echo "FLAP";
				} elseif ($kurta_pockettype[$i]=="wallet") {
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

if (((2 * $y_front_t3) + (2 * $y_back_t3) + 0.5) < $y_pana) {
	$map = "map1";
} elseif (((2 * $y_front_t3) + ($y_sleeve_halax2) + 0.5) < $y_pana) {
	$map = "map2";
} else {
	$map = "";
}

if ($map=="map1") {
	$x_mapfront_m = 0.5;
	$y_mapfront_m = $y_pana;
	
	$x_mapback_m = 0.5;
	$y_mapback_m = 0;
	
	$x_mapsleeve_m1 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m1 = 0;
	$x_mapsleeve_m2 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m2 = $y_pana;
	
	$x_mapshoulder_m = $x_clothln - 1;
	$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
?>
<div id="marp">
<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
	
	<path
	d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
	l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	h<?php echo cmx2($x_front_halaline); ?>
	l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	h<?php echo -cmx2($x_front_halaline); ?>
	a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	v<?php echo cmx2($y_front_t3); ?>
	v<?php echo cmx2($y_front_t3); ?>"
	fill="teal" />
	
	<!-- backop
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulderop); ?>,<?php echo -cmx2($y_back_t1mshoulderop); ?>
	h<?php echo cmx2($x_back_halalineop); ?>
	l<?php echo cmx2($x_back_slope); ?>,<?php echo -cmx2($y_back_slopemrounding); ?>
	a30,30 0,0,1 <?php echo -cmx2($x_back_rounding); ?>,<?php echo -cmx2($y_back_rounding); ?>
	a30,30 0,0,1 <?php echo cmx2($x_back_rounding); ?>,<?php echo -cmx2($y_back_rounding); ?>
	l<?php echo -cmx2($x_back_slope); ?>,<?php echo -cmx2($y_back_slopemrounding); ?>
	h<?php echo -cmx2($x_back_halalineop); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulderop); ?>,<?php echo -cmx2($y_back_t1mshoulderop); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>"
	fill="teal" />
	-->
	
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	h<?php echo cmx2($x_back_halaline); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	h<?php echo -cmx2($x_back_halaline); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapshoulder_m) ?>,<?php echo cmx2($y_mapshoulder_m); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	v<?php echo cmx2($y_shoulder_heightmslope); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
	fill="teal" />
</svg>
</div>

<?php } elseif ($map=="map2") {
	$x_mapfront_m = 0.5;
	$y_mapfront_m = $y_pana;
	
	$x_mapback_m = $x_clothln - $x_back_length1 - 0.5;
	$y_mapback_m = $y_pana;
	
	$x_mapsleeve_m1 = $y_sleeve_hala + 0.5;
	$y_mapsleeve_m1 = 0;
	$x_mapsleeve_m2 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m2 = 0;
	
	$x_mapshoulder_m = $x_clothln - 1;
	$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
?>
<div id="marp">
<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
	
	<path
	d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
	l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	h<?php echo cmx2($x_front_halaline); ?>
	l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	h<?php echo -cmx2($x_front_halaline); ?>
	a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	v<?php echo cmx2($y_front_t3); ?>
	v<?php echo cmx2($y_front_t3); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	h<?php echo cmx2($x_back_halaline); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	h<?php echo -cmx2($x_back_halaline); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
	fill="teal"
	transform="rotate(180,<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>)" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapshoulder_m); ?>,<?php echo cmx2($y_mapshoulder_m); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	v<?php echo cmx2($y_shoulder_heightmslope); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
	fill="teal" />
</svg>
</div>

<?php }

} ?>
</div>

<?php } elseif ($type=='pathani') {?>

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
			<div class="col"><u><?php echo inchtotext($pathani_pocketdown) ?></u></div>
		</div>
		<div class="row no-gutters">
			<div class="col">
			<?php
				if ($pathani_type=="round") {
				echo "<span class=\"border-left border-bottom rounded-circle border-dark p-1\"><b>pathani :</b></span>";
			} else {
				echo "<span class=\"border border-dark pr-1 pl-1\"><b>pathani :</b></span>";
			}
		?>
			</div>
			<div class="col"><?php echo inchtotext($pathani_collar) ?></div>
			<div class="col">
			<?php
				if ($pathani_cuffln[$i]=="0") {
					echo "";
				} else {
					echo inchtotext($pathani_cuffbr)." x ".inchtotext($pathani_cuffln[$i]);
				}
			?>
			</div>
			<div class="col">
			<?php
				if ($pathani_pocket=="pocketa") {
					echo "4 x 4½";
				} elseif ($pathani_pocket=="pocketb") {
					echo "4¼ x 4¾";
				} elseif ($pathani_pocket=="pocketc") {
					echo "4½ x 5¼";
				} elseif ($pathani_pocket=="pocketd") {
					echo "4¾ x 5½";
				} elseif ($pathani_pocket=="pockete") {
					echo "5 x 5¾";
				} elseif ($pathani_pocket=="pocketf") {
					echo "5¼ x 6";
				} elseif ($pathani_pocket=="pocketg") {
					echo "5½ x 6¼";
				} elseif ($pathani_pocket=="pocketh") {
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
				if ($pathani_shouldertype[$i]=="noshoulder") {
					echo "NO Shoulder";
				} elseif ($pathani_shouldertype[$i]=="vshoulder") {
					echo "V Shoulder";
				} elseif ($pathani_shouldertype[$i]=="dvshoulder") {
					echo "DV Shoulder";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($pathani_collartype[$i]=="lspc") {
					echo "LSPC";
				} elseif ($pathani_collartype[$i]=="rmpc") {
					echo "RMPC";
				} elseif ($pathani_collartype[$i]=="mrmpc") {
					echo "MRMPC";
				} elseif ($pathani_collartype[$i]=="bc") {
					echo "BC";
				} elseif ($pathani_collartype[$i]=="nocollar") {
					echo "NO Collar";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($pathani_cufftype[$i]=="nocuff") {
					echo "NO Cuff";
				} elseif ($pathani_cufftype[$i]=="cut") {
					echo "Cut";
				} elseif ($pathani_cufftype[$i]=="square") {
					echo "SQUARE";
				} elseif ($pathani_cufftype[$i]=="round") {
					echo "ROUND";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($pathani_pockettype[$i]=="nopocket") {
					echo "NO Pocket";
				} elseif ($pathani_pockettype[$i]=="square") {
					echo "SQUARE";
				} elseif ($pathani_pockettype[$i]=="v") {
					echo "V";
				} elseif ($pathani_pockettype[$i]=="round") {
					echo "ROUND";
				} elseif ($pathani_pockettype[$i]=="flap") {
					echo "FLAP";
				} elseif ($pathani_pockettype[$i]=="wallet") {
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

if (((2 * $y_front_t3) + (2 * $y_back_t3) + 0.5) < $y_pana) {
	$map = "map1";
} elseif (((2 * $y_front_t3) + ($y_sleeve_halax2) + 0.5) < $y_pana) {
	$map = "map2";
} else {
	$map = "";
}

if ($map=="map1") {
	$x_mapfront_m = 0.5;
	$y_mapfront_m = $y_pana;
	
	$x_mapback_m = 0.5;
	$y_mapback_m = 0;
	
	$x_mapsleeve_m1 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m1 = 0;
	$x_mapsleeve_m2 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m2 = $y_pana;
	
	$x_mapshoulder_m = $x_clothln - 1;
	$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
?>
<div id="marp">
<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
	
	<path
	d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
	l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	h<?php echo cmx2($x_front_halaline); ?>
	l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	h<?php echo -cmx2($x_front_halaline); ?>
	a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	v<?php echo cmx2($y_front_t3); ?>
	v<?php echo cmx2($y_front_t3); ?>"
	fill="teal" />
	
	<!-- backop
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulderop); ?>,<?php echo -cmx2($y_back_t1mshoulderop); ?>
	h<?php echo cmx2($x_back_halalineop); ?>
	l<?php echo cmx2($x_back_slope); ?>,<?php echo -cmx2($y_back_slopemrounding); ?>
	a30,30 0,0,1 <?php echo -cmx2($x_back_rounding); ?>,<?php echo -cmx2($y_back_rounding); ?>
	a30,30 0,0,1 <?php echo cmx2($x_back_rounding); ?>,<?php echo -cmx2($y_back_rounding); ?>
	l<?php echo -cmx2($x_back_slope); ?>,<?php echo -cmx2($y_back_slopemrounding); ?>
	h<?php echo -cmx2($x_back_halalineop); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulderop); ?>,<?php echo -cmx2($y_back_t1mshoulderop); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>"
	fill="teal" />
	-->
	
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	h<?php echo cmx2($x_back_halaline); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	h<?php echo -cmx2($x_back_halaline); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapshoulder_m) ?>,<?php echo cmx2($y_mapshoulder_m); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	v<?php echo cmx2($y_shoulder_heightmslope); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
	fill="teal" />
</svg>
</div>

<?php } elseif ($map=="map2") {
	$x_mapfront_m = 0.5;
	$y_mapfront_m = $y_pana;
	
	$x_mapback_m = $x_clothln - $x_back_length1 - 0.5;
	$y_mapback_m = $y_pana;
	
	$x_mapsleeve_m1 = $y_sleeve_hala + 0.5;
	$y_mapsleeve_m1 = 0;
	$x_mapsleeve_m2 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m2 = 0;
	
	$x_mapshoulder_m = $x_clothln - 1;
	$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
?>
<div id="marp">
<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
	
	<path
	d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
	l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	h<?php echo cmx2($x_front_halaline); ?>
	l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	h<?php echo -cmx2($x_front_halaline); ?>
	a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	v<?php echo cmx2($y_front_t3); ?>
	v<?php echo cmx2($y_front_t3); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	h<?php echo cmx2($x_back_halaline); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	h<?php echo -cmx2($x_back_halaline); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
	fill="teal"
	transform="rotate(180,<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>)" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapshoulder_m); ?>,<?php echo cmx2($y_mapshoulder_m); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	v<?php echo cmx2($y_shoulder_heightmslope); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
	fill="teal" />
</svg>
</div>

<?php }

} ?>
</div>

<?php } elseif ($type=='kandura') {?>

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
			<div class="col"><u><?php echo inchtotext($kandura_pocketdown) ?></u></div>
		</div>
		<div class="row no-gutters">
			<div class="col"></div>
			<div class="col"><?php echo inchtotext($kandura_collar) ?></div>
			<div class="col">
			<?php
				if ($kandura_cuffln[$i]=="0") {
					echo "";
				} else {
					echo inchtotext($kandura_cuffbr)." x ".inchtotext($kandura_cuffln[$i]);
				}
			?>
			</div>
			<div class="col">
			<?php
				if ($kandura_pocket=="pocketa") {
					echo "4 x 4½";
				} elseif ($kandura_pocket=="pocketb") {
					echo "4¼ x 4¾";
				} elseif ($kandura_pocket=="pocketc") {
					echo "4½ x 5¼";
				} elseif ($kandura_pocket=="pocketd") {
					echo "4¾ x 5½";
				} elseif ($kandura_pocket=="pockete") {
					echo "5 x 5¾";
				} elseif ($kandura_pocket=="pocketf") {
					echo "5¼ x 6";
				} elseif ($kandura_pocket=="pocketg") {
					echo "5½ x 6¼";
				} elseif ($kandura_pocket=="pocketh") {
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
				if ($kandura_shouldertype[$i]=="noshoulder") {
					echo "NO Shoulder";
				} elseif ($kandura_shouldertype[$i]=="vshoulder") {
					echo "V Shoulder";
				} elseif ($kandura_shouldertype[$i]=="dvshoulder") {
					echo "DV Shoulder";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($kandura_collartype[$i]=="lspc") {
					echo "LSPC";
				} elseif ($kandura_collartype[$i]=="rmpc") {
					echo "RMPC";
				} elseif ($kandura_collartype[$i]=="mrmpc") {
					echo "MRMPC";
				} elseif ($kandura_collartype[$i]=="bc") {
					echo "BC";
				} elseif ($kandura_collartype[$i]=="nocollar") {
					echo "NO Collar";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($kandura_cufftype[$i]=="nocuff") {
					echo "NO Cuff";
				} elseif ($kandura_cufftype[$i]=="cut") {
					echo "Cut";
				} elseif ($kandura_cufftype[$i]=="square") {
					echo "SQUARE";
				} elseif ($kandura_cufftype[$i]=="round") {
					echo "ROUND";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($kandura_pockettype[$i]=="nopocket") {
					echo "NO Pocket";
				} elseif ($kandura_pockettype[$i]=="square") {
					echo "SQUARE";
				} elseif ($kandura_pockettype[$i]=="v") {
					echo "V";
				} elseif ($kandura_pockettype[$i]=="round") {
					echo "ROUND";
				} elseif ($kandura_pockettype[$i]=="flap") {
					echo "FLAP";
				} elseif ($kandura_pockettype[$i]=="wallet") {
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

if (((2 * $y_front_t3) + (2 * $y_back_t3) + 0.5) < $y_pana) {
	$map = "map1";
} elseif (((2 * $y_front_t3) + ($y_sleeve_halax2) + 0.5) < $y_pana) {
	$map = "map2";
} else {
	$map = "";
}

if ($map=="map1") {
	$x_mapfront_m = 0.5;
	$y_mapfront_m = $y_pana;
	
	$x_mapback_m = 0.5;
	$y_mapback_m = 0;
	
	$x_mapsleeve_m1 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m1 = 0;
	$x_mapsleeve_m2 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m2 = $y_pana;
	
	$x_mapshoulder_m = $x_clothln - 1;
	$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
?>
<div id="marp">
<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
	
	<path
	d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
	l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	h<?php echo cmx2($x_front_halaline); ?>
	l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	h<?php echo -cmx2($x_front_halaline); ?>
	a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	v<?php echo cmx2($y_front_t3); ?>
	v<?php echo cmx2($y_front_t3); ?>"
	fill="teal" />
	
	<!-- backop
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulderop); ?>,<?php echo -cmx2($y_back_t1mshoulderop); ?>
	h<?php echo cmx2($x_back_halalineop); ?>
	l<?php echo cmx2($x_back_slope); ?>,<?php echo -cmx2($y_back_slopemrounding); ?>
	a30,30 0,0,1 <?php echo -cmx2($x_back_rounding); ?>,<?php echo -cmx2($y_back_rounding); ?>
	a30,30 0,0,1 <?php echo cmx2($x_back_rounding); ?>,<?php echo -cmx2($y_back_rounding); ?>
	l<?php echo -cmx2($x_back_slope); ?>,<?php echo -cmx2($y_back_slopemrounding); ?>
	h<?php echo -cmx2($x_back_halalineop); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulderop); ?>,<?php echo -cmx2($y_back_t1mshoulderop); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>"
	fill="teal" />
	-->
	
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	h<?php echo cmx2($x_back_halaline); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	h<?php echo -cmx2($x_back_halaline); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapshoulder_m) ?>,<?php echo cmx2($y_mapshoulder_m); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	v<?php echo cmx2($y_shoulder_heightmslope); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
	fill="teal" />
</svg>
</div>

<?php } elseif ($map=="map2") {
	$x_mapfront_m = 0.5;
	$y_mapfront_m = $y_pana;
	
	$x_mapback_m = $x_clothln - $x_back_length1 - 0.5;
	$y_mapback_m = $y_pana;
	
	$x_mapsleeve_m1 = $y_sleeve_hala + 0.5;
	$y_mapsleeve_m1 = 0;
	$x_mapsleeve_m2 = $x_clothln - $y_sleeve_hala - 1;
	$y_mapsleeve_m2 = 0;
	
	$x_mapshoulder_m = $x_clothln - 1;
	$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
?>
<div id="marp">
<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
	
	<path
	d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
	l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	h<?php echo cmx2($x_front_halaline); ?>
	l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	v<?php echo -cmx2($y_front_collarl); ?>
	l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
	h<?php echo -cmx2($x_front_halaline); ?>
	a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
	l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
	l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
	v<?php echo cmx2($y_front_t3); ?>
	v<?php echo cmx2($y_front_t3); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
	l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	h<?php echo cmx2($x_back_halaline); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	v<?php echo -cmx2($y_back_shoulder); ?>
	h<?php echo -cmx2($x_back_halaline); ?>
	a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
	l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
	l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
	v<?php echo cmx2($y_back_t3); ?>
	v<?php echo cmx2($y_back_t3); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
	fill="teal"
	transform="rotate(180,<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>)" />
	
	<path
	d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
	l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
	l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
	a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>"
	fill="teal" />
	
	<path
	d="M<?php echo cmx2($x_mapshoulder_m); ?>,<?php echo cmx2($y_mapshoulder_m); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
	l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
	v<?php echo cmx2($y_shoulder_heightmslope); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	h<?php echo cmx2($x_shoulder_length); ?>
	v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
	fill="teal" />
</svg>
</div>

<?php }

} ?>
</div>

<?php } elseif ($type=='pant') {?>
<?php } elseif ($type=='bpyjama') {?>
<?php } elseif ($type=='pyjama') {?>
<?php } elseif ($type=='salwar') {?>
<?php } elseif ($type=='aligard') {?>
<?php } elseif ($type=='churidar') {?>
<?php } ?>

<hr/>