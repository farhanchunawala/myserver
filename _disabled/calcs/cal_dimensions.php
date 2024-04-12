<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	$garb_category = ($garb_type==='shirt' || $garb_type==='kurta' || $garb_type==='pathani' || $garb_type==='kandura') ? 'top' : 'bottom' ;
	
	$$meas = $meas_lse = $meas_lsng = $meas_lsng_pct = $meas_valct = $meas_lse_valct = $meas_lsng_valct = $meas_lsng_pct_valct = [];
	
	if ($garb_category==='top' && $meas==='length') $tt='shoulder';
	elseif ($garb_category==='bottom' && $meas==='length') $tt='fork';
	elseif ($meas==='shoulder') $tt='sleeve';
	elseif ($meas==='sleeve') $tt='length';
	elseif ($meas==='fork') $tt='thigh_fix';
	elseif ($meas==='hala') $tt='chest';
	elseif ($meas==='biceps') $tt='hala';
	elseif ($meas==='chest') $tt='t1';
	elseif ($meas==='stomach') $tt='t2';
	elseif ($garb_category==='top' && $meas==='seat') $tt='t3';
	elseif ($meas==='waist') $tt='seat';
	elseif ($garb_category==='bottom' && $meas==='seat') $tt='waist';
	elseif ($meas==='thigh_fix') $tt='thigh_loose';
	elseif ($meas==='cuttingfactor') $tt='waist';
	elseif ($meas==='kneeln') $tt='knee_loose';
	elseif ($meas==='calfln') $tt='calf_loose';
	elseif ($meas==='bottom') $tt='calf_loose';
	elseif ($meas==='collar') $tt='chest';
	
	$order_col = "$garb_category".'_'."$meas";
	include '../dimension/meas_qarr1.php';
	
	$dab2 = 0.25;
	$dab3 = 0.375;
	$dab4 = 0.5;
	
	if ($meas==='shoulder' || $meas==='sleeve' || $meas==='collar' || $meas==='hala' || $meas==='biceps' || $meas==='fork' || $meas==='waist' 
	|| $meas==='thigh_fix' || $meas==='kneeln' || $meas==='calfln' || $meas==='cuttingfactor' || $meas==='bottom') $diff = 'r';
	else $diff = 'l';
	
	//meas_lse
	if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) {
		$i=1;
		foreach(${$tt} as $key => $val) {
			if ($garb_type==='shirt') $meas_lse[$i] = ($val-$dab4)*4-1-2;
			else $meas_lse[$i] = ($val-$dab4)*4;
			$i++;
		}
	}
	elseif ($garb_category==='bottom' && ($meas==='thigh_fix' || $meas==='kneeln' || $meas==='calfln')) {
		$i=1;
		foreach(${$tt} as $key => $val) {
			$meas_lse[$i] = $val;
			$i++;
		}
	}
	elseif ($garb_category==='bottom' && $meas==='seat') {
		$i=1;
		foreach(${$meas} as $key => $val) {
			$meas_lse[$i] = $val;
			$i++;
		}
	}
	else {
		$i=1;
		foreach(${$tt} as $key => $val) {
			$meas_lse[$i] = $val;
			$i++;
		}
	}
	
	//meas_lsng
	$i=1;
	foreach(${$meas} as $key => $val) {
		if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) $meas_lsng[$i] = $meas_lse[$i] - $val;
		elseif ($garb_category==='bottom' && $meas==='seat') { $$meas[$i]=$val-5; $meas_lsng[$i] = $meas_lse[$i] - $$meas[$i]; }
		elseif ($diff==='l') $meas_lsng[$i] = $val - $meas_lse[$i];
		elseif ($diff==='r') $meas_lsng[$i] = $meas_lse[$i] - $val;
		
		//meas_lsng_pct
		if ($meas==='kneeln' || $meas==='calfln' || $meas==='fork') $meas_lsng_pct[$i] = $val * 100 / $meas_lse[$i];
		else $meas_lsng_pct[$i] = $meas_lsng[$i] * 100 / $val;
		
		$i++;
	}
	
	//valct
	$meas_valct = arr_inch_rdsrtstr(${$meas});
	$meas_lse_valct = arr_inch_rdsrtstr($meas_lse);
	$meas_lsng_valct = arr_inch_rdsrtstr($meas_lsng);
	$meas_lsng_pct_valct = arr_rdsrtstr($meas_lsng_pct);
	
	mysqli_close($dbc);
?>