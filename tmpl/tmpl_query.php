<?php
	
	$qrys_meas = "SELECT * FROM meas WHERE sr=$sr ";
	$result_meas  = mysqli_query($dbc, $qrys_meas) or die('<b>Error dim/dim_meas.php/qrys_meas : </b><br/>'.mysqli_error($dbc));
	$rq_meas   = mysqli_fetch_array($result_meas);
	foreach ($a_meas as $var) $$var = $rq_meas[$var];
	
	
	$dbc = mysqli_connect($svr_host, $svr_usr, $svr_pwd, 'kkmenswear') or die('Error connecting to MySQL server.');
	
	{	//	query_select_cust
		$querys_cust = "SELECT `sr`, `name`, `surname`, `mobile_no1`, `mobile_no2`, `mobile_no3` 
			FROM `cust` WHERE sr=$sr ORDER BY sr DESC";
		
		$results_cust = mysqli_query($dbc, $querys_cust) or die('<b>Error filename.php/querys_cust : </b><br/>'.mysqli_error($dbc));
		$rq_cust = mysqli_fetch_array($results_cust);
	}
	
	{	//	query_select_meas
		$querys_meas = "SELECT `sr`, `measure_date`, `shirt_ln`, `kurta_ln`, `kandura_ln`, `pant_ln`, `bpyjama_ln`, `pyjama_ln`, `salwar_ln`, 
			`aligard_ln`, `shoulder_ln`, `sleeve_ln`, `fork_ln`, `neck`, `biceps`, `cuff`, `chest`, `stomach`, `waist`, `seat`, `thigh`, `calf`, `bottom` 
			FROM `meas` WHERE sr=$sr ORDER BY sr DESC";
		
		$results_meas = mysqli_query($dbc, $querys_meas) or die('<b>Error filename.php/querys_meas : </b><br/>'.mysqli_error($dbc));
		$rq_meas = mysqli_fetch_array($results_meas);
	}
	
	{	//	query_select_measkk
		$querys_measkk = "SELECT `sr`, `garb_type`, `garb_style`, `measure_date`, `top_length`, `top_shoulder`, `top_sleeve`, `top_chest`, 
			`top_stomach`, `top_seat`, `top_sleevefit`, `top_biceps`, `top_sleeve_loose`, `top_halfsleeve_loose`, `top_collar`, `top_cuffbr`, 
			`top_pocketdown`, `top_pocket`, `top_hala`, `top_t1`, `top_t2`, `top_t3`, `bottom_length`, `bottom_length_fix`, `bottom_fork`, `bottom_waist`, 
			`bottom_pleats`, `bottom_seat`, `bottom_thigh_fix`, `bottom_thigh_loose`, `bottom_kneeln`, `bottom_knee_loose`, `bottom_calfln`, 
			`bottom_calf_loose`, `bottom_calfln2`, `bottom_calf_loose2`, `bottom_calfln3`, `bottom_calf_loose3`, `bottom_calfln4`, `bottom_calf_loose4`, 
			`bottom_bottom`, `bottom_bottom2`, `bottom_cuttingfactor`, `bottom_chainfly`, `bottom_belt_style`, `bottom_pocket_style`, `bottom_pocket`, 
			`bottom_backpocket`, `bottom_watchpocket` 
			FROM `measkk` WHERE sr=$sr ORDER BY sr DESC";
		
		$results_measkk = mysqli_query($dbc, $querys_measkk) or die('<b>Error filename.php/querys_measkk : </b><br/>'.mysqli_error($dbc));
		$rq_measkk = mysqli_fetch_array($results_measkk);
	}
	
	{	//	query_select_entry
		$querys_entry = "SELECT `garb_id`, `sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_book_date`, `garb_submit_date`, `garb_pana`, 
			`garb_clothln`, `garb_cutting`, `garb_sewing`, `garb_kaj_sent`, `garb_kaj`, `garb_button_sent`, `garb_button`, `garb_press_sent`, `garb_press`, 
			`garb_packing`, `garb_delivery` 
			FROM `entry` WHERE sr=$sr ORDER BY sr DESC";
		
		$results_entry = mysqli_query($dbc, $querys_entry) or die('<b>Error filename.php/querys_entry : </b><br/>'.mysqli_error($dbc));
		$rq_entry = mysqli_fetch_array($results_entry);
	}
	
	{	//	query_select_style
		$querys_style = "SELECT `style_id`, `sr`, `garb_type`, `top_collartype`, `top_cuffln`, `top_cufftype`, `top_pockettype`, `top_shouldertype`, 
			`top_taweeztype`, `bottom_crease` 
			FROM `style` WHERE sr=$sr ORDER BY sr DESC";
		
		$results_style = mysqli_query($dbc, $querys_style) or die('<b>Error filename.php/querys_style : </b><br/>'.mysqli_error($dbc));
		$rq_style = mysqli_fetch_array($results_style);
	}
	
	{	//	query_update_entry
		$queryu_entry = "UPDATE $entrytable SET `garb_cutting`=\"$cutting[$i]\", `garb_sewing`=\"$sewing[$i]\", `garb_kaj`=\"$kaj[$i]\", 
			`garb_button`=\"$button[$i]\", `garb_press`=\"$press[$i]\", `garb_packing`=\"$packing[$i]\", `garb_delivery`=\"$delivery[$i]\" 
			WHERE garb_id=$garb[$i]";
		
		$resultu_entry = mysqli_query($dbc, $queryu_entry) or die('<b>Error filename.php/queryu_entry : </b><br/>'.mysqli_error($dbc));
	}
	
	mysqli_close($dbc);
	
?>
