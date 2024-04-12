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
	
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	$query = "SELECT * FROM `measurement` WHERE sr=$sr";
	
	$result = mysqli_query($dbc, $query)
		or die('Error querying database.');
	
	
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
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
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
		<div class="col"><?php echo "$pant_belt" ?></div>
		<div class="col"><?php echo "$pant_back_pocket"."B" ?></div>
		<div class="col"><?php echo "$pant_watch_pocket"."W" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	</a>
</div>


<?php
		} break;
		case "shirt": {
			$row = mysqli_fetch_array($result);
				$shirt_count = $row['shirt_count'];
				$shirt_type = $row['shirt_type'];
				$shirt_length = inchtotext($row['shirt_length']);
				$shirt_shoulder = inchtotext($row['shirt_shoulder']);
				$shirt_sleeve = inchtotext($row['shirt_sleeve']);
				$shirt_chest = inchtotext($row['shirt_chest']);
				$shirt_stomach = inchtotext($row['shirt_stomach']);
				$shirt_seat = inchtotext($row['shirt_seat']);
				$shirt_sleeve_fit = $row['shirt_sleeve_fit'];
				$shirt_biceps = inchtotext($row['shirt_biceps']);
				$shirt_collar = inchtotext($row['shirt_collar']);
				$shirt_collar_type = $row['shirt_collar_type'];
				$shirt_cuff_l = inchtotext($row['shirt_cuff_l']);
				$shirt_cuff_b = inchtotext($row['shirt_cuff_b']);
				$shirt_cuff_type = $row['shirt_cuff_type'];
				$shirt_pocket = $row['shirt_pocket'];
				$shirt_pocket_type = $row['shirt_pocket_type'];
				$shirt_shoulder_type = $row['shirt_shoulder_type'];
				$shirt_hala = inchtotext($row['shirt_hala']);
				$shirt_t1 = inchtotext($row['shirt_t1']);
				$shirt_t2 = inchtotext($row['shirt_t2']);
				$shirt_t3 = inchtotext($row['shirt_t3']);
?>
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
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
		<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$shirt_count</b></span>"; ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "($shirt_hala)" ?></div>
		<div class="col"><?php echo "$shirt_t1" ?></div>
		<div class="col"><?php echo "$shirt_t2" ?></div>
		<div class="col"><?php echo "$shirt_t3" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
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
		<div class="col"><?php echo "$shirt_length" ?></div>
		<div class="col"><?php echo "$shirt_shoulder" ?></div>
		<div class="col"><?php echo "$shirt_sleeve" ?></div>
		<div class="col"><?php echo "$shirt_chest" ?></div>
		<div class="col"><?php echo "$shirt_stomach" ?></div>
		<div class="col"><?php echo "$shirt_seat" ?></div>
		<div class="col"><?php echo "$shirt_collar" ?></div>
		<div class="col">
		<?php
			if ($shirt_cuff_b=="0") {
				echo "";
			} else {
				echo "$shirt_cuff_l x $shirt_cuff_b";
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
				echo "SLL $shirt_biceps";
			} elseif ($shirt_sleeve_fit=="slm") {
				echo "SLM $shirt_biceps";
			} elseif ($shirt_sleeve_fit=="slf") {
				echo "SLF $shirt_biceps";
			} else {
				echo "$shirt_biceps";
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
	</a>
</div>


<?php	
		} break;
		case "kurta": {
			$row = mysqli_fetch_array($result);
				$kurta_count = $row['kurta_count'];
				$kurta_type = $row['kurta_type'];
				$kurta_length = inchtotext($row['kurta_length']);
				$kurta_shoulder = inchtotext($row['kurta_shoulder']);
				$kurta_sleeve = inchtotext($row['kurta_sleeve']);
				$kurta_chest = inchtotext($row['kurta_chest']);
				$kurta_stomach = inchtotext($row['kurta_stomach']);
				$kurta_seat = inchtotext($row['kurta_seat']);
				$kurta_sleeve_fit = $row['kurta_sleeve_fit'];
				$kurta_biceps = inchtotext($row['kurta_biceps']);
				$kurta_collar = inchtotext($row['kurta_collar']);
				$kurta_collar_type = $row['kurta_collar_type'];
				$kurta_cuff_l = inchtotext($row['kurta_cuff_l']);
				$kurta_cuff_b = inchtotext($row['kurta_cuff_b']);
				$kurta_cuff_type = $row['kurta_cuff_type'];
				$kurta_pocket = inchtotext($row['kurta_pocket']);
				$kurta_pocket_type = inchtotext($row['kurta_pocket_type']);
				$kurta_shoulder_type = inchtotext($row['kurta_shoulder_type']);
				$kurta_hala = inchtotext($row['kurta_hala']);
				$kurta_t1 = inchtotext($row['kurta_t1']);
				$kurta_t2 = inchtotext($row['kurta_t2']);
				$kurta_t3 = inchtotext($row['kurta_t3']);
?>
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
	<div class="row no-gutters">
		<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$kurta_count</b></span>"; ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "($kurta_hala)" ?></div>
		<div class="col"><?php echo "$kurta_t1" ?></div>
		<div class="col"><?php echo "$kurta_t2" ?></div>
		<div class="col"><?php echo "$kurta_t3" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	<div class="row no-gutters">
		<div class="col">
		<?php
			if ($kurta_type=="round") {
				echo "<span class=\"border border-dark rounded-circle border-top-0 border-right-0 pl-2\"><b>Kurta :</b></span>";
			} else {
				echo "<span class=\"border border-dark pr-1 pl-1\"><b>Kurta :</b></span>";
			}
		?>
		</div>
		<div class="col"><?php echo "$kurta_length" ?></div>
		<div class="col"><?php echo "$kurta_shoulder" ?></div>
		<div class="col"><?php echo "$kurta_sleeve" ?></div>
		<div class="col"><?php echo "$kurta_chest" ?></div>
		<div class="col"><?php echo "$kurta_stomach" ?></div>
		<div class="col"><?php echo "$kurta_seat" ?></div>
		<div class="col"><?php echo "$kurta_collar" ?></div>
		<div class="col">
		<?php
			if ($kurta_cuff_b=="0") {
				echo "";
			} else {
				echo "$kurta_cuff_l x $kurta_cuff_b";
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
				echo "SLL $kurta_biceps";
			} elseif ($kurta_sleeve_fit=="slm") {
				echo "SLM $kurta_biceps";
			} elseif ($kurta_sleeve_fit=="slf") {
				echo "SLF $kurta_biceps";
			} else {
				echo "$kurta_biceps";
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
	</a>
</div>


<?php	
		} break;
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
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
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
	</a>
</div>


<?php
		} break;
		case "salwar": {
			$row = mysqli_fetch_array($result);
				$salwar_count = $row['salwar_count'];
				$salwar_type = inchtotext($row['salwar_type']);
				$salwar_length = inchtotext($row['salwar_length']);
				$salwar_bottom = inchtotext($row['salwar_bottom']);
				$salwar_waist = inchtotext($row['salwar_waist']);
				$salwar_seat = inchtotext($row['salwar_seat']);
				$salwar_knee_length = inchtotext($row['salwar_chain_pocket']);
				$salwar_side_pocket = $row['salwar_watch_pocket'];
				$salwar_t1 = $row['salwar_t1'];
				$salwar_t2 = $row['salwar_t2'];
?>
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
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
		<div class="col"><?php echo "$salwar_length - " ?></div>
		<div class="col"><?php echo "$salwar_bottom - " ?></div>
		<div class="col"><?php echo "$salwar_waist - " ?></div>
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
		<div class="col"><?php echo "$salwar_chain_pocket - " ?></div>
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
	</a>
</div>


<?php
		} break;
		case "aligard": {
			$row = mysqli_fetch_array($result);
				$aligard_count = $row['aligard_count'];
				$aligard_length = inchtotext($row['aligard_length']);
				$aligard_length_fix = inchtotext($row['aligard_length_fix']);
				$aligard_waist = inchtotext($row['aligard_waist']);
				$aligard_bottom_1 = inchtotext($row['aligard_bottom_1']);
				$aligard_bottom_2 = inchtotext($row['aligard_bottom_2']);
				$aligard_knee_length = inchtotext($row['aligard_knee_length']);
				$aligard_knee_loose = inchtotext($row['aligard_knee_loose']);
				$aligard_calf_length = inchtotext($row['aligard_calf_length']);
				$aligard_calf_loose = inchtotext($row['aligard_calf_loose']);
				$aligard_chain_pocket = inchtotext($row['aligard_chain_pocket']);
				$aligard_chain_fly = inchtotext($row['aligard_chain_fly']);
				$aligard_t1 = inchtotext($row['aligard_t1']);
				$aligard_t2 = inchtotext($row['aligard_t2']);
?>
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
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
		<div class="col"><?php echo "$aligard_length - " ?></div>
		<div class="col"><?php echo "$aligard_length_fix - " ?></div>
		<div class="col"><?php echo "$aligard_waist - " ?></div>
		<div class="col"><?php echo "$aligard_knee_length - " ?></div>
		<div class="col"><?php echo "$aligard_knee_loose - " ?></div>
		<div class="col"><?php echo "$aligard_calf_length_1 - " ?></div>
		<div class="col"><?php echo "$aligard_calf_loose_1 - " ?></div>
		<div class="col"><?php echo "$aligard_bottom_1 - " ?></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$aligard_chain_pocket - " ?></div>
		<div class="col"><?php echo "$aligard_chain_fly" ?></div>
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
		<div class="col"></div>
	</div>
	</a>
</div>


<?php
		} break;
		case "churidar": {
			$row = mysqli_fetch_array($result);
				$churidar_count = $row['churidar_count'];
				$churidar_length = inchtotext($row['churidar_length']);
				$churidar_length_fix = inchtotext($row['churidar_length_fix']);
				$churidar_waist = inchtotext($row['churidar_waist']);
				$churidar_bottom_1 = inchtotext($row['churidar_bottom_1']);
				$churidar_bottom_2 = inchtotext($row['churidar_bottom_2']);
				$churidar_knee_length = inchtotext($row['churidar_knee_length']);
				$churidar_knee_loose = inchtotext($row['churidar_knee_loose']);
				$churidar_calf_length_1 = inchtotext($row['churidar_calf_length_1']);
				$churidar_calf_loose_1 = inchtotext($row['churidar_calf_loose_1']);
				$churidar_calf_length_2 = inchtotext($row['churidar_calf_length_2']);
				$churidar_calf_loose_2 = inchtotext($row['churidar_calf_loose_2']);
				$churidar_calf_length_3 = inchtotext($row['churidar_calf_length_3']);
				$churidar_calf_loose_3 = inchtotext($row['churidar_calf_loose_3']);
				$churidar_calf_length_4 = inchtotext($row['churidar_calf_length_4']);
				$churidar_calf_loose_4 = inchtotext($row['churidar_calf_loose_4']);
				$churidar_t1 = inchtotext($row['churidar_t1']);
				$churidar_t2 = inchtotext($row['churidar_t2']);
?>
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
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
	<div class="row no-gutters">
		<div class="col"><?php echo "<u><b>churidar : </b></u>" ?></div>
		<div class="col"><?php echo "$churidar_length - " ?></div>
		<div class="col"><?php echo "$churidar_length_fix - " ?></div>
		<div class="col"><?php echo "$churidar_waist - " ?></div>
		<div class="col"><?php echo "$churidar_knee_length - " ?></div>
		<div class="col"><?php echo "$churidar_knee_loose - " ?></div>
		<div class="col"><?php echo "$churidar_calf_length_1 - " ?></div>
		<div class="col"><?php echo "$churidar_calf_loose_1 - " ?></div>
		<div class="col"><?php echo "$churidar_calf_length_2 - " ?></div>
		<div class="col"><?php echo "$churidar_calf_loose_2 - " ?></div>
	</div>
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$churidar_calf_length_3 - " ?></div>
		<div class="col"><?php echo "$churidar_calf_loose_3 - " ?></div>
		<div class="col"><?php echo "$churidar_calf_length_4 - " ?></div>
		<div class="col"><?php echo "$churidar_calf_loose_4 - " ?></div>
		<div class="col"><?php echo "$churidar_bottom_1 - " ?></div>
		<div class="col"><?php echo "$churidar_bottom_2 - " ?></div>
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
		<div class="col"></div>
		<div class="col"></div>
	</div>
	</a>
</div>


<?php
		} break;
		case "pyjama": {
			$row = mysqli_fetch_array($result);
				$pyjama_count = $row['pyjama_count'];
				$pyjama_type = inchtotext($row['pyjama_type']);
				$pyjama_length = inchtotext($row['pyjama_length']);
				$pyjama_waist = inchtotext($row['pyjama_waist']);
				$pyjama_seat = inchtotext($row['pyjama_seat']);
				$pyjama_knee_length = inchtotext($row['pyjama_knee_length']);
				$pyjama_knee = inchtotext($row['pyjama_knee']);
				$pyjama_bottom = inchtotext($row['pyjama_bottom']);
				$pyjama_side_pocket = $row['pyjama_side_pocket'];
				$pyjama_t1 = $row['pyjama_t1'];
				$pyjama_t2 = $row['pyjama_t2'];
?>
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
	<div class="row no-gutters">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"><?php echo "$pyjama_t1" ?></div>
		<div class="col"><?php echo "$pyjama_t1" ?></div>
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
		<div class="col"><?php echo "$pyjama_length - " ?></div>
		<div class="col"><?php echo "$pyjama_waist - " ?></div>
		<div class="col"></div>
		<div class="col"><?php echo "<u>$pyjama_knee_length - </u>" ?></div>
		<div class="col"><?php echo "$pyjama_bottom - " ?></div>
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
		<div class="col"><?php echo "$pyjama_knee" ?></div>
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
		<div class="col"><?php echo "$pyjama_side_pocket" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	</a>
</div>


<?php
		} break;
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
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
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
		<div class="col"><?php echo "$bpyjama_length - " ?></div>
		<div class="col"><?php echo "$bpyjama_fork - " ?></div>
		<div class="col"><?php echo "$bpyjama_waist - " ?></div>
		<div class="col"><?php echo "$bpyjama_seat - " ?></div>
		<div class="col"><?php echo "<u>$bpyjama_thighs_fix - </u>" ?></div>
		<div class="col"><?php echo "<u>$bpyjama_calf_length - </u>" ?></div>
		<div class="col"><?php echo "$bpyjama_bottom - " ?></div>
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
		<div class="col"><?php echo "$bpyjama_side_pocket - " ?></div>
		<div class="col"><?php echo "$bpyjama_belt - " ?></div>
		<div class="col"><?php echo "$bpyjama_watch_pocket" ?></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	</a>
</div>


<?php	
		} break;
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
<div id=<?php echo "$mar" ?>>
	<a onclick="printit()">
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
	</a>
</div>


<?php
		} break;
	}
	
	mysqli_close($dbc);
?>

</body>
</html>