<?php
	function inchtotext($x) {
		$a = $x;
		$a = str_replace('.125','+',$a);
		$a = str_replace('.25','¼',$a);
		$a = str_replace('.375','¼+',$a);
		$a = str_replace('.5','½',$a);
		$a = str_replace('.625','½+',$a);
		$a = str_replace('.75','¾',$a);
		if(strstr($a,'.875')){
			$a = $a+1;
			$a = str_replace('.875','=',$a);
		}
			return $a;
	}
?>