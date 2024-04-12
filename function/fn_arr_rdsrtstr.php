<?php
	function arr_rdsrtstr($arr) {
		
		foreach($arr as $x => $value){
			$rarr[$x] = round($value);
		}
		asort($rarr);
		foreach($rarr as $x => $value){
			$sarr[$x] = "$value";
		}
		$count = array_count_values($sarr);
		
		return $count;
	}
?>