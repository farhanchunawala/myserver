<?php
	$query2 = "SELECT * FROM `measurement` WHERE sr=$sr AND garb_type=\"$garb_type\" ";
	
	$result2 = mysqli_query($dbc, $query2)
		or die('<b>Error dimension/measure.php/query2 : </b><br/>'.mysqli_error($dbc));
	
	$rowq2 = mysqli_fetch_array($result2);
	
	//$count = $rowq2['garb_count'];
	$garb_style[$garb_type] = $rowq2['garb_style'];
	$measure_date = strtotime($rowq2['measure_date']);
	
	if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {
		
		$length[$garb_type] = $rowq2['top_length'];
		$shoulder[$garb_type] = $rowq2['top_shoulder'];
		$sleeve[$garb_type] = $rowq2['top_sleeve'];
		$chest[$garb_type] = $rowq2['top_chest'];
		$stomach[$garb_type] = $rowq2['top_stomach'];
		$seat[$garb_type] = $rowq2['top_seat'];
		$sleevefit[$garb_type] = $rowq2['top_sleevefit'];
		$sleeve_loose[$garb_type] = $rowq2['top_sleeve_loose'];
		$halfsleeve_loose[$garb_type] = $rowq2['top_halfsleeve_loose'];
		$biceps[$garb_type] = $rowq2['top_biceps'];
		$collar[$garb_type] = $rowq2['top_collar'];
		$cuffbr[$garb_type] = $rowq2['top_cuffbr'];
		$pocketdown[$garb_type] = $rowq2['top_pocketdown'];
		$pocket[$garb_type] = $rowq2['top_pocket'];
		$hala[$garb_type] = $rowq2['top_hala'];
		$t1[$garb_type] = $rowq2['top_t1'];
		$t2[$garb_type] = $rowq2['top_t2'];
		$t3[$garb_type] = $rowq2['top_t3'];
		
		
		$s_garb_style_bshirt = $s_garb_style_bshirtsc = $s_garb_style_round = "";
		if ($garb_style=="bshirt") {
			$s_garb_style_bshirt = "selected";
		} elseif ($garb_style=="bshirtsc") {
			$s_garb_style_bshirtsc = "selected";
		} elseif ($garb_style=="round") {
			$s_garb_style_round = "selected";
		}
		
		$s_sleevefit_sl = $s_sleevefit_slp = $s_sleevefit_sm = $s_sleevefit_smp = $s_sleevefit_sf = $s_sleevefit_sfp = "";
		if ($sleevefit=="sl") {
			$s_sleevefit_sl = "selected";
		} elseif ($sleevefit=="slp") {
			$s_sleevefit_slp = "selected";
		} elseif ($sleevefit=="sm") {
			$s_sleevefit_sm = "selected";
		} elseif ($sleevefit=="smp") {
			$s_sleevefit_smp = "selected";
		} elseif ($sleevefit=="sf") {
			$s_sleevefit_sf = "selected";
		} elseif ($sleevefit=="sfp") {
			$s_sleevefit_sfp = "selected";
		}
		
		$s_pocket_pocketa = $s_pocket_pocketb = $s_pocket_pocketc = $s_pocket_pocketd = $s_pocket_pockete = $s_pocket_pocketf = $s_pocket_pocketg = $s_pocket_pocketh = "";
		if ($pocket=="pocketa") {
			$s_pocket_pocketa = "selected";
		} elseif ($pocket=="pocketb") {
			$s_pocket_pocketb = "selected";
		} elseif ($pocket=="pocketc") {
			$s_pocket_pocketc = "selected";
		} elseif ($pocket=="pocketd") {
			$s_pocket_pocketd = "selected";
		} elseif ($pocket=="pockete") {
			$s_pocket_pockete = "selected";
		} elseif ($pocket=="pocketf") {
			$s_pocket_pocketf = "selected";
		} elseif ($pocket=="pocketg") {
			$s_pocket_pocketg = "selected";
		} elseif ($pocket=="pocketh") {
			$s_pocket_pocketh = "selected";
		}
		
	}
	elseif ($garb_type=='pant' || $garb_type=='bpyjama' || $garb_type=='pyjama' || $garb_type=='salwar' || $garb_type=='aligard' || $garb_type=='churidar') {
		
		$length[$garb_type] = $rowq2['bottom_length'];
		$length_fix[$garb_type] = $rowq2['bottom_length_fix'];
		$fork[$garb_type] = $rowq2['bottom_fork'];
		$waist[$garb_type] = $rowq2['bottom_waist'];
		$pleats[$garb_type] = $rowq2['bottom_pleats'];
		$seat[$garb_type] = $rowq2['bottom_seat'];
		$thigh_fix[$garb_type] = $rowq2['bottom_thigh_fix'];
		$thigh_loose[$garb_type] = $rowq2['bottom_thigh_loose'];
		$kneeln[$garb_type] = $rowq2['bottom_kneeln'];
		$knee_loose[$garb_type] = $rowq2['bottom_knee_loose'];
		$calfln[$garb_type] = $rowq2['bottom_calfln'];
		$calf_loose[$garb_type] = $rowq2['bottom_calf_loose'];
		$calfln2[$garb_type] = $rowq2['bottom_calfln2'];
		$calf_loose2[$garb_type] = $rowq2['bottom_calf_loose2'];
		$calfln3[$garb_type] = $rowq2['bottom_calfln3'];
		$calf_loose3[$garb_type] = $rowq2['bottom_calf_loose3'];
		$calfln4[$garb_type] = $rowq2['bottom_calfln4'];
		$calf_loose4[$garb_type] = $rowq2['bottom_calf_loose4'];
		$bottom[$garb_type] = $rowq2['bottom_bottom'];
		$bottom2[$garb_type] = $rowq2['bottom_bottom2'];
		$cuttingfactor[$garb_type] = $rowq2['bottom_cuttingfactor'];
		$chainfly[$garb_type] = $rowq2['bottom_chainfly'];
		$belt_style[$garb_type] = $rowq2['bottom_belt_style'];
		$pocket_style[$garb_type] = $rowq2['bottom_pocket_style'];
		$pocket[$garb_type] = $rowq2['bottom_pocket'];
		$backpocket[$garb_type] = $rowq2['bottom_backpocket'];
		$watchpocket[$garb_type] = $rowq2['bottom_watchpocket'];
		
		
		$s_garb_style_l = $s_garb_style_ln = $s_garb_style_b = "";
		if ($garb_style=="l") {
			$s_garb_style_l = "selected";
		} elseif ($garb_style=="ln") {
			$s_garb_style_ln = "selected";
		} elseif ($garb_style=="b") {
			$s_garb_style_b = "selected";
		}
		
		$s_belt_style_lbelt = ($belt_style=="lbelt") ? "selected" : "";
		
		$s_pocket_style_sp = $s_pocket_style_lp = $s_pocket_style_wp = "";
		if ($pocket_style=="sp") {
			$s_pocket_style_sp = "selected";
		} elseif ($pocket_style=="lp") {
			$s_pocket_style_lp = "selected";
		} elseif ($pocket_style=="wp") {
			$s_pocket_style_wp = "selected";
		}
		
	}
	
?>
