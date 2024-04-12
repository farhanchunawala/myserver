<?php
	// $svr_mode="local_kkms";  $sr=37;
	$svr_mode=$_REQUEST["svr_mode"];  $sr=$_REQUEST["sr"];
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	include $atb_meas_php;
	
	class myMeas {
		function __construct($sr, $measure_date, 
			$neck, $delt, $biceps, $forearm, $chest, $stomach, $waist, $seat, $thigh, $lower_thigh, $calf, $ankle, 
			$shoulder_ln, $arm_ln, $pec, $lat, $half_delt, $chest_ln, $stomach_ln, $seat_ln, $knee_ln, $lower_thigh_ln, $calf_ln, $ground_ln) {
			include '../../appwall/arr/atb_meas.php';
			foreach ($atb_meas as $var) $this->$var = $$var;
		}
	}
	
	$qry_meas = "SELECT * FROM meas WHERE sr=$sr";
	$result_meas = mysqli_query($dbc, $qry_meas) or die('<b>Error '.$filepath.'/'.$qry_meas.' : </b><br/>'.mysqli_error($dbc));
	$rq_meas = mysqli_fetch_array($result_meas);
	foreach ($atb_meas as $var) $$var = $rq_meas[$var];
	
	$myMeas = new myMeas($sr, $measure_date, 
		$neck, $delt, $biceps, $forearm, $chest, $stomach, $waist, $seat, $thigh, $lower_thigh, $calf, $ankle, 
		$shoulder_ln, $arm_ln, $pec, $lat, $half_delt, $chest_ln, $stomach_ln, $seat_ln, $knee_ln, $lower_thigh_ln, $calf_ln, $ground_ln);
	
	mysqli_close($dbc);
	$myJSON = json_encode($myMeas);
	echo $myJSON;
?>