<?php
	function array_mode($arr) {
		
		$mode1 = array_keys($arr, max($arr));
		$i=0;
		foreach($mode1 as $x => $val) {
			$mode2[$i] = inchtotext($val);
			$i++;
		}
		$mode3 = implode('<br/>',$mode2);
		
		return $mode3;
	}
?>