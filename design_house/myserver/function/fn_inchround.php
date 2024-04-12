<?php
	function inchround($x) {
		$y = floor($x);
		if ($y==0) $a = 0;
		else $a = $x - $y;
		
		if ($a < 0.0625) {
			$z = $y;
		} elseif ($a >= 0.0625 && $a < 0.1875) {
			$z = $y+0.125;
		} elseif ($a >= 0.1875 && $a < 0.3125) {
			$z = $y+0.250;
		} elseif ($a >= 0.3125 && $a < 0.4375) {
			$z = $y+0.375;
		} elseif ($a >= 0.4375 && $a < 0.5625) {
			$z = $y+0.500;
		} elseif ($a >= 0.5625 && $a < 0.6875) {
			$z = $y+0.625;
		} elseif ($a >= 0.6875 && $a < 0.8125) {
			$z = $y+0.750;
		} elseif ($a >= 0.8125 && $a < 0.9375) {
			$z = $y+0.875;
		} elseif ($a >= 0.9375) {
			$z = $y+1;
		}
		
		return $z;
	}
?>