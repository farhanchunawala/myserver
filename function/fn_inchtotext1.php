<?php
	function inchtotext($x) {
		$a = $x;
		$a = str_replace(".125","+",$a);
		$a = str_replace(".250",".25",$a);
		$a = str_replace(".375",".25+",$a);
		$a = str_replace(".500",".50",$a);
		$a = str_replace(".625",".50+",$a);
		$a = str_replace(".750",".75",$a);
		if(strstr($a,".875")){
			$a = $a+1;
			$a = str_replace(".875","=",$a);
		}
			return $a;
	}
?>