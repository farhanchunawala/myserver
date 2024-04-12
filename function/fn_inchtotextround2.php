<?php
	function inchtotextround($x) {
		$y = floor($x);
		if ($y==0) $a = 0;
		else $a = $x - $y;
		
		if	   ($a < 0.0625)				 $z = $y;
		elseif ($a >= 0.0625 && $a < 0.1875) $z = "$y".'+';
		elseif ($a >= 0.1875 && $a < 0.3125) $z = "$y".'.25';
		elseif ($a >= 0.3125 && $a < 0.4375) $z = "$y".'.25+';
		elseif ($a >= 0.4375 && $a < 0.5625) $z = "$y".'.5';
		elseif ($a >= 0.5625 && $a < 0.6875) $z = "$y".'.5+';
		elseif ($a >= 0.6875 && $a < 0.8125) $z = "$y".'.75';
		elseif ($a >= 0.8125 && $a < 0.9375) $z = ($y+1)."=";
		elseif ($a >= 0.9375)				 $z = $y+1;
		
		return $z;
	}
?>