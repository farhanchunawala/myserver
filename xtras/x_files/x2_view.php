<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	$sr=$_GET['sr'];
	$type=$_GET['type'];
	?>
	<title><?php echo "$sr $type"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
#marx {
	font-size: 24px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	padding-right: 0px;
}
#front {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#back {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#sleeve {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#shoulder {
	font-size: 24px;
	border-style: groove solid solid groove;
	border-width: 3px 5px 5px 3px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar1 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar2 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 290px;
	margin-bottom: 10px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar3 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 480px;
	margin-bottom: 10px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar4 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 870px;
	margin-bottom: 10px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar5 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 1160px;
	margin-bottom: 10px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
</style>
<script>
function printit() {
  window.print();
}
</script>

<?php
	$mar=$_GET['mar'];
	
	function inchtotext($x) {
		$a = $x;
		$a = str_replace(".125","±",$a);
		$a = str_replace(".25","¼",$a);
		$a = str_replace(".375","¼±",$a);
		$a = str_replace(".5","½",$a);
		$a = str_replace(".625","½±",$a);
		$a = str_replace(".75","¾",$a);
		if(strstr($a,".875")){
			$a = $a+1;
			$a = str_replace(".875","=",$a);
		}
			return $a;
	}
	function shouldertrim($x) {
		$a = $x;
		$a = str_replace(".125",".000",$a);
		$a = str_replace(".375",".250",$a);
		$a = str_replace(".625",".500",$a);
		$a = str_replace(".875",".750",$a);
		return $a;
	}
	function cm($x) {
		$x = $x * 2.54;
		return $x;
	}
	function cmx2($x) {
		$x = $x * 2.54 * 2;
		return $x;
	}
	
	{ $dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	$query = "SELECT * FROM `measurement` WHERE sr=$sr";
	
	$result = mysqli_query($dbc, $query)
		or die('Error querying database.');
	
	mysqli_close($dbc);
	}
	
	
	switch ($type) {
		case "pant": {
			$row = mysqli_fetch_array($result);
				$pant_count = $row['pant_count'];
				$pant_length = inchtotext($row['pant_length']);
				$pant_fork = inchtotext($row['pant_fork']);
				$pant_waist = inchtotext($row['pant_waist']);
				$pant_seat = inchtotext($row['pant_seat']);
				$pant_thighs_fix = inchtotext($row['pant_thighs_fix']);
				$pant_thighs_loose = inchtotext($row['pant_thighs_loose']);
				$pant_calf_length = inchtotext($row['pant_calf_length']);
				$pant_calf = inchtotext($row['pant_calf']);
				$pant_bottom = inchtotext($row['pant_bottom']);
				$pant_cuttingfactor = inchtotext($row['pant_cuttingfactor']);
				$pant_crease = $row['pant_crease'];
				$pant_side_pocket = $row['pant_side_pocket'];
				$pant_belt = $row['pant_belt'];
				$pant_back_pocket = $row['pant_back_pocket'];
				$pant_watch_pocket = $row['pant_watch_pocket'];
				$pant_plits = $row['pant_plits'];
				$pant_t1 = $row['pant_t1'];
				$pant_t2 = $row['pant_t2'];
	?>
		<a onclick="printit()">
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
			<div class="row mb-n4 no-gutters">
				<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$pant_count</b></span>"; ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
				<?php
					if ($pant_plits=="0")
						echo "<u>No plts</u>";
					else {
						echo "<u>$pant_plits"."plts</u>";
					}
				?>
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
				<div class="col"><?php echo "$pant_length" ?></div>
				<div class="col"><?php echo "$pant_fork" ?></div>
				<div class="col"><?php echo "$pant_waist" ?></div>
				<div class="col"><?php echo "$pant_seat" ?></div>
				<div class="col"><?php echo "<u>$pant_thighs_fix</u>" ?></div>
				<div class="col"><?php echo "<u>$pant_calf_length</u>" ?></div>
				<div class="col"><?php echo "$pant_bottom" ?></div>
				<div class="col"><?php echo "$pant_cuttingfactor" ?></div>
				<div class="col"><?php echo "<u>$pant_t1</u>" ?></div>
			</div>
			<div class="row no-gutters">
				<div class="col"><?php echo "$pant_crease" ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "$pant_thighs_loose" ?></div>
				<div class="col"><?php echo "$pant_calf" ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "$pant_t2" ?></div>
			</div>
			<div class="row no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "$pant_side_pocket" ?></div>
				<div class="col">
				<?php
					if ($pant_belt=="lbelt") {
						echo "L blt";
					} elseif ($pant_belt=="cbelt") {
						echo "C blt";
					}
				?>
				</div>
				<div class="col"><?php echo "$pant_back_pocket"."B" ?></div>
				<div class="col"><?php echo "$pant_watch_pocket"."W" ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
		</div>
		</a>
		
		
		<?php } break;
		case "shirt": {
			$row = mysqli_fetch_array($result);
				$shirt_count = $row['shirt_count'];
				$shirt_pana = $row['shirt_pana'];
				$shirt_cloth_length = $row['shirt_cloth_length'];
				$shirt_type = $row['shirt_type'];
				$shirt_length = $row['shirt_length'];
				$shirt_shoulder = $row['shirt_shoulder'];
				$shirt_sleeve = $row['shirt_sleeve'];
				$shirt_chest = $row['shirt_chest'];
				$shirt_stomach = $row['shirt_stomach'];
				$shirt_seat = $row['shirt_seat'];
				$shirt_sleeve_fit = $row['shirt_sleeve_fit'];
				$shirt_biceps = $row['shirt_biceps'];
				$shirt_collar = $row['shirt_collar'];
				$shirt_collar_type = $row['shirt_collar_type'];
				$shirt_cuff_l = $row['shirt_cuff_l'];
				$shirt_cuff_b = $row['shirt_cuff_b'];
				$shirt_cuff_type = $row['shirt_cuff_type'];
				$shirt_pocket = $row['shirt_pocket'];
				$shirt_pocket_down = $row['shirt_pocket_down'];
				$shirt_pocket_type = $row['shirt_pocket_type'];
				$shirt_shoulder_type = $row['shirt_shoulder_type'];
				$shirt_hala = $row['shirt_hala'];
				$shirt_t1 = $row['shirt_t1'];
				$shirt_t2 = $row['shirt_t2'];
				$shirt_t3 = $row['shirt_t3'];
				
				$y_pana = $shirt_pana;
				$x_cloth_length = $shirt_cloth_length / 2.54;
				
				
				// front
				if ($shirt_type=="bshirt") {
					$x_front_length1 = $shirt_length + 0.75 + 1.25;
				} else {
					$x_front_length1 = $shirt_length + 1.125;
				}
				$x_front_length2 = $shirt_length + 1.125 - 0.5;
				$x_front_open = $shirt_length + 1.125 - 0.5 - 2.5;
				$y_front_collarl = 2.25;
				$y_front_markback1 = $y_front_collarl - 0.875;
				$y_front_collarlp2 = $y_front_collarl + 2;
				
				$x_front_shoulderslope = 2;
				$y_front_shoulder = shouldertrim($shirt_shoulder) / 2 + 0.5;
				$y_front_shouldermcollar = $y_front_shoulder - $y_front_collarl;
				$y_front_markback2 = $y_front_shoulder - 0.875;
				$y_front_shoulderp2 = $y_front_shoulder + 2;
				
				$x_front_markshoulder = 2.5;
				
				$x_front_hala = $shirt_hala;
				$x_front_shoulderslopetohala = $x_front_hala - $x_front_shoulderslope;
				$y_front_t1 = $shirt_t1;
				$y_front_t1p2 = $shirt_t1 + 2;
				$y_front_t1mshoulder = $y_front_t1 - $y_front_shoulder;
				$x_front_halaline = $x_front_shoulderslopetohala - $y_front_t1mshoulder;
				
				$x_front_stomach2 = $shirt_shoulder;
				$x_front_halatostomach = $x_front_stomach2 - $x_front_hala;
				$y_front_t2 = $shirt_t2;
				$y_front_t2p2 = $shirt_t2 + 2;
				$y_front_t2mt1 = $y_front_t2 - $y_front_t1;
				
				$x_front_stomachtolength = $x_front_length1 - $x_front_stomach2;
				$y_front_t3 = $shirt_t3;
				$y_front_t3p2 = $shirt_t3 + 2;
				$y_front_t3mt2 = $y_front_t3 - $y_front_t2;
				
				
				// back
				$x_back_length1 = $x_front_length1 - 2.5;
				$x_back_length2 = $x_front_length1 - 0.5 - 2.5;
				$y_back_shoulder = shouldertrim($shirt_shoulder) / 2 + 0.5;
				
				$x_back_shoulderslopetohala = $x_front_hala - $x_front_shoulderslope;
				$y_back_t1 = $y_front_t1 - 0.875;
				$y_back_t1mshoulder = $y_back_t1 - $y_back_shoulder;
				
				$x_back_halaline = $x_front_hala - 2.5 - $y_back_t1mshoulder;
				
				$x_back_halatostomach = $x_front_stomach2 - $x_front_hala;
				$y_back_t2 = $y_front_t2 - 0.875;
				$y_back_t2mt1 = $y_back_t2 - $y_back_t1;
				
				$x_back_stomachtolength = $x_front_length1 - $x_front_stomach2;
				$y_back_t3 = $y_front_t3 - 0.875;
				$y_back_t3mt2 = $y_back_t3 - $y_back_t2;
				
				
				// sleeve
				$x_sleeve_length1 = $shirt_sleeve - ($shirt_cuff_b - 1) + 1;
				$x_sleeve_length2 = $shirt_sleeve - ($shirt_cuff_b - 1) + 1 + 0.5;
				if ($shirt_cuff_l==9) {
					$y_sleeve_cuff = 5.5;
				} elseif ($shirt_cuff_l==9.25) {
					$y_sleeve_cuff = 5.625;
				} elseif ($shirt_cuff_l==9.5) {
					$y_sleeve_cuff = 5.75;
				} elseif ($shirt_cuff_l==9.75) {
					$y_sleeve_cuff = 5.875;
				} elseif ($shirt_cuff_l==10) {
					$y_sleeve_cuff = 6;
				} elseif ($shirt_cuff_l==10.25) {
					$y_sleeve_cuff = 6.125;
				} elseif ($shirt_cuff_l==10.5) {
					$y_sleeve_cuff = 6.25;
				} else {
					$y_sleeve_cuff = $shirt_cuff_l / 2 + 0.5;
				}
				$y_sleeve_cuffx2 = $y_sleeve_cuff * 2;
				
				$x_sleeve_hala = 4.5;
				$y_sleeve_hala = $shirt_hala;
				$y_sleeve_halax2 = 2 * $y_sleeve_hala;
				
				$x_sleeve_edge = $x_sleeve_length1 - $x_sleeve_hala;
				$y_sleeve_edge = $y_sleeve_hala - $y_sleeve_cuff;
				
				
				//shoulder
				$x_shoulder_length = shouldertrim($shirt_shoulder) / 2 + 0.5;
				$x_shoulder_rounding = 2.5;
				$x_shoulder_slope = $x_shoulder_length - $x_shoulder_rounding;
				$y_shoulder_height = 6;
				$y_shoulder_slope = 2;
				$y_shoulder_rounding = 1.875;
				$y_shoulder_heightmslope = $y_shoulder_height - $y_shoulder_slope;
				
				
				if (((2 * $y_front_t3p2) + (2 * $y_back_t3) + 0.5) < $y_pana) {
					$map = "map1";
				} elseif (((2 * $y_front_t3p2) + ($y_sleeve_halax2) + 0.5) < $y_pana) {
					$map = "map2";
				} elseif ((0.5 + $x_front_length1 + 0.5 + $x_back_length1 + 0.5 + $x_sleeve_length2 + 0.5 + $x_sleeve_length2 + 0.5) < $x_cloth_length) {
					$map="map3";
				} else {
					$map="";
				}
				
				if ($map=="map1") {
					$x_mapfront_m = 0.5;
					$y_mapfront_m = $y_pana;
					
					$x_mapback_m = 0.5;
					$y_mapback_m = 0;
					
					$x_mapsleeve_m1 = $x_cloth_length - $x_sleeve_hala - 0.8;
					$y_mapsleeve_m1 = 0;
					$x_mapsleeve_m2 = $x_cloth_length - $x_sleeve_hala - 0.8;
					$y_mapsleeve_m2 = $y_pana;
					
					$x_mapshoulder_m = $x_cloth_length - 0.8;
					$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
				?>
				<div id="marx">
				<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_cloth_length); ?>" style="border: 1px solid black">
					
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
					a75,75 0,0,0 <?php echo cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>
					a75,75 0,0,0 <?php echo -cmx2($x_sleeve_hala); ?>,<?php echo -cmx2($y_sleeve_hala); ?>"
					fill="teal" />
					
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
					l-<?php echo cmx2($x_shoulder_slope); ?>,-<?php echo cmx2($y_shoulder_rounding); ?>
					a11,11 0,0,1 -<?php echo cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
					a11,11 0,0,1 -<?php echo cmx2($x_shoulder_rounding); ?>,-<?php echo cmx2($y_shoulder_rounding); ?>
					l-<?php echo cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
					v<?php echo cmx2($y_shoulder_heightmslope); ?>
					h<?php echo cmx2($x_shoulder_length); ?>
					h<?php echo cmx2($x_shoulder_length); ?>
					v-<?php echo cmx2($y_shoulder_heightmslope); ?>"
					fill="teal" />
				</svg>
				</div>
				
				<?php }
				elseif ($map=="map2") {
					$x_mapfront_m = 0.5;
					$y_mapfront_m = $y_pana;
					
					$x_mapback_m = $x_cloth_length - 0.8;
					$y_mapback_m = $y_pana - $y_back_t3;
					
					$x_mapsleeve_m1 = $x_sleeve_hala + 0.5;
					$y_mapsleeve_m1 = 0;
					$x_mapsleeve_m2 = $x_cloth_length - $x_sleeve_hala - 0.8;
					$y_mapsleeve_m2 = 0;
					
					$x_mapshoulder_m = $x_cloth_length - 0.8;
					$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
				?>
				<div id="marx">
				<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_cloth_length); ?>" style="border: 1px solid black">
					
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
				
				<?php }
				elseif ($map=="map3") {
					$x_mapfront_m = 0.5;
					$y_mapfront_m = $y_pana;
					
					$x_mapback_m = 0.5 + $x_front_length1 + 0.5;
					$y_mapback_m = $y_pana;
					
					$x_mapsleeve_m1 = 0.5 + $x_front_length1 + 0.5 + $x_back_length1 + 0.5 + $x_sleeve_hala;
					$y_mapsleeve_m1 = $y_pana;
					$x_mapsleeve_m2 = $x_cloth_length - $x_sleeve_hala - 0.8;
					$y_mapsleeve_m2 = $y_pana;
					
					$x_mapshoulder_m = 0.5 + $x_front_length1 + 0.5;
					$y_mapshoulder_m = $y_pana - $y_back_t3 * 2 - 0.5;
				?>
				<div id="marx">
				<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_cloth_length); ?>" style="border: 1px solid black">
					
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
		?>
		<a onclick="printit()">
		
		<div id="front">
			<div class="row mb-1 no-gutters">
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"><?php// echo "( $front_open , $shirt_t3 )"; ?></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row mb-3 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_shoulderp2); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
			</div>
			<div class="row mb-3 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><!--
					( <span style="color:blue;"><?php echo inchtotext($x_front_markshoulder); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )-->
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_back_t3); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_back_t2); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_back_t1); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_markback2); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_markback1); ?></span> )
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t3); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_collarl); ?></span> )
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t3p2); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t2p2); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t1p2); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_shoulderp2); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_collarlp2); ?></span> )
				</div>
			</div>
		</div>
		
		<div id="back">
			<div class="row mb-5 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_back_shoulder); ?></span> )
				</div>
				<div class="col"></div>
			</div>
		</div>
		
		<div id="sleeve">
			<div class="row mb-0 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_sleeve_hala); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row mb-5 no-gutters">
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_sleeve_length1); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_sleeve_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_sleeve_cuff); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_sleeve_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_sleeve_hala); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
			</div>
		</div>
		
		<div id="shoulder">
			<div class="row mb-3 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_shoulder_rounding); ?></span>, 
					<span style="color:red;"><?php echo "_"; ?></span> )
				</div>
			</div>
			<div class="row mb-4 no-gutters">
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_shoulder_rounding); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_shoulder_length); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_shoulder_rounding); ?></span> )
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "6"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "_ "; ?></span>, 
					<span style="color:red;"><?php echo "6"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_shoulder_length); ?></span>, 
					<span style="color:red;"><?php echo "6"; ?></span> )
				</div>
			</div>
		</div>
		
		<div id=<?php echo "$mar" ?>>
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
				<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$shirt_count</b></span>"; ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "(".inchtotext($shirt_hala).")" ?></div>
				<div class="col"><?php echo inchtotext($shirt_t1) ?></div>
				<div class="col"><?php echo inchtotext($shirt_t2) ?></div>
				<div class="col"><?php echo inchtotext($shirt_t3) ?></div>
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
				<div class="col"><u><?php echo inchtotext($shirt_pocket_down) ?></u></div>
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
				<div class="col"><?php echo inchtotext($shirt_length) ?></div>
				<div class="col"><?php echo inchtotext($shirt_shoulder) ?></div>
				<div class="col"><?php echo inchtotext($shirt_sleeve) ?></div>
				<div class="col"><?php echo inchtotext($shirt_chest) ?></div>
				<div class="col"><?php echo inchtotext($shirt_stomach) ?></div>
				<div class="col"><?php echo inchtotext($shirt_seat) ?></div>
				<div class="col"><?php echo inchtotext($shirt_collar) ?></div>
				<div class="col">
				<?php
					if ($shirt_cuff_b=="0") {
						echo "";
					} else {
						echo inchtotext($shirt_cuff_l)." x ".inchtotext($shirt_cuff_b);
					}
				?>
				</div>
				<div class="col">
				<?php
					if ($shirt_pocket=="pocketa") {
						echo "4 x 4½";
					} elseif ($shirt_pocket=="pocketb") {
						echo "4¼ x 4¾";
					} elseif ($shirt_pocket=="pocketc") {
						echo "4½ x 5¼";
					} elseif ($shirt_pocket=="pocketd") {
						echo "4¾ x 5½";
					} elseif ($shirt_pocket=="pockete") {
						echo "5 x 5¾";
					} elseif ($shirt_pocket=="pocketf") {
						echo "5¼ x 6";
					} elseif ($shirt_pocket=="pocketg") {
						echo "5½ x 6¼";
					} elseif ($shirt_pocket=="pocketh") {
						echo "5¾ x 6½";
					} else {
						echo "";
					}
				?>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col">
				<?php
					if ($shirt_sleeve_fit=="sll") {
						echo "SLL ".inchtotext($shirt_biceps);
					} elseif ($shirt_sleeve_fit=="slm") {
						echo "SLM ".inchtotext($shirt_biceps);
					} elseif ($shirt_sleeve_fit=="slf") {
						echo "SLF ".inchtotext($shirt_biceps);
					} else {
						echo inchtotext($shirt_biceps);
					}
				?>
				</div>
				<div class="col"></div>
				<div class="col" style="font-size:20px">
				<?php
					if ($shirt_shoulder_type=="noshoulder") {
						echo "NO Shoulder";
					} elseif ($shirt_shoulder_type=="vshoulder") {
						echo "V Shoulder";
					} elseif ($shirt_shoulder_type=="dvshoulder") {
						echo "DV Shoulder";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col" style="font-size:20px">
				<?php
					if ($shirt_collar_type=="lspc") {
						echo "LSPC";
					} elseif ($shirt_collar_type=="rmpc") {
						echo "RMPC";
					} elseif ($shirt_collar_type=="mrmpc") {
						echo "MRMPC";
					} elseif ($shirt_collar_type=="bc") {
						echo "BC";
					} elseif ($shirt_collar_type=="nocollar") {
						echo "NO Collar";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col" style="font-size:20px">
				<?php
					if ($shirt_cuff_type=="nocuff") {
						echo "NO Cuff";
					} elseif ($shirt_cuff_type=="cut") {
						echo "Cut";
					} elseif ($shirt_cuff_type=="square") {
						echo "SQUARE";
					} elseif ($shirt_cuff_type=="round") {
						echo "ROUND";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col" style="font-size:20px">
				<?php
					if ($shirt_pocket_type=="nopocket") {
						echo "NO Pocket";
					} elseif ($shirt_pocket_type=="square") {
						echo "SQUARE";
					} elseif ($shirt_pocket_type=="v") {
						echo "V";
					} elseif ($shirt_pocket_type=="round") {
						echo "ROUND";
					} elseif ($shirt_pocket_type=="flap") {
						echo "FLAP";
					} elseif ($shirt_pocket_type=="wallet") {
						echo "WALLET";
					} else {
						echo "";
					}
				?>
				</div>
			</div>
		</div>
		
		</a>
		
		
		<?php } break;
		case "kurta": {
			$row = mysqli_fetch_array($result);
				$kurta_count = $row['kurta_count'];
				$kurta_pana = $row['kurta_pana'];
				$kurta_cloth_length = $row['kurta_cloth_length'];
				$kurta_type = $row['kurta_type'];
				$kurta_length = $row['kurta_length'];
				$kurta_shoulder = $row['kurta_shoulder'];
				$kurta_sleeve = $row['kurta_sleeve'];
				$kurta_chest = $row['kurta_chest'];
				$kurta_stomach = $row['kurta_shoulder'];
				$kurta_seat = $row['kurta_seat'];
				$kurta_sleeve_fit = $row['kurta_sleeve_fit'];
				$kurta_biceps = $row['kurta_biceps'];
				$kurta_collar = $row['kurta_collar'];
				$kurta_collar_type = $row['kurta_collar_type'];
				$kurta_cuff_l = $row['kurta_cuff_l'];
				$kurta_cuff_b = $row['kurta_cuff_b'];
				$kurta_cuff_type = $row['kurta_cuff_type'];
				$kurta_pocket = $row['kurta_pocket'];
				$kurta_pocket_down = $row['kurta_pocket_down'];
				$kurta_pocket_type = $row['kurta_pocket_type'];
				$kurta_shoulder_type = $row['kurta_shoulder_type'];
				$kurta_hala = $row['kurta_hala'];
				$kurta_t1 = $row['kurta_t1'];
				$kurta_t2 = $row['kurta_t2'];
				$kurta_t3 = $row['kurta_t3'];
				
				$y_pana = $kurta_pana;
				$x_cloth_length = $kurta_cloth_length / 2.54;
				
				
				// front
				if ($kurta_type=="square") {
					$x_front_length1 = $kurta_length + 0.75 + 0.75;
				} else {
					$x_front_length1 = $kurta_length + 0.75 + 0.75;
				}
				$x_front_length2 = $kurta_length + 0.75;
				$x_front_length3 = $kurta_length + 0.75 + 0.75 - 0.5;
				$y_front_collarl = 2.25;
				
				$x_front_shoulderslope = 2;
				$y_front_shoulder = shouldertrim($kurta_shoulder) / 2;
				$y_front_shouldermcollar = $y_front_shoulder - $y_front_collarl;
				
				$x_front_markshoulder = 2.5;
				
				$x_front_hala = $kurta_hala;
				$x_front_shoulderslopetohala = $x_front_hala - $x_front_shoulderslope;
				$y_front_t1 = $kurta_t1;
				$y_front_t1mshoulder = $y_front_t1 - $y_front_shoulder;
				$x_front_halaline = $x_front_shoulderslopetohala - $y_front_t1mshoulder;
				
				$x_front_stomach2 = $kurta_stomach;
				$x_front_halatostomach = $x_front_stomach2 - $x_front_hala;
				$y_front_t2 = $kurta_t2;
				$y_front_t2mt1 = $y_front_t2 - $y_front_t1;
				
				$x_front_stomachtolength = $x_front_length1 - $x_front_stomach2;
				$y_front_t3 = $kurta_t3;
				$y_front_t3mt2 = $y_front_t3 - $y_front_t2;
				
				
				// back
				$x_back_length1 = $x_front_length1 - 2.5;
				$x_back_length2 = $x_front_length1 - 2.5 - 0.5;
				$y_back_shoulder = shouldertrim($kurta_shoulder) / 2 + 0.25;
				
				$x_back_shoulderslopetohala = $x_front_hala - $x_front_shoulderslope;
				$y_back_t1 = $y_front_t1;
				$y_back_t1mshoulder = $y_back_t1 - $y_back_shoulder;
				
				$x_back_halaline = $x_front_hala - 2.5 - $y_back_t1mshoulder;
				
				$x_back_halatostomach = $x_front_stomach2 - $x_front_hala;
				$y_back_t2 = $y_front_t2;
				$y_back_t2mt1 = $y_back_t2 - $y_back_t1;
				
				$x_back_stomachtolength = $x_front_length1 - $x_front_stomach2;
				$y_back_t3 = $y_front_t3;
				$y_back_t3mt2 = $y_back_t3 - $y_back_t2;
				
				//backop
				$x_back_lengthop = $x_front_length1 + 2.5;
				if ($kurta_collar_type=="bc") {
					$x_back_rounding = 1.125;
				} else {
					$x_back_rounding = 1.750;
				}
				$x_back_slope = 2;
				$y_back_shoulderop = $y_back_shoulder + 0.25;
				$y_back_rounding = 2.5;
				$y_back_slopemrounding = $y_back_shoulderop - $y_back_rounding;
				$x_back_lengthop2 = $x_back_lengthop - $x_back_rounding;
				
				$y_back_t1mshoulderop = $y_back_t1 - $y_back_shoulderop;
				$x_back_halalineop = $x_front_hala + 2.5 - $x_back_slope - $y_back_t1mshoulderop;
				
				
				// sleeve
				$x_sleeve_length1 = $kurta_sleeve - ($kurta_cuff_b - 1) + 1;
				$x_sleeve_length2 = $kurta_sleeve - ($kurta_cuff_b - 1) + 1 + 0.5;
				if ($kurta_cuff_l==9) {
					$y_sleeve_cuff = 5.5;
				} elseif ($kurta_cuff_l==9.25) {
					$y_sleeve_cuff = 5.625;
				} elseif ($kurta_cuff_l==9.5) {
					$y_sleeve_cuff = 5.75;
				} elseif ($kurta_cuff_l==9.75) {
					$y_sleeve_cuff = 5.875;
				} elseif ($kurta_cuff_l==10) {
					$y_sleeve_cuff = 6;
				} elseif ($kurta_cuff_l==10.25) {
					$y_sleeve_cuff = 6.125;
				} elseif ($kurta_cuff_l==10.5) {
					$y_sleeve_cuff = 6.25;
				} else {
					$y_sleeve_cuff = $kurta_cuff_l / 2 + 0.5;
				}
				$y_sleeve_cuffx2 = $y_sleeve_cuff * 2;
				
				$x_sleeve_hala = 4.5;
				$y_sleeve_hala = $kurta_hala;
				$y_sleeve_halax2 = 2 * $y_sleeve_hala;
				
				$x_sleeve_edge = $x_sleeve_length1 - $x_sleeve_hala;
				$y_sleeve_edge = $y_sleeve_hala - $y_sleeve_cuff;
				
				
				//shoulder
				$x_shoulder_length = shouldertrim($kurta_shoulder) / 2 + 0.5;
				$x_shoulder_rounding = 2.5;
				$x_shoulder_slope = $x_shoulder_length - $x_shoulder_rounding;
				$y_shoulder_height = 6;
				$y_shoulder_slope = 2;
				$y_shoulder_rounding = 1.875;
				$y_shoulder_heightmslope = $y_shoulder_height - $y_shoulder_slope;
				
				if (((2 * $y_front_t3) + (2 * $y_back_t3) + 0.5) < $y_pana) {
					$map = "map1";
				} elseif (((2 * $y_front_t3) + ($y_sleeve_halax2) + 0.5) < $y_pana) {
					$map = "map2";
				}
				
				if ($map=="map1") {
					$x_mapfront_m = 0.5;
					$y_mapfront_m = $y_pana;
					
					$x_mapback_m = 0.5;
					$y_mapback_m = 0;
					
					$x_mapsleeve_m1 = $x_cloth_length - $y_sleeve_hala - 1;
					$y_mapsleeve_m1 = 0;
					$x_mapsleeve_m2 = $x_cloth_length - $y_sleeve_hala - 1;
					$y_mapsleeve_m2 = $y_pana;
					
					$x_mapshoulder_m = $x_cloth_length - 1;
					$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
				?>
				<div id="marx">
				<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_cloth_length); ?>" style="border: 1px solid black">
					
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
				
				<?php }
				elseif ($map=="map2") {
					$x_mapfront_m = 0.5;
					$y_mapfront_m = $y_pana;
					
					$x_mapback_m = $x_cloth_length - $x_back_length1 - 0.5;
					$y_mapback_m = $y_pana;
					
					$x_mapsleeve_m1 = $y_sleeve_hala + 0.5;
					$y_mapsleeve_m1 = 0;
					$x_mapsleeve_m2 = $x_cloth_length - $y_sleeve_hala - 1;
					$y_mapsleeve_m2 = 0;
					
					$x_mapshoulder_m = $x_cloth_length - 1;
					$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
				?>
				<div id="marx">
				<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_cloth_length); ?>" style="border: 1px solid black">
					
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
		?>
		<a onclick="printit()">
		
		<div id="front">
			<div class="row mb-1 no-gutters">
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"><?php// echo "( $front_open , $kurta_t3 )"; ?></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row mb-3 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_shoulder); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
			</div>
			<div class="row mb-5 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t3); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t2); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t1); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_shoulder); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_collarl); ?></span> )
				</div>
			</div>
		</div>
		
		<div id="back">
			<div class="row mb-5 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_back_shoulder); ?></span> )
				</div>
				<div class="col"></div>
			</div>
		</div>
		
		<div id="sleeve">
			<div class="row mb-0 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_sleeve_hala); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row mb-5 no-gutters">
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_sleeve_length1); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_sleeve_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_sleeve_cuff); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_sleeve_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_sleeve_hala); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
			</div>
		</div>
		
		<div id="shoulder">
			<div class="row mb-3 no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_shoulder_rounding); ?></span>, 
					<span style="color:red;"><?php echo "_"; ?></span> )
				</div>
			</div>
			<div class="row mb-4 no-gutters">
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_shoulder_rounding); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_shoulder_length); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_shoulder_rounding); ?></span> )
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "6"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "_ "; ?></span>, 
					<span style="color:red;"><?php echo "6"; ?></span> )
				</div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_shoulder_length); ?></span>, 
					<span style="color:red;"><?php echo "6"; ?></span> )
				</div>
			</div>
		</div>
		
		<div id=<?php echo "$mar" ?>>
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
			<div class="row no-gutters">
				<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$kurta_count</b></span>"; ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "(".inchtotext($kurta_hala).")" ?></div>
				<div class="col"><?php echo inchtotext($kurta_t1) ?></div>
				<div class="col"><?php echo inchtotext($kurta_t2) ?></div>
				<div class="col"><?php echo inchtotext($kurta_t3) ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col">
				<?php
					if ($kurta_type=="bkurta") {
						echo "<span class=\"border border-dark pr-1 pl-1\"><b>Bkurta :</b></span>";
					} else {
						echo "<u><b>ᴼkurta : </b></u>";
					}
				?>
				</div>
				<div class="col"><?php echo inchtotext($kurta_length) ?></div>
				<div class="col"><?php echo inchtotext($kurta_shoulder) ?></div>
				<div class="col"><?php echo inchtotext($kurta_sleeve) ?></div>
				<div class="col"><?php echo inchtotext($kurta_chest) ?></div>
				<div class="col"><?php echo inchtotext($kurta_stomach) ?></div>
				<div class="col"><?php echo inchtotext($kurta_seat) ?></div>
				<div class="col"><?php echo inchtotext($kurta_collar) ?></div>
				<div class="col">
				<?php
					if ($kurta_cuff_b=="0") {
						echo "";
					} else {
						echo inchtotext($kurta_cuff_l)." x ".inchtotext($kurta_cuff_b);
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
				<div class="col">
				<?php
					if ($kurta_sleeve_fit=="sll") {
						echo "SLL ".inchtotext($kurta_biceps);
					} elseif ($kurta_sleeve_fit=="slm") {
						echo "SLM ".inchtotext($kurta_biceps);
					} elseif ($kurta_sleeve_fit=="slf") {
						echo "SLF ".inchtotext($kurta_biceps);
					} else {
						echo inchtotext($kurta_biceps);
					}
				?>
				</div>
				<div class="col"></div>
				<div class="col" style="font-size:20px">
				<?php
					if ($kurta_shoulder_type=="noshoulder") {
						echo "NO Shoulder";
					} elseif ($kurta_shoulder_type=="vshoulder") {
						echo "V Shoulder";
					} elseif ($kurta_shoulder_type=="dvshoulder") {
						echo "DV Shoulder";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col" style="font-size:20px">
				<?php
					if ($kurta_collar_type=="lspc") {
						echo "LSPC";
					} elseif ($kurta_collar_type=="rmpc") {
						echo "RMPC";
					} elseif ($kurta_collar_type=="mrmpc") {
						echo "MRMPC";
					} elseif ($kurta_collar_type=="bc") {
						echo "BC";
					} elseif ($kurta_collar_type=="nocollar") {
						echo "NO Collar";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col" style="font-size:20px">
				<?php
					if ($kurta_cuff_type=="nocuff") {
						echo "NO Cuff";
					} elseif ($kurta_cuff_type=="cut") {
						echo "Cut";
					} elseif ($kurta_cuff_type=="square") {
						echo "SQUARE";
					} elseif ($kurta_cuff_type=="round") {
						echo "ROUND";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col" style="font-size:20px">
				<?php
					if ($kurta_pocket_type=="nopocket") {
						echo "NO Pocket";
					} elseif ($kurta_pocket_type=="square") {
						echo "SQUARE";
					} elseif ($kurta_pocket_type=="v") {
						echo "V";
					} elseif ($kurta_pocket_type=="round") {
						echo "ROUND";
					} elseif ($kurta_pocket_type=="flap") {
						echo "FLAP";
					} elseif ($kurta_pocket_type=="wallet") {
						echo "WALLET";
					} else {
						echo "";
					}
				?>
				</div>
			</div>
		</div>
		
		</a>
		
		
		<?php } break;
		case "pathani": {
			$row = mysqli_fetch_array($result);
				$pathani_count = $row['pathani_count'];
				$pathani_type = $row['pathani_type'];
				$pathani_length = inchtotext($row['pathani_length']);
				$pathani_shoulder = inchtotext($row['pathani_shoulder']);
				$pathani_sleeve = inchtotext($row['pathani_sleeve']);
				$pathani_chest = inchtotext($row['pathani_chest']);
				$pathani_stomach = inchtotext($row['pathani_stomach']);
				$pathani_seat = inchtotext($row['pathani_seat']);
				$pathani_sleeve_fit = $row['pathani_sleeve_fit'];
				$pathani_biceps = inchtotext($row['pathani_biceps']);
				$pathani_collar = inchtotext($row['pathani_collar']);
				$pathani_collar_type = $row['pathani_collar_type'];
				$pathani_cuff_l = inchtotext($row['pathani_cuff_l']);
				$pathani_cuff_b = inchtotext($row['pathani_cuff_b']);
				$pathani_cuff_type = $row['pathani_cuff_type'];
				$pathani_pocket = inchtotext($row['pathani_pocket']);
				$pathani_pocket_type = inchtotext($row['pathani_pocket_type']);
				$pathani_shoulder_type = inchtotext($row['pathani_shoulder_type']);
				$pathani_hala = inchtotext($row['pathani_hala']);
				$pathani_t1 = inchtotext($row['pathani_t1']);
				$pathani_t2 = inchtotext($row['pathani_t2']);
				$pathani_t3 = inchtotext($row['pathani_t3']);
		?>
		<a onclick="printit()">
		<div id=<?php echo "$mar" ?>>
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
			<div class="row no-gutters">
				<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$pathani_count</b></span>"; ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "($pathani_hala)" ?></div>
				<div class="col"><?php echo "$pathani_t1" ?></div>
				<div class="col"><?php echo "$pathani_t2" ?></div>
				<div class="col"><?php echo "$pathani_t3" ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col">
				<?php
					if ($pathani_type=="round") {
						echo "<span class=\"border border-dark rounded-circle border-top-0 border-right-0 pl-2\"><b>Pathani :</b></span>";
					} else {
						echo "<span class=\"border border-dark pr-1 pl-1\"><b>Pathani :</b></span>";
					}
				?>
				</div>
				<div class="col"><?php echo "$pathani_length" ?></div>
				<div class="col"><?php echo "$pathani_shoulder" ?></div>
				<div class="col"><?php echo "$pathani_sleeve" ?></div>
				<div class="col"><?php echo "$pathani_chest" ?></div>
				<div class="col"><?php echo "$pathani_stomach" ?></div>
				<div class="col"><?php echo "$pathani_seat" ?></div>
				<div class="col"><?php echo "$pathani_collar" ?></div>
				<div class="col">
				<?php
					if ($pathani_cuff_b=="0") {
						echo "";
					} else {
						echo "$pathani_cuff_l x $pathani_cuff_b";
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
				<div class="col">
				<?php
					if ($pathani_sleeve_fit=="sll") {
						echo "SLL $pathani_biceps";
					} elseif ($pathani_sleeve_fit=="slm") {
						echo "SLM $pathani_biceps";
					} elseif ($pathani_sleeve_fit=="slf") {
						echo "SLF $pathani_biceps";
					} else {
						echo "$pathani_biceps";
					}
				?>
				</div>
				<div class="col"></div>
				<div class="col" style="font-size:20px">
				<?php
					if ($pathani_shoulder_type=="noshoulder") {
						echo "NO Shoulder";
					} elseif ($pathani_shoulder_type=="vshoulder") {
						echo "V Shoulder";
					} elseif ($pathani_shoulder_type=="dvshoulder") {
						echo "DV Shoulder";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col" style="font-size:20px">
				<?php
					if ($pathani_collar_type=="lspc") {
						echo "LSPC";
					} elseif ($pathani_collar_type=="rmpc") {
						echo "RMPC";
					} elseif ($pathani_collar_type=="mrmpc") {
						echo "MRMPC";
					} elseif ($pathani_collar_type=="bc") {
						echo "BC";
					} elseif ($pathani_collar_type=="nocollar") {
						echo "NO Collar";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col" style="font-size:20px">
				<?php
					if ($pathani_cuff_type=="nocuff") {
						echo "NO Cuff";
					} elseif ($pathani_cuff_type=="cut") {
						echo "Cut";
					} elseif ($pathani_cuff_type=="square") {
						echo "SQUARE";
					} elseif ($pathani_cuff_type=="round") {
						echo "ROUND";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col" style="font-size:20px">
				<?php
					if ($pathani_pocket_type=="nopocket") {
						echo "NO Pocket";
					} elseif ($pathani_pocket_type=="square") {
						echo "SQUARE";
					} elseif ($pathani_pocket_type=="v") {
						echo "V";
					} elseif ($pathani_pocket_type=="round") {
						echo "ROUND";
					} elseif ($pathani_pocket_type=="flap") {
						echo "FLAP";
					} elseif ($pathani_pocket_type=="wallet") {
						echo "WALLET";
					} else {
						echo "";
					}
				?>
				</div>
			</div>
		</div>
		</a>
		
		
		<?php } break;
		case "salwar": {
			$row = mysqli_fetch_array($result);
				$salwar_count = $row['salwar_count'];
				$salwar_type = inchtotext($row['salwar_type']);
				$salwar_length = inchtotext($row['salwar_length']);
				$salwar_bottom = inchtotext($row['salwar_bottom']);
				$salwar_waist = inchtotext($row['salwar_waist']);
				$salwar_seat = inchtotext($row['salwar_seat']);
				$salwar_chain_pocket = inchtotext($row['salwar_chain_pocket']);
				$salwar_watch_pocket = $row['salwar_watch_pocket'];
				$salwar_t1 = $row['salwar_t1'];
				$salwar_t2 = $row['salwar_t2'];
		?>
		<a onclick="printit()">
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
				<div class="col"><?php echo "$salwar_t1" ?></div>
				<div class="col"><?php echo "$salwar_t1" ?></div>
			</div>
			<div class="row no-gutters">
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
				<div class="col"><?php echo "$salwar_length" ?></div>
				<div class="col"><?php echo "$salwar_bottom" ?></div>
				<div class="col"><?php echo "$salwar_waist" ?></div>
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
				<div class="col"><?php echo "$salwar_chain_pocket" ?></div>
				<div class="col"><?php echo "$salwar_watch_pocket" ?></div>
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
		</div>
		</a>
		
		
		<?php } break;
		case "aligard": {
			$row = mysqli_fetch_array($result);
				$aligard_count = $row['aligard_count'];
				$aligard_length = inchtotext($row['aligard_length']);
				$aligard_length_fix = inchtotext($row['aligard_length_fix']);
				$aligard_waist = inchtotext($row['aligard_waist']);
				$aligard_bottom = inchtotext($row['aligard_bottom']);
				$aligard_knee_length = inchtotext($row['aligard_knee_length']);
				$aligard_knee_loose = inchtotext($row['aligard_knee_loose']);
				$aligard_calf_length = inchtotext($row['aligard_calf_length']);
				$aligard_calf_loose = inchtotext($row['aligard_calf_loose']);
				$aligard_chain_pocket = inchtotext($row['aligard_chain_pocket']);
				$aligard_chain_fly = inchtotext($row['aligard_chain_fly']);
				$aligard_t1 = inchtotext($row['aligard_t1']);
				$aligard_t2 = inchtotext($row['aligard_t2']);
		?>
		<a onclick="printit()">
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
		</a>
		
		
		<?php } break;
		case "churidar": {
			$row = mysqli_fetch_array($result);
				$churidar_count = $row['churidar_count'];
				$churidar_length = inchtotext($row['churidar_length']);
				$churidar_length_fix = inchtotext($row['churidar_length_fix']);
				$churidar_waist = inchtotext($row['churidar_waist']);
				$churidar_bottom1 = inchtotext($row['churidar_bottom1']);
				$churidar_bottom2 = inchtotext($row['churidar_bottom2']);
				$churidar_knee_length = inchtotext($row['churidar_knee_length']);
				$churidar_knee_loose = inchtotext($row['churidar_knee_loose']);
				$churidar_calf_length1 = inchtotext($row['churidar_calf_length1']);
				$churidar_calf_loose1 = inchtotext($row['churidar_calf_loose1']);
				$churidar_calf_length2 = inchtotext($row['churidar_calf_length2']);
				$churidar_calf_loose2 = inchtotext($row['churidar_calf_loose2']);
				$churidar_calf_length3 = inchtotext($row['churidar_calf_length3']);
				$churidar_calf_loose3 = inchtotext($row['churidar_calf_loose3']);
				$churidar_calf_length4 = inchtotext($row['churidar_calf_length4']);
				$churidar_calf_loose4 = inchtotext($row['churidar_calf_loose4']);
				$churidar_t1 = inchtotext($row['churidar_t1']);
				$churidar_t2 = inchtotext($row['churidar_t2']);
		?>
		<a onclick="printit()">
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
		</a>
		
		
		<?php } break;
		case "pyjama": {
			$row = mysqli_fetch_array($result);
				$pyjama_count = $row['pyjama_count'];
				$pyjama_type = inchtotext($row['pyjama_type']);
				$pyjama_length = inchtotext($row['pyjama_length']);
				$pyjama_waist = inchtotext($row['pyjama_waist']);
				$pyjama_knee_length = inchtotext($row['pyjama_knee_length']);
				$pyjama_knee = inchtotext($row['pyjama_knee']);
				$pyjama_bottom = inchtotext($row['pyjama_bottom']);
				$pyjama_side_pocket = $row['pyjama_side_pocket'];
				$pyjama_t1 = $row['pyjama_t1'];
				$pyjama_t2 = $row['pyjama_t2'];
		?>
		<a onclick="printit()">
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
		</a>
		
		
		<?php } break;
		case "bpyjama": {
			$row = mysqli_fetch_array($result);
				$bpyjama_count = $row['bpyjama_count'];
				$bpyjama_length = inchtotext($row['bpyjama_length']);
				$bpyjama_fork = inchtotext($row['bpyjama_fork']);
				$bpyjama_waist = inchtotext($row['bpyjama_waist']);
				$bpyjama_seat = inchtotext($row['bpyjama_seat']);
				$bpyjama_thighs_fix = inchtotext($row['bpyjama_thighs_fix']);
				$bpyjama_thighs_loose = inchtotext($row['bpyjama_thighs_loose']);
				$bpyjama_calf_length = inchtotext($row['bpyjama_calf_length']);
				$bpyjama_calf = inchtotext($row['bpyjama_calf']);
				$bpyjama_bottom = inchtotext($row['bpyjama_bottom']);
				$bpyjama_cuttingfactor = inchtotext($row['bpyjama_cuttingfactor']);
				$bpyjama_crease = $row['bpyjama_crease'];
				$bpyjama_side_pocket = $row['bpyjama_side_pocket'];
				$bpyjama_belt = $row['bpyjama_belt'];
				$bpyjama_watch_pocket = $row['bpyjama_watch_pocket'];
				$bpyjama_plits = $row['bpyjama_plits'];
		?>
		<a onclick="printit()">
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
			<div class="row mb-n4 no-gutters">
				<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$bpyjama_count</b></span>"; ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
				<?php
					if ($bpyjama_plits=="0")
						echo "<u>No plts</u>";
					else {
						echo "<u>$bpyjama_plits"."plts</u>";
					}
				?>
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
				<div class="col"><?php echo "<u><b>Bpyjama : </b></u>" ?></div>
				<div class="col"><?php echo "$bpyjama_length" ?></div>
				<div class="col"><?php echo "$bpyjama_fork" ?></div>
				<div class="col"><?php echo "$bpyjama_waist" ?></div>
				<div class="col"><?php echo "$bpyjama_seat" ?></div>
				<div class="col"><?php echo "<u>$bpyjama_thighs_fix</u>" ?></div>
				<div class="col"><?php echo "<u>$bpyjama_calf_length</u>" ?></div>
				<div class="col"><?php echo "$bpyjama_bottom" ?></div>
				<div class="col"><?php echo "$bpyjama_cuttingfactor" ?></div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col"><?php echo "$bpyjama_crease" ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "$bpyjama_thighs_loose" ?></div>
				<div class="col"><?php echo "$bpyjama_calf" ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "$bpyjama_side_pocket" ?></div>
				<div class="col"><?php echo "$bpyjama_belt" ?></div>
				<div class="col"><?php echo "$bpyjama_watch_pocket" ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
		</div>
		</a>
		
		
		<?php } break;
		case "kandura": {
			$row = mysqli_fetch_array($result);
				$kandura_count = $row['kandura_count'];
				$kandura_type = $row['kandura_type'];
				$kandura_length = inchtotext($row['kandura_length']);
				$kandura_shoulder = inchtotext($row['kandura_shoulder']);
				$kandura_sleeve = inchtotext($row['kandura_sleeve']);
				$kandura_chest = inchtotext($row['kandura_chest']);
				$kandura_stomach = inchtotext($row['kandura_stomach']);
				$kandura_seat = inchtotext($row['kandura_seat']);
				$kandura_sleeve_fit = $row['kandura_sleeve_fit'];
				$kandura_biceps = inchtotext($row['kandura_biceps']);
				$kandura_collar = inchtotext($row['kandura_collar']);
				$kandura_collar_type = $row['kandura_collar_type'];
				$kandura_cuff_l = inchtotext($row['kandura_cuff_l']);
				$kandura_cuff_b = inchtotext($row['kandura_cuff_b']);
				$kandura_cuff_type = $row['kandura_cuff_type'];
				$kandura_pocket = inchtotext($row['kandura_pocket']);
				$kandura_pocket_type = inchtotext($row['kandura_pocket_type']);
				$kandura_shoulder_type = inchtotext($row['kandura_shoulder_type']);
				$kandura_hala = inchtotext($row['kandura_hala']);
				$kandura_t1 = inchtotext($row['kandura_t1']);
				$kandura_t2 = inchtotext($row['kandura_t2']);
				$kandura_t3 = inchtotext($row['kandura_t3']);
		?>
		<a onclick="printit()">
		<div id=<?php echo "$mar" ?>>
			<div class="row mb-2 no-gutters">
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
				<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$kandura_count</b></span>"; ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"><?php echo "($kandura_hala)" ?></div>
				<div class="col"><?php echo "$kandura_t1" ?></div>
				<div class="col"><?php echo "$kandura_t2" ?></div>
				<div class="col"><?php echo "$kandura_t3" ?></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<div class="row no-gutters">
				<div class="col"><?php echo "<u><b>Kandura :</b></u>"; ?></div>
				<div class="col"><?php echo "$kandura_length" ?></div>
				<div class="col"><?php echo "$kandura_shoulder" ?></div>
				<div class="col"><?php echo "$kandura_sleeve" ?></div>
				<div class="col"><?php echo "$kandura_chest" ?></div>
				<div class="col"><?php echo "$kandura_stomach" ?></div>
				<div class="col"><?php echo "$kandura_seat" ?></div>
				<div class="col"><?php echo "$kandura_collar" ?></div>
				<div class="col">
				<?php
					if ($kandura_cuff_b=="0") {
						echo "";
					} else {
						echo "$kandura_cuff_l x $kandura_cuff_b";
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
				<div class="col">
				<?php
					if ($kandura_sleeve_fit=="sll") {
						echo "SLL $kandura_biceps";
					} elseif ($kandura_sleeve_fit=="slm") {
						echo "SLM $kandura_biceps";
					} elseif ($kandura_sleeve_fit=="slf") {
						echo "SLF $kandura_biceps";
					} else {
						echo "$kandura_biceps";
					}
				?>
				</div>
				<div class="col"></div>
				<div class="col" style="font-size:20px">
				<?php
					if ($kandura_shoulder_type=="noshoulder") {
						echo "NO Shoulder";
					} elseif ($kandura_shoulder_type=="vshoulder") {
						echo "V Shoulder";
					} elseif ($kandura_shoulder_type=="dvshoulder") {
						echo "DV Shoulder";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				<div class="col" style="font-size:20px">
				<?php
					if ($kandura_collar_type=="lspc") {
						echo "LSPC";
					} elseif ($kandura_collar_type=="rmpc") {
						echo "RMPC";
					} elseif ($kandura_collar_type=="mrmpc") {
						echo "MRMPC";
					} elseif ($kandura_collar_type=="bc") {
						echo "BC";
					} elseif ($kandura_collar_type=="nocollar") {
						echo "NO Collar";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col" style="font-size:20px">
				<?php
					if ($kandura_cuff_type=="nocuff") {
						echo "NO Cuff";
					} elseif ($kandura_cuff_type=="cut") {
						echo "Cut";
					} elseif ($kandura_cuff_type=="square") {
						echo "SQUARE";
					} elseif ($kandura_cuff_type=="round") {
						echo "ROUND";
					} else {
						echo "";
					}
				?>
				</div>
				<div class="col" style="font-size:20px">
				<?php
					if ($kandura_pocket_type=="nopocket") {
						echo "NO Pocket";
					} elseif ($kandura_pocket_type=="square") {
						echo "SQUARE";
					} elseif ($kandura_pocket_type=="v") {
						echo "V";
					} elseif ($kandura_pocket_type=="round") {
						echo "ROUND";
					} elseif ($kandura_pocket_type=="flap") {
						echo "FLAP";
					} elseif ($kandura_pocket_type=="wallet") {
						echo "WALLET";
					} else {
						echo "";
					}
				?>
				</div>
			</div>
		</div>
		</a>

		<?php } break;
	}

?>

</body>
</html>