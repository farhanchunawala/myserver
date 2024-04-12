<?php
	$a = inchtopx(0.625);
	$b = inchtopx(3);
	
	
	echo "<path d = \"
		M     $xm,    $ym
		h     $b        
		l     $a,     $a
		l    -$a,     $a
		h    -$b        
		l    -$a,    -$a
		l     $a,    -$a
		\" stroke=black fill=none />";
		
		
	{	$dim_name = 'b';		//	b
		$dim_size = '15px';
		$arrow_xm = $xm;
		$arrow_ym = $ym;
		$arrow_ln = $b;
		$extl = 0;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include $dim_arrow_php;
	}
	{	$dim_name = 'a';		//	a
		$dim_size = '15px';
		$arrow_xm = $xm + $b;
		$arrow_ym = $ym;
		$arrow_ln = $a;
		$extl = 0;
		$extr = $a;
		$arrow_level = -1;
		$arrow_rotate = 0;
		include $dim_arrow_php;
	}
	{	$dim_name = 'a';		//	a
		$dim_size = '15px';
		$arrow_xm = $xm + $b + $a;
		$arrow_ym = $ym;
		$arrow_ln = $a;
		$extl = $a;
		$extr = 0;
		$arrow_level = -1;
		$arrow_rotate = 90;
		include $dim_arrow_php;
	}
	
?>