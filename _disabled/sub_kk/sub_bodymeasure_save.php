<?php
	$query11 = "SELECT `sr` FROM `meas` WHERE sr=$sr ";
	
	$result11 = mysqli_query($dbc, $query11) or die('<b>Error measurement_save.php/query11 : </b><br/>'.mysqli_error($dbc));
	
	$rowq11 = mysqli_fetch_array($result11);
	
	$measure_date = date("y-m-d");
	$shirt_ln = $_POST['shirt_ln'];
	$kurta_ln = $_POST['kurta_ln'];
	$kandura_ln = $_POST['kandura_ln'];
	$pant_ln = $_POST['pant_ln'];
	$bpyjama_ln = $_POST['bpyjama_ln'];
	$pyjama_ln = $_POST['pyjama_ln'];
	$salwar_ln = $_POST['salwar_ln'];
	$aligard_ln = $_POST['aligard_ln'];
	$shoulder_ln = $_POST['shoulder_ln'];
	$sleeve_ln = $_POST['sleeve_ln'];
	$fork_ln = $_POST['fork_ln'];
	$neck = $_POST['neck'];
	$biceps = $_POST['biceps'];
	$chest = $_POST['chest'];
	$stomach = $_POST['stomach'];
	$waist = $_POST['waist'];
	$seat = $_POST['seat'];
	$thigh = $_POST['thigh'];
	$calf = $_POST['calf'];
	$bottom = $_POST['bottom'];
	
	//if (!isset($rowq11['sr'])) {
	if ($sr2==0) {
	$query_msv = "INSERT INTO `meas` (`sr`, `measure_date`, `shirt_ln`, `kurta_ln`, `kandura_ln`, `pant_ln`, `bpyjama_ln`, `pyjama_ln`, `salwar_ln`, 
		`aligard_ln`, `shoulder_ln`, `sleeve_ln`, `fork_ln`, `neck`, `biceps`, `chest`, `stomach`, `waist`, `seat`, `thigh`, `calf`, `bottom`) 
		VALUES ($sr, \"$measure_date\", \"$shirt_ln\", \"$kurta_ln\", \"$kandura_ln\", \"$pant_ln\", \"$bpyjama_ln\", \"$pyjama_ln\", \"$salwar_ln\", 
		\"$aligard_ln\", \"$shoulder_ln\", \"$sleeve_ln\", \"$fork_ln\", \"$neck\", \"$biceps\", \"$chest\", \"$stomach\", \"$waist\", 
		\"$seat\", \"$thigh\", \"$calf\", \"$bottom\")";
	}
	else {
	$query_msv = "UPDATE `meas` SET `measure_date`=\"$measure_date\", `shirt_ln`=\"$shirt_ln\", `kurta_ln`=\"$kurta_ln\", `kandura_ln`=\"$kandura_ln\", 
		`pant_ln`=\"$pant_ln\", `bpyjama_ln`=\"$bpyjama_ln\", `pyjama_ln`=\"$pyjama_ln\", `salwar_ln`=\"$salwar_ln\", `aligard_ln`=\"$aligard_ln\", 
		`shoulder_ln`=\"$shoulder_ln\", `sleeve_ln`=\"$sleeve_ln\", `fork_ln`=\"$fork_ln\", `neck`=\"$neck\", `biceps`=\"$biceps\", `chest`=\"$chest\", 
		`stomach`=\"$stomach\", `waist`=\"$waist\", `seat`=\"$seat\", `thigh`=\"$thigh\", `calf`=\"$calf\", `bottom`=\"$bottom\" WHERE sr=$sr ";
	}
	
	$result_msv = mysqli_query($dbc, $query_msv)
		or die('<b>Error query_msv : </b>'.mysqli_error($dbc));
	
?>