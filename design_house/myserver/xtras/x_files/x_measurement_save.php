<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 5 -->
<head>
	<?php
		$sr=$_GET['sr'];
		$type = $_GET['type'];
	?>
	<title><?php echo "$sr $type Save"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css">
	<script src="libraries/jquery.min.js"></script>
	<script src="libraries/popper.min.js"></script>
	<script src="libraries/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid p-5">
	<br/><h2>Measurement Saved</h2>

<?php {
		error_reporting(E_ALL & ~E_NOTICE);
		
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
	} ?>
	
	<form method="post" action="pattern.php?sr=<?php echo $sr; ?>">
	<div class="form-group">
	
	<div class="row p-3 no-gutters">
		<div class="col">   <label for="shirt_count">Shirt</label>
			<input tabindex="01" type="text" class="form-control" name="shirt_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="kurta_count">Kurta</label>
			<input tabindex="02" type="text" class="form-control" name="kurta_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="pathani_count">Pathani</label>
			<input tabindex="03" type="text" class="form-control" name="pathani_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="kandura_count">Kandura</label>
			<input tabindex="04" type="text" class="form-control" name="kandura_count" value="" style="width:75%" />
		</div>
		<div class="col"></div>
		<div class="col p-2 mt-4">
			<button tabindex="20" type="submit" class="btn btn-info" value="save" name="submit">Save</button>
		</div>
	</div>
	<div class="row p-3 no-gutters">
		<div class="col">   <label for="pant_count">Pant</label>
			<input tabindex="07" type="text" class="form-control" name="pant_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="bpyjama_count">Bpyjama</label>
			<input tabindex="08" type="text" class="form-control" name="bpyjama_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="pyjama_count">Pyjama</label>
			<input tabindex="09" type="text" class="form-control" name="pyjama_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="salwar_count">Salwar</label>
			<input tabindex="10" type="text" class="form-control" name="salwar_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="aligard_count">Aligard</label>
			<input tabindex="11" type="text" class="form-control" name="aligard_count" value="" style="width:75%" />
		</div>
		<div class="col">   <label for="churidar_count">Churidar</label>
			<input tabindex="12" type="text" class="form-control" name="churidar_count" value="" style="width:75%" />
		</div>
	</div>
	
	</div>
	</form>
	
	<?php switch ($type) {
		
		case "shirt": {
			$shirt_date = date("y-m-d");
			$shirt_count = $_POST['shirt_count'];
			$shirt_type = $_POST["shirt_type"];
			$shirt_length = texttoinch($_POST['shirt_length']);
			$shirt_shoulder = texttoinch($_POST['shirt_shoulder']);
			$shirt_sleeve = texttoinch($_POST['shirt_sleeve']);
			$shirt_chest = texttoinch($_POST['shirt_chest']);
			$shirt_stomach = texttoinch($_POST['shirt_stomach']);
			$shirt_seat = texttoinch($_POST['shirt_seat']);
			$shirt_sleevefit = $_POST['shirt_sleevefit'];
			$shirt_biceps = texttoinch($_POST['shirt_biceps']);
			$shirt_sleeve_loose = texttoinch($_POST['shirt_sleeve_loose']);
			$shirt_halfsleeve_loose = texttoinch($_POST['shirt_halfsleeve_loose']);
			$shirt_collar = texttoinch($_POST['shirt_collar']);
			$shirt_cuffbr = texttoinch($_POST['shirt_cuffbr']);
			$shirt_pocket = texttoinch($_POST['shirt_pocket']);
			$shirt_pocketdown = texttoinch($_POST['shirt_pocketdown']);
			$shirt_hala = texttoinch($_POST['shirt_hala']);
			$shirt_t1 = texttoinch($_POST['shirt_t1']);
			$shirt_t2 = texttoinch($_POST['shirt_t2']);
			$shirt_t3 = texttoinch($_POST['shirt_t3']);
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query1 = "UPDATE `measurement` SET `shirt_date`=\"$shirt_date\", `shirt_count`=$shirt_count, `shirt_type`=\"$shirt_type\", `shirt_length`=$shirt_length, 
				`shirt_shoulder`=$shirt_shoulder, `shirt_sleeve`=$shirt_sleeve, `shirt_chest`=$shirt_chest, `shirt_stomach`=$shirt_stomach, 
				`shirt_seat`=$shirt_seat, `shirt_sleevefit`=\"$shirt_sleevefit\", `shirt_biceps`=$shirt_biceps, 
				`shirt_sleeve_loose`=$shirt_sleeve_loose, `shirt_halfsleeve_loose`=$shirt_halfsleeve_loose, `shirt_collar`=$shirt_collar, 
				`shirt_cuffbr`=\"$shirt_cuffbr\", `shirt_pocket`=\"$shirt_pocket\", `shirt_pocketdown`=$shirt_pocketdown, 
				`shirt_hala`=$shirt_hala, `shirt_t1`=$shirt_t1, `shirt_t2`=$shirt_t2, `shirt_t3`=$shirt_t3 WHERE sr=$sr";
			
			$result1 = mysqli_query($dbc, $query1)
				or die('Error querying database query1.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "kurta": {
			$kurta_date = date("y-m-d");
			$kurta_count = $_POST['kurta_count'];
			$kurta_type = $_POST["kurta_type"];
			$kurta_length = texttoinch($_POST['kurta_length']);
			$kurta_shoulder = texttoinch($_POST['kurta_shoulder']);
			$kurta_sleeve = texttoinch($_POST['kurta_sleeve']);
			$kurta_chest = texttoinch($_POST['kurta_chest']);
			$kurta_stomach = texttoinch($_POST['kurta_stomach']);
			$kurta_seat = texttoinch($_POST['kurta_seat']);
			$kurta_sleevefit = $_POST['kurta_sleevefit'];
			$kurta_biceps = texttoinch($_POST['kurta_biceps']);
			$kurta_sleeve_loose = texttoinch($_POST['kurta_sleeve_loose']);
			$kurta_halfsleeve_loose = texttoinch($_POST['kurta_halfsleeve_loose']);
			$kurta_collar = texttoinch($_POST['kurta_collar']);
			$kurta_cuffbr = texttoinch($_POST['kurta_cuffbr']);
			$kurta_pocket = texttoinch($_POST['kurta_pocket']);
			$kurta_pocketdown = texttoinch($_POST['kurta_pocketdown']);
			$kurta_hala = texttoinch($_POST['kurta_hala']);
			$kurta_t1 = texttoinch($_POST['kurta_t1']);
			$kurta_t2 = texttoinch($_POST['kurta_t2']);
			$kurta_t3 = texttoinch($_POST['kurta_t3']);
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query1 = "UPDATE `measurement` SET `kurta_date`=\"$kurta_date\", `kurta_count`=$kurta_count, `kurta_type`=\"$kurta_type\", `kurta_length`=$kurta_length, 
				`kurta_shoulder`=$kurta_shoulder, `kurta_sleeve`=$kurta_sleeve, `kurta_chest`=$kurta_chest, `kurta_stomach`=$kurta_stomach, 
				`kurta_seat`=$kurta_seat, `kurta_sleevefit`=\"$kurta_sleevefit\", `kurta_biceps`=$kurta_biceps, 
				`kurta_sleeve_loose`=$kurta_sleeve_loose, `kurta_halfsleeve_loose`=$kurta_halfsleeve_loose, `kurta_collar`=$kurta_collar, 
				`kurta_cuffbr`=\"$kurta_cuffbr\", `kurta_pocket`=\"$kurta_pocket\", `kurta_pocketdown`=$kurta_pocketdown, 
				`kurta_hala`=$kurta_hala, `kurta_t1`=$kurta_t1, `kurta_t2`=$kurta_t2, `kurta_t3`=$kurta_t3 WHERE sr=$sr";
			
			$result1 = mysqli_query($dbc, $query1)
				or die('Error querying database query1.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "pathani": {
			$pathani_date = date("y-m-d");
			$pathani_count = $_POST['pathani_count'];
			$pathani_type = $_POST["pathani_type"];
			$pathani_length = texttoinch($_POST['pathani_length']);
			$pathani_shoulder = texttoinch($_POST['pathani_shoulder']);
			$pathani_sleeve = texttoinch($_POST['pathani_sleeve']);
			$pathani_chest = texttoinch($_POST['pathani_chest']);
			$pathani_stomach = texttoinch($_POST['pathani_stomach']);
			$pathani_seat = texttoinch($_POST['pathani_seat']);
			$pathani_sleevefit = $_POST['pathani_sleevefit'];
			$pathani_biceps = texttoinch($_POST['pathani_biceps']);
			$pathani_sleeve_loose = texttoinch($_POST['pathani_sleeve_loose']);
			$pathani_halfsleeve_loose = texttoinch($_POST['pathani_halfsleeve_loose']);
			$pathani_collar = texttoinch($_POST['pathani_collar']);
			$pathani_cuffbr = texttoinch($_POST['pathani_cuffbr']);
			$pathani_pocket = texttoinch($_POST['pathani_pocket']);
			$pathani_pocketdown = texttoinch($_POST['pathani_pocketdown']);
			$pathani_hala = texttoinch($_POST['pathani_hala']);
			$pathani_t1 = texttoinch($_POST['pathani_t1']);
			$pathani_t2 = texttoinch($_POST['pathani_t2']);
			$pathani_t3 = texttoinch($_POST['pathani_t3']);
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query1 = "UPDATE `measurement` SET `pathani_date`=\"$pathani_date\", `pathani_count`=$pathani_count, `pathani_type`=\"$pathani_type\", `pathani_length`=$pathani_length, 
				`pathani_shoulder`=$pathani_shoulder, `pathani_sleeve`=$pathani_sleeve, `pathani_chest`=$pathani_chest, `pathani_stomach`=$pathani_stomach, 
				`pathani_seat`=$pathani_seat, `pathani_sleevefit`=\"$pathani_sleevefit\", `pathani_biceps`=$pathani_biceps, 
				`pathani_sleeve_loose`=$pathani_sleeve_loose, `pathani_halfsleeve_loose`=$pathani_halfsleeve_loose, `pathani_collar`=$pathani_collar, 
				`pathani_cuffbr`=\"$pathani_cuffbr\", `pathani_pocket`=\"$pathani_pocket\", `pathani_pocketdown`=$pathani_pocketdown, 
				`pathani_hala`=$pathani_hala, `pathani_t1`=$pathani_t1, `pathani_t2`=$pathani_t2, `pathani_t3`=$pathani_t3 WHERE sr=$sr";
			
			$result1 = mysqli_query($dbc, $query1)
				or die('Error querying database query1.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "kandura": {
			$kandura_date = date("y-m-d");
			$kandura_count = $_POST['kandura_count'];
			$kandura_length = texttoinch($_POST['kandura_length']);
			$kandura_shoulder = texttoinch($_POST['kandura_shoulder']);
			$kandura_sleeve = texttoinch($_POST['kandura_sleeve']);
			$kandura_chest = texttoinch($_POST['kandura_chest']);
			$kandura_stomach = texttoinch($_POST['kandura_stomach']);
			$kandura_seat = texttoinch($_POST['kandura_seat']);
			$kandura_sleevefit = $_POST['kandura_sleevefit'];
			$kandura_biceps = texttoinch($_POST['kandura_biceps']);
			$kandura_sleeve_loose = texttoinch($_POST['kandura_sleeve_loose']);
			$kandura_halfsleeve_loose = texttoinch($_POST['kandura_halfsleeve_loose']);
			$kandura_collar = texttoinch($_POST['kandura_collar']);
			$kandura_cuffbr = texttoinch($_POST['kandura_cuffbr']);
			$kandura_pocket = texttoinch($_POST['kandura_pocket']);
			$kandura_pocketdown = texttoinch($_POST['kandura_pocketdown']);
			$kandura_hala = texttoinch($_POST['kandura_hala']);
			$kandura_t1 = texttoinch($_POST['kandura_t1']);
			$kandura_t2 = texttoinch($_POST['kandura_t2']);
			$kandura_t3 = texttoinch($_POST['kandura_t3']);
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query1 = "UPDATE `measurement` SET `kandura_date`=\"$kandura_date\", `kandura_count`=$kandura_count, `kandura_length`=$kandura_length, 
				`kandura_shoulder`=$kandura_shoulder, `kandura_sleeve`=$kandura_sleeve, `kandura_chest`=$kandura_chest, `kandura_stomach`=$kandura_stomach, 
				`kandura_seat`=$kandura_seat, `kandura_sleevefit`=\"$kandura_sleevefit\", `kandura_biceps`=$kandura_biceps, 
				`kandura_sleeve_loose`=$kandura_sleeve_loose, `kandura_halfsleeve_loose`=$kandura_halfsleeve_loose, `kandura_collar`=$kandura_collar, 
				`kandura_cuffbr`=\"$kandura_cuffbr\", `kandura_pocket`=\"$kandura_pocket\", `kandura_pocketdown`=$kandura_pocketdown, 
				`kandura_hala`=$kandura_hala, `kandura_t1`=$kandura_t1, `kandura_t2`=$kandura_t2, `kandura_t3`=$kandura_t3 WHERE sr=$sr";
			
			$result1 = mysqli_query($dbc, $query1)
				or die('Error querying database query1.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "pant": {
			$pant_date = date("y-m-d");
			$pant_count = $_POST['pant_count'];
			$pant_length = texttoinch($_POST['pant_length']);
			$pant_fork = texttoinch($_POST['pant_fork']);
			$pant_waist = texttoinch($_POST['pant_waist']);
			$pant_seat = texttoinch($_POST['pant_seat']);
			$pant_thighs_fix = texttoinch($_POST['pant_thighs_fix']);
			$pant_thighs_loose = texttoinch($_POST['pant_thighs_loose']);
			$pant_calfln = texttoinch($_POST['pant_calfln']);
			$pant_calf = texttoinch($_POST['pant_calf']);
			$pant_bottom = texttoinch($_POST['pant_bottom']);
			$pant_cuttingfactor = texttoinch($_POST['pant_cuttingfactor']);
			$pant_pocket = $_POST['pant_pocket'];
			$pant_belt = $_POST['pant_belt'];
			$pant_backpocket = $_POST['pant_backpocket'];
			$pant_watchpocket = $_POST['pant_watchpocket'];
			$pant_plits = $_POST['pant_plits'];
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query = "UPDATE `measurement` SET `pant_date`=\"$pant_date\", `pant_count`=$pant_count, `pant_length`=$pant_length, 
				`pant_fork`=$pant_fork, `pant_waist`=$pant_waist, `pant_seat`=$pant_seat, `pant_thighs_fix`=$pant_thighs_fix, 
				`pant_thighs_loose`=$pant_thighs_loose, `pant_calfln`=$pant_calfln, `pant_calf`=$pant_calf, 
				`pant_bottom`=$pant_bottom, `pant_cuttingfactor`=$pant_cuttingfactor, `pant_pocket`=\"$pant_pocket\", 
				`pant_belt`=\"$pant_belt\", `pant_backpocket`=$pant_backpocket, `pant_watchpocket`=$pant_watchpocket, 
				`pant_plits`=$pant_plits WHERE sr=$sr";
			
			$result = mysqli_query($dbc, $query)
				or die('Error querying database.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "bpyjama": {
			$bpyjama_date = date("y-m-d");
			$bpyjama_count = $_POST['bpyjama_count'];
			$bpyjama_length = texttoinch($_POST['bpyjama_length']);
			$bpyjama_fork = texttoinch($_POST['bpyjama_fork']);
			$bpyjama_waist = texttoinch($_POST['bpyjama_waist']);
			$bpyjama_seat = texttoinch($_POST['bpyjama_seat']);
			$bpyjama_thighs_fix = texttoinch($_POST['bpyjama_thighs_fix']);
			$bpyjama_thighs_loose = texttoinch($_POST['bpyjama_thighs_loose']);
			$bpyjama_calfln = texttoinch($_POST['bpyjama_calfln']);
			$bpyjama_calf = texttoinch($_POST['bpyjama_calf']);
			$bpyjama_bottom = texttoinch($_POST['bpyjama_bottom']);
			$bpyjama_cuttingfactor = texttoinch($_POST['bpyjama_cuttingfactor']);
			$bpyjama_pocket = $_POST['bpyjama_pocket'];
			$bpyjama_belt = $_POST['bpyjama_belt'];
			$bpyjama_watchpocket = $_POST['bpyjama_watchpocket'];
			$bpyjama_plits = $_POST['bpyjama_plits'];
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query = "UPDATE `measurement` SET `bpyjama_date`=\"$bpyjama_date\", `bpyjama_count`=$bpyjama_count, 
				`bpyjama_length`=$bpyjama_length, `bpyjama_fork`=$bpyjama_fork, `bpyjama_waist`=$bpyjama_waist, 
				`bpyjama_seat`=$bpyjama_seat, `bpyjama_thighs_fix`=$bpyjama_thighs_fix, `bpyjama_thighs_loose`=$bpyjama_thighs_loose, 
				`bpyjama_calfln`=$bpyjama_calfln, `bpyjama_calf`=$bpyjama_calf, 
				`bpyjama_bottom`=$bpyjama_bottom, `bpyjama_cuttingfactor`=$bpyjama_cuttingfactor, 
				`bpyjama_pocket`=\"$bpyjama_pocket\", `bpyjama_belt`=\"$bpyjama_belt\", 
				`bpyjama_watchpocket`=$bpyjama_watchpocket, `bpyjama_plits`=$bpyjama_plits WHERE sr=$sr";
			
			$result = mysqli_query($dbc, $query)
				or die('Error querying database.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "pyjama": {
			$pyjama_date = date("y-m-d");
			$pyjama_count = $_POST['pyjama_count'];
			$pyjama_type = $_POST['pyjama_type'];
			$pyjama_length = $_POST['pyjama_length'];
			$pyjama_waist = $_POST['pyjama_waist'];
			$pyjama_fork = $_POST['pyjama_fork'];
			$pyjama_gher = $_POST['pyjama_gher'];
			$pyjama_kneeln = $_POST['pyjama_kneeln'];
			$pyjama_knee = $_POST['pyjama_knee'];
			$pyjama_bottom = $_POST['pyjama_bottom'];
			$pyjama_pocket = $_POST['pyjama_pocket'];
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query = "UPDATE `measurement` SET `pyjama_date`=\"$pyjama_date\", `pyjama_count`=$pyjama_count, `pyjama_type`=\"$pyjama_type\", `pyjama_length`=$pyjama_length, 
				`pyjama_waist`=$pyjama_waist, `pyjama_fork`=$pyjama_fork, `pyjama_gher`=$pyjama_gher, `pyjama_kneeln`=$pyjama_kneeln, 
				`pyjama_knee`=$pyjama_knee, `pyjama_bottom`=$pyjama_bottom, `pyjama_pocket`=\"$pyjama_pocket\" WHERE sr=$sr";
			
			$result = mysqli_query($dbc, $query)
				or die('Error querying database.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "salwar": {
			$salwar_date = date("y-m-d");
			$salwar_count = $_POST['salwar_count'];
			$salwar_type = $_POST['salwar_type'];
			$salwar_length = texttoinch($_POST['salwar_length']);
			$salwar_waist = texttoinch($_POST['salwar_waist']);
			$salwar_fork = texttoinch($_POST['salwar_fork']);
			$salwar_gher = texttoinch($_POST['salwar_gher']);
			$salwar_bottom = texttoinch($_POST['salwar_bottom']);
			$salwar_chainpocket = $_POST['salwar_chainpocket'];
			$salwar_watchpocket = $_POST['salwar_watchpocket'];
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query = "UPDATE `measurement` SET `salwar_date`=\"$salwar_date\", `salwar_count`=$salwar_count, `salwar_type`=\"$salwar_type\", `salwar_length`=$salwar_length, 
				`salwar_bottom`=$salwar_bottom, `salwar_waist`=$salwar_waist, `salwar_fork`=$salwar_fork, `salwar_gher`=$salwar_gher, 
				`salwar_chainpocket`=$salwar_chainpocket, `salwar_watchpocket`=$salwar_watchpocket WHERE sr=$sr";
			
			$result = mysqli_query($dbc, $query)
				or die('Error querying database.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "aligard": {
			$aligard_date = date("y-m-d");
			$aligard_count = $_POST['aligard_count'];
			$aligard_type = $_POST['aligard_type'];
			$aligard_length = $_POST['aligard_length'];
			$aligard_waist = $_POST['aligard_waist'];
			$aligard_fork = $_POST['aligard_fork'];
			$aligard_gher = $_POST['aligard_gher'];
			$aligard_kneeln = $_POST['aligard_kneeln'];
			$aligard_knee_loose = $_POST['aligard_knee_loose'];
			$aligard_calfln = $_POST['aligard_calfln'];
			$aligard_calf_loose = $_POST['aligard_calf_loose'];
			$aligard_bottom = $_POST['aligard_bottom'];
			$aligard_chainpocket = $_POST['aligard_chainpocket'];
			$aligard_chainfly = $_POST['aligard_chainfly'];
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query = "UPDATE `measurement` SET `aligard_date`=\"$aligard_date\", `aligard_count`=$aligard_count, `aligard_type`=\"$aligard_type\", 
				`aligard_length`=$aligard_length, `aligard_waist`=$aligard_waist, `aligard_fork`=$aligard_fork, 
				`aligard_gher`=$aligard_gher, `aligard_kneeln`=$aligard_kneeln, `aligard_knee_loose`=$aligard_knee_loose, 
				`aligard_calfln`=$aligard_calfln, `aligard_calf_loose`=$aligard_calf_loose, `aligard_bottom`=$aligard_bottom, 
				`aligard_chainpocket`=$aligard_chainpocket, `aligard_chainfly`=$aligard_chainfly WHERE sr=$sr";
			
			$result = mysqli_query($dbc, $query)
				or die('Error querying database.');
			
			mysqli_close($dbc);
			
		}	break;
		
		case "churidar": {
			$churidar_date = date("y-m-d");
			$churidar_count = $_POST['churidar_count'];
			$churidar_type = $_POST['churidar_type'];
			$churidar_length = $_POST['churidar_length'];
			$churidar_length_fix = $_POST['churidar_length_fix'];
			$churidar_waist = $_POST['churidar_waist'];
			$churidar_fork = $_POST['churidar_fork'];
			$churidar_gher = $_POST['churidar_gher'];
			$churidar_kneeln = $_POST['churidar_kneeln'];
			$churidar_knee_loose = $_POST['churidar_knee_loose'];
			$churidar_calfln1 = $_POST['churidar_calfln1'];
			$churidar_calf_loose1 = $_POST['churidar_calf_loose1'];
			$churidar_calfln2 = $_POST['churidar_calfln2'];
			$churidar_calf_loose2 = $_POST['churidar_calf_loose2'];
			$churidar_calfln3 = $_POST['churidar_calfln3'];
			$churidar_calf_loose3 = $_POST['churidar_calf_loose3'];
			$churidar_calfln4 = $_POST['churidar_calfln4'];
			$churidar_calf_loose4 = $_POST['churidar_calf_loose4'];
			$churidar_bottom1 = $_POST['churidar_bottom1'];
			$churidar_bottom2 = $_POST['churidar_bottom2'];
			
			$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
				or die('Error connecting to MySQL server.');
			
			$query = "UPDATE `measurement` SET `churidar_date`=\"$churidar_date\", `churidar_count`=$churidar_count, 
				`churidar_type`=\"$churidar_type\", `churidar_length`=$churidar_length, `churidar_length_fix`=$churidar_length_fix, 
				`churidar_waist`=$churidar_waist, `churidar_fork`=$churidar_fork, `churidar_gher`=$churidar_gher, 
				`churidar_kneeln`=$churidar_kneeln, `churidar_knee_loose`=$churidar_knee_loose, 
				`churidar_calfln1`=$churidar_calfln1, `churidar_calf_loose1`=$churidar_calf_loose1, 
				`churidar_calfln2`=$churidar_calfln2, `churidar_calf_loose2`=$churidar_calf_loose2, 
				`churidar_calfln3`=$churidar_calfln3, `churidar_calf_loose3`=$churidar_calf_loose3, 
				`churidar_calfln4`=$churidar_calfln4, `churidar_calf_loose4`=$churidar_calf_loose4, 
				`churidar_bottom1`=$churidar_bottom1, `churidar_bottom2`=$churidar_bottom2 WHERE sr=$sr";
			
			$result = mysqli_query($dbc, $query)
				or die('Error querying database.');
			
			mysqli_close($dbc);
			
		}	break;
		
	}
?>

</div>
</body>
</html>