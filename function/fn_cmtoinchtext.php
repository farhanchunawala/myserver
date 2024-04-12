<?php
	function cmtoinchtext($x) {
		$x = $x*0.3937008;
		$y = floor($x);
		/* if ($y==0) $a = 0;
		else  */$a = $x - $y;
		if ($y==0) $y='';
		
		if	   ($a < 0.0625)				 $z = $y;
		elseif ($a >= 0.0625 && $a < 0.1875) $z = "$y".'+';
		elseif ($a >= 0.1875 && $a < 0.3125) $z = "$y".'¼';
		elseif ($a >= 0.3125 && $a < 0.4375) $z = "$y".'¼+';
		elseif ($a >= 0.4375 && $a < 0.5625) $z = "$y".'½';
		elseif ($a >= 0.5625 && $a < 0.6875) $z = "$y".'½+';
		elseif ($a >= 0.6875 && $a < 0.8125) $z = "$y".'¾';
		elseif ($a >= 0.8125 && $a < 0.9375) $z = ($y+1)."=";
		elseif ($a >= 0.9375)				 $z = $y+1;
		
		return $z;
	}
?>