<?php
	include $atb_style_php;
	
	$qry='query3';  $arr='atb_entrystyle_sv1';  $select='*';  $table='entry';  $whr="WHERE garb_id=$garb_id";  $order_by='ORDER BY garb_id ASC';  $limit='';  $qm=2;
	include $query_select_php;
	
	
	/* $query3 = "SELECT * FROM entry WHERE garb_id=$garb_id ORDER BY garb_id ASC";
	$result3 = mysqli_query($dbc, $query3) or die('<b>Error dim/dim_style.php/query11 : </b><br/>'.mysqli_error($dbc));
	$rowq3 = mysqli_fetch_array($result3);
	
	$a_fstyle = array('sr', 'stylename', 'garbtype', 'garbstyle', 'garbsubstyle');
	$a_ftop = array('length', 'sleeve_ln', 'hala', 't_chest', 't_stomach', 't_seat', 't_bottom', 'collar', 'cuff_br');
	$a_fbtm = array('length', 'fork_ln', 'thigh_losing', 'lower_thigh_losing', 'calf_losing', 'bottom');
	$a_ptop = array('sub_style', 'collar_type', 'cuff_ln', 'cuff_type', 'pocket_type', 'shoulder_type');
	$a_pbtm = array('sub_style', 'crease');
	
	foreach ($a_fstyle as $var) $$var = $rowq3[$var];
	foreach ($a_ftop as $var)   $$var = $rowq3[$var];
	foreach ($a_fbtm as $var) 	 $$var = $rowq3[$var];
	foreach ($a_ptop as $var) 	 $$var = $rowq3[$var];
	foreach ($a_pbtm as $var) 	 $$var = $rowq3[$var]; */
	
	/* $i=1;
	while ($rowq3 = mysqli_fetch_array($result3)) {
		
		$garb_id[$i] = $rowq3['garb_id'];
		if ($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') {
			
			$sub_style[$i] = $rowq3['sub_style'];
			$collar_type[$i] = $rowq3['collar_type'];
			$cuff_ln[$i] = $rowq3['cuff_ln'];
			$cuff_type[$i] = $rowq3['cuff_type'];
			$pocket_type[$i] = $rowq3['pocket_type'];
			$shoulder_type[$i] = $rowq3['shoulder_type'];
			
		} elseif ($garbtype=='pant' || $garbtype=='bpyjama') {
			
			$sub_style[$i] = $rowq3['sub_style'];
			$crease[$i] = $rowq3['crease'];
		}
		
		$i++;
	} */
?>