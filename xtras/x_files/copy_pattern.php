<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 6 -->
<head>
	<?php
		$sr=$_GET['sr'];
		//$type = $_GET['type'];
		//$count = $_GET['count'];
	?>
	<title><?php echo "$sr Entry"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
	{ $dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	
	$query2 = "SELECT * FROM `measurement` WHERE sr=$sr";
	
	$result2 = mysqli_query($dbc, $query2)
		or die('Error querying database query2.');
	
	$rowq2 = mysqli_fetch_array($result2);
	
	
	//$query3 = "SELECT * FROM style WHERE sr=$sr AND garb_type=\"$type\" ORDER BY style_id DESC LIMIT 1";
	$query3 = "SELECT * FROM style WHERE sr=$sr AND (garb_type='shirt' OR garb_type='kurta' OR garb_type='pathani' OR garb_type='kandura') ORDER BY style_id DESC LIMIT 1";
	
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
	
	$shirt_count = $_POST['shirt_count'];
	$kurta_count = $_POST['kurta_count'];
	$pathani_count = $_POST['pathani_count'];
	$kandura_count = $_POST['kandura_count'];
	$pant_count = $_POST['pant_count'];
	$bpyjama_count = $_POST['bpyjama_count'];
	$pyjama_count = $_POST['pyjama_count'];
	$salwar_count = $_POST['salwar_count'];
	$aligard_count = $_POST['aligard_count'];
	$churidar_count = $_POST['churidar_count'];
	
?>
<div class="container-fluid">
	<form class="form-inline" method="post" action="pattern_save.php?sr=<?php echo $sr; ?>&shirtc=<?php echo $shirt_count; ?>&kurtac=<?php echo $kurta_count; ?>&pathanic=<?php echo $pathani_count; ?>&kandurac=<?php echo $kandura_count; ?>&pantc=<?php echo $pant_count; ?>&bpyjamac=<?php echo $bpyjama_count; ?>&pyjamac=<?php echo $pyjama_count; ?>&salwarc=<?php echo $salwar_count; ?>&aligardc=<?php echo $aligard_count; ?>&churidarc=<?php echo $churidar_count; ?>">
	<div class="form-group">
	<div class="d-flex flex-nowrap bg-light">
	
	<?php if ($shirt_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Shirt x <?php echo "$shirt_count"; ?></th>
				<?php for ($c = 1; $c <= $shirt_count; $c++) { ?>   <th>
					<input tabindex="121<?php echo $c; ?>" type="text" class="form-control" name="shirt_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) {
					if ($pair==122 || $pair=="") {
						$pair = 97;
					} else {
						$pair = $pair + 1;
					}
				?>
				<td>
					<input tabindex="122<?php echo $c; ?>" type="text" class="form-control" name="shirt_pairing<?php echo $c; ?>" value="<?php echo chr($pair); ?>" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) { ?>   <td>
					<input tabindex="123<?php echo $c; ?>" type="text" class="form-control" name="shirt_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) { ?>   <td>
					<input tabindex="124<?php echo $c; ?>" type="text" class="form-control" name="shirt_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="124<?php echo $c; ?>" type="text" class="form-control" name="shirt_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) { ?>   <td>
					<input tabindex="125<?php echo $c; ?>" type="text" class="form-control" name="shirt_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="125<?php echo $c; ?>" type="text" class="form-control" name="shirt_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Collar Type</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) {
					$sshirt_collartype_rmpc = $sshirt_collartype_mrmpc = $sshirt_collartype_lspc = $sshirt_collartype_bc = $sshirt_collartype_nocollar = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="126<?php echo $c; ?>" class="form-control" name="shirt_collartype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="rmpc" <?php echo $sshirt_collartype_rmpc; ?>>RMPC</option>
						<option value="mrmpc" <?php echo $sshirt_collartype_mrmpc; ?>>MRMPC</option>
						<option value="lspc" <?php echo $sshirt_collartype_lspc; ?>>LSPC</option>
						<option value="bc" <?php echo $sshirt_collartype_bc; ?>>BC</option>
						<option value="nocollar" <?php echo $sshirt_collartype_nocollar; ?>>No Collar</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff L</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) {
					$sshirt_cuffln_a = $sshirt_cuffln_b = $sshirt_cuffln_c = $sshirt_cuffln_d = $sshirt_cuffln_e = $sshirt_cuffln_f = $sshirt_cuffln_g = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="127<?php echo $c; ?>" class="form-control" name="shirt_cuffln<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="0.5" <?php echo $sshirt_cuffln_a; ?>>½</option>
						<option value="1" <?php echo $sshirt_cuffln_b; ?>>1</option>
						<option value="1.5" <?php echo $sshirt_cuffln_c; ?>>1½</option>
						<option value="2" <?php echo $sshirt_cuffln_d; ?>>2</option>
						<option value="2.25" <?php echo $sshirt_cuffln_e; ?>>2¼</option>
						<option value="2.5" <?php echo $sshirt_cuffln_f; ?>>2½</option>
						<option value="3" <?php echo $sshirt_cuffln_g; ?>>3</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff Type</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) {
					$sshirt_cufftype_cut = $sshirt_cufftype_square = $sshirt_cufftype_round = $sshirt_cufftype_nocuff = $sshirt_cufftype_halfsleeve = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="128<?php echo $c; ?>" class="form-control" name="shirt_cufftype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="cut" <?php echo $sshirt_cufftype_cut; ?>>Cut</option>
						<option value="square" <?php echo $sshirt_cufftype_square; ?>>Square</option>
						<option value="round" <?php echo $sshirt_cufftype_round; ?>>Round</option>
						<option value="nocuff" <?php echo $sshirt_cufftype_nocuff; ?>>No Cuff</option>
						<option value="halfsleeve" <?php echo $sshirt_cufftype_halfsleeve; ?>>Half Sleeve</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pocket Type</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) {
					$sshirt_pockettype_nopocket = $sshirt_pockettype_v = $sshirt_pockettype_square = $sshirt_pockettype_round = $sshirt_pockettype_flap = $sshirt_pockettype_wallet = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="129<?php echo $c; ?>" class="form-control" name="shirt_pockettype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="nopocket" <?php echo $sshirt_pockettype_nopocket; ?>>No Pocket</option>
						<option value="v" <?php echo $sshirt_pockettype_v; ?>>V</option>
						<option value="square" <?php echo $sshirt_pockettype_square; ?>>Square</option>
						<option value="round" <?php echo $sshirt_pockettype_round; ?>>Round</option>
						<option value="flap" <?php echo $sshirt_pockettype_flap; ?>>Flap</option>
						<option value="wallet" <?php echo $sshirt_pockettype_wallet; ?>>Wallet</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Shoulder Type</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) {
					$sshirt_shouldertype_regular = $sshirt_shouldertype_noshoulder = $sshirt_shouldertype_vshoulder = $sshirt_shouldertype_dvshoulder = "";
					if ($c==1) {
						if ($rowq3['shirt_shouldertype']=="regular") {
							$sshirt_shouldertype_regular = "selected";
						} elseif ($rowq3['shirt_shouldertype']=="noshoulder") {
							$sshirt_shouldertype_noshoulder = "selected";
						} elseif ($rowq3['shirt_shouldertype']=="vshoulder") {
							$sshirt_shouldertype_vshoulder = "selected";
						} elseif ($rowq3['shirt_shouldertype']=="dvshoulder") {
							$sshirt_shouldertype_dvshoulder = "selected";
						}
					}
				?>
				<td>
					<select tabindex="130<?php echo $c; ?>" class="form-control" name="shirt_shouldertype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo $sshirt_shouldertype_regular; ?>>Regular</option>
						<option value="noshoulder" <?php echo $sshirt_shouldertype_noshoulder; ?>>No Shoulder</option>
						<option value="vshoulder" <?php echo $sshirt_shouldertype_vshoulder; ?>>V Shoulder</option>
						<option value="dvshoulder" <?php echo $sshirt_shouldertype_dvshoulder; ?>>DV Shoulder</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Button</td>
				<?php for ($c = 1; $c <= $shirt_count; $c++) { ?>   <td>
					<input tabindex="131<?php echo $c; ?>" type="text" class="form-control" name="shirt_button<?php echo $c; ?>" value="" style="width:120px" />
				</td>   <?php } ?>
			</tr>
		
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($pant_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Pant x <?php echo "$pant_count"; ?></th>
				<?php for ($c = 1; $c <= $pant_count; $c++) { ?>   <th>
					<input tabindex="171<?php echo $c; ?>" type="text" class="form-control" name="pant_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $pant_count; $c++) { ?>
				<td>
					<input tabindex="172<?php echo $c; ?>" type="text" class="form-control" name="pant_pairing<?php echo $c; ?>" value="" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $pant_count; $c++) { ?>   <td>
					<input tabindex="173<?php echo $c; ?>" type="text" class="form-control" name="pant_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $pant_count; $c++) { ?>   <td>
					<input tabindex="174<?php echo $c; ?>" type="text" class="form-control" name="pant_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="174<?php echo $c; ?>" type="text" class="form-control" name="pant_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $pant_count; $c++) { ?>   <td>
					<input tabindex="175<?php echo $c; ?>" type="text" class="form-control" name="pant_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="175<?php echo $c; ?>" type="text" class="form-control" name="pant_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Crease</td>
				<?php for ($c = 1; $c <= $pant_count; $c++) {
					$spant_crease_fc = $spant_crease_sc = "";
					if ($c==1) {
						if ($rowq3['pant_crease']=="fc") {
							$spant_crease_fc = "selected";
						} elseif ($rowq3['pant_crease']=="sc") {
							$spant_crease_sc = "selected";
						}
					}
				?>
				<td>
					<select tabindex="176<?php echo $c; ?>" class="form-control" name="pant_crease<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo $spant_crease_fc; ?>>FC</option>
						<option value="noshoulder" <?php echo $spant_crease_sc; ?>>SC</option>
					</select>
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($kandura_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Kandura x <?php echo "$kandura_count"; ?></th>
				<?php for ($c = 1; $c <= $kandura_count; $c++) { ?>   <th>
					<input tabindex="201<?php echo $c; ?>" type="text" class="form-control" name="kandura_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>	
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) {
					if ($pair==122 || $pair=="") {
						$pair = 97;
					} else {
						$pair = $pair + 1;
					}
				?>
				<td>
					<input tabindex="202<?php echo $c; ?>" type="text" class="form-control" name="kandura_pairing<?php echo $c; ?>" value="<?php echo chr($pair); ?>" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) { ?>   <td>
					<input tabindex="203<?php echo $c; ?>" type="text" class="form-control" name="kandura_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) { ?>   <td>
					<input tabindex="204<?php echo $c; ?>" type="text" class="form-control" name="kandura_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="204<?php echo $c; ?>" type="text" class="form-control" name="kandura_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) { ?>   <td>
					<input tabindex="205<?php echo $c; ?>" type="text" class="form-control" name="kandura_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="205<?php echo $c; ?>" type="text" class="form-control" name="kandura_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Collar Type</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) {
					$skandura_collartype_rmpc = $skandura_collartype_mrmpc = $skandura_collartype_lspc = $skandura_collartype_bc = $skandura_collartype_nocollar = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="206<?php echo $c; ?>" class="form-control" name="kandura_collartype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="rmpc" <?php echo $skandura_collartype_rmpc; ?>>RMPC</option>
						<option value="mrmpc" <?php echo $skandura_collartype_mrmpc; ?>>MRMPC</option>
						<option value="lspc" <?php echo $skandura_collartype_lspc; ?>>LSPC</option>
						<option value="bc" <?php echo $skandura_collartype_bc; ?>>BC</option>
						<option value="nocollar" <?php echo $skandura_collartype_nocollar; ?>>No Collar</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff L</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) {
					$skandura_cuffln_a = $skandura_cuffln_b = $skandura_cuffln_c = $skandura_cuffln_d = $skandura_cuffln_e = $skandura_cuffln_f = $skandura_cuffln_g = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="207<?php echo $c; ?>" class="form-control" name="kandura_cuffln<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="0.5" <?php echo $skandura_cuffln_a; ?>>½</option>
						<option value="1" <?php echo $skandura_cuffln_b; ?>>1</option>
						<option value="1.5" <?php echo $skandura_cuffln_c; ?>>1½</option>
						<option value="2" <?php echo $skandura_cuffln_d; ?>>2</option>
						<option value="2.25" <?php echo $skandura_cuffln_e; ?>>2¼</option>
						<option value="2.5" <?php echo $skandura_cuffln_f; ?>>2½</option>
						<option value="3" <?php echo $skandura_cuffln_g; ?>>3</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff Type</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) {
					$skandura_cufftype_cut = $skandura_cufftype_square = $skandura_cufftype_round = $skandura_cufftype_nocuff = $skandura_cufftype_halfsleeve = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="208<?php echo $c; ?>" class="form-control" name="kandura_cufftype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="cut" <?php echo $skandura_cufftype_cut; ?>>Cut</option>
						<option value="square" <?php echo $skandura_cufftype_square; ?>>Square</option>
						<option value="round" <?php echo $skandura_cufftype_round; ?>>Round</option>
						<option value="nocuff" <?php echo $skandura_cufftype_nocuff; ?>>No Cuff</option>
						<option value="halfsleeve" <?php echo $skandura_cufftype_halfsleeve; ?>>Half Sleeve</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pocket Type</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) {
					$skandura_pockettype_nopocket = $skandura_pockettype_v = $skandura_pockettype_square = $skandura_pockettype_round = $skandura_pockettype_flap = $skandura_pockettype_wallet = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="209<?php echo $c; ?>" class="form-control" name="kandura_pockettype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="nopocket" <?php echo $skandura_pockettype_nopocket; ?>>No Pocket</option>
						<option value="v" <?php echo $skandura_pockettype_v; ?>>V</option>
						<option value="square" <?php echo $skandura_pockettype_square; ?>>Square</option>
						<option value="round" <?php echo $skandura_pockettype_round; ?>>Round</option>
						<option value="flap" <?php echo $skandura_pockettype_flap; ?>>Flap</option>
						<option value="wallet" <?php echo $skandura_pockettype_wallet; ?>>Wallet</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Shoulder Type</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) {
					$skandura_shouldertype_regular = $skandura_shouldertype_noshoulder = $skandura_shouldertype_vshoulder = $skandura_shouldertype_dvshoulder = "";
					if ($c==1) {
						if ($rowq3['kandura_shouldertype']=="regular") {
							$skandura_shouldertype_regular = "selected";
						} elseif ($rowq3['kandura_shouldertype']=="noshoulder") {
							$skandura_shouldertype_noshoulder = "selected";
						} elseif ($rowq3['kandura_shouldertype']=="vshoulder") {
							$skandura_shouldertype_vshoulder = "selected";
						} elseif ($rowq3['kandura_shouldertype']=="dvshoulder") {
							$skandura_shouldertype_dvshoulder = "selected";
						}
					}
				?>
				<td>
					<select tabindex="210<?php echo $c; ?>" class="form-control" name="kandura_shouldertype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo $skandura_shouldertype_regular; ?>>Regular</option>
						<option value="noshoulder" <?php echo $skandura_shouldertype_noshoulder; ?>>No Shoulder</option>
						<option value="vshoulder" <?php echo $skandura_shouldertype_vshoulder; ?>>V Shoulder</option>
						<option value="dvshoulder" <?php echo $skandura_shouldertype_dvshoulder; ?>>DV Shoulder</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Taweez Type</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) {
					$skandura_taweeztype_v = $skandura_taweeztype_square = "";
					if ($c==1) {
						if ($rowq3['kandura_taweeztype']=="v") {
							$skandura_taweeztype_v = "selected";
						} elseif ($rowq3['kandura_taweeztype']=="square") {
							$skandura_taweeztype_square = "selected";
						}
					}
				?>
				<td>
					<select tabindex="211<?php echo $c; ?>" class="form-control" name="kandura_taweeztype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="v" <?php echo $skandura_taweeztype_v; ?>>V</option>
						<option value="square" <?php echo $skandura_taweeztype_square; ?>>Square</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Button</td>
				<?php for ($c = 1; $c <= $kandura_count; $c++) { ?>   <td>
					<input tabindex="212<?php echo $c; ?>" type="text" class="form-control" name="kandura_button<?php echo $c; ?>" value="" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($kurta_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Kurta x <?php echo "$kurta_count"; ?></th>
				<?php for ($c = 1; $c <= $kurta_count; $c++) { ?>   <th>
					<input tabindex="251<?php echo $c; ?>" type="text" class="form-control" name="kurta_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>	
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) {
					if ($pair==122 || $pair=="") {
						$pair = 97;
					} else {
						$pair = $pair + 1;
					}
				?>
				<td>
					<input tabindex="252<?php echo $c; ?>" type="text" class="form-control" name="kurta_pairing<?php echo $c; ?>" value="<?php echo chr($pair); ?>" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) { ?>   <td>
					<input tabindex="253<?php echo $c; ?>" type="text" class="form-control" name="kurta_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) { ?>   <td>
					<input tabindex="254<?php echo $c; ?>" type="text" class="form-control" name="kurta_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="254<?php echo $c; ?>" type="text" class="form-control" name="kurta_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) { ?>   <td>
					<input tabindex="255<?php echo $c; ?>" type="text" class="form-control" name="kurta_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="255<?php echo $c; ?>" type="text" class="form-control" name="kurta_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Collar Type</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) {
					$skurta_collartype_rmpc = $skurta_collartype_mrmpc = $skurta_collartype_lspc = $skurta_collartype_bc = $skurta_collartype_nocollar = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="256<?php echo $c; ?>" class="form-control" name="kurta_collartype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="rmpc" <?php echo $skurta_collartype_rmpc; ?>>RMPC</option>
						<option value="mrmpc" <?php echo $skurta_collartype_mrmpc; ?>>MRMPC</option>
						<option value="lspc" <?php echo $skurta_collartype_lspc; ?>>LSPC</option>
						<option value="bc" <?php echo $skurta_collartype_bc; ?>>BC</option>
						<option value="nocollar" <?php echo $skurta_collartype_nocollar; ?>>No Collar</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff L</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) {
					$skurta_cuffln_a = $skurta_cuffln_b = $skurta_cuffln_c = $skurta_cuffln_d = $skurta_cuffln_e = $skurta_cuffln_f = $skurta_cuffln_g = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="257<?php echo $c; ?>" class="form-control" name="kurta_cuffln<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="0.5" <?php echo $skurta_cuffln_a; ?>>½</option>
						<option value="1" <?php echo $skurta_cuffln_b; ?>>1</option>
						<option value="1.5" <?php echo $skurta_cuffln_c; ?>>1½</option>
						<option value="2" <?php echo $skurta_cuffln_d; ?>>2</option>
						<option value="2.25" <?php echo $skurta_cuffln_e; ?>>2¼</option>
						<option value="2.5" <?php echo $skurta_cuffln_f; ?>>2½</option>
						<option value="3" <?php echo $skurta_cuffln_g; ?>>3</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff Type</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) {
					$skurta_cufftype_cut = $skurta_cufftype_square = $skurta_cufftype_round = $skurta_cufftype_nocuff = $skurta_cufftype_halfsleeve = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="258<?php echo $c; ?>" class="form-control" name="kurta_cufftype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="cut" <?php echo $skurta_cufftype_cut; ?>>Cut</option>
						<option value="square" <?php echo $skurta_cufftype_square; ?>>Square</option>
						<option value="round" <?php echo $skurta_cufftype_round; ?>>Round</option>
						<option value="nocuff" <?php echo $skurta_cufftype_nocuff; ?>>No Cuff</option>
						<option value="halfsleeve" <?php echo $skurta_cufftype_halfsleeve; ?>>Half Sleeve</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pocket Type</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) {
					$skurta_pockettype_nopocket = $skurta_pockettype_v = $skurta_pockettype_square = $skurta_pockettype_round = $skurta_pockettype_flap = $skurta_pockettype_wallet = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="259<?php echo $c; ?>" class="form-control" name="kurta_pockettype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="nopocket" <?php echo $skurta_pockettype_nopocket; ?>>No Pocket</option>
						<option value="v" <?php echo $skurta_pockettype_v; ?>>V</option>
						<option value="square" <?php echo $skurta_pockettype_square; ?>>Square</option>
						<option value="round" <?php echo $skurta_pockettype_round; ?>>Round</option>
						<option value="flap" <?php echo $skurta_pockettype_flap; ?>>Flap</option>
						<option value="wallet" <?php echo $skurta_pockettype_wallet; ?>>Wallet</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Shoulder Type</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) {
					$skurta_shouldertype_regular = $skurta_shouldertype_noshoulder = $skurta_shouldertype_vshoulder = $skurta_shouldertype_dvshoulder = "";
					if ($c==1) {
						if ($rowq3['kurta_shouldertype']=="regular") {
							$skurta_shouldertype_regular = "selected";
						} elseif ($rowq3['kurta_shouldertype']=="noshoulder") {
							$skurta_shouldertype_noshoulder = "selected";
						} elseif ($rowq3['kurta_shouldertype']=="vshoulder") {
							$skurta_shouldertype_vshoulder = "selected";
						} elseif ($rowq3['kurta_shouldertype']=="dvshoulder") {
							$skurta_shouldertype_dvshoulder = "selected";
						}
					}
				?>
				<td>
					<select tabindex="260<?php echo $c; ?>" class="form-control" name="kurta_shouldertype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo $skurta_shouldertype_regular; ?>>Regular</option>
						<option value="noshoulder" <?php echo $skurta_shouldertype_noshoulder; ?>>No Shoulder</option>
						<option value="vshoulder" <?php echo $skurta_shouldertype_vshoulder; ?>>V Shoulder</option>
						<option value="dvshoulder" <?php echo $skurta_shouldertype_dvshoulder; ?>>DV Shoulder</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Taweez Type</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) {
					$skurta_taweeztype_v = $skurta_taweeztype_square = "";
					if ($c==1) {
						if ($rowq3['kurta_taweeztype']=="v") {
							$skurta_taweeztype_v = "selected";
						} elseif ($rowq3['kurta_taweeztype']=="square") {
							$skurta_taweeztype_square = "selected";
						}
					}
				?>
				<td>
					<select tabindex="261<?php echo $c; ?>" class="form-control" name="kurta_taweeztype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="v" <?php echo $skurta_taweeztype_v; ?>>V</option>
						<option value="square" <?php echo $skurta_taweeztype_square; ?>>Square</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Button</td>
				<?php for ($c = 1; $c <= $kurta_count; $c++) { ?>   <td>
					<input tabindex="262<?php echo $c; ?>" type="text" class="form-control" name="kurta_button<?php echo $c; ?>" value="" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($pathani_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Pathani x <?php echo "$pathani_count"; ?></th>
				<?php for ($c = 1; $c <= $pathani_count; $c++) { ?>   <th>
					<input tabindex="301<?php echo $c; ?>" type="text" class="form-control" name="pathani_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>	
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) {
					if ($pair==122 || $pair=="") {
						$pair = 97;
					} else {
						$pair = $pair + 1;
					}
				?>
				<td>
					<input tabindex="302<?php echo $c; ?>" type="text" class="form-control" name="pathani_pairing<?php echo $c; ?>" value="<?php echo chr($pair); ?>" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) { ?>   <td>
					<input tabindex="303<?php echo $c; ?>" type="text" class="form-control" name="pathani_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) { ?>   <td>
					<input tabindex="304<?php echo $c; ?>" type="text" class="form-control" name="pathani_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="304<?php echo $c; ?>" type="text" class="form-control" name="pathani_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) { ?>   <td>
					<input tabindex="305<?php echo $c; ?>" type="text" class="form-control" name="pathani_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="305<?php echo $c; ?>" type="text" class="form-control" name="pathani_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Collar Type</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) {
					$spathani_collartype_rmpc = $spathani_collartype_mrmpc = $spathani_collartype_lspc = $spathani_collartype_bc = $spathani_collartype_nocollar = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="306<?php echo $c; ?>" class="form-control" name="pathani_collartype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="rmpc" <?php echo $spathani_collartype_rmpc; ?>>RMPC</option>
						<option value="mrmpc" <?php echo $spathani_collartype_mrmpc; ?>>MRMPC</option>
						<option value="lspc" <?php echo $spathani_collartype_lspc; ?>>LSPC</option>
						<option value="bc" <?php echo $spathani_collartype_bc; ?>>BC</option>
						<option value="nocollar" <?php echo $spathani_collartype_nocollar; ?>>No Collar</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff L</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) {
					$spathani_cuffln_a = $spathani_cuffln_b = $spathani_cuffln_c = $spathani_cuffln_d = $spathani_cuffln_e = $spathani_cuffln_f = $spathani_cuffln_g = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="307<?php echo $c; ?>" class="form-control" name="pathani_cuffln<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="0.5" <?php echo $spathani_cuffln_a; ?>>½</option>
						<option value="1" <?php echo $spathani_cuffln_b; ?>>1</option>
						<option value="1.5" <?php echo $spathani_cuffln_c; ?>>1½</option>
						<option value="2" <?php echo $spathani_cuffln_d; ?>>2</option>
						<option value="2.25" <?php echo $spathani_cuffln_e; ?>>2¼</option>
						<option value="2.5" <?php echo $spathani_cuffln_f; ?>>2½</option>
						<option value="3" <?php echo $spathani_cuffln_g; ?>>3</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cuff Type</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) {
					$spathani_cufftype_cut = $spathani_cufftype_square = $spathani_cufftype_round = $spathani_cufftype_nocuff = $spathani_cufftype_halfsleeve = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="308<?php echo $c; ?>" class="form-control" name="pathani_cufftype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="cut" <?php echo $spathani_cufftype_cut; ?>>Cut</option>
						<option value="square" <?php echo $spathani_cufftype_square; ?>>Square</option>
						<option value="round" <?php echo $spathani_cufftype_round; ?>>Round</option>
						<option value="nocuff" <?php echo $spathani_cufftype_nocuff; ?>>No Cuff</option>
						<option value="halfsleeve" <?php echo $spathani_cufftype_halfsleeve; ?>>Half Sleeve</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pocket Type</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) {
					$spathani_pockettype_nopocket = $spathani_pockettype_v = $spathani_pockettype_square = $spathani_pockettype_round = $spathani_pockettype_flap = $spathani_pockettype_wallet = "";
					if ($c==1) {
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
					}
				?>
				<td>
					<select tabindex="309<?php echo $c; ?>" class="form-control" name="pathani_pockettype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="nopocket" <?php echo $spathani_pockettype_nopocket; ?>>No Pocket</option>
						<option value="v" <?php echo $spathani_pockettype_v; ?>>V</option>
						<option value="square" <?php echo $spathani_pockettype_square; ?>>Square</option>
						<option value="round" <?php echo $spathani_pockettype_round; ?>>Round</option>
						<option value="flap" <?php echo $spathani_pockettype_flap; ?>>Flap</option>
						<option value="wallet" <?php echo $spathani_pockettype_wallet; ?>>Wallet</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Shoulder Type</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) {
					$spathani_shouldertype_regular = $spathani_shouldertype_noshoulder = $spathani_shouldertype_vshoulder = $spathani_shouldertype_dvshoulder = "";
					if ($c==1) {
						if ($rowq3['pathani_shouldertype']=="regular") {
							$spathani_shouldertype_regular = "selected";
						} elseif ($rowq3['pathani_shouldertype']=="noshoulder") {
							$spathani_shouldertype_noshoulder = "selected";
						} elseif ($rowq3['pathani_shouldertype']=="vshoulder") {
							$spathani_shouldertype_vshoulder = "selected";
						} elseif ($rowq3['pathani_shouldertype']=="dvshoulder") {
							$spathani_shouldertype_dvshoulder = "selected";
						}
					}
				?>
				<td>
					<select tabindex="310<?php echo $c; ?>" class="form-control" name="pathani_shouldertype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo $spathani_shouldertype_regular; ?>>Regular</option>
						<option value="noshoulder" <?php echo $spathani_shouldertype_noshoulder; ?>>No Shoulder</option>
						<option value="vshoulder" <?php echo $spathani_shouldertype_vshoulder; ?>>V Shoulder</option>
						<option value="dvshoulder" <?php echo $spathani_shouldertype_dvshoulder; ?>>DV Shoulder</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Taweez Type</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) {
					$spathani_taweeztype_v = $spathani_taweeztype_square = "";
					if ($c==1) {
						if ($rowq3['pathani_taweeztype']=="v") {
							$spathani_taweeztype_v = "selected";
						} elseif ($rowq3['pathani_taweeztype']=="square") {
							$spathani_taweeztype_square = "selected";
						}
					}
				?>
				<td>
					<select tabindex="311<?php echo $c; ?>" class="form-control" name="pathani_taweeztype<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="v" <?php echo $spathani_taweeztype_v; ?>>V</option>
						<option value="square" <?php echo $spathani_taweeztype_square; ?>>Square</option>
					</select>
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Button</td>
				<?php for ($c = 1; $c <= $pathani_count; $c++) { ?>   <td>
					<input tabindex="312<?php echo $c; ?>" type="text" class="form-control" name="pathani_button<?php echo $c; ?>" value="" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($bpyjama_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Bpyjama x <?php echo "$bpyjama_count"; ?></th>
				<?php for ($c = 1; $c <= $bpyjama_count; $c++) { ?>   <th>
					<input tabindex="351<?php echo $c; ?>" type="text" class="form-control" name="bpyjama_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>	
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $bpyjama_count; $c++) { ?>
				<td>
					<input tabindex="352<?php echo $c; ?>" type="text" class="form-control" name="bpyjama_pairing<?php echo $c; ?>" value="" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $bpyjama_count; $c++) { ?>   <td>
					<input tabindex="353<?php echo $c; ?>" type="text" class="form-control" name="bpyjama_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $bpyjama_count; $c++) { ?>   <td>
					<input tabindex="354<?php echo $c; ?>" type="text" class="form-control" name="bpyjama_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="354<?php echo $c; ?>" type="text" class="form-control" name="bpyjama_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $bpyjama_count; $c++) { ?>   <td>
					<input tabindex="355<?php echo $c; ?>" type="text" class="form-control" name="bpyjama_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="355<?php echo $c; ?>" type="text" class="form-control" name="bpyjama_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Crease</td>
				<?php for ($c = 1; $c <= $bpyjama_count; $c++) {
					$sbpyjama_crease_fc = $sbpyjama_crease_sc = "";
					if ($c==1) {
						if ($rowq3['bpyjama_crease']=="fc") {
							$sbpyjama_crease_fc = "selected";
						} elseif ($rowq3['bpyjama_crease']=="sc") {
							$sbpyjama_crease_sc = "selected";
						}
					}
				?>
				<td>
					<select tabindex="356<?php echo $c; ?>" class="form-control" name="bpyjama_crease<?php echo $c; ?>" style="width:120px">
						<option value="default">Default</option>
						<option value="regular" <?php echo $sbpyjama_crease_fc; ?>>FC</option>
						<option value="noshoulder" <?php echo $sbpyjama_crease_sc; ?>>SC</option>
					</select>
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($pyjama_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Pyjama x <?php echo "$pyjama_count"; ?></th>
				<?php for ($c = 1; $c <= $pyjama_count; $c++) { ?>   <th>
					<input tabindex="381<?php echo $c; ?>" type="text" class="form-control" name="pyjama_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>	
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $pyjama_count; $c++) { ?>
				<td>
					<input tabindex="382<?php echo $c; ?>" type="text" class="form-control" name="pyjama_pairing<?php echo $c; ?>" value="" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $pyjama_count; $c++) { ?>   <td>
					<input tabindex="383<?php echo $c; ?>" type="text" class="form-control" name="pyjama_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $pyjama_count; $c++) { ?>   <td>
					<input tabindex="384<?php echo $c; ?>" type="text" class="form-control" name="pyjama_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="384<?php echo $c; ?>" type="text" class="form-control" name="pyjama_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $pyjama_count; $c++) { ?>   <td>
					<input tabindex="385<?php echo $c; ?>" type="text" class="form-control" name="pyjama_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="385<?php echo $c; ?>" type="text" class="form-control" name="pyjama_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($salwar_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Salwar x <?php echo "$salwar_count"; ?></th>
				<?php for ($c = 1; $c <= $salwar_count; $c++) { ?>   <th>
					<input tabindex="411<?php echo $c; ?>" type="text" class="form-control" name="salwar_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>	
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $salwar_count; $c++) { ?>
				<td>
					<input tabindex="412<?php echo $c; ?>" type="text" class="form-control" name="salwar_pairing<?php echo $c; ?>" value="" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $salwar_count; $c++) { ?>   <td>
					<input tabindex="413<?php echo $c; ?>" type="text" class="form-control" name="salwar_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $salwar_count; $c++) { ?>   <td>
					<input tabindex="414<?php echo $c; ?>" type="text" class="form-control" name="salwar_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="414<?php echo $c; ?>" type="text" class="form-control" name="salwar_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $salwar_count; $c++) { ?>   <td>
					<input tabindex="415<?php echo $c; ?>" type="text" class="form-control" name="salwar_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="415<?php echo $c; ?>" type="text" class="form-control" name="salwar_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($aligard_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Aligard x <?php echo "$aligard_count"; ?></th>
				<?php for ($c = 1; $c <= $aligard_count; $c++) { ?>   <th>
					<input tabindex="441<?php echo $c; ?>" type="text" class="form-control" name="aligard_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>	
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $aligard_count; $c++) { ?>
				<td>
					<input tabindex="442<?php echo $c; ?>" type="text" class="form-control" name="aligard_pairing<?php echo $c; ?>" value="" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $aligard_count; $c++) { ?>   <td>
					<input tabindex="443<?php echo $c; ?>" type="text" class="form-control" name="aligard_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $aligard_count; $c++) { ?>   <td>
					<input tabindex="444<?php echo $c; ?>" type="text" class="form-control" name="aligard_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="444<?php echo $c; ?>" type="text" class="form-control" name="aligard_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $aligard_count; $c++) { ?>   <td>
					<input tabindex="445<?php echo $c; ?>" type="text" class="form-control" name="aligard_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="445<?php echo $c; ?>" type="text" class="form-control" name="aligard_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<?php if ($churidar_count >= 1) {?>
	<table class="table table-borderless table-sm mr-5">
		
		<thead>
			<tr>
				<th>Churidar x <?php echo "$churidar_count"; ?></th>
				<?php for ($c = 1; $c <= $churidar_count; $c++) { ?>   <th>
					<input tabindex="471<?php echo $c; ?>" type="text" class="form-control" name="churidar_description<?php echo $c; ?>" value="" style="width:120px" />
				</th>   <?php } ?>	
			</tr>
		</thead>
		
		<tbody>
		
			<tr>   <td>Pairing</td>
				<?php for ($c = 1; $c <= $churidar_count; $c++) { ?>
				<td>
					<input tabindex="472<?php echo $c; ?>" type="text" class="form-control" name="churidar_pairing<?php echo $c; ?>" value="" style="width:120px" />
				</td>
				<?php } ?>
			</tr>
			<tr>   <td>Submit Date</td>
				<?php for ($c = 1; $c <= $churidar_count; $c++) { ?>   <td>
					<input tabindex="473<?php echo $c; ?>" type="text" class="form-control" name="churidar_submit_date<?php echo $c; ?>" value="" placeholder="yy-mm-dd" style="width:120px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Pana</td>
				<?php for ($c = 1; $c <= $churidar_count; $c++) { ?>   <td>
					<input tabindex="474<?php echo $c; ?>" type="text" class="form-control" name="churidar_pana<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="474<?php echo $c; ?>" type="text" class="form-control" name="churidar_panafd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			<tr>   <td>Cloth L</td>
				<?php for ($c = 1; $c <= $churidar_count; $c++) { ?>   <td>
					<input tabindex="475<?php echo $c; ?>" type="text" class="form-control" name="churidar_clothln<?php echo $c; ?>" value="" style="width:75px" />
					<input tabindex="475<?php echo $c; ?>" type="text" class="form-control" name="churidar_clothfd<?php echo $c; ?>" value="" style="width:40px" />
				</td>   <?php } ?>
			</tr>
			
		</tbody>
		
	</table>
	<?php } ?>
	
	<div class="col-2 mt-2">
		<button tabindex="20" type="submit" class="btn btn-info" value="save" name="submit">Save</button>
	</div>
	
	</div>
	</div>
	</form>
</div>

</body>
</html>