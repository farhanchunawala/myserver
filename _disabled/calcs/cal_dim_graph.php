<?php
	$r = 50; $s = $s+100+($max_valct*50);
	echo '<path d = "
		M 50, '.($s);
		foreach($$meas_cstr as $x => $value) {
			$r = $r+50;
			echo "L $r, ".($s-$value*50);
		}
	echo '" stroke=black fill=none />';
	
	echo "<text x=25 y=".($s+7)." transform=\"rotate(-90 20,$s)\" font-weight=bold fill=green>$meas_cstr_name</text>";
	
	$r=53;
	foreach($$meas_cstr as $x => $value) {
		$r = $r+50;
		echo "<text x=$r y=".($s+2)." transform=\"rotate(90 $r,".($s+2).")\" font-weight=bold>".$x.'</text>';
	}
	$r=53;
	for ($t=0; $t<=$max_valct; $t++) {
		$r = $r+50;
		echo "<text x=47 y=".($s-$r+100).' text-anchor=end font-weight=bold>'.$t.'</text>';
	}
?>