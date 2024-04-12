<?php
	$stylename		= $myStyle->stylename;
	$garbtype		= $myStyle->garbtype;
	$garbstyle		= $myStyle->garbstyle;
	$garbsubstyle	= $myStyle->garbsubstyle;
	$garbcount		= $myStyle->garbcount;
	
$garb_category = ($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? 'top' : 'btm';
for ($c=0; $c<=$garbcount; $c++) {
	
	include $atb_style_php;
	include $atb_style2_php;
	foreach (${'atb_style_fit'.$garb_category} as $var) $$var = $_POST[$stylename.$var];
	foreach (${'atb_style_notes'} as $var) $$var = $_POST[$stylename.$var.$c];
	foreach (${'atb_style_ptn'.$garb_category} as $var) $$var = (isset($_POST[$stylename.$var.$c])) ? $_POST[$stylename.$var.$c] : '' ;
	foreach (${'atb_style_ptn'.$garb_category} as $var) if ($$var=="default") $$var = $_POST[$stylename.$var.'0'];
	
	if ($c=='0') {	//style_save
		$arr='atb_style'.$garb_category;  $qry='style_sv1';  $table='style';  $whr="sr=$sr AND stylename=\"$stylename\"";
		include $query_update_php;
	}
	
	if ($c>0) {	//entry_save
		include $atb_entry_php;
		foreach ($atb_entry_desc as $var) { $$var = $_POST[$stylename.$var.$c];
			if ($var=='submit_date' && $$var=="") $$var = $_POST[$stylename.$var.'1'];
			if ($var=='pana' || $var=='clothln') {
				if ($_POST[$stylename.$var.'fd'.$c]!="")	$$var = $$var * $_POST[$stylename.$var.'fd'.$c];		//if ($panafd!="") 				 $pana=$pana*$panafd
				if ($$var=="") { 							   	$$var = $_POST[$stylename.$var.'1'];						//if ($pana="") 				 $pana=$pana1
					if ($_POST[$stylename.$var.'fd1']!="")	$$var = $$var * $_POST[$stylename.$var.'fd1'];			//if ($pana=="" && $panafd1!="") $pana=$pana*$panafd1	
				}
			}
		}
		
		foreach ($atb_style_entrysp as $var) { $$var=$_POST[$stylename.$var.$c];
			/* if ($garbtype=='shirt') $stitching==500
			elseif ($garbtype=='kurta') $stitching==700
			elseif ($garbtype=='kandura') $stitching==800
			elseif ($garbtype=='pant') $stitching==700
			elseif ($garbtype=='salwar') $stitching==500
			if ($var=='stitching_sp' || $var=='fabric_sp' || $var=='emb_sp' || $var=='pattern_sp') {
				if (${$var.'o'}=='op25') {
					
					$$var = $$var-25%;
				}
			} */
		}
		
		$query4 = "SELECT * FROM entry WHERE garb_id=$garb_id ORDER BY garb_id DESC LIMIT 1";
		$result4 = mysqli_query($dbc, $query4) or die('<b>Error pattern.php/query4 : </b><br/>'.mysqli_error($dbc));
		$rowq4 = mysqli_fetch_array($result4);
		if (isset($rowq4['garb_id'])) {
			$qry='entrystyle_sv1';  $arr='atb_entrystyle_sv1';	 $table='entry';  $whr = "garb_id=$garb_id";
			include $query_update_php;
		} else {
			$qry='entrystyle_sv1';  $arr='atb_entrystyle_sv1';  $table='entry';		
			include $query_insert_php;
		}
		
		if (!isset($rowq4['garb_id'])) {
			$qrys_entry = "SELECT garb_id FROM entry WHERE sr=$sr AND garbtype=\"$garbtype\" ORDER BY garb_id DESC LIMIT 1";
			$results_entry = mysqli_query($dbc, $qrys_entry) or die('<b>Error sub_pattern_sv.php/qrys_entry : </b><br/>'.mysqli_error($dbc));
			$rq_entry = mysqli_fetch_array($results_entry);
			$garb_id = $rq_entry['garb_id']; 
			
			$qryi_tasksv = "INSERT INTO task (`garb_id`) VALUES (\"$garb_id\")";
			$resulti_tasksv = mysqli_query($dbc, $qryi_tasksv) or die('<b>pattern_sv.php/qryi_tasksv : </b><br/>'.mysqli_error($dbc));
		}
	}
} ?>