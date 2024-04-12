<!DOCTYPE html>			<!-- ALT + SHIFT + 5 -->
<html lang="en">
<head><title>Code Finder</title>
	<?php $svr_mode=$_GET['svr_mode'];  $fdir='../';  include $fdir.'svr_mode.php'; ?>
</head>
<body>

<div class="container-fluid p-4">
<form method="post" action=<?php echo $codefinder_php."?svr_mode=$svr_mode&cf=1";?> ><div class="form-group">
<div class="row">
	<div class="col"><label for="txt_fls"><b>Text in Files</b></label>
		<input tabindex="1" type="text" class="form-control" name="txt_fls" value="" style="width:100px" />
	</div>
	<div class="col"><label for="vars_fl"><b>Vars in File</b></label>
		<input tabindex="2" type="text" class="form-control" name="vars_fl" value="" style="width:100px" />
	</div>
	<div class="col"><button tabindex="2" type="submit" class="btn btn-info mt-3" value="save" name="submit">Save</button></div>
</div>
</div></form>

<?php
	$cf=$_GET['cf'];
	if ($cf==1)	{ $str=$_POST['txt_fls'];	$fl_name=$_POST['vars_fl'];	}
	else		{ $str="";					$fl_name="";				}
	
	if ($str!="") {
		
		echo "<b><u>$str :</u></b><br/>";
		$dir = '../';
		include 'sub_codefinder.php';
		
	} elseif ($fl_name!="") {
	
	$myfile = fopen($fl_name,'r') or die("Unable to open file $fl_name!");
	$fl_srh = fread($myfile,filesize($fl_name));
	fclose($myfile);
	
	$j = substr_count($fl_srh,'$');
	echo "<br/><b>Total-$ = $j : <u>$fl_name</u></b><br/><br/>";
	
	{ $var_dbs = array('$_POST', '$_GET', '$dbc', '$svr_mode', '$svr_host', '$svr_usr', '$svr_pwd');
	}
	{ $var_cust = array('$sr', '$sr2', '$name', '$surname', '$mobile_no1', '$mobile_no2', '$mobile_no3', '$query1', '$result1', '$rowq1', 
		'$query_csv', '$result_csv', '$custtable');
	}
	{ $var_meas = array('$measure_date', '$shirt_ln', '$kurta_ln', '$kandura_ln', '$pant_ln', '$bpyjama_ln', '$pyjama_ln', '$salwar_ln', 
		'$aligard_ln', '$shoulder_ln', '$sleeve_ln', '$fork_ln', '$neck', '$biceps', '$cuff', '$chest', '$stomach', '$waist', '$seat', 
		'$thigh', '$calf', '$bottom', '$query2', '$result2', '$rowq2', '$query11', '$result11', '$rowq11', '$query_msv', '$result_msv', 
		'$query_arr_meas1', '$result_arr_meas1', '$qarr_meas1');
	}
	{ $var_measkk = array('$garb_style', '$top_length', '$top_shoulder', '$top_sleeve', '$top_chest', '$top_stomach', '$top_seat', 
		'$top_sleevefit', '$top_biceps', '$top_sleeve_loose', '$top_halfsleeve_loose', '$top_collar', '$top_cuffbr', '$top_pocketdown', 
		'$top_pocket', '$top_hala', '$top_t1', '$top_t2', '$top_t3', '$bottom_length', '$bottom_length_fix', '$bottom_fork', 
		'$bottom_waist', '$bottom_pleats', '$bottom_seat', '$bottom_thigh_fix', '$bottom_thigh_loose', '$bottom_kneeln', 
		'$bottom_knee_loose', '$bottom_calfln', '$bottom_calf_loose', '$bottom_calfln2', '$bottom_calf_loose2', '$bottom_calfln3', 
		'$bottom_calf_loose3', '$bottom_calfln4', '$bottom_calf_loose4', '$bottom_bottom', '$bottom_bottom2', '$bottom_cuttingfactor', 
		'$bottom_chainfly', '$bottom_belt_style', '$bottom_pocket_style', '$bottom_pocket', '$bottom_backpocket', '$bottom_watchpocket');
	}
	{ $var_measkk2 = array('$length', '$shoulder', '$sleeve', '$sleevefit', '$sleeve_loose', '$halfsleeve_loose', '$collar', 
		'$cuffbr', '$pocketdown', '$pocket', '$hala', '$t1', '$t2', '$t3', '$length_fix', '$fork', '$pleats', '$thigh_fix', 
		'$thigh_loose', '$kneeln', '$knee_loose', '$calfln', '$calf_loose', '$calfln2', '$calf_loose2', '$calfln3', '$calf_loose3', 
		'$calfln4', '$calf_loose4', '$bottom2', '$cuttingfactor', '$chainfly', '$belt_style', '$pocket_style', '$backpocket', 
		'$watchpocket', '$s_garb_style_bshirt', '$s_garb_style_bshirtsc', '$s_garb_style_round', '$s_sleevefit_sl', '$s_sleevefit_slp', 
		'$s_sleevefit_sm', '$s_sleevefit_smp', '$s_sleevefit_sf', '$s_sleevefit_sfp', '$s_pocket_pocketa', '$s_pocket_pocketb', 
		'$s_pocket_pocketc', '$s_pocket_pocketd', '$s_pocket_pockete', '$s_pocket_pocketf', '$s_pocket_pocketg', '$s_pocket_pocketh', 
		'$s_garb_style_l', '$s_garb_style_ln', '$s_garb_style_b', '$s_belt_style_lbelt', '$s_pocket_style_sp', '$s_pocket_style_lp', 
		'$s_pocket_style_wp');
	}
	{ $var_entry = array('$garb_id', '$garb_type', '$garb_pairing', '$garb_description', '$garb_book_date', '$garb_submit_date', 
		'$garb_pana', '$garb_clothln', '$garb_cutting', '$garb_sewing', '$garb_kaj', '$garb_button', '$garb_press', '$garb_ready', 
		'$garb_packed', '$garb_delivered', '$query4', '$result4', '$rowq4', '$queryc', '$resultc', '$rowqc', '$query_entrysv', 
		'$result_entrysv', '$entrytable', '$garb', '$garbcount');
	}
	{ $var_style = array('$style_id', '$top_collartype', '$top_cuffln', '$top_cufftype', '$top_pockettype', '$top_shouldertype', 
		'$top_taweeztype', '$bottom_crease', '$query3', '$result3', '$rowq3', '$query5', '$result5', '$rowq5', '$query_stylesv', 
		'$result_stylesv', '$style_table');
	}
	{ $var_style2 = array('$s_collartype_rmpc', '$s_collartype_mrmpc', '$s_collartype_lspc', '$s_collartype_bc', '$s_collartype_nocollar', 
		'$s_cuffln12mm', '$s_cuffln25mm', '$s_cuffln38mm', '$s_cuffln50mm', '$s_cuffln57mm', '$s_cuffln63mm', '$s_cuffln76mm', 
		'$s_cufftype_cut', '$s_cufftype_square', '$s_cufftype_round', '$s_cufftype_nocuff', '$s_cufftype_halfsleeve', 
		'$s_pockettype_nopocket', '$s_pockettype_v', '$s_pockettype_square', '$s_pockettype_round', '$s_pockettype_flap', 
		'$s_pockettype_wallet', '$s_shouldertype_regular', '$s_shouldertype_noshoulder', '$s_shouldertype_vshoulder', 
		'$s_shouldertype_dvshoulder', '$s_taweeztype_v', '$s_taweeztype_square', '$s_crease_fc', '$s_crease_sc');
	}
	{ $var_ex = array('$navtitle', '$navlink', '$srh', '$search', '$print', '$pair', '$pair2', '$type', '$garb_category');
	}
	{ $var_temp = array('$csv', '$msv', '$sv', '$a', '$c', '$g', '$i', '$r', '$x', '$y', '$tx', '$count', '$xm', '$ym', '$plits', 
		'$srcount');
	}
	{ $var_customer_edit = array('$acn_shirt', '$acn_kurta', '$acn_pathani', '$acn_kandura', '$act_shirt', '$act_kurta', '$act_pathani', 
		'$act_kandura');
	}
	{ $var_pattern = array('$shirt_count', '$kurta_count', '$pathani_count', '$kandura_count', '$pant_count', '$bpyjama_count', 
		'$pyjama_count', '$salwar_count', '$aligard_count', '$churidar_count');
	}
	{ $var_garbop = array('$garb_op', '$garb_pvop', '$garb_op_sent', '$gbopr', '$gbopr_sent');
	}
	{ $var_dim_arrow = array('$dim_name', 'dim_size', '$arrow_rotate', '$arrow_levelpx', '$arrow_level', '$arrow_xm', '$arrow_ym', 
		'$arrow_ln', '$dimx', '$dimy', '$ext_dl', '$ext_dr', '$ext_ul', '$ext_ur', '$extl', '$extr');
	}
	{ $var_dim_cloth = array('$pana', '$clothln', '$y_pana', '$x_clothln');
	}
	{ $var_print1 = array('$vertex', '$fill', '$opacity', '$x_sf_m', '$y_sf_m', '$sf_rotate', '$x_sb_m', '$y_sb_m', '$sb_rotate', 
		'$x_ss_m', '$y_ss_m', '$ss_rotate', '$x_sf_collarln', '$x_sf_halaline', '$x_sf_armhole', '$x_sf_chestln', '$x_sf_stomachln', 
		'$x_sf_length', '$y_sf_frontpatti', '$y_sf_shoulder', '$y_sf_neck', '$y_sf_chest', '$y_sf_stomach', '$y_sf_seat', '$backtype', 
		'$x_sb_rounding', '$x_sb_collarln', '$$x_sb_halaline', '$x_sb_chestln', '$x_sb_stomachln', '$x_sb_length', '$y_sb_markback', 
		'$y_sb_rounding', '$y_sb_shoulder', '$y_sb_chest', '$y_sb_stomach', '$y_sb_seat', '$x_ss_hala', '$x_ss_length', '$y_ss_hala', 
		'$y_ss_cuff', '$x_sh_markshoulder', '$x_sh_rounding', '$x_sh_length', '$y_sh_rounding', '$y_sh_collarln', '$y_sh_height', 
		'$x_pf_length', '$y_pf_cf', '$y_pf_center_thigh', '$y_pf_center_calf', '$y_pf_center_bottom', '$x_pf_fork', '$y_pf_wtdf', 
		'$x_pf_calfln', '$x_pf_thigh_calf', '$y_pf_tcdf', '$x_pf_calf_bottom', '$y_pf_cbdf', '$x_pf_bottomfd', '$y_pf_btm', 
		'$y_pf_bottomfd', '$y_pf_fly', '$y_pf_flyslope', '$y_pf_waist', '$y_pb_forkmark');
	}
	{ $var_print3 = array('$shouldertype', '$collartype', '$cufftype', '$pockettype', '$crease', '$belt', '$back_pocket', '$watch_pocket');
	}
	
?>

<div class="row no-gutters">
	<div class="col"><?php
		$x = -1;
		for ($i=1; $i<=$j; $i++) {
			$x = strpos($fl_srh,'$',$x+1);
			echo $i.'&nbsp : &nbsp<b>'.substr($fl_srh,$x,20)."</b><br>";
		}
	?></div>
	<div class="col"><?php
		
		$sum = 0;
		foreach ($var_dbs as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_cust as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_meas as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_measkk as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_measkk2 as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_entry as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_style as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_style2 as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_ex as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_temp as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_customer_edit as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_pattern as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_garbop as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_dim_arrow as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_dim_cloth as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_print1 as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		foreach ($var_print3 as $var) {
			$s = substr_count($fl_srh,$var);
			if ($s>0) echo $s." - $var<br/>";
			$sum = $sum + $s;
		}
		
		echo "<br/><b>$sum - Total</b><br/>";
		
	?></div>
</div>

<?php } ?>

</div>
</body>
</html>