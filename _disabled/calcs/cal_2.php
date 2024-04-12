<?php
function array_mode1($arr) {
	for ($i=1; $i<=3; $i++) {
		$rarr[$i] = inchround($arr[$i]);
		$sarr[$i] = "$rarr[$i]";
	}
	$count = array_count_values($sarr);
	arsort($count);
	
	return key($count);
}
function array_mode2($arr) {
	for ($i=1; $i<=3; $i++) {
		$rarr[$i] = round($arr[$i]);
		$sarr[$i] = "$rarr[$i]";
	}
	$count = array_count_values($sarr);
	arsort($count);
	return key($count);
}
function arr_str($arr) {
	foreach($arr as $x => $value){
		$rarr[$x] = inchround($value);
	}
	asort($rarr);
	foreach($rarr as $x => $value){
		$sarr[$x] = "$value";
	}
	$count = array_count_values($sarr);
	
	return $count;
}

if (isset($sr)) {
	
	$sum_chest_losing = 0;
	$sum_stomach_losing = 0;
	$sum_seat_losing = 0;
	$sum_chest_losing_percent = 0;
	$sum_stomach_losing_percent = 0;
	$sum_seat_losing_percent = 0;
	
	for ($i=1; $i<=$srcount; $i++) {
		
		$chesty4[$i] = $chest[$i]/4;
		$stomachy4[$i] = $stomach[$i]/4;
		$seaty4[$i] = $seat[$i]/4;
		
		$chest_losing[$i] = $t1[$i] - $chesty4[$i];
		$stomach_losing[$i] = $t2[$i] - $stomachy4[$i];
		$seat_losing[$i] = $t3[$i] - $seaty4[$i];
		
		$chest_losing_percent[$i] = $chest_losing[$i] * 100 / ($chesty4[$i]);
		$stomach_losing_percent[$i] = $stomach_losing[$i] * 100 / ($stomachy4[$i]);
		$seat_losing_percent[$i] = $seat_losing[$i] * 100 / ($seaty4[$i]);
		
	}
	
	for ($i=1; $i<=$srcount; $i++) {
		
		$sum_chest_losing = ($sum_chest_losing + $chest_losing[$i]);
		$sum_stomach_losing = ($sum_stomach_losing + $stomach_losing[$i]);
		$sum_seat_losing = ($sum_seat_losing + $seat_losing[$i]);
		
		$sum_chest_losing_percent = ($sum_chest_losing_percent + $chest_losing_percent[$i]);
		$sum_stomach_losing_percent = ($sum_stomach_losing_percent + $stomach_losing_percent[$i]);
		$sum_seat_losing_percent = ($sum_seat_losing_percent + $seat_losing_percent[$i]);
		
		$avg_chest_losing = $sum_chest_losing/($srcount);
		$avg_stomach_losing = $sum_stomach_losing/($srcount);
		$avg_seat_losing = $sum_seat_losing/($srcount);
		
		$avg_chest_losing_percent = $sum_chest_losing_percent/($srcount);
		$avg_stomach_losing_percent = $sum_stomach_losing_percent/($srcount);
		$avg_seat_losing_percent = $sum_seat_losing_percent/($srcount);
		
	}
	
	$chest_valct = arr_str($chest);
	$stomach_valct = arr_str($stomach);
	$seat_valct = arr_str($seat);
	
	$chesty4_valct = arr_str($chesty4);
	$stomachy4_valct = arr_str($stomachy4);
	$seaty4_valct = arr_str($seaty4);
	
	$t1_valct = arr_str($t1);
	$t2_valct = arr_str($t2);
	$t3_valct = arr_str($t3);
	
	$chest_losing_valct = arr_str($chest_losing);
	$stomach_losing_valct = arr_str($stomach_losing);
	$seat_losing_valct = arr_str($seat_losing);
	
	$chest_losing_percent_valct = arr_str($chest_losing_percent);
	$stomach_losing_percent_valct = arr_str($stomach_losing_percent);
	$seat_losing_percent_valct = arr_str($seat_losing_percent);
	
}
?>
<table class="table table-striped">

<thead>
	<tr>
		<th>Sr</th>
		
		<th>Chest</th>
		<th>Stomach</th>
		<th>Seat</th>
		
		<th>Ch/4</th>
		<th>Sh/4</th>
		<th>St/4</th>
		
		<th>T1</th>
		<th>T2</th>
		<th>T3</th>
		
		<th>Chest Losing</th>
		<th>Stomach Losing</th>
		<th>Seat Losing</th>
		
		<th>Chest Losing %</th>
		<th>Stomach Losing %</th>
		<th>Seat Losing %</th>
		
	</tr>
</thead>

<tbody>
	<?php for ($i=1; $i<=$srcount; $i++) { ?>
	<tr>
		<td><?php echo $sr[$i]; ?></td>
		
		<td><?php echo inchtotextround($chest[$i]); ?></td>
		<td><?php echo inchtotextround($stomach[$i]); ?></td>
		<td><?php echo inchtotextround($seat[$i]); ?></td>
		
		<td><?php echo inchtotextround($chesty4[$i]); ?></td>
		<td><?php echo inchtotextround($stomachy4[$i]); ?></td>
		<td><?php echo inchtotextround($seaty4[$i]); ?></td>
		
		<td><?php echo inchtotext($t1[$i]); ?></td>
		<td><?php echo inchtotext($t2[$i]); ?></td>
		<td><?php echo inchtotext($t3[$i]); ?></td>
		
		<td><?php echo inchtotextround($chest_losing[$i]); ?></td>
		<td><?php echo inchtotextround($stomach_losing[$i]); ?></td>
		<td><?php echo inchtotextround($seat_losing[$i]); ?></td>
		
		<td><?php echo round($chest_losing_percent[$i]).'%'; ?></td>
		<td><?php echo round($stomach_losing_percent[$i]).'%'; ?></td>
		<td><?php echo round($seat_losing_percent[$i]).'%'; ?></td>
		
	</tr>
	<?php } ?>
</tbody>

<tfoot>
	<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
	<tr>
		<td>Min</td>
		
		<td><?php echo inchtotextround(min($chest)); ?></td>
		<td><?php echo inchtotextround(min($stomach)); ?></td>
		<td><?php echo inchtotextround(min($seat)); ?></td>
		
		<td><?php echo inchtotextround(min($chesty4)); ?></td>
		<td><?php echo inchtotextround(min($stomachy4)); ?></td>
		<td><?php echo inchtotextround(min($seaty4)); ?></td>
		
		<td><?php echo inchtotextround(min($t1)); ?></td>
		<td><?php echo inchtotextround(min($t2)); ?></td>
		<td><?php echo inchtotextround(min($t3)); ?></td>
		
		<td><?php echo inchtotextround(min($chest_losing)); ?></td>
		<td><?php echo inchtotextround(min($stomach_losing)); ?></td>
		<td><?php echo inchtotextround(min($seat_losing)); ?></td>
		
		<td><?php echo round(min($chest_losing_percent)).'%'; ?></td>
		<td><?php echo round(min($stomach_losing_percent)).'%'; ?></td>
		<td><?php echo round(min($seat_losing_percent)).'%'; ?></td>
		
    </tr>
	<tr>
		<td>Max</td>
		
		<td><?php echo inchtotextround(max($chest)); ?></td>
		<td><?php echo inchtotextround(max($stomach)); ?></td>
		<td><?php echo inchtotextround(max($seat)); ?></td>
		
		<td><?php echo inchtotextround(max($chesty4)); ?></td>
		<td><?php echo inchtotextround(max($stomachy4)); ?></td>
		<td><?php echo inchtotextround(max($seaty4)); ?></td>
		
		<td><?php echo inchtotextround(max($t1)); ?></td>
		<td><?php echo inchtotextround(max($t2)); ?></td>
		<td><?php echo inchtotextround(max($t3)); ?></td>
		
		<td><?php echo inchtotextround(max($chest_losing)); ?></td>
		<td><?php echo inchtotextround(max($stomach_losing)); ?></td>
		<td><?php echo inchtotextround(max($seat_losing)); ?></td>
		
		<td><?php echo round(max($chest_losing_percent)).'%'; ?></td>
		<td><?php echo round(max($stomach_losing_percent)).'%'; ?></td>
		<td><?php echo round(max($seat_losing_percent)).'%'; ?></td>
		
    </tr>
	<tr>
		<td>Mid range</td>
		
		<td><?php echo inchtotextround((min($chest) + max($chest))/2); ?></td>
		<td><?php echo inchtotextround((min($stomach) + max($stomach))/2); ?></td>
		<td><?php echo inchtotextround((min($seat) + max($seat))/2); ?></td>
		
		<td><?php echo inchtotextround((min($chesty4) + max($chesty4))/2); ?></td>
		<td><?php echo inchtotextround((min($stomachy4) + max($stomachy4))/2); ?></td>
		<td><?php echo inchtotextround((min($seaty4) + max($seaty4))/2); ?></td>
		
		<td><?php echo inchtotextround((min($t1) + max($t1))/2); ?></td>
		<td><?php echo inchtotextround((min($t2) + max($t2))/2); ?></td>
		<td><?php echo inchtotextround((min($t3) + max($t3))/2); ?></td>
		
		<td><?php echo inchtotextround((min($chest_losing) + max($chest_losing))/2); ?></td>
		<td><?php echo inchtotextround((min($stomach_losing) + max($stomach_losing))/2); ?></td>
		<td><?php echo inchtotextround((min($seat_losing) + max($seat_losing))/2); ?></td>
		
		<td><?php echo round((min($chest_losing_percent) + max($chest_losing_percent))/2).'%'; ?></td>
		<td><?php echo round((min($stomach_losing_percent) + max($stomach_losing_percent))/2).'%'; ?></td>
		<td><?php echo round((min($seat_losing_percent) + max($seat_losing_percent))/2).'%'; ?></td>
		
    </tr>
	<tr>
		<td>Avg</td>
		
		<td><?php echo inchtotextround(array_sum($chest)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($stomach)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($seat)/$srcount); ?></td>
		
		<td><?php echo inchtotextround(array_sum($chesty4)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($stomachy4)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($seaty4)/$srcount); ?></td>
		
		<td><?php echo inchtotextround(array_sum($t1)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($t2)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($t3)/$srcount); ?></td>
		
		<td><?php echo inchtotextround(array_sum($chest_losing)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($stomach_losing)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($seat_losing)/$srcount); ?></td>
		
		<td><?php echo round(array_sum($chest_losing_percent)/$srcount).'%'; ?></td>
		<td><?php echo round(array_sum($stomach_losing_percent)/$srcount).'%'; ?></td>
		<td><?php echo round(array_sum($seat_losing_percent)/$srcount).'%'; ?></td>
		
    </tr>
	<tr>
		<td>Mode</td>
		
		<td><?php echo inchtotext(array_mode1($chest)); ?></td>
		<td><?php echo inchtotext(array_mode1($stomach)); ?></td>
		<td><?php echo inchtotext(array_mode1($seat)); ?></td>
		
		<td><?php echo inchtotext(array_mode1($chesty4)); ?></td>
		<td><?php echo inchtotext(array_mode1($stomachy4)); ?></td>
		<td><?php echo inchtotext(array_mode1($seaty4)); ?></td>
		
		<td><?php echo inchtotext(array_mode1($t1)); ?></td>
		<td><?php echo inchtotext(array_mode1($t2)); ?></td>
		<td><?php echo inchtotext(array_mode1($t3)); ?></td>
		
		<td><?php echo inchtotext(array_mode1($chest_losing)); ?></td>
		<td><?php echo inchtotext(array_mode1($stomach_losing)); ?></td>
		<td><?php echo inchtotext(array_mode1($seat_losing)); ?></td>
		
		<td><?php echo array_mode2($chest_losing_percent).'%'; ?></td>
		<td><?php echo array_mode2($stomach_losing_percent).'%'; ?></td>
		<td><?php echo array_mode2($seat_losing_percent).'%'; ?></td>
		
    </tr>
</tfoot>

</table>

<svg width="1300" height="1500" style="border: 1px solid black">
	
	<?php
		for ($r=0; $r<=1300; $r=$r+50) {
			echo "<line  x1=$r  y1=0  x2=$r  y2=1000 stroke=grey stroke-width=1 opacity=0.4 />";
			echo "<line  x1=0  y1=$r  x2=1300  y2=$r stroke=grey stroke-width=1 opacity=0.4 />";
		}
		
		$s = 0;
		{
			$r = 50; $s = $s+200;
			echo '<path d = "
				M 50, '.($s);
				foreach($chest_valct as $x => $value) {
					$r = $r+50;
					echo "L $r, ".($s-$value*50);
				}
			echo '" stroke=black fill=none />';
			$r=50; $t=-1;
			foreach($chest_valct as $x => $value) {
				$r = $r+50; $t++;
				echo "<text x=$r y=".($s+15).'>'.inchtotext($x).'</text>';
				echo "<text text-anchor=end x=50 y=".($s-$r+100).'>'.$t.'</text>';
			}
			
			$r = 50; $s = $s+200;
			echo '<path d = "
				M 50, '.($s);
				foreach($stomach_valct as $x => $value) {
					$r = $r+50;
					echo "L $r, ".($s-$value*50);
				}
			echo '" stroke=black fill=none />';
			$r=50; $t=-1;
			foreach($stomach_valct as $x => $value) {
				$r = $r+50; $t++;
				echo "<text x=$r y=".($s+15).'>'.inchtotext($x).'</text>';
				echo "<text text-anchor=end x=50 y=".($s-$r+100).'>'.$t.'</text>';
			}
			
			$r = 50; $s = $s+200;
			echo '<path d = "
				M 50, '.($s);
				foreach($seat_valct as $x => $value) {
					$r = $r+50;
					echo "L $r, ".($s-$value*50);
				}
			echo '" stroke=black fill=none />';
			$r=50; $t=-1;
			foreach($seat_valct as $x => $value) {
				$r = $r+50; $t++;
				echo "<text x=$r y=".($s+15).'>'.inchtotext($x).'</text>';
				echo "<text text-anchor=end x=50 y=".($s-$r+100).'>'.$t.'</text>';
			}
		
		}
		
	?>
	
</svg>
