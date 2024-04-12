<?php
	if (isset($svr_mode))	{ $svr_mode=$_GET["svr_mode"];	$sr=$_GET["sr"];	}
	else							{ $svr_mode="local_kkms";			$sr=37;				}
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	// include $atb_meas_php;
	
	$sql = "SELECT * FROM meas WHERE sr=$sr";
	$myArr = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
	
	// $qry='atb_meas2';  $arr='atb_meas2';  $select='*';  $table='meas';  $whr="WHERE sr=$sr";  $order_by='';  $limit='';  $qm='';
	// include $query_select_php;
	// foreach ($$arr as $var) $$var=isset(${'rq_'.$qry}[$var]) ? ${'rq_'.$qry}[$var] : 0 ;
	//$measure_date=isset(${'rq_'.$qry}['measure_date']) ? strtotime(${'rq_'.$qry}['measure_date']) : 0 ;
	
	// if ($result = mysqli_query($dbc, ${'query_'.$qry})) {
		// $myObj = mysqli_fetch_object($result);
		
		// mysqli_free_result($result);
	// }
	
	// class meas {
		// function __construct($neck, $delt, $biceps, $forearm, $chest, $stomach, $waist, $seat, $thigh, $lower_thigh, $calf, $ankle, 
			// $shoulder_ln, $arm_ln, $pec, $lat, $half_delt, $chest_ln, $stomach_ln, $seat_ln, $knee_ln, $lower_thigh_ln, $calf_ln, $ground_ln) {
			
			// include '../../appwall/arr/atb_meas.php';
			// foreach ($atb_meas2 as $var) $this->$var = $$var;
		// }
	// }
	// $myObj = new meas($neck, $delt, $biceps, $forearm, $chest, $stomach, $waist, $seat, $thigh, $lower_thigh, $calf, $ankle, 
		// $shoulder_ln, $arm_ln, $pec, $lat, $half_delt, $chest_ln, $stomach_ln, $seat_ln, $knee_ln, $lower_thigh_ln, $calf_ln, $ground_ln);
	
	mysqli_close($dbc);  $pdo=null;
	$myJSON = json_encode($myArr);
	echo $myJSON;
?>