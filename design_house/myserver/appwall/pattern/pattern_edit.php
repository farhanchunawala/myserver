<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 7 -->
<head>
	<?php
		$garb_id=$_GET['garb_id'];
		//$type = $_GET['type'];
		//$count = $_GET['count'];
	?>
	<title><?php echo "$garb_id Edit"?></title>
	<?php include 'plugs_n_libs/bootstrapcdn.php'; ?>
</head>
<body>
<style>
th {
	padding: 5px;
	background-color: lightgrey;
	position: -webkit-sticky;
	position: sticky;
	top: 0;
	white-space: nowrap;
}
td { 
	white-space: nowrap;
}
</style>

<?php
	$svr_mode = $_GET['svr_mode'];
	include 'sub/sub_svr_mode.php';
	
	{ $dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, 'kkmenswear') or die('Error connecting to MySQL server.');
	
	
	/*$query2 = "SELECT * FROM `measurement` WHERE sr=$sr";
	
	$result2 = mysqli_query($dbc, $query2)
		or die('Error querying database query2.');
	
	$rowq2 = mysqli_fetch_array($result2);*/
	
	
	$query3 = "SELECT * FROM $patterntable WHERE pattern_id=$garb_id";
	
	$result3 = mysqli_query($dbc, $query3) or die('Error querying database query3.');
	
	$rowq3 = mysqli_fetch_array($result3);
	
	
	$query4 = "SELECT * FROM $entrytable WHERE garb_id=$garb_id;";
	
	$result4 = mysqli_query($dbc, $query4) or die('Error querying database query4.');
	
	$rowq4 = mysqli_fetch_array($result4);
	
	
	mysqli_close($dbc);
	}
	
	$pair = ord($rowq4['garb_pairing']);
	$type = $rowq4['garb_type'];
	
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
<div class="container-fluid">
	<form class="form-inline" method="post" action="pattern_save.php?sr=<?php echo $sr; ?>&shirtc=<?php echo $shirt_count; ?>&kurtac=<?php echo $kurta_count; ?>&pathanic=<?php echo $pathani_count; ?>&kandurac=<?php echo $kandura_count; ?>&pantc=<?php echo $pant_count; ?>&bpyjamac=<?php echo $bpyjama_count; ?>&pyjamac=<?php echo $pyjama_count; ?>&salwarc=<?php echo $salwar_count; ?>&aligardc=<?php echo $aligard_count; ?>&churidarc=<?php echo $churidar_count; ?>">
	<div class="form-group">
	<div class="d-flex flex-nowrap bg-light">
	
	<?php switch ($type) {
		
		case "shirt": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Shirt x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="shirt_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="shirt_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="shirt_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="shirt_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="shirt_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="shirt_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="shirt_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Collar Type</td>
					<?php
						$sshirt_collartype_rmpc = $sshirt_collartype_mrmpc = $sshirt_collartype_lspc = $sshirt_collartype_bc = $sshirt_collartype_nocollar = "";
						if ($rowq3['shirt_collartype']=="rmpc") {
							$sshirt_collartype_rmpc = "selected";
						} elseif ($rowq3['shirt_collartype']=="mrmpc") {
							$sshirt_collartype_mrmpc = "selected";
						} elseif ($rowq3['shirt_collartype']=="lspc") {
							$sshirt_collartype_lspc = "selected";
						} elseif ($rowq3['shirt_collartype']=="bc") {
							$sshirt_collartype_bc = "selected";
						} elseif ($rowq3['shirt_collartype']=="nocollar") {
							$sshirt_collartype_nocollar = "selected";
						}
					?>
					<td>
						<select tabindex="126" class="form-control" name="shirt_collartype" style="width:120px">
							<option value="default">Default</option>
							<option value="rmpc" <?php echo $sshirt_collartype_rmpc; ?>>RMPC</option>
							<option value="mrmpc" <?php echo $sshirt_collartype_mrmpc; ?>>MRMPC</option>
							<option value="lspc" <?php echo $sshirt_collartype_lspc; ?>>LSPC</option>
							<option value="bc" <?php echo $sshirt_collartype_bc; ?>>BC</option>
							<option value="nocollar" <?php echo $sshirt_collartype_nocollar; ?>>No Collar</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Cuff L</td>
					<?php
						$sshirt_cuffln_a = $sshirt_cuffln_b = $sshirt_cuffln_c = $sshirt_cuffln_d = $sshirt_cuffln_e = $sshirt_cuffln_f = $sshirt_cuffln_g = "";
						if ($rowq3['shirt_cuffln']=="0.5") {
							$sshirt_cuffln_a = "selected";
						} elseif ($rowq3['shirt_cuffln']=="1") {
							$sshirt_cuffln_b = "selected";
						} elseif ($rowq3['shirt_cuffln']=="1.5") {
							$sshirt_cuffln_c = "selected";
						} elseif ($rowq3['shirt_cuffln']=="2") {
							$sshirt_cuffln_d = "selected";
						} elseif ($rowq3['shirt_cuffln']=="2.25") {
							$sshirt_cuffln_e = "selected";
						} elseif ($rowq3['shirt_cuffln']=="2.5") {
							$sshirt_cuffln_f = "selected";
						} elseif ($rowq3['shirt_cuffln']=="3") {
							$sshirt_cuffln_g = "selected";
						}
					?>
					<td>
						<select tabindex="127" class="form-control" name="shirt_cuffln1" style="width:120px">
							<option value="default">Default</option>
							<option value="0.5" <?php echo $sshirt_cuffln_a; ?>>½</option>
							<option value="1" <?php echo $sshirt_cuffln_b; ?>>1</option>
							<option value="1.5" <?php echo $sshirt_cuffln_c; ?>>1½</option>
							<option value="2" <?php echo $sshirt_cuffln_d; ?>>2</option>
							<option value="2.25" <?php echo $sshirt_cuffln_e; ?>>2¼</option>
							<option value="2.5" <?php echo $sshirt_cuffln_f; ?>>2½</option>
							<option value="3" <?php echo $sshirt_cuffln_g; ?>>3</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Cuff Type</td>
					<?php
						$sshirt_cufftype_cut = $sshirt_cufftype_square = $sshirt_cufftype_round = $sshirt_cufftype_nocuff = $sshirt_cufftype_halfsleeve = "";
						if ($rowq3['shirt_cufftype']=="cut") {
							$sshirt_cufftype_cut = "selected";
						} elseif ($rowq3['shirt_cufftype']=="square") {
							$sshirt_cufftype_square = "selected";
						} elseif ($rowq3['shirt_cufftype']=="round") {
							$sshirt_cufftype_round = "selected";
						} elseif ($rowq3['shirt_cufftype']=="nocuff") {
							$sshirt_cufftype_nocuff = "selected";
						} elseif ($rowq3['shirt_cufftype']=="halfsleeve") {
							$sshirt_cufftype_halfsleeve = "selected";
						}
					?>
					<td>
						<select tabindex="128" class="form-control" name="shirt_cufftype1" style="width:120px">
							<option value="default">Default</option>
							<option value="cut" <?php echo $sshirt_cufftype_cut; ?>>Cut</option>
							<option value="square" <?php echo $sshirt_cufftype_square; ?>>Square</option>
							<option value="round" <?php echo $sshirt_cufftype_round; ?>>Round</option>
							<option value="nocuff" <?php echo $sshirt_cufftype_nocuff; ?>>No Cuff</option>
							<option value="halfsleeve" <?php echo $sshirt_cufftype_halfsleeve; ?>>Half Sleeve</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Pocket Type</td>
					<?php
						$sshirt_pockettype_nopocket = $sshirt_pockettype_v = $sshirt_pockettype_square = $sshirt_pockettype_round = $sshirt_pockettype_flap = $sshirt_pockettype_wallet = "";
						if ($rowq3['shirt_pockettype']=="nopocket") {
							$sshirt_pockettype_nopocket = "selected";
						} elseif ($rowq3['shirt_pockettype']=="v") {
							$sshirt_pockettype_v = "selected";
						} elseif ($rowq3['shirt_pockettype']=="square") {
							$sshirt_pockettype_square = "selected";
						} elseif ($rowq3['shirt_pockettype']=="round") {
							$sshirt_pockettype_round = "selected";
						} elseif ($rowq3['shirt_pockettype']=="flap") {
							$sshirt_pockettype_flap = "selected";
						} elseif ($rowq3['shirt_pockettype']=="wallet") {
							$sshirt_pockettype_wallet = "selected";
						}
					?>
					<td>
						<select tabindex="129" class="form-control" name="shirt_pockettype1" style="width:120px">
							<option value="default">Default</option>
							<option value="nopocket" <?php echo $sshirt_pockettype_nopocket; ?>>No Pocket</option>
							<option value="v" <?php echo $sshirt_pockettype_v; ?>>V</option>
							<option value="square" <?php echo $sshirt_pockettype_square; ?>>Square</option>
							<option value="round" <?php echo $sshirt_pockettype_round; ?>>Round</option>
							<option value="flap" <?php echo $sshirt_pockettype_flap; ?>>Flap</option>
							<option value="wallet" <?php echo $sshirt_pockettype_wallet; ?>>Wallet</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Shoulder Type</td>
					<?php
						$sshirt_shouldertype_regular = $sshirt_shouldertype_noshoulder = $sshirt_shouldertype_vshoulder = $sshirt_shouldertype_dvshoulder = "";
						if ($rowq3['shirt_shouldertype']=="regular") {
							$sshirt_shouldertype_regular = "selected";
						} elseif ($rowq3['shirt_shouldertype']=="noshoulder") {
							$sshirt_shouldertype_noshoulder = "selected";
						} elseif ($rowq3['shirt_shouldertype']=="vshoulder") {
							$sshirt_shouldertype_vshoulder = "selected";
						} elseif ($rowq3['shirt_shouldertype']=="dvshoulder") {
							$sshirt_shouldertype_dvshoulder = "selected";
						}
					?>
					<td>
						<select tabindex="130" class="form-control" name="shirt_shouldertype1" style="width:120px">
							<option value="default">Default</option>
							<option value="regular" <?php echo $sshirt_shouldertype_regular; ?>>Regular</option>
							<option value="noshoulder" <?php echo $sshirt_shouldertype_noshoulder; ?>>No Shoulder</option>
							<option value="vshoulder" <?php echo $sshirt_shouldertype_vshoulder; ?>>V Shoulder</option>
							<option value="dvshoulder" <?php echo $sshirt_shouldertype_dvshoulder; ?>>DV Shoulder</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Button</td>
					<td>
						<input tabindex="131" type="text" class="form-control" name="shirt_button1" value="<?php echo $rowq4['garb_button']; ?>" style="width:120px" />
					</td>
				</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "pant": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Pant x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="pant_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="pant_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="pant_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="pant_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="pant_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="pant_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="pant_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Crease</td>
				<?php
					$spant_crease_fc = $spant_crease_sc = "";
					if ($rowq3['pant_crease']=="fc") {
						$spant_crease_fc = "selected";
					} elseif ($rowq3['pant_crease']=="sc") {
						$spant_crease_sc = "selected";
					}
				?>
				<td>
					<select tabindex="176" class="form-control" name="pant_crease1" style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo $spant_crease_fc; ?>>FC</option>
						<option value="noshoulder" <?php echo $spant_crease_sc; ?>>SC</option>
					</select>
				</td>
			</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "kandura": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Kandura x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="kandura_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="kandura_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="kandura_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="kandura_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="kandura_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="kandura_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="kandura_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Collar Type</td>
					<?php
						$skandura_collartype_rmpc = $skandura_collartype_mrmpc = $skandura_collartype_lspc = $skandura_collartype_bc = $skandura_collartype_nocollar = "";
						if ($rowq3['kandura_collartype']=="rmpc") {
							$skandura_collartype_rmpc = "selected";
						} elseif ($rowq3['kandura_collartype']=="mrmpc") {
							$skandura_collartype_mrmpc = "selected";
						} elseif ($rowq3['kandura_collartype']=="lspc") {
							$skandura_collartype_lspc = "selected";
						} elseif ($rowq3['kandura_collartype']=="bc") {
							$skandura_collartype_bc = "selected";
						} elseif ($rowq3['kandura_collartype']=="nocollar") {
							$skandura_collartype_nocollar = "selected";
						}
					?>
					<td>
						<select tabindex="126" class="form-control" name="kandura_collartype" style="width:120px">
							<option value="default">Default</option>
							<option value="rmpc" <?php echo $skandura_collartype_rmpc; ?>>RMPC</option>
							<option value="mrmpc" <?php echo $skandura_collartype_mrmpc; ?>>MRMPC</option>
							<option value="lspc" <?php echo $skandura_collartype_lspc; ?>>LSPC</option>
							<option value="bc" <?php echo $skandura_collartype_bc; ?>>BC</option>
							<option value="nocollar" <?php echo $skandura_collartype_nocollar; ?>>No Collar</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Cuff L</td>
					<?php
						$skandura_cuffln_a = $skandura_cuffln_b = $skandura_cuffln_c = $skandura_cuffln_d = $skandura_cuffln_e = $skandura_cuffln_f = $skandura_cuffln_g = "";
						if ($rowq3['kandura_cuffln']=="0.5") {
							$skandura_cuffln_a = "selected";
						} elseif ($rowq3['kandura_cuffln']=="1") {
							$skandura_cuffln_b = "selected";
						} elseif ($rowq3['kandura_cuffln']=="1.5") {
							$skandura_cuffln_c = "selected";
						} elseif ($rowq3['kandura_cuffln']=="2") {
							$skandura_cuffln_d = "selected";
						} elseif ($rowq3['kandura_cuffln']=="2.25") {
							$skandura_cuffln_e = "selected";
						} elseif ($rowq3['kandura_cuffln']=="2.5") {
							$skandura_cuffln_f = "selected";
						} elseif ($rowq3['kandura_cuffln']=="3") {
							$skandura_cuffln_g = "selected";
						}
					?>
					<td>
						<select tabindex="127" class="form-control" name="kandura_cuffln1" style="width:120px">
							<option value="default">Default</option>
							<option value="0.5" <?php echo $skandura_cuffln_a; ?>>½</option>
							<option value="1" <?php echo $skandura_cuffln_b; ?>>1</option>
							<option value="1.5" <?php echo $skandura_cuffln_c; ?>>1½</option>
							<option value="2" <?php echo $skandura_cuffln_d; ?>>2</option>
							<option value="2.25" <?php echo $skandura_cuffln_e; ?>>2¼</option>
							<option value="2.5" <?php echo $skandura_cuffln_f; ?>>2½</option>
							<option value="3" <?php echo $skandura_cuffln_g; ?>>3</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Cuff Type</td>
					<?php
						$skandura_cufftype_cut = $skandura_cufftype_square = $skandura_cufftype_round = $skandura_cufftype_nocuff = $skandura_cufftype_halfsleeve = "";
						if ($rowq3['kandura_cufftype']=="cut") {
							$skandura_cufftype_cut = "selected";
						} elseif ($rowq3['kandura_cufftype']=="square") {
							$skandura_cufftype_square = "selected";
						} elseif ($rowq3['kandura_cufftype']=="round") {
							$skandura_cufftype_round = "selected";
						} elseif ($rowq3['kandura_cufftype']=="nocuff") {
							$skandura_cufftype_nocuff = "selected";
						} elseif ($rowq3['kandura_cufftype']=="halfsleeve") {
							$skandura_cufftype_halfsleeve = "selected";
						}
					?>
					<td>
						<select tabindex="128" class="form-control" name="kandura_cufftype1" style="width:120px">
							<option value="default">Default</option>
							<option value="cut" <?php echo $skandura_cufftype_cut; ?>>Cut</option>
							<option value="square" <?php echo $skandura_cufftype_square; ?>>Square</option>
							<option value="round" <?php echo $skandura_cufftype_round; ?>>Round</option>
							<option value="nocuff" <?php echo $skandura_cufftype_nocuff; ?>>No Cuff</option>
							<option value="halfsleeve" <?php echo $skandura_cufftype_halfsleeve; ?>>Half Sleeve</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Pocket Type</td>
					<?php
						$skandura_pockettype_nopocket = $skandura_pockettype_v = $skandura_pockettype_square = $skandura_pockettype_round = $skandura_pockettype_flap = $skandura_pockettype_wallet = "";
						if ($rowq3['kandura_pockettype']=="nopocket") {
							$skandura_pockettype_nopocket = "selected";
						} elseif ($rowq3['kandura_pockettype']=="v") {
							$skandura_pockettype_v = "selected";
						} elseif ($rowq3['kandura_pockettype']=="square") {
							$skandura_pockettype_square = "selected";
						} elseif ($rowq3['kandura_pockettype']=="round") {
							$skandura_pockettype_round = "selected";
						} elseif ($rowq3['kandura_pockettype']=="flap") {
							$skandura_pockettype_flap = "selected";
						} elseif ($rowq3['kandura_pockettype']=="wallet") {
							$skandura_pockettype_wallet = "selected";
						}
					?>
					<td>
						<select tabindex="129" class="form-control" name="kandura_pockettype1" style="width:120px">
							<option value="default">Default</option>
							<option value="nopocket" <?php echo $skandura_pockettype_nopocket; ?>>No Pocket</option>
							<option value="v" <?php echo $skandura_pockettype_v; ?>>V</option>
							<option value="square" <?php echo $skandura_pockettype_square; ?>>Square</option>
							<option value="round" <?php echo $skandura_pockettype_round; ?>>Round</option>
							<option value="flap" <?php echo $skandura_pockettype_flap; ?>>Flap</option>
							<option value="wallet" <?php echo $skandura_pockettype_wallet; ?>>Wallet</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Shoulder Type</td>
					<?php
						$skandura_shouldertype_regular = $skandura_shouldertype_noshoulder = $skandura_shouldertype_vshoulder = $skandura_shouldertype_dvshoulder = "";
						if ($rowq3['kandura_shouldertype']=="regular") {
							$skandura_shouldertype_regular = "selected";
						} elseif ($rowq3['kandura_shouldertype']=="noshoulder") {
							$skandura_shouldertype_noshoulder = "selected";
						} elseif ($rowq3['kandura_shouldertype']=="vshoulder") {
							$skandura_shouldertype_vshoulder = "selected";
						} elseif ($rowq3['kandura_shouldertype']=="dvshoulder") {
							$skandura_shouldertype_dvshoulder = "selected";
						}
					?>
					<td>
						<select tabindex="130" class="form-control" name="kandura_shouldertype1" style="width:120px">
							<option value="default">Default</option>
							<option value="regular" <?php echo $skandura_shouldertype_regular; ?>>Regular</option>
							<option value="noshoulder" <?php echo $skandura_shouldertype_noshoulder; ?>>No Shoulder</option>
							<option value="vshoulder" <?php echo $skandura_shouldertype_vshoulder; ?>>V Shoulder</option>
							<option value="dvshoulder" <?php echo $skandura_shouldertype_dvshoulder; ?>>DV Shoulder</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Taweez Type</td>
					<?php
						$skandura_taweeztype_v = $skandura_taweeztype_square = "";
						if ($rowq3['kandura_taweeztype']=="v") {
							$skandura_taweeztype_v = "selected";
						} elseif ($rowq3['kandura_taweeztype']=="square") {
							$skandura_taweeztype_square = "selected";
						}
					?>
					<td>
						<select tabindex="131" class="form-control" name="kandura_taweeztype1" style="width:120px">
							<option value="default">Default</option>
							<option value="v" <?php echo $skandura_taweeztype_v; ?>>V</option>
							<option value="square" <?php echo $skandura_taweeztype_square; ?>>Square</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Button</td>
					<td>
						<input tabindex="132" type="text" class="form-control" name="kandura_button1" value="<?php echo $rowq4['garb_button']; ?>" style="width:120px" />
					</td>
				</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "kurta": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Kurta x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="kurta_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="kurta_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="kurta_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="kurta_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="kurta_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="kurta_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="kurta_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Collar Type</td>
					<?php
						$skurta_collartype_rmpc = $skurta_collartype_mrmpc = $skurta_collartype_lspc = $skurta_collartype_bc = $skurta_collartype_nocollar = "";
						if ($rowq3['kurta_collartype']=="rmpc") {
							$skurta_collartype_rmpc = "selected";
						} elseif ($rowq3['kurta_collartype']=="mrmpc") {
							$skurta_collartype_mrmpc = "selected";
						} elseif ($rowq3['kurta_collartype']=="lspc") {
							$skurta_collartype_lspc = "selected";
						} elseif ($rowq3['kurta_collartype']=="bc") {
							$skurta_collartype_bc = "selected";
						} elseif ($rowq3['kurta_collartype']=="nocollar") {
							$skurta_collartype_nocollar = "selected";
						}
					?>
					<td>
						<select tabindex="126" class="form-control" name="kurta_collartype" style="width:120px">
							<option value="default">Default</option>
							<option value="rmpc" <?php echo $skurta_collartype_rmpc; ?>>RMPC</option>
							<option value="mrmpc" <?php echo $skurta_collartype_mrmpc; ?>>MRMPC</option>
							<option value="lspc" <?php echo $skurta_collartype_lspc; ?>>LSPC</option>
							<option value="bc" <?php echo $skurta_collartype_bc; ?>>BC</option>
							<option value="nocollar" <?php echo $skurta_collartype_nocollar; ?>>No Collar</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Cuff L</td>
					<?php
						$skurta_cuffln_a = $skurta_cuffln_b = $skurta_cuffln_c = $skurta_cuffln_d = $skurta_cuffln_e = $skurta_cuffln_f = $skurta_cuffln_g = "";
						if ($rowq3['kurta_cuffln']=="0.5") {
							$skurta_cuffln_a = "selected";
						} elseif ($rowq3['kurta_cuffln']=="1") {
							$skurta_cuffln_b = "selected";
						} elseif ($rowq3['kurta_cuffln']=="1.5") {
							$skurta_cuffln_c = "selected";
						} elseif ($rowq3['kurta_cuffln']=="2") {
							$skurta_cuffln_d = "selected";
						} elseif ($rowq3['kurta_cuffln']=="2.25") {
							$skurta_cuffln_e = "selected";
						} elseif ($rowq3['kurta_cuffln']=="2.5") {
							$skurta_cuffln_f = "selected";
						} elseif ($rowq3['kurta_cuffln']=="3") {
							$skurta_cuffln_g = "selected";
						}
					?>
					<td>
						<select tabindex="127" class="form-control" name="kurta_cuffln1" style="width:120px">
							<option value="default">Default</option>
							<option value="0.5" <?php echo $skurta_cuffln_a; ?>>½</option>
							<option value="1" <?php echo $skurta_cuffln_b; ?>>1</option>
							<option value="1.5" <?php echo $skurta_cuffln_c; ?>>1½</option>
							<option value="2" <?php echo $skurta_cuffln_d; ?>>2</option>
							<option value="2.25" <?php echo $skurta_cuffln_e; ?>>2¼</option>
							<option value="2.5" <?php echo $skurta_cuffln_f; ?>>2½</option>
							<option value="3" <?php echo $skurta_cuffln_g; ?>>3</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Cuff Type</td>
					<?php
						$skurta_cufftype_cut = $skurta_cufftype_square = $skurta_cufftype_round = $skurta_cufftype_nocuff = $skurta_cufftype_halfsleeve = "";
						if ($rowq3['kurta_cufftype']=="cut") {
							$skurta_cufftype_cut = "selected";
						} elseif ($rowq3['kurta_cufftype']=="square") {
							$skurta_cufftype_square = "selected";
						} elseif ($rowq3['kurta_cufftype']=="round") {
							$skurta_cufftype_round = "selected";
						} elseif ($rowq3['kurta_cufftype']=="nocuff") {
							$skurta_cufftype_nocuff = "selected";
						} elseif ($rowq3['kurta_cufftype']=="halfsleeve") {
							$skurta_cufftype_halfsleeve = "selected";
						}
					?>
					<td>
						<select tabindex="128" class="form-control" name="kurta_cufftype1" style="width:120px">
							<option value="default">Default</option>
							<option value="cut" <?php echo $skurta_cufftype_cut; ?>>Cut</option>
							<option value="square" <?php echo $skurta_cufftype_square; ?>>Square</option>
							<option value="round" <?php echo $skurta_cufftype_round; ?>>Round</option>
							<option value="nocuff" <?php echo $skurta_cufftype_nocuff; ?>>No Cuff</option>
							<option value="halfsleeve" <?php echo $skurta_cufftype_halfsleeve; ?>>Half Sleeve</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Pocket Type</td>
					<?php
						$skurta_pockettype_nopocket = $skurta_pockettype_v = $skurta_pockettype_square = $skurta_pockettype_round = $skurta_pockettype_flap = $skurta_pockettype_wallet = "";
						if ($rowq3['kurta_pockettype']=="nopocket") {
							$skurta_pockettype_nopocket = "selected";
						} elseif ($rowq3['kurta_pockettype']=="v") {
							$skurta_pockettype_v = "selected";
						} elseif ($rowq3['kurta_pockettype']=="square") {
							$skurta_pockettype_square = "selected";
						} elseif ($rowq3['kurta_pockettype']=="round") {
							$skurta_pockettype_round = "selected";
						} elseif ($rowq3['kurta_pockettype']=="flap") {
							$skurta_pockettype_flap = "selected";
						} elseif ($rowq3['kurta_pockettype']=="wallet") {
							$skurta_pockettype_wallet = "selected";
						}
					?>
					<td>
						<select tabindex="129" class="form-control" name="kurta_pockettype1" style="width:120px">
							<option value="default">Default</option>
							<option value="nopocket" <?php echo $skurta_pockettype_nopocket; ?>>No Pocket</option>
							<option value="v" <?php echo $skurta_pockettype_v; ?>>V</option>
							<option value="square" <?php echo $skurta_pockettype_square; ?>>Square</option>
							<option value="round" <?php echo $skurta_pockettype_round; ?>>Round</option>
							<option value="flap" <?php echo $skurta_pockettype_flap; ?>>Flap</option>
							<option value="wallet" <?php echo $skurta_pockettype_wallet; ?>>Wallet</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Shoulder Type</td>
					<?php
						$skurta_shouldertype_regular = $skurta_shouldertype_noshoulder = $skurta_shouldertype_vshoulder = $skurta_shouldertype_dvshoulder = "";
						if ($rowq3['kurta_shouldertype']=="regular") {
							$skurta_shouldertype_regular = "selected";
						} elseif ($rowq3['kurta_shouldertype']=="noshoulder") {
							$skurta_shouldertype_noshoulder = "selected";
						} elseif ($rowq3['kurta_shouldertype']=="vshoulder") {
							$skurta_shouldertype_vshoulder = "selected";
						} elseif ($rowq3['kurta_shouldertype']=="dvshoulder") {
							$skurta_shouldertype_dvshoulder = "selected";
						}
					?>
					<td>
						<select tabindex="130" class="form-control" name="kurta_shouldertype1" style="width:120px">
							<option value="default">Default</option>
							<option value="regular" <?php echo $skurta_shouldertype_regular; ?>>Regular</option>
							<option value="noshoulder" <?php echo $skurta_shouldertype_noshoulder; ?>>No Shoulder</option>
							<option value="vshoulder" <?php echo $skurta_shouldertype_vshoulder; ?>>V Shoulder</option>
							<option value="dvshoulder" <?php echo $skurta_shouldertype_dvshoulder; ?>>DV Shoulder</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Taweez Type</td>
					<?php
						$skurta_taweeztype_v = $skurta_taweeztype_square = "";
						if ($rowq3['kurta_taweeztype']=="v") {
							$skurta_taweeztype_v = "selected";
						} elseif ($rowq3['kurta_taweeztype']=="square") {
							$skurta_taweeztype_square = "selected";
						}
					?>
					<td>
						<select tabindex="131" class="form-control" name="kurta_taweeztype1" style="width:120px">
							<option value="default">Default</option>
							<option value="v" <?php echo $skurta_taweeztype_v; ?>>V</option>
							<option value="square" <?php echo $skurta_taweeztype_square; ?>>Square</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Button</td>
					<td>
						<input tabindex="132" type="text" class="form-control" name="kurta_button1" value="<?php echo $rowq4['garb_button']; ?>" style="width:120px" />
					</td>
				</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "pathani": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Pathani x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="pathani_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="pathani_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="pathani_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="pathani_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="pathani_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="pathani_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="pathani_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Collar Type</td>
					<?php
						$spathani_collartype_rmpc = $spathani_collartype_mrmpc = $spathani_collartype_lspc = $spathani_collartype_bc = $spathani_collartype_nocollar = "";
						if ($rowq3['pathani_collartype']=="rmpc") {
							$spathani_collartype_rmpc = "selected";
						} elseif ($rowq3['pathani_collartype']=="mrmpc") {
							$spathani_collartype_mrmpc = "selected";
						} elseif ($rowq3['pathani_collartype']=="lspc") {
							$spathani_collartype_lspc = "selected";
						} elseif ($rowq3['pathani_collartype']=="bc") {
							$spathani_collartype_bc = "selected";
						} elseif ($rowq3['pathani_collartype']=="nocollar") {
							$spathani_collartype_nocollar = "selected";
						}
					?>
					<td>
						<select tabindex="126" class="form-control" name="pathani_collartype" style="width:120px">
							<option value="default">Default</option>
							<option value="rmpc" <?php echo $spathani_collartype_rmpc; ?>>RMPC</option>
							<option value="mrmpc" <?php echo $spathani_collartype_mrmpc; ?>>MRMPC</option>
							<option value="lspc" <?php echo $spathani_collartype_lspc; ?>>LSPC</option>
							<option value="bc" <?php echo $spathani_collartype_bc; ?>>BC</option>
							<option value="nocollar" <?php echo $spathani_collartype_nocollar; ?>>No Collar</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Cuff L</td>
					<?php
						$spathani_cuffln_a = $spathani_cuffln_b = $spathani_cuffln_c = $spathani_cuffln_d = $spathani_cuffln_e = $spathani_cuffln_f = $spathani_cuffln_g = "";
						if ($rowq3['pathani_cuffln']=="0.5") {
							$spathani_cuffln_a = "selected";
						} elseif ($rowq3['pathani_cuffln']=="1") {
							$spathani_cuffln_b = "selected";
						} elseif ($rowq3['pathani_cuffln']=="1.5") {
							$spathani_cuffln_c = "selected";
						} elseif ($rowq3['pathani_cuffln']=="2") {
							$spathani_cuffln_d = "selected";
						} elseif ($rowq3['pathani_cuffln']=="2.25") {
							$spathani_cuffln_e = "selected";
						} elseif ($rowq3['pathani_cuffln']=="2.5") {
							$spathani_cuffln_f = "selected";
						} elseif ($rowq3['pathani_cuffln']=="3") {
							$spathani_cuffln_g = "selected";
						}
					?>
					<td>
						<select tabindex="127" class="form-control" name="pathani_cuffln1" style="width:120px">
							<option value="default">Default</option>
							<option value="0.5" <?php echo $spathani_cuffln_a; ?>>½</option>
							<option value="1" <?php echo $spathani_cuffln_b; ?>>1</option>
							<option value="1.5" <?php echo $spathani_cuffln_c; ?>>1½</option>
							<option value="2" <?php echo $spathani_cuffln_d; ?>>2</option>
							<option value="2.25" <?php echo $spathani_cuffln_e; ?>>2¼</option>
							<option value="2.5" <?php echo $spathani_cuffln_f; ?>>2½</option>
							<option value="3" <?php echo $spathani_cuffln_g; ?>>3</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Cuff Type</td>
					<?php
						$spathani_cufftype_cut = $spathani_cufftype_square = $spathani_cufftype_round = $spathani_cufftype_nocuff = $spathani_cufftype_halfsleeve = "";
						if ($rowq3['pathani_cufftype']=="cut") {
							$spathani_cufftype_cut = "selected";
						} elseif ($rowq3['pathani_cufftype']=="square") {
							$spathani_cufftype_square = "selected";
						} elseif ($rowq3['pathani_cufftype']=="round") {
							$spathani_cufftype_round = "selected";
						} elseif ($rowq3['pathani_cufftype']=="nocuff") {
							$spathani_cufftype_nocuff = "selected";
						} elseif ($rowq3['pathani_cufftype']=="halfsleeve") {
							$spathani_cufftype_halfsleeve = "selected";
						}
					?>
					<td>
						<select tabindex="128" class="form-control" name="pathani_cufftype1" style="width:120px">
							<option value="default">Default</option>
							<option value="cut" <?php echo $spathani_cufftype_cut; ?>>Cut</option>
							<option value="square" <?php echo $spathani_cufftype_square; ?>>Square</option>
							<option value="round" <?php echo $spathani_cufftype_round; ?>>Round</option>
							<option value="nocuff" <?php echo $spathani_cufftype_nocuff; ?>>No Cuff</option>
							<option value="halfsleeve" <?php echo $spathani_cufftype_halfsleeve; ?>>Half Sleeve</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Pocket Type</td>
					<?php
						$spathani_pockettype_nopocket = $spathani_pockettype_v = $spathani_pockettype_square = $spathani_pockettype_round = $spathani_pockettype_flap = $spathani_pockettype_wallet = "";
						if ($rowq3['pathani_pockettype']=="nopocket") {
							$spathani_pockettype_nopocket = "selected";
						} elseif ($rowq3['pathani_pockettype']=="v") {
							$spathani_pockettype_v = "selected";
						} elseif ($rowq3['pathani_pockettype']=="square") {
							$spathani_pockettype_square = "selected";
						} elseif ($rowq3['pathani_pockettype']=="round") {
							$spathani_pockettype_round = "selected";
						} elseif ($rowq3['pathani_pockettype']=="flap") {
							$spathani_pockettype_flap = "selected";
						} elseif ($rowq3['pathani_pockettype']=="wallet") {
							$spathani_pockettype_wallet = "selected";
						}
					?>
					<td>
						<select tabindex="129" class="form-control" name="pathani_pockettype1" style="width:120px">
							<option value="default">Default</option>
							<option value="nopocket" <?php echo $spathani_pockettype_nopocket; ?>>No Pocket</option>
							<option value="v" <?php echo $spathani_pockettype_v; ?>>V</option>
							<option value="square" <?php echo $spathani_pockettype_square; ?>>Square</option>
							<option value="round" <?php echo $spathani_pockettype_round; ?>>Round</option>
							<option value="flap" <?php echo $spathani_pockettype_flap; ?>>Flap</option>
							<option value="wallet" <?php echo $spathani_pockettype_wallet; ?>>Wallet</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Shoulder Type</td>
					<?php
						$spathani_shouldertype_regular = $spathani_shouldertype_noshoulder = $spathani_shouldertype_vshoulder = $spathani_shouldertype_dvshoulder = "";
						if ($rowq3['pathani_shouldertype']=="regular") {
							$spathani_shouldertype_regular = "selected";
						} elseif ($rowq3['pathani_shouldertype']=="noshoulder") {
							$spathani_shouldertype_noshoulder = "selected";
						} elseif ($rowq3['pathani_shouldertype']=="vshoulder") {
							$spathani_shouldertype_vshoulder = "selected";
						} elseif ($rowq3['pathani_shouldertype']=="dvshoulder") {
							$spathani_shouldertype_dvshoulder = "selected";
						}
					?>
					<td>
						<select tabindex="130" class="form-control" name="pathani_shouldertype1" style="width:120px">
							<option value="default">Default</option>
							<option value="regular" <?php echo $spathani_shouldertype_regular; ?>>Regular</option>
							<option value="noshoulder" <?php echo $spathani_shouldertype_noshoulder; ?>>No Shoulder</option>
							<option value="vshoulder" <?php echo $spathani_shouldertype_vshoulder; ?>>V Shoulder</option>
							<option value="dvshoulder" <?php echo $spathani_shouldertype_dvshoulder; ?>>DV Shoulder</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Taweez Type</td>
					<?php
						$spathani_taweeztype_v = $spathani_taweeztype_square = "";
						if ($rowq3['pathani_taweeztype']=="v") {
							$spathani_taweeztype_v = "selected";
						} elseif ($rowq3['pathani_taweeztype']=="square") {
							$spathani_taweeztype_square = "selected";
						}
					?>
					<td>
						<select tabindex="131" class="form-control" name="pathani_taweeztype1" style="width:120px">
							<option value="default">Default</option>
							<option value="v" <?php echo $spathani_taweeztype_v; ?>>V</option>
							<option value="square" <?php echo $spathani_taweeztype_square; ?>>Square</option>
						</select>
					</td>
				</tr>
				<tr>   <td>Button</td>
					<td>
						<input tabindex="132" type="text" class="form-control" name="pathani_button1" value="<?php echo $rowq4['garb_button']; ?>" style="width:120px" />
					</td>
				</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "bpyjama": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Bpyjama x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="bpyjama_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="bpyjama_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="bpyjama_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="bpyjama_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="bpyjama_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="bpyjama_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="bpyjama_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Crease</td>
				<?php
					$sbpyjama_crease_fc = $sbpyjama_crease_sc = "";
					if ($rowq3['bpyjama_crease']=="fc") {
						$sbpyjama_crease_fc = "selected";
					} elseif ($rowq3['bpyjama_crease']=="sc") {
						$sbpyjama_crease_sc = "selected";
					}
				?>
				<td>
					<select tabindex="176" class="form-control" name="bpyjama_crease1" style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo $sbpyjama_crease_fc; ?>>FC</option>
						<option value="noshoulder" <?php echo $sbpyjama_crease_sc; ?>>SC</option>
					</select>
				</td>
			</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "pyjama": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Pyjama x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="pyjama_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="pyjama_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="pyjama_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="pyjama_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="pyjama_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="pyjama_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="pyjama_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "salwar": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Salwar x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="salwar_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="salwar_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="salwar_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="salwar_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="salwar_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="salwar_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="salwar_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "aligard": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Aligard x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="aligard_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="aligard_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="aligard_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="aligard_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="aligard_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="aligard_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="aligard_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
		case "churidar": { ?>
		<table class="table table-borderless table-sm mr-5">
			
			<thead>
				<tr>
					<th>Churidar x 1</th>
					<th>
						<input tabindex="121" type="text" class="form-control" name="churidar_description1" value="<?php echo $rowq4['garb_description']; ?>" style="width:120px" />
					</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>   <td>Pairing</td>
					<td>
						<input tabindex="122" type="text" class="form-control" name="churidar_pairing1" value="<?php echo $rowq4['garb_pairing']; ?>" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Submit Date</td>
					<td>
						<input tabindex="123" type="text" class="form-control" name="churidar_submit_date1" value="<?php echo $rowq4['garb_submit_date']; ?>" placeholder="yy-mm-dd" style="width:120px" />
					</td>
				</tr>
				<tr>   <td>Pana</td>
					<td>
						<input tabindex="124" type="text" class="form-control" name="churidar_pana1" value="<?php echo $rowq4['garb_pana']; ?>" style="width:75px" />
						<input tabindex="124" type="text" class="form-control" name="churidar_panafd1" value="" style="width:40px" />
					</td>
				</tr>
				<tr>   <td>Cloth L</td>
					<td>
						<input tabindex="125" type="text" class="form-control" name="churidar_clothln1" value="<?php echo $rowq4['garb_clothln']; ?>" style="width:75px" />
						<input tabindex="125" type="text" class="form-control" name="churidar_clothfd1" value="" style="width:40px" />
					</td>
				</tr>
				
			</tbody>
			
		</table>
		<?php } break;
		
	} ?>
	
	<div class="col-2 mt-2">
		<button tabindex="20" type="submit" class="btn btn-info" value="save" name="submit">Save</button>
	</div>
	
	</div>
	</div>
	</form>
</div>

</body>
</html>