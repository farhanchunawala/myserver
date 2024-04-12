<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 6 -->
<head>
	<?php
		$sr=$_GET['sr'];
		$type = $_GET['type'];
		$count = $_GET['count'];
	?>
	<title><?php echo "$sr - $count $type"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css">
	<script src="libraries/jquery.min.js"></script>
	<script src="libraries/popper.min.js"></script>
	<script src="libraries/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	{ $dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	
	$query2 = "SELECT * FROM `measurement` WHERE sr=$sr";
	
	$result2 = mysqli_query($dbc, $query2)
		or die('Error querying database query2.');
	
	$rowq2 = mysqli_fetch_array($result2);
	
	
	$query3 = "SELECT * FROM style WHERE sr=$sr AND garb_type=\"$type\" ORDER BY style_id DESC LIMIT 1";
	
	$result3 = mysqli_query($dbc, $query3)
		or die('Error querying database query3.');
	
	$rowq3 = mysqli_fetch_array($result3);
	
	
	$query4 = "SELECT * FROM entry WHERE sr=$sr AND (garb_type='shirt' OR garb_type='kurta' OR garb_type='pathani' OR garb_type='kandura') ORDER BY garb_id DESC LIMIT 1";
	
	$result4 = mysqli_query($dbc, $query4)
		or die('Error querying database query4.');
	
	$rowq4 = mysqli_fetch_array($result4);
	
	
	mysqli_close($dbc);
	}
	
	$pair = ord($rowq4['garb_pairing']);
	
	function texttoinch($x) {
		$a = $x;
		/*$a = str_replace(".25",".250",$a);
		$a = str_replace(".50",".500",$a);
		$a = str_replace(".75",".750",$a);*/
		if(strstr($a,"+")){
			$a = $a+0.125;
		}
		if(strstr($a,"=")){
			$a = $a-0.125;
		}
			return $a;
	}
	function inchtotext($x) {
		$a = $x;
		$a = str_replace(".125","+",$a);
		$a = str_replace(".250",".25",$a);
		$a = str_replace(".375",".25+",$a);
		$a = str_replace(".500",".50",$a);
		$a = str_replace(".625",".50+",$a);
		$a = str_replace(".750",".75",$a);
		if(strstr($a,".875")){
			$a = $a+1;
			$a = str_replace(".875","=",$a);
		}
			return $a;
	}
	
?>
<div class="container-fluid mt-2">
	<form method="post" action="pattern_save.php?sr=<?php echo $sr; ?>&type=<?php echo $type; ?>&count=<?php echo $count; ?>">
	<div class="form-group">
	
	<div class="row p-3 no-gutters">
		<div class="col-10">
			<h2><?php echo "$sr - $count $type"?></h2>
		</div>
		<div class="col-2">
			<button tabindex="<?php echo $count; ?>99" type="submit" class="btn btn-info" value="save" name="submit">Save</button>
		</div>
	</div>
	
	<?php switch ($type) {
		
		case "shirt": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				if ($pair==122 || $pair=="") {
					$pair = 97;
				} else {
					$pair = $pair + 1;
				}
				
				$s_collartype_rmpc = $s_collartype_mrmpc = $s_collartype_lspc = $s_collartype_bc = $s_collartype_nocollar = "";
				$s_cuffln_cuffa = $s_cuffln_cuffb = $s_cuffln_cuffc = $s_cuffln_cuffd = $s_cuffln_cuffe = $s_cuffln_cufff = $s_cuffln_cuffg = "";
				$s_cufftype_cut = $s_cufftype_square = $s_cufftype_round = $s_cufftype_nocuff = $s_cufftype_halfsleeve = "";
				$s_pockettype_nopocket = $s_pockettype_v = $s_pockettype_square = $s_pockettype_round = $s_pockettype_flap = $s_pockettype_wallet = "";
				$s_shouldertype_regular = $s_shouldertype_noshoulder = $s_shouldertype_vshoulder = $s_shouldertype_dvshoulder = "";
				
				if ($c==1) {
					
					if ($rowq3['shirt_collartype']=="rmpc") {
						$s_collartype_rmpc = "selected";
					} elseif ($rowq3['shirt_collartype']=="mrmpc") {
						$s_collartype_mrmpc = "selected";
					} elseif ($rowq3['shirt_collartype']=="lspc") {
						$s_collartype_lspc = "selected";
					} elseif ($rowq3['shirt_collartype']=="bc") {
						$s_collartype_bc = "selected";
					} elseif ($rowq3['shirt_collartype']=="nocollar") {
						$s_collartype_nocollar = "selected";
					}
					
					if ($rowq3['shirt_cuffln']=="0.5") {
						$s_cuffln_cuffa = "selected";
					} elseif ($rowq3['shirt_cuffln']=="1") {
						$s_cuffln_cuffb = "selected";
					} elseif ($rowq3['shirt_cuffln']=="1.5") {
						$s_cuffln_cuffc = "selected";
					} elseif ($rowq3['shirt_cuffln']=="2") {
						$s_cuffln_cuffd = "selected";
					} elseif ($rowq3['shirt_cuffln']=="2.25") {
						$s_cuffln_cuffe = "selected";
					} elseif ($rowq3['shirt_cuffln']=="2.5") {
						$s_cuffln_cufff = "selected";
					} elseif ($rowq3['shirt_cuffln']=="3") {
						$s_cuffln_cuffg = "selected";
					} elseif ($rowq3['shirt_cuffln']=="0") {
						$s_cuffln_nocuff = "selected";
					}
					
					if ($rowq3['shirt_cufftype']=="cut") {
						$s_cufftype_cut = "selected";
					} elseif ($rowq3['shirt_cufftype']=="square") {
						$s_cufftype_square = "selected";
					} elseif ($rowq3['shirt_cufftype']=="round") {
						$s_cufftype_round = "selected";
					} elseif ($rowq3['shirt_cufftype']=="nocuff") {
						$s_cufftype_nocuff = "selected";
					} elseif ($rowq3['shirt_cufftype']=="halfsleeve") {
						$s_cufftype_halfsleeve = "selected";
					}
					
					if ($rowq3['shirt_pockettype']=="nopocket") {
						$s_pockettype_nopocket = "selected";
					} elseif ($rowq3['shirt_pockettype']=="v") {
						$s_pockettype_v = "selected";
					} elseif ($rowq3['shirt_pockettype']=="square") {
						$s_pockettype_square = "selected";
					} elseif ($rowq3['shirt_pockettype']=="round") {
						$s_pockettype_round = "selected";
					} elseif ($rowq3['shirt_pockettype']=="flap") {
						$s_pockettype_flap = "selected";
					} elseif ($rowq3['shirt_pockettype']=="wallet") {
						$s_pockettype_wallet = "selected";
					}
					
					if ($rowq3['shirt_shouldertype']=="regular") {
						$s_shouldertype_regular = "selected";
					} elseif ($rowq3['shirt_shouldertype']=="noshoulder") {
						$s_shouldertype_noshoulder = "selected";
					} elseif ($rowq3['shirt_shouldertype']=="vshoulder") {
						$s_shouldertype_vshoulder = "selected";
					} elseif ($rowq3['shirt_shouldertype']=="dvshoulder") {
						$s_shouldertype_dvshoulder = "selected";
					}
					
				}
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col-2">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="<?php echo chr($pair); ?>" style="width:75%" />
					</div>
					<div class="col-2">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-2">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<input tabindex="<?php echo $c; ?>03" type="text" class="form-control" name="garb_description<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-2">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col-2">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="button<?php echo $c; ?>">Button</label>
						<input tabindex="<?php echo $c; ?>08" type="text" class="form-control" name="button<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="shirt_collartype<?php echo $c; ?>">Collar Type</label>
						<select tabindex="<?php echo $c; ?>09" class="form-control" name="shirt_collartype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="rmpc" <?php echo $s_collartype_rmpc; ?>>RMPC</option>
							<option value="mrmpc" <?php echo $s_collartype_mrmpc; ?>>MRMPC</option>
							<option value="lspc" <?php echo $s_collartype_lspc; ?>>LSPC</option>
							<option value="bc" <?php echo $s_collartype_bc; ?>>BC</option>
							<option value="nocollar" <?php echo $s_collartype_nocollar; ?>>No Collar</option>
						</select>
					</div>
					<div class="col">   <label for="shirt_cuffln<?php echo $c; ?>">Cuff L</label>
						<select tabindex="<?php echo $c; ?>10" class="form-control" name="shirt_cuffln<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="0.5" <?php echo $s_cuffln_cuffa; ?>>½</option>
							<option value="1" <?php echo $s_cuffln_cuffb; ?>>1</option>
							<option value="1.5" <?php echo $s_cuffln_cuffc; ?>>1½</option>
							<option value="2" <?php echo $s_cuffln_cuffd; ?>>2</option>
							<option value="2.25" <?php echo $s_cuffln_cuffe; ?>>2¼</option>
							<option value="2.5" <?php echo $s_cuffln_cufff; ?>>2½</option>
							<option value="3" <?php echo $s_cuffln_cuffg; ?>>3</option>
						</select>
					</div>
					<div class="col">   <label for="shirt_cufftype<?php echo $c; ?>">Cuff Type</label>
						<select tabindex="<?php echo $c; ?>11" class="form-control" name="shirt_cufftype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="cut" <?php echo $s_cufftype_cut; ?>>Cut</option>
							<option value="square" <?php echo $s_cufftype_square; ?>>Square</option>
							<option value="round" <?php echo $s_cufftype_round; ?>>Round</option>
							<option value="nocuff" <?php echo $s_cufftype_nocuff; ?>>No Cuff</option>
							<option value="halfsleeve" <?php echo $s_cufftype_halfsleeve; ?>>Half Sleeve</option>
						</select>
					</div>
					<div class="col">   <label for="shirt_pockettype<?php echo $c; ?>">Pocket Type</label>
						<select tabindex="<?php echo $c; ?>12" class="form-control" name="shirt_pockettype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="nopocket" <?php echo $s_pockettype_nopocket; ?>>No Pocket</option>
							<option value="v" <?php echo $s_pockettype_v; ?>>V</option>
							<option value="square" <?php echo $s_pockettype_square; ?>>Square</option>
							<option value="round" <?php echo $s_pockettype_round; ?>>Round</option>
							<option value="flap" <?php echo $s_pockettype_flap; ?>>Flap</option>
							<option value="wallet" <?php echo $s_pockettype_wallet; ?>>Wallet</option>
						</select>
					</div>
					<div class="col">   <label for="shirt_shouldertype<?php echo $c; ?>">Shoulder Type</label>
						<select tabindex="<?php echo $c; ?>13" class="form-control" name="shirt_shouldertype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="regular" <?php echo $s_shouldertype_regular; ?>>Regular</option>
							<option value="noshoulder" <?php echo $s_shouldertype_noshoulder; ?>>No Shoulder</option>
							<option value="vshoulder" <?php echo $s_shouldertype_vshoulder; ?>>V Shoulder</option>
							<option value="dvshoulder" <?php echo $s_shouldertype_dvshoulder; ?>>DV Shoulder</option>
						</select>
					</div>
				</div>
				
			<?php }
		} break;
		
		case "kurta": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				if ($pair==122 || $pair=="") {
					$pair = 97;
				} else {
					$pair = $pair + 1;
				}
				
				$s_collartype_rmpc = $s_collartype_mrmpc = $s_collartype_lspc = $s_collartype_bc = $s_collartype_nocollar = "";
				$s_cuffln_cuffa = $s_cuffln_cuffb = $s_cuffln_cuffc = $s_cuffln_cuffd = $s_cuffln_cuffe = $s_cuffln_cufff = $s_cuffln_cuffg = "";
				$s_cufftype_cut = $s_cufftype_square = $s_cufftype_round = $s_cufftype_nocuff = $s_cufftype_halfsleeve = "";
				$s_pockettype_nopocket = $s_pockettype_v = $s_pockettype_square = $s_pockettype_round = $s_pockettype_flap = $s_pockettype_wallet = "";
				$s_shouldertype_regular = $s_shouldertype_noshoulder = $s_shouldertype_vshoulder = $s_shouldertype_dvshoulder = "";
				$s_taweeztype_v = $s_taweeztype_square = "";
				
				if ($c==1) {
					
					if ($rowq3['kurta_collartype']=="rmpc") {
						$s_collartype_rmpc = "selected";
					} elseif ($rowq3['kurta_collartype']=="mrmpc") {
						$s_collartype_mrmpc = "selected";
					} elseif ($rowq3['kurta_collartype']=="lspc") {
						$s_collartype_lspc = "selected";
					} elseif ($rowq3['kurta_collartype']=="bc") {
						$s_collartype_bc = "selected";
					} elseif ($rowq3['kurta_collartype']=="nocollar") {
						$s_collartype_nocollar = "selected";
					}
					
					if ($rowq3['kurta_cuffln']=="0.5") {
						$s_cuffln_cuffa = "selected";
					} elseif ($rowq3['kurta_cuffln']=="1") {
						$s_cuffln_cuffb = "selected";
					} elseif ($rowq3['kurta_cuffln']=="1.5") {
						$s_cuffln_cuffc = "selected";
					} elseif ($rowq3['kurta_cuffln']=="2") {
						$s_cuffln_cuffd = "selected";
					} elseif ($rowq3['kurta_cuffln']=="2.25") {
						$s_cuffln_cuffe = "selected";
					} elseif ($rowq3['kurta_cuffln']=="2.5") {
						$s_cuffln_cufff = "selected";
					} elseif ($rowq3['kurta_cuffln']=="3") {
						$s_cuffln_cuffg = "selected";
					} elseif ($rowq3['kurta_cuffln']=="0") {
						$s_cuffln_nocuff = "selected";
					}
					
					if ($rowq3['kurta_cufftype']=="cut") {
						$s_cufftype_cut = "selected";
					} elseif ($rowq3['kurta_cufftype']=="square") {
						$s_cufftype_square = "selected";
					} elseif ($rowq3['kurta_cufftype']=="round") {
						$s_cufftype_round = "selected";
					} elseif ($rowq3['kurta_cufftype']=="nocuff") {
						$s_cufftype_nocuff = "selected";
					} elseif ($rowq3['kurta_cufftype']=="halfsleeve") {
						$s_cufftype_halfsleeve = "selected";
					}
					
					if ($rowq3['kurta_pockettype']=="nopocket") {
						$s_pockettype_nopocket = "selected";
					} elseif ($rowq3['kurta_pockettype']=="v") {
						$s_pockettype_v = "selected";
					} elseif ($rowq3['kurta_pockettype']=="square") {
						$s_pockettype_square = "selected";
					} elseif ($rowq3['kurta_pockettype']=="round") {
						$s_pockettype_round = "selected";
					} elseif ($rowq3['kurta_pockettype']=="flap") {
						$s_pockettype_flap = "selected";
					} elseif ($rowq3['kurta_pockettype']=="wallet") {
						$s_pockettype_wallet = "selected";
					}
					
					if ($rowq3['kurta_shouldertype']=="regular") {
						$s_shouldertype_regular = "selected";
					} elseif ($rowq3['kurta_shouldertype']=="noshoulder") {
						$s_shouldertype_noshoulder = "selected";
					} elseif ($rowq3['kurta_shouldertype']=="vshoulder") {
						$s_shouldertype_vshoulder = "selected";
					} elseif ($rowq3['kurta_shouldertype']=="dvshoulder") {
						$s_shouldertype_dvshoulder = "selected";
					}
					
				}
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col-2">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="<?php echo chr($pair); ?>" style="width:75%" />
					</div>
					<div class="col-2">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-2">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<input tabindex="<?php echo $c; ?>03" type="text" class="form-control" name="garb_description<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-2">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col-2">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="button<?php echo $c; ?>">Button</label>
						<input tabindex="<?php echo $c; ?>08" type="text" class="form-control" name="button<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="kurta_collartype<?php echo $c; ?>">Collar Type</label>
						<select tabindex="<?php echo $c; ?>09" class="form-control" name="kurta_collartype<?php echo $c; ?>" style="width:110px">
							<option value="default">Default</option>
							<option value="rmpc" <?php echo $s_collartype_rmpc; ?>>RMPC</option>
							<option value="mrmpc" <?php echo $s_collartype_mrmpc; ?>>MRMPC</option>
							<option value="lspc" <?php echo $s_collartype_lspc; ?>>LSPC</option>
							<option value="bc" <?php echo $s_collartype_bc; ?>>BC</option>
							<option value="nocollar" <?php echo $s_collartype_nocollar; ?>>No Collar</option>
						</select>
					</div>
					<div class="col">   <label for="kurta_cuffln<?php echo $c; ?>">Cuff L</label>
						<select tabindex="<?php echo $c; ?>10" class="form-control" name="kurta_cuffln<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="0.5" <?php echo $s_cuffln_cuffa; ?>>½</option>
							<option value="1" <?php echo $s_cuffln_cuffb; ?>>1</option>
							<option value="1.5" <?php echo $s_cuffln_cuffc; ?>>1½</option>
							<option value="2" <?php echo $s_cuffln_cuffd; ?>>2</option>
							<option value="2.25" <?php echo $s_cuffln_cuffe; ?>>2¼</option>
							<option value="2.5" <?php echo $s_cuffln_cufff; ?>>2½</option>
							<option value="3" <?php echo $s_cuffln_cuffg; ?>>3</option>
						</select>
					</div>
					<div class="col">   <label for="kurta_cufftype<?php echo $c; ?>">Cuff Type</label>
						<select tabindex="<?php echo $c; ?>11" class="form-control" name="kurta_cufftype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="cut" <?php echo $s_cufftype_cut; ?>>Cut</option>
							<option value="square" <?php echo $s_cufftype_square; ?>>Square</option>
							<option value="round" <?php echo $s_cufftype_round; ?>>Round</option>
							<option value="nocuff" <?php echo $s_cufftype_nocuff; ?>>No Cuff</option>
							<option value="halfsleeve" <?php echo $s_cufftype_halfsleeve; ?>>Half Sleeve</option>
						</select>
					</div>
					<div class="col">   <label for="kurta_pockettype<?php echo $c; ?>">Pocket Type</label>
						<select tabindex="<?php echo $c; ?>12" class="form-control" name="kurta_pockettype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="nopocket" <?php echo $s_pockettype_nopocket; ?>>No Pocket</option>
							<option value="v" <?php echo $s_pockettype_v; ?>>V</option>
							<option value="square" <?php echo $s_pockettype_square; ?>>Square</option>
							<option value="round" <?php echo $s_pockettype_round; ?>>Round</option>
							<option value="flap" <?php echo $s_pockettype_flap; ?>>Flap</option>
							<option value="wallet" <?php echo $s_pockettype_wallet; ?>>Wallet</option>
						</select>
					</div>
					<div class="col">   <label for="kurta_shouldertype<?php echo $c; ?>">Shoulder Type</label>
						<select tabindex="<?php echo $c; ?>13" class="form-control" name="kurta_shouldertype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="regular" <?php echo $s_shouldertype_regular; ?>>Regular</option>
							<option value="noshoulder" <?php echo $s_shouldertype_noshoulder; ?>>No Shoulder</option>
							<option value="vshoulder" <?php echo $s_shouldertype_vshoulder; ?>>V Shoulder</option>
							<option value="dvshoulder" <?php echo $s_shouldertype_dvshoulder; ?>>DV Shoulder</option>
						</select>
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="kurta_taweeztype<?php echo $c; ?>">Taweez Type</label>
						<select tabindex="<?php echo $c; ?>14" class="form-control" name="kurta_taweeztype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="v" <?php echo $s_taweeztype_v; ?>>v</option>
							<option value="square" <?php echo $s_taweeztype_square; ?>>Square</option>
						</select>
					</div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
				</div>
				
				<br/><hr/>
			<?php }
		} break;
		
		case "pathani": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				if ($pair==122 || $pair=="") {
					$pair = 97;
				} else {
					$pair = $pair + 1;
				}
				
				$s_collartype_rmpc = $s_collartype_mrmpc = $s_collartype_lspc = $s_collartype_bc = $s_collartype_nocollar = "";
				$s_cuffln_cuffa = $s_cuffln_cuffb = $s_cuffln_cuffc = $s_cuffln_cuffd = $s_cuffln_cuffe = $s_cuffln_cufff = $s_cuffln_cuffg = "";
				$s_cufftype_cut = $s_cufftype_square = $s_cufftype_round = $s_cufftype_nocuff = $s_cufftype_halfsleeve = "";
				$s_pockettype_nopocket = $s_pockettype_v = $s_pockettype_square = $s_pockettype_round = $s_pockettype_flap = $s_pockettype_wallet = "";
				$s_shouldertype_regular = $s_shouldertype_noshoulder = $s_shouldertype_vshoulder = $s_shouldertype_dvshoulder = "";
				$s_taweeztype_v = $s_taweeztype_square = "";
				
				if ($c==1) {
					
					if ($rowq3['pathani_collartype']=="rmpc") {
						$s_collartype_rmpc = "selected";
					} elseif ($rowq3['pathani_collartype']=="mrmpc") {
						$s_collartype_mrmpc = "selected";
					} elseif ($rowq3['pathani_collartype']=="lspc") {
						$s_collartype_lspc = "selected";
					} elseif ($rowq3['pathani_collartype']=="bc") {
						$s_collartype_bc = "selected";
					} elseif ($rowq3['pathani_collartype']=="nocollar") {
						$s_collartype_nocollar = "selected";
					}
					
					if ($rowq3['pathani_cuffln']=="0.5") {
						$s_cuffln_cuffa = "selected";
					} elseif ($rowq3['pathani_cuffln']=="1") {
						$s_cuffln_cuffb = "selected";
					} elseif ($rowq3['pathani_cuffln']=="1.5") {
						$s_cuffln_cuffc = "selected";
					} elseif ($rowq3['pathani_cuffln']=="2") {
						$s_cuffln_cuffd = "selected";
					} elseif ($rowq3['pathani_cuffln']=="2.25") {
						$s_cuffln_cuffe = "selected";
					} elseif ($rowq3['pathani_cuffln']=="2.5") {
						$s_cuffln_cufff = "selected";
					} elseif ($rowq3['pathani_cuffln']=="3") {
						$s_cuffln_cuffg = "selected";
					} elseif ($rowq3['pathani_cuffln']=="0") {
						$s_cuffln_nocuff = "selected";
					}
					
					if ($rowq3['pathani_cufftype']=="cut") {
						$s_cufftype_cut = "selected";
					} elseif ($rowq3['pathani_cufftype']=="square") {
						$s_cufftype_square = "selected";
					} elseif ($rowq3['pathani_cufftype']=="round") {
						$s_cufftype_round = "selected";
					} elseif ($rowq3['pathani_cufftype']=="nocuff") {
						$s_cufftype_nocuff = "selected";
					} elseif ($rowq3['pathani_cufftype']=="halfsleeve") {
						$s_cufftype_halfsleeve = "selected";
					}
					
					if ($rowq3['pathani_pockettype']=="nopocket") {
						$s_pockettype_nopocket = "selected";
					} elseif ($rowq3['pathani_pockettype']=="v") {
						$s_pockettype_v = "selected";
					} elseif ($rowq3['pathani_pockettype']=="square") {
						$s_pockettype_square = "selected";
					} elseif ($rowq3['pathani_pockettype']=="round") {
						$s_pockettype_round = "selected";
					} elseif ($rowq3['pathani_pockettype']=="flap") {
						$s_pockettype_flap = "selected";
					} elseif ($rowq3['pathani_pockettype']=="wallet") {
						$s_pockettype_wallet = "selected";
					}
					
					if ($rowq3['pathani_shouldertype']=="regular") {
						$s_shouldertype_regular = "selected";
					} elseif ($rowq3['pathani_shouldertype']=="noshoulder") {
						$s_shouldertype_noshoulder = "selected";
					} elseif ($rowq3['pathani_shouldertype']=="vshoulder") {
						$s_shouldertype_vshoulder = "selected";
					} elseif ($rowq3['pathani_shouldertype']=="dvshoulder") {
						$s_shouldertype_dvshoulder = "selected";
					}
					
				}
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="<?php echo chr($pair); ?>" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<input tabindex="<?php echo $c; ?>03" type="text" class="form-control" name="garb_description<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="button<?php echo $c; ?>">Button</label>
						<input tabindex="<?php echo $c; ?>08" type="text" class="form-control" name="button<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="pathani_collartype<?php echo $c; ?>">Collar Type</label>
						<select tabindex="<?php echo $c; ?>09" class="form-control" name="pathani_collartype<?php echo $c; ?>" style="width:110px">
							<option value="default">Default</option>
							<option value="rmpc" <?php echo $s_collartype_rmpc; ?>>RMPC</option>
							<option value="mrmpc" <?php echo $s_collartype_mrmpc; ?>>MRMPC</option>
							<option value="lspc" <?php echo $s_collartype_lspc; ?>>LSPC</option>
							<option value="bc" <?php echo $s_collartype_bc; ?>>BC</option>
							<option value="nocollar" <?php echo $s_collartype_nocollar; ?>>No Collar</option>
						</select>
					</div>
					<div class="col">   <label for="pathani_cuffln<?php echo $c; ?>">Cuff L</label>
						<select tabindex="<?php echo $c; ?>10" class="form-control" name="pathani_cuffln<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="0.5" <?php echo $s_cuffln_cuffa; ?>>½</option>
							<option value="1" <?php echo $s_cuffln_cuffb; ?>>1</option>
							<option value="1.5" <?php echo $s_cuffln_cuffc; ?>>1½</option>
							<option value="2" <?php echo $s_cuffln_cuffd; ?>>2</option>
							<option value="2.25" <?php echo $s_cuffln_cuffe; ?>>2¼</option>
							<option value="2.5" <?php echo $s_cuffln_cufff; ?>>2½</option>
							<option value="3" <?php echo $s_cuffln_cuffg; ?>>3</option>
						</select>
					</div>
					<div class="col">   <label for="pathani_cufftype<?php echo $c; ?>">Cuff Type</label>
						<select tabindex="<?php echo $c; ?>11" class="form-control" name="pathani_cufftype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="cut" <?php echo $s_cufftype_cut; ?>>Cut</option>
							<option value="square" <?php echo $s_cufftype_square; ?>>Square</option>
							<option value="round" <?php echo $s_cufftype_round; ?>>Round</option>
							<option value="nocuff" <?php echo $s_cufftype_nocuff; ?>>No Cuff</option>
							<option value="halfsleeve" <?php echo $s_cufftype_halfsleeve; ?>>Half Sleeve</option>
						</select>
					</div>
					<div class="col">   <label for="pathani_pockettype<?php echo $c; ?>">Pocket Type</label>
						<select tabindex="<?php echo $c; ?>12" class="form-control" name="pathani_pockettype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="nopocket" <?php echo $s_pockettype_nopocket; ?>>No Pocket</option>
							<option value="v" <?php echo $s_pockettype_v; ?>>V</option>
							<option value="square" <?php echo $s_pockettype_square; ?>>Square</option>
							<option value="round" <?php echo $s_pockettype_round; ?>>Round</option>
							<option value="flap" <?php echo $s_pockettype_flap; ?>>Flap</option>
							<option value="wallet" <?php echo $s_pockettype_wallet; ?>>Wallet</option>
						</select>
					</div>
					<div class="col">   <label for="pathani_shouldertype<?php echo $c; ?>">Shoulder Type</label>
						<select tabindex="<?php echo $c; ?>13" class="form-control" name="pathani_shouldertype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="regular" <?php echo $s_shouldertype_regular; ?>>Regular</option>
							<option value="noshoulder" <?php echo $s_shouldertype_noshoulder; ?>>No Shoulder</option>
							<option value="vshoulder" <?php echo $s_shouldertype_vshoulder; ?>>V Shoulder</option>
							<option value="dvshoulder" <?php echo $s_shouldertype_dvshoulder; ?>>DV Shoulder</option>
						</select>
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pathani_taweeztype<?php echo $c; ?>">Taweez Type</label>
						<select tabindex="<?php echo $c; ?>14" class="form-control" name="pathani_taweeztype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="v" <?php echo $s_taweeztype_v; ?>>v</option>
							<option value="square" <?php echo $s_taweeztype_square; ?>>Square</option>
						</select>
					</div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
				</div>
				
				<br/><hr/>
			<?php }
		} break;
		
		case "kandura": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				if ($pair==122 || $pair=="") {
					$pair = 97;
				} else {
					$pair = $pair + 1;
				}
				
				$s_collartype_rmpc = $s_collartype_mrmpc = $s_collartype_lspc = $s_collartype_bc = $s_collartype_nocollar = "";
				$s_cuffln_cuffa = $s_cuffln_cuffb = $s_cuffln_cuffc = $s_cuffln_cuffd = $s_cuffln_cuffe = $s_cuffln_cufff = $s_cuffln_cuffg = "";
				$s_cufftype_cut = $s_cufftype_square = $s_cufftype_round = $s_cufftype_nocuff = $s_cufftype_halfsleeve = "";
				$s_pockettype_nopocket = $s_pockettype_v = $s_pockettype_square = $s_pockettype_round = $s_pockettype_flap = $s_pockettype_wallet = "";
				$s_shouldertype_regular = $s_shouldertype_noshoulder = $s_shouldertype_vshoulder = $s_shouldertype_dvshoulder = "";
				$s_taweeztype_v = $s_taweeztype_square = "";
				
				if ($c==1) {
					
					if ($rowq3['kandura_collartype']=="rmpc") {
						$s_collartype_rmpc = "selected";
					} elseif ($rowq3['kandura_collartype']=="mrmpc") {
						$s_collartype_mrmpc = "selected";
					} elseif ($rowq3['kandura_collartype']=="lspc") {
						$s_collartype_lspc = "selected";
					} elseif ($rowq3['kandura_collartype']=="bc") {
						$s_collartype_bc = "selected";
					} elseif ($rowq3['kandura_collartype']=="nocollar") {
						$s_collartype_nocollar = "selected";
					}
					
					if ($rowq3['kandura_cuffln']=="0.5") {
						$s_cuffln_cuffa = "selected";
					} elseif ($rowq3['kandura_cuffln']=="1") {
						$s_cuffln_cuffb = "selected";
					} elseif ($rowq3['kandura_cuffln']=="1.5") {
						$s_cuffln_cuffc = "selected";
					} elseif ($rowq3['kandura_cuffln']=="2") {
						$s_cuffln_cuffd = "selected";
					} elseif ($rowq3['kandura_cuffln']=="2.25") {
						$s_cuffln_cuffe = "selected";
					} elseif ($rowq3['kandura_cuffln']=="2.5") {
						$s_cuffln_cufff = "selected";
					} elseif ($rowq3['kandura_cuffln']=="3") {
						$s_cuffln_cuffg = "selected";
					} elseif ($rowq3['kandura_cuffln']=="0") {
						$s_cuffln_nocuff = "selected";
					}
					
					if ($rowq3['kandura_cufftype']=="cut") {
						$s_cufftype_cut = "selected";
					} elseif ($rowq3['kandura_cufftype']=="square") {
						$s_cufftype_square = "selected";
					} elseif ($rowq3['kandura_cufftype']=="round") {
						$s_cufftype_round = "selected";
					} elseif ($rowq3['kandura_cufftype']=="nocuff") {
						$s_cufftype_nocuff = "selected";
					} elseif ($rowq3['kandura_cufftype']=="halfsleeve") {
						$s_cufftype_halfsleeve = "selected";
					}
					
					if ($rowq3['kandura_pockettype']=="nopocket") {
						$s_pockettype_nopocket = "selected";
					} elseif ($rowq3['kandura_pockettype']=="v") {
						$s_pockettype_v = "selected";
					} elseif ($rowq3['kandura_pockettype']=="square") {
						$s_pockettype_square = "selected";
					} elseif ($rowq3['kandura_pockettype']=="round") {
						$s_pockettype_round = "selected";
					} elseif ($rowq3['kandura_pockettype']=="flap") {
						$s_pockettype_flap = "selected";
					} elseif ($rowq3['kandura_pockettype']=="wallet") {
						$s_pockettype_wallet = "selected";
					}
					
					if ($rowq3['kandura_shouldertype']=="regular") {
						$s_shouldertype_regular = "selected";
					} elseif ($rowq3['kandura_shouldertype']=="noshoulder") {
						$s_shouldertype_noshoulder = "selected";
					} elseif ($rowq3['kandura_shouldertype']=="vshoulder") {
						$s_shouldertype_vshoulder = "selected";
					} elseif ($rowq3['kandura_shouldertype']=="dvshoulder") {
						$s_shouldertype_dvshoulder = "selected";
					}
					
				}
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="<?php echo chr($pair); ?>" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<input tabindex="<?php echo $c; ?>03" type="text" class="form-control" name="garb_description<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="button<?php echo $c; ?>">Button</label>
						<input tabindex="<?php echo $c; ?>08" type="text" class="form-control" name="button<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="kandura_collartype<?php echo $c; ?>">Collar Type</label>
						<select tabindex="<?php echo $c; ?>09" class="form-control" name="kandura_collartype<?php echo $c; ?>" style="width:110px">
							<option value="default">Default</option>
							<option value="rmpc" <?php echo $s_collartype_rmpc; ?>>RMPC</option>
							<option value="mrmpc" <?php echo $s_collartype_mrmpc; ?>>MRMPC</option>
							<option value="lspc" <?php echo $s_collartype_lspc; ?>>LSPC</option>
							<option value="bc" <?php echo $s_collartype_bc; ?>>BC</option>
							<option value="nocollar" <?php echo $s_collartype_nocollar; ?>>No Collar</option>
						</select>
					</div>
					<div class="col">   <label for="kandura_cuffln<?php echo $c; ?>">Cuff L</label>
						<select tabindex="<?php echo $c; ?>10" class="form-control" name="kandura_cuffln<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="0.5" <?php echo $s_cuffln_cuffa; ?>>½</option>
							<option value="1" <?php echo $s_cuffln_cuffb; ?>>1</option>
							<option value="1.5" <?php echo $s_cuffln_cuffc; ?>>1½</option>
							<option value="2" <?php echo $s_cuffln_cuffd; ?>>2</option>
							<option value="2.25" <?php echo $s_cuffln_cuffe; ?>>2¼</option>
							<option value="2.5" <?php echo $s_cuffln_cufff; ?>>2½</option>
							<option value="3" <?php echo $s_cuffln_cuffg; ?>>3</option>
						</select>
					</div>
					<div class="col">   <label for="kandura_cufftype<?php echo $c; ?>">Cuff Type</label>
						<select tabindex="<?php echo $c; ?>11" class="form-control" name="kandura_cufftype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="cut" <?php echo $s_cufftype_cut; ?>>Cut</option>
							<option value="square" <?php echo $s_cufftype_square; ?>>Square</option>
							<option value="round" <?php echo $s_cufftype_round; ?>>Round</option>
							<option value="nocuff" <?php echo $s_cufftype_nocuff; ?>>No Cuff</option>
							<option value="halfsleeve" <?php echo $s_cufftype_halfsleeve; ?>>Half Sleeve</option>
						</select>
					</div>
					<div class="col">   <label for="kandura_pockettype<?php echo $c; ?>">Pocket Type</label>
						<select tabindex="<?php echo $c; ?>12" class="form-control" name="kandura_pockettype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="nopocket" <?php echo $s_pockettype_nopocket; ?>>No Pocket</option>
							<option value="v" <?php echo $s_pockettype_v; ?>>V</option>
							<option value="square" <?php echo $s_pockettype_square; ?>>Square</option>
							<option value="round" <?php echo $s_pockettype_round; ?>>Round</option>
							<option value="flap" <?php echo $s_pockettype_flap; ?>>Flap</option>
							<option value="wallet" <?php echo $s_pockettype_wallet; ?>>Wallet</option>
						</select>
					</div>
					<div class="col">   <label for="kandura_shouldertype<?php echo $c; ?>">Shoulder Type</label>
						<select tabindex="<?php echo $c; ?>13" class="form-control" name="kandura_shouldertype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="regular" <?php echo $s_shouldertype_regular; ?>>Regular</option>
							<option value="noshoulder" <?php echo $s_shouldertype_noshoulder; ?>>No Shoulder</option>
							<option value="vshoulder" <?php echo $s_shouldertype_vshoulder; ?>>V Shoulder</option>
							<option value="dvshoulder" <?php echo $s_shouldertype_dvshoulder; ?>>DV Shoulder</option>
						</select>
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="kandura_taweeztype<?php echo $c; ?>">Taweez Type</label>
						<select tabindex="<?php echo $c; ?>14" class="form-control" name="kandura_taweeztype<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="v" <?php echo $s_taweeztype_v; ?>>v</option>
							<option value="square" <?php echo $s_taweeztype_square; ?>>Square</option>
						</select>
					</div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
				</div>
				
				<br/><hr/>
			<?php }
		} break;
		
		case "pant": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				$s_crease_fc = $s_crease_sc = "";
				
				if ($c==1) {
					
					if ($rowq3['pant_crease']=="fc") {
						$s_crease_fc = "selected";
					} elseif ($rowq3['pant_crease']=="sc") {
						$s_crease_sc = "selected";
					}
					
				}
				
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col-2">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-2">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-2">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<textarea tabindex="<?php echo $c; ?>03" class="form-control" rows="1" id="garb_description" style="width:75%"></textarea>
					</div>
					<div class="col-2">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col-2">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pant_crease<?php echo $c; ?>">Crease</label>
						<select tabindex="<?php echo $c; ?>08" class="form-control" name="pant_crease<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="fc" <?php echo $s_crease_fc; ?>>FC</option>
							<option value="sc" <?php echo $s_crease_sc; ?>>SC</option>
						</select>
					</div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
				</div>
				
				<br/><hr/>
			<?php }
			
		} break;
		
		case "bpyjama": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				$s_crease_fc = $s_crease_sc = "";
				
				if ($c==1) {
					
					if ($rowq3['bpyjama_crease']=="fc") {
						$s_crease_fc = "selected";
					} elseif ($rowq3['bpyjama_crease']=="sc") {
						$s_crease_sc = "selected";
					}
					
				}
				
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<textarea tabindex="<?php echo $c; ?>03" class="form-control" rows="1" id="garb_description" style="width:75%"></textarea>
					</div>
					<div class="col">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="bpyjama_crease<?php echo $c; ?>">Crease</label>
						<select tabindex="<?php echo $c; ?>08" class="form-control" name="bpyjama_crease<?php echo $c; ?>" style="width:75%">
							<option value="default">Default</option>
							<option value="fc" <?php echo $s_crease_fc; ?>>FC</option>
							<option value="sc" <?php echo $s_crease_sc; ?>>SC</option>
						</select>
					</div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
				</div>
				<br/><hr/>
			<?php }
			
		} break;
		
		case "pyjama": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				if ($c==1) {
					
				}
				
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<textarea tabindex="<?php echo $c; ?>03" class="form-control" rows="1" id="garb_description" style="width:75%"></textarea>
					</div>
					<div class="col">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				
				<br/><hr/>
			<?php }
			
		} break;
		
		case "salwar": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				if ($c==1) {
				
				}
				
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<textarea tabindex="<?php echo $c; ?>03" class="form-control" rows="1" id="garb_description" style="width:75%"></textarea>
					</div>
					<div class="col">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				
				<br/><hr/>
			<?php }
			
		} break;
		
		case "aligard": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				if ($c==1) {
				
				}
				
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<textarea tabindex="<?php echo $c; ?>03" class="form-control" rows="1" id="garb_description" style="width:75%"></textarea>
					</div>
					<div class="col">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				
				<br/><hr/>
			<?php }
			
		} break;
		
		case "churidar": {
			
			for ($c = 1; $c <= $count; $c++) {
				
				if ($c==1) {
				
				}
				
				?>
				
				<div class="row p-3 no-gutters">
					<div class="col">   <label for="pairing<?php echo $c; ?>">Pairing</label>
						<input tabindex="<?php echo $c; ?>01" type="text" class="form-control" name="pairing<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_color<?php echo $c; ?>">Color</label>
						<input tabindex="<?php echo $c; ?>02" type="text" class="form-control" name="garb_color<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col">   <label for="garb_description<?php echo $c; ?>">Descripton</label>
						<textarea tabindex="<?php echo $c; ?>03" class="form-control" rows="1" id="garb_description" style="width:75%"></textarea>
					</div>
					<div class="col">   <label for="pana<?php echo $c; ?>">Pana</label>
						<input tabindex="<?php echo $c; ?>04" type="text" class="form-control" name="pana<?php echo $c; ?>" value="" style="width:75%" />
					</div>
					<div class="col-1">   <label for="clothln<?php echo $c; ?>">Cloth L</label>
						<input tabindex="<?php echo $c; ?>05" type="text" class="form-control" name="clothln<?php echo $c; ?>" value="" />
					</div>
					<div class="col-1">   <label for="clothfd<?php echo $c; ?>">x</label>
						<input tabindex="<?php echo $c; ?>06" type="text" class="form-control" name="clothfd<?php echo $c; ?>" value="" style="width:48%" />
					</div>
					<div class="col">   <label for="garb_submit_date<?php echo $c; ?>">Submit Date</label>
						<input tabindex="<?php echo $c; ?>07" type="text" class="form-control" name="garb_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:75%" />
					</div>
				</div>
				
				<br/><hr/>
			<?php }
			
		} break;
		
	} ?>
	
	</div>
	</form>
</div>

</body>
</html>