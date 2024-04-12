<?php
	function inchtotext($x) {
		$a = $x;
		$a = str_replace(".125",".1",$a);
		$a = str_replace(".25",".2",$a);
		$a = str_replace(".375",".3",$a);
		$a = str_replace(".5",".4",$a);
		$a = str_replace(".625",".5",$a);
		$a = str_replace(".75",".6",$a);
		$a = str_replace(".875",".7",$a);
		
			return $a;
	}
?>