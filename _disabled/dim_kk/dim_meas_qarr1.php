<?php
	if ($meas==='thigh_fix' || $meas==='thigh_loose' || $meas==='cuttingfactor') $query_arr_meas1 = "SELECT * FROM `measurement` WHERE garb_type=\"$garb_type\" && $garb_category".'_'."$meas!=0 && $garb_category".'_'."$tt!=0 && bottom_pleats=0 ORDER BY $order_col";
	else $query_arr_meas1 = "SELECT * FROM `measurement` WHERE garb_type=\"$garb_type\" && $garb_category".'_'."$meas!=0 && $garb_category".'_'."$tt!=0 ORDER BY $order_col";
	
	$result_arr_meas1 = mysqli_query($dbc, $query_arr_meas1)
		or die('<b>Error dimension/measure.php/query2 : </b><br/>'.mysqli_error($dbc));
	
	$sr = $garb_style = $measure_date = $length = $shoulder = $sleeve = $chest = $stomach = $seat = $sleevefit = $sleeve_loose = $halfsleeve_loose = 
	$biceps = $collar = $cuffbr = $pocketdown = $pocket = $hala = $t1 = $t2 = $t3 = [];
	$length_fix = $fork = $waist = $pleats = $thigh_fix = $thigh_loose = $kneeln = $knee_loose = $calfln = $calf_loose = $calfln2 = $calf_loose2 = 
	$calfln3 = $calf_loose3 = $calfln4 = $calf_loose4 = $bottom = $bottom2 = $cuttingfactor = 
	$chainfly = $belt_style = $pocket_style = $pocket = $backpocket = $watchpocket = [];
	
	$i=1;
	while ($qarr_meas1 = mysqli_fetch_array($result_arr_meas1)) {
		
		$sr[$i] = $qarr_meas1['sr'];
		
		if (isset($sr[$i])) {
			
			$garb_style[$i] = $qarr_meas1['garb_style'];
			$measure_date[$i] = strtotime($qarr_meas1['measure_date']);
			
			if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {
				
				$length[$i] = $qarr_meas1['top_length'];
				$shoulder[$i] = $qarr_meas1['top_shoulder'];
				$sleeve[$i] = $qarr_meas1['top_sleeve'];
				$chest[$i] = $qarr_meas1['top_chest'];
				$stomach[$i] = $qarr_meas1['top_stomach'];
				$seat[$i] = $qarr_meas1['top_seat'];
				$sleevefit[$i] = $qarr_meas1['top_sleevefit'];
				$sleeve_loose[$i] = $qarr_meas1['top_sleeve_loose'];
				$halfsleeve_loose[$i] = $qarr_meas1['top_halfsleeve_loose'];
				$biceps[$i] = $qarr_meas1['top_biceps'];
				$collar[$i] = $qarr_meas1['top_collar'];
				$cuffbr[$i] = $qarr_meas1['top_cuffbr'];
				$pocketdown[$i] = $qarr_meas1['top_pocketdown'];
				$pocket[$i] = $qarr_meas1['top_pocket'];
				$hala[$i] = $qarr_meas1['top_hala'];
				$t1[$i] = $qarr_meas1['top_t1'];
				$t2[$i] = $qarr_meas1['top_t2'];
				$t3[$i] = $qarr_meas1['top_t3'];
				
			}
			elseif ($garb_type=='pant' || $garb_type=='bpyjama' || $garb_type=='pyjama' || $garb_type=='salwar' || $garb_type=='aligard' || $garb_type=='churidar') {
				
				$length[$i] = $qarr_meas1['bottom_length'];
				$length_fix[$i] = $qarr_meas1['bottom_length_fix'];
				$fork[$i] = $qarr_meas1['bottom_fork'];
				$waist[$i] = $qarr_meas1['bottom_waist'];
				$pleats[$i] = $qarr_meas1['bottom_pleats'];
				$seat[$i] = $qarr_meas1['bottom_seat'];
				$thigh_fix[$i] = $qarr_meas1['bottom_thigh_fix'];
				$thigh_loose[$i] = $qarr_meas1['bottom_thigh_loose'];
				$kneeln[$i] = $qarr_meas1['bottom_kneeln'];
				$knee_loose[$i] = $qarr_meas1['bottom_knee_loose'];
				$calfln[$i] = $qarr_meas1['bottom_calfln'];
				$calf_loose[$i] = $qarr_meas1['bottom_calf_loose'];
				$calfln2[$i] = $qarr_meas1['bottom_calfln2'];
				$calf_loose2[$i] = $qarr_meas1['bottom_calf_loose2'];
				$calfln3[$i] = $qarr_meas1['bottom_calfln3'];
				$calf_loose3[$i] = $qarr_meas1['bottom_calf_loose3'];
				$calfln4[$i] = $qarr_meas1['bottom_calfln4'];
				$calf_loose4[$i] = $qarr_meas1['bottom_calf_loose4'];
				$bottom[$i] = $qarr_meas1['bottom_bottom'];
				$bottom2[$i] = $qarr_meas1['bottom_bottom2'];
				$cuttingfactor[$i] = $qarr_meas1['bottom_cuttingfactor'];
				$chainfly[$i] = $qarr_meas1['bottom_chainfly'];
				$belt_style[$i] = $qarr_meas1['bottom_belt_style'];
				$pocket_style[$i] = $qarr_meas1['bottom_pocket_style'];
				$pocket[$i] = $qarr_meas1['bottom_pocket'];
				$backpocket[$i] = $qarr_meas1['bottom_backpocket'];
				$watchpocket[$i] = $qarr_meas1['bottom_watchpocket'];
				
			}
			
		}
		$i++;
	}
	$srcount = count($sr);
?>