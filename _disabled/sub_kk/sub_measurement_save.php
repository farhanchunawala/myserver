<?php
	$garb_type = $_GET['garb_type'];
	$garb_style = $_POST["garb_style"];
	$measure_date = date("y-m-d");
	
	$query11 = "SELECT `sr`,`garb_type` FROM `measurement` WHERE sr=$sr AND garb_type=\"$garb_type\" ";
	
	$result11 = mysqli_query($dbc, $query11) or die('<b>Error measurement_save.php/query11 : </b><br/>'.mysqli_error($dbc));
		
	$rowq11 = mysqli_fetch_array($result11);
	
	if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {
		
		$length = texttoinch($_POST['length']);
		$shoulder = texttoinch($_POST['shoulder']);
		$sleeve = texttoinch($_POST['sleeve']);
		$chest = texttoinch($_POST['chest']);
		$stomach = texttoinch($_POST['stomach']);
		$seat = texttoinch($_POST['seat']);
		$sleevefit = $_POST['sleevefit'];
		$biceps = texttoinch($_POST['biceps']);
		$sleeve_loose = texttoinch($_POST['sleeve_loose']);
		$halfsleeve_loose = texttoinch($_POST['halfsleeve_loose']);
		$collar = texttoinch($_POST['collar']);
		$cuffbr = texttoinch($_POST['cuffbr']);
		$pocket = texttoinch($_POST['pocket']);
		$pocketdown = texttoinch($_POST['pocketdown']);
		$hala = texttoinch($_POST['hala']);
		$t1 = texttoinch($_POST['t1']);
		$t2 = texttoinch($_POST['t2']);
		$t3 = texttoinch($_POST['t3']);
		
		if (!isset($rowq11['sr']) && !isset($rowq11['garb_type'])) {
		$query_msv = "INSERT INTO `measurement` (`sr`, `garb_type`, `garb_style`, `measure_date`, `top_length`, `top_shoulder`, `top_sleeve`, 
			`top_chest`, `top_stomach`, `top_seat`, `top_sleevefit`, `top_biceps`, `top_sleeve_loose`, `top_halfsleeve_loose`, 
			`top_collar`, `top_cuffbr`, `top_pocketdown`, `top_pocket`, `top_hala`, `top_t1`, `top_t2`, `top_t3`) 
			VALUES ($sr, \"$garb_type\", \"$garb_style\", \"$measure_date\", $length, $shoulder, $sleeve, $chest, $stomach, $seat, \"$sleevefit\", 
			\"$biceps\", \"$sleeve_loose\", \"$halfsleeve_loose\", \"$collar\", \"$cuffbr\", \"$pocketdown\", \"$pocket\", \"$hala\", $t1, $t2, $t3)";
		}
		else {
		$query_msv = "UPDATE `measurement` SET `garb_type`=\"$garb_type\", `garb_style`=\"$garb_style\", `measure_date`=\"$measure_date\", 
			`top_length`=$length, `top_shoulder`=$shoulder, `top_sleeve`=$sleeve, `top_chest`=$chest, `top_stomach`=$stomach, `top_seat`=$seat, 
			`top_sleevefit`=\"$sleevefit\", `top_biceps`=\"$biceps\", `top_sleeve_loose`=\"$sleeve_loose\", `top_halfsleeve_loose`=\"$halfsleeve_loose\", 
			`top_collar`=\"$collar\", `top_cuffbr`=\"$cuffbr\", `top_pocketdown`=\"$pocketdown\", `top_pocket`=\"$pocket\", `top_hala`=\"$hala\", 
			`top_t1`=$t1, `top_t2`=$t2, `top_t3`=$t3 WHERE sr=$sr AND garb_type=\"$garb_type\" ";
		}
	}
	elseif ($garb_type=='pant' || $garb_type=='bpyjama' || $garb_type=='pyjama' || $garb_type=='salwar' || $garb_type=='aligard' || $garb_type=='churidar') {
		
		$length = texttoinch($_POST['length']);
		$length_fix = texttoinch($_POST['length_fix']);
		$fork = texttoinch($_POST['fork']);
		$waist = texttoinch($_POST['waist']);
		$pleats = texttoinch($_POST['pleats']);
		$seat = texttoinch($_POST['seat']);
		$thigh_fix = texttoinch($_POST['thigh_fix']);
		$thigh_loose = texttoinch($_POST['thigh_loose']);
		$kneeln = texttoinch($_POST['kneeln']);
		$knee_loose = texttoinch($_POST['knee_loose']);
		$calfln = texttoinch($_POST['calfln']);
		$calf_loose = texttoinch($_POST['calf_loose']);
		$calfln2 = texttoinch($_POST['calfln2']);
		$calf_loose2 = texttoinch($_POST['calf_loose2']);
		$calfln3 = texttoinch($_POST['calfln3']);
		$calf_loose3 = texttoinch($_POST['calf_loose3']);
		$calfln4 = texttoinch($_POST['calfln4']);
		$calf_loose4 = texttoinch($_POST['calf_loose4']);
		$bottom = texttoinch($_POST['bottom']);
		$bottom2 = texttoinch($_POST['bottom2']);
		$cuttingfactor = texttoinch($_POST['cuttingfactor']);
		$chainfly = $_POST['chainfly'];
		$belt_style = $_POST['belt_style'];
		$pocket_style = $_POST['pocket_style'];
		$pocket = $_POST['pocket'];
		$backpocket = $_POST['backpocket'];
		$watchpocket = $_POST['watchpocket'];
		
		if (!isset($rowq11['sr']) && !isset($rowq11['garb_type'])) {
		$query_msv = "INSERT INTO `measurement` (`sr`, `garb_type`, `garb_style`, `measure_date`, 
			`bottom_length`, `bottom_length_fix`, `bottom_fork`, `bottom_waist`, `bottom_pleats`, `bottom_seat`, `bottom_thigh_fix`, `bottom_thigh_loose`, 
			`bottom_kneeln`, `bottom_knee_loose`, `bottom_calfln`, `bottom_calf_loose`, `bottom_calfln2`, `bottom_calf_loose2`, 
			`bottom_calfln3`, `bottom_calf_loose3`, `bottom_calfln4`, `bottom_calf_loose4`, `bottom_bottom`, `bottom_bottom2`, `bottom_cuttingfactor`, 
			`bottom_chainfly`, `bottom_belt_style`, `bottom_pocket_style`, `bottom_pocket`, `bottom_backpocket`, `bottom_watchpocket`) 
			VALUES ($sr, \"$garb_type\", \"$garb_style\", \"$measure_date\", $length, \"$length_fix\", \"$fork\", \"$waist\", \"$pleats\", \"$seat\", 
			\"$thigh_fix\", \"$thigh_loose\", \"$kneeln\", \"$knee_loose\", \"$calfln\", \"$calf_loose\", \"$calfln2\", \"$calf_loose2\", 
			\"$calfln3\", \"$calf_loose3\", \"$calfln4\", \"$calf_loose4\", \"$bottom\", \"$bottom2\", \"$cuttingfactor\", 
			\"$chain_fly\", \"$belt_style\", \"$pocket_style\", \"$pocket\", \"$backpocket\", \"$watchpocket\" )";
		}
		else {
		$query_msv = "UPDATE `measurement` SET `garb_type`=\"$garb_type\", `garb_style`=\"$garb_style\", `measure_date`=\"$measure_date\", 
			`bottom_length`=$length, `bottom_length_fix`=\"$length_fix\", `bottom_fork`=\"$fork\", `bottom_waist`=\"$waist\", `bottom_pleats`=\"$pleats\", 
			`bottom_seat`=\"$seat\", `bottom_thigh_fix`=\"$thigh_fix\", `bottom_thigh_loose`=\"$thigh_loose\", `bottom_kneeln`=\"$kneeln\", 
			`bottom_knee_loose`=\"$knee_loose\", `bottom_calfln`=\"$calfln\", `bottom_calf_loose`=\"$calf_loose\", `bottom_calfln2`=\"$calfln2\", 
			`bottom_calf_loose2`=\"$calf_loose2\", `bottom_calfln3`=\"$calfln3\", `bottom_calf_loose3`=\"$calf_loose3\", `bottom_calfln4`=\"$calfln4\", 
			`bottom_calf_loose4`=\"$calf_loose4\", `bottom_bottom`=\"$bottom\", `bottom_bottom2`=\"$bottom2\", `bottom_cuttingfactor`=\"$cuttingfactor\", 
			`bottom_chainfly`=\"$chain_fly\", `bottom_belt_style`=\"$belt_style\", `bottom_pocket_style`=\"$pocket_style\", 
			`bottom_pocket`=\"$pocket\", `bottom_backpocket`=\"$backpocket\", `bottom_watchpocket`=\"$watchpocket\" WHERE sr=$sr AND garb_type=\"$garb_type\" ";
		}
	}
	
	$result_msv = mysqli_query($dbc, $query_msv) or die('<b>Error query_msv : </b>'.mysqli_error($dbc));
	
?>
