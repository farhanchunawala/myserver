<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 2 , alt + F -->
<head>
	<?php
		$sr=$_GET['sr'];
	?>
	<title><?php echo "$sr Shirt"?></title>
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
#mar3 {
	font-size: 24px;
	border: 2px groove;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 20px;
	padding-right: 0px;
}
#marp {
	font-size: 20px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
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
</style>
<script>
function printit() {
  window.print();
}
</script>

<a onclick="printit()">
<?php
	$mar="marx";
	$print=$_GET['print'];
	$type = 'shirt';
	
	function inchtotext($x) {
		$a = $x;
		$a = str_replace(".125","+",$a);
		$a = str_replace(".25","¼",$a);
		$a = str_replace(".375","¼+",$a);
		$a = str_replace(".5","½",$a);
		$a = str_replace(".625","½+",$a);
		$a = str_replace(".75","¾",$a);
		if(strstr($a,".875")){
			$a = $a+1;
			$a = str_replace(".875","=",$a);
		}
			return $a;
	}
	function inchtotext2($x) {
		$a = $x;
		$a = str_replace(".125",".1",$a);
		$a = str_replace(".25",".2",$a);
		$a = str_replace(".375",".3",$a);
		$a = str_replace(".5",".4",$a);
		$a = str_replace(".625",".5",$a);
		$a = str_replace(".75",".6",$a);
		$a = str_replace(".875",".7",$a);
		
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
	
	$query2 = "SELECT * FROM `measurement` WHERE sr=$sr";
	
	$result2 = mysqli_query($dbc, $query2)
		or die('Error querying database query2.');
	
	$rowq2 = mysqli_fetch_array($result2);
	
	
	$query3 = "SELECT * FROM style WHERE sr=$sr AND garb_type=\"shirt\" ORDER BY style_id ASC";
	
	$result3 = mysqli_query($dbc, $query3)
		or die('Error querying database query3.');
	
	
	$query4 = "SELECT * FROM entry WHERE sr=$sr AND garb_type=\"shirt\" ORDER BY garb_id ASC";
	
	$result4 = mysqli_query($dbc, $query4)
		or die('Error querying database query4.');
		
		$i=0;
		while ($rowq4 = mysqli_fetch_array($result4)) {
			$garb[$i] = $rowq4['garb_id'];
			$garb_pairing[$i] = $rowq4['garb_pairing'];
			$garb_description[$i] = $rowq4['garb_description'];
			$shirt_pana[$i] = $rowq4['garb_pana'];
			$shirt_clothln[$i] = $rowq4['garb_clothln'];
			
			$i++;
		}
		$garbcount = count($garb);
		
		$i=0;
		while ($rowq3 = mysqli_fetch_array($result3)) {
			$style[$i] = $rowq3['style_id'];
			$shirt_collartype[$i] = $rowq3['shirt_collartype'];
			$shirt_cuffln[$i] = $rowq3['shirt_cuffln'];
			$shirt_cufftype[$i] = $rowq3['shirt_cufftype'];
			$shirt_pockettype[$i] = $rowq3['shirt_pockettype'];
			$shirt_shouldertype[$i] = $rowq3['shirt_shouldertype'];
			
			$i++;
		}
	}
	
	{
		$shirt_count = $rowq2['shirt_count'];
		$shirt_type = $rowq2['shirt_type'];
		$shirt_length = $rowq2['shirt_length'];
		$shirt_shoulder = $rowq2['shirt_shoulder'];
		$shirt_sleeve = $rowq2['shirt_sleeve'];
		$shirt_chest = $rowq2['shirt_chest'];
		$shirt_stomach = $rowq2['shirt_stomach'];
		$shirt_seat = $rowq2['shirt_seat'];
		$shirt_sleevefit = $rowq2['shirt_sleevefit'];
		$shirt_biceps = $rowq2['shirt_biceps'];
		$shirt_collar = $rowq2['shirt_collar'];
		$shirt_cuffbr = $rowq2['shirt_cuffbr'];
		$shirt_pocketdown = $rowq2['shirt_pocketdown'];
		$shirt_pocket = $rowq2['shirt_pocket'];
		$shirt_hala = $rowq2['shirt_hala'];
		$shirt_t1 = $rowq2['shirt_t1'];
		$shirt_t2 = $rowq2['shirt_t2'];
		$shirt_t3 = $rowq2['shirt_t3'];
	}
	
	for($i = 0; $i < $garbcount; $i++) {
	
	{	//cloth
	$y_pana = $shirt_pana[$i];
	$x_clothln = $shirt_clothln[$i] / 2.54;
	}
	
	{	// front
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
	}
	
	{	// back
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
	}
	
	{	// sleeve
	$x_sleeve_length1 = $shirt_sleeve - ($shirt_cuffln[$i] - 1) + 1;
	$x_sleeve_length2 = $shirt_sleeve - ($shirt_cuffln[$i] - 1) + 1 + 0.5;
	if ($shirt_cuffbr==9) {
		$y_sleeve_cuff = 5.5;
	} elseif ($shirt_cuffbr==9.25) {
		$y_sleeve_cuff = 5.625;
	} elseif ($shirt_cuffbr==9.5) {
		$y_sleeve_cuff = 5.75;
	} elseif ($shirt_cuffbr==9.75) {
		$y_sleeve_cuff = 5.875;
	} elseif ($shirt_cuffbr==10) {
		$y_sleeve_cuff = 6;
	} elseif ($shirt_cuffbr==10.25) {
		$y_sleeve_cuff = 6.125;
	} elseif ($shirt_cuffbr==10.5) {
		$y_sleeve_cuff = 6.25;
	} else {
		$y_sleeve_cuff = $shirt_cuffbr / 2 + 0.5;
	}
	$y_sleeve_cuffx2 = $y_sleeve_cuff * 2;
	
	$x_sleeve_hala = 4.5;
	$y_sleeve_hala = $shirt_hala;
	$y_sleeve_halax2 = 2 * $y_sleeve_hala;
	
	$x_sleeve_edge = $x_sleeve_length1 - $x_sleeve_hala;
	$y_sleeve_edge = $y_sleeve_hala - $y_sleeve_cuff;
	}
	
	{	//shoulder
	$x_shoulder_length = shouldertrim($shirt_shoulder) / 2 + 0.5;
	$x_shoulder_rounding = 2.5;
	$x_shoulder_slope = $x_shoulder_length - $x_shoulder_rounding;
	$y_shoulder_height = 6;
	$y_shoulder_slope = 2;
	$y_shoulder_rounding = 1.875;
	$y_shoulder_heightmslope = $y_shoulder_height - $y_shoulder_slope;
	}
	
	}
	
	if ($print=="print3") {
		include 'print/print3.php';
	} elseif ($print=="print1") {
		include 'print/print1.php';
	} else {
		include 'print/print2.php';
	}
	
	mysqli_close($dbc);
	?>
	
	<!--
	<div id=<?php echo "mar1" ?>>
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
			<div class="col"><?php echo "(".inchtotext2($shirt_hala).")" ?></div>
			<div class="col"><?php echo inchtotext2($shirt_t1) ?></div>
			<div class="col"><?php echo inchtotext2($shirt_t2) ?></div>
			<div class="col"><?php echo inchtotext2($shirt_t3) ?></div>
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
			<div class="col"><u><?php echo inchtotext2($shirt_pocketdown) ?></u></div>
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
			<div class="col"><?php echo inchtotext2($shirt_length) ?></div>
			<div class="col"><?php echo inchtotext2($shirt_shoulder) ?></div>
			<div class="col"><?php echo inchtotext2($shirt_sleeve) ?></div>
			<div class="col"><?php echo inchtotext2($shirt_chest) ?></div>
			<div class="col"><?php echo inchtotext2($shirt_stomach) ?></div>
			<div class="col"><?php echo inchtotext2($shirt_seat) ?></div>
			<div class="col"><?php echo inchtotext2($shirt_collar) ?></div>
			<div class="col">
			<?php
				if ($shirt_cuffln=="0") {
					echo "";
				} else {
					echo inchtotext2($shirt_cuffbr)." x ".inchtotext2($shirt_cuffln);
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
				if ($shirt_sleevefit=="sll") {
					echo "SLL ".inchtotext2($shirt_biceps);
				} elseif ($shirt_sleevefit=="slm") {
					echo "SLM ".inchtotext2($shirt_biceps);
				} elseif ($shirt_sleevefit=="slf") {
					echo "SLF ".inchtotext2($shirt_biceps);
				} else {
					echo inchtotext2($shirt_biceps);
				}
			?>
			</div>
			<div class="col"></div>
			<div class="col" style="font-size:20px">
			<?php
				if ($shirt_shouldertype=="noshoulder") {
					echo "NO Shoulder";
				} elseif ($shirt_shouldertype=="vshoulder") {
					echo "V Shoulder";
				} elseif ($shirt_shouldertype=="dvshoulder") {
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
				if ($shirt_collartype=="lspc") {
					echo "LSPC";
				} elseif ($shirt_collartype=="rmpc") {
					echo "RMPC";
				} elseif ($shirt_collartype=="mrmpc") {
					echo "MRMPC";
				} elseif ($shirt_collartype=="bc") {
					echo "BC";
				} elseif ($shirt_collartype=="nocollar") {
					echo "NO Collar";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($shirt_cufftype=="nocuff") {
					echo "NO Cuff";
				} elseif ($shirt_cufftype=="cut") {
					echo "Cut";
				} elseif ($shirt_cufftype=="square") {
					echo "SQUARE";
				} elseif ($shirt_cufftype=="round") {
					echo "ROUND";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($shirt_pockettype=="nopocket") {
					echo "NO Pocket";
				} elseif ($shirt_pockettype=="square") {
					echo "SQUARE";
				} elseif ($shirt_pockettype=="v") {
					echo "V";
				} elseif ($shirt_pockettype=="round") {
					echo "ROUND";
				} elseif ($shirt_pockettype=="flap") {
					echo "FLAP";
				} elseif ($shirt_pockettype=="wallet") {
					echo "WALLET";
				} else {
					echo "";
				}
			?>
			</div>
		</div>
	</div>
	-->
	<!--
	<div id="front">
		<div class="row mb-1 no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
				<div class="col"></div>
				<div class="col"></div>
				
			</div>
			</div>
		</div>
		<div class="row mb-3 no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t1mshoulder); ?></span> )
				</div>
				
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
				
			</div>
			</div>
		</div>
		<div class="row mb-3 no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
				
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_markshoulder); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				
			</div>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_back_t3); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_back_t2); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_back_t1); ?></span> )
				</div>
				
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_markback2); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_markback1); ?></span> )
				</div>
				
			</div>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t3); ?></span> )
				</div>
				<div class="col"></div>
				<div class="col"></div>
				
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_collarl); ?></span> )
				</div>
				
			</div>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t3p2); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t2p2); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t1p2); ?></span> )
				</div>
				
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
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
	-->
	
</a>

</body>
</html>