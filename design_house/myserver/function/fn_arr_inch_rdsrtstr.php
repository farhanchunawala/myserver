<?php
	function arr_inch_rdsrtstr($arr) {
		
		foreach($arr as $x => $value){
			$rarr[$x] = inchround($value);
		}
		asort($rarr);
		foreach($rarr as $x => $value){
			$sarr[$x] = inchtotext($value);
		}
		$count = array_count_values($sarr);
		
		return $count;
	}
?>