<div class="mr-2">
<table class="table table-striped">
	
	<thead>
		<tr><th><?php echo strtoupper($garb_type).'['.$srcount.']'; ?></th>
			<th><?php echo $meas; ?></th>
			<th><?php
				if ($meas==='chest' || $meas==='stomach' || $meas==='seat') echo $meas.'-lse';
				else echo $tt;
			?></th>
			<th><?php
				if ($meas==='chest' || $meas==='stomach' || $meas==='seat') echo $meas.'-lsng';
				else echo "$diff-Difference";
			?></th>
			<th><?php
				if ($meas==='chest' || $meas==='stomach' || $meas==='seat') echo $meas.'-lsng%';
				else echo 'Difference%';
			?></th>
		</tr>
		<tr><td>Mid range</td>
			<td><?php echo inchtotextround((max($$meas) + min($$meas))/2).' (±'.inchtotextround((max($$meas) - min($$meas))/2).')'; ?></td>
			<td><?php echo inchtotextround((max($meas_lse) + min($meas_lse))/2).' (±'.inchtotextround((max($meas_lse) - min($meas_lse))/2).')'; ?></td>
			<td><?php echo inchtotextround((max($meas_lsng) + min($meas_lsng))/2).' (±'.inchtotextround((max($meas_lsng) - min($meas_lsng))/2).')'; ?></td>
			<td><?php echo round((max($meas_lsng_pct) + min($meas_lsng_pct))/2).'% (±'.round((max($meas_lsng_pct) - min($meas_lsng_pct))/2).'%)'; ?></td>
		</tr>
		<!--<tr><td>Min</td>
			<td><?php echo inchtotextround(min($$meas)); ?></td>
			<td><?php echo inchtotextround(min($meas_lse)); ?></td>
			<td><?php echo inchtotextround(min($meas_lsng)); ?></td>
			<td><?php echo round(min($meas_lsng_pct)).'%'; ?></td>
		</tr>
		<tr><td>Max</td>
			<td><?php echo inchtotextround(max($$meas)); ?></td>
			<td><?php echo inchtotextround(max($meas_lse)); ?></td>
			<td><?php echo inchtotextround(max($meas_lsng)); ?></td>
			<td><?php echo round(max($meas_lsng_pct)).'%'; ?></td>
		</tr>-->
		<tr><td>Range</td>
			<td><?php echo '['.inchtotextround(min($$meas)).' - '.inchtotextround(max($$meas)).'] ('.inchtotextround(max($$meas) - min($$meas)).')'; ?></td>
			<td><?php echo '['.inchtotextround(min($meas_lse)).' - '.inchtotextround(max($meas_lse)).'] ('.inchtotextround(max($meas_lse) - min($meas_lse)).')'; ?></td>
			<td><?php echo '['.inchtotextround(min($meas_lsng)).' - '.inchtotextround(max($meas_lsng)).'] ('.inchtotextround(max($meas_lsng) - min($meas_lsng)).')'; ?></td>
			<td><?php echo '['.round(min($meas_lsng_pct)).'% - '.round(max($meas_lsng_pct)).'%] ('.round(max($meas_lsng_pct) - min($meas_lsng_pct)).'%)'; ?></td>
		</tr>
		<tr><td>Avg</td>
			<td><?php echo inchtotextround(array_sum(${$meas})/$srcount); ?></td>
			<td><?php echo inchtotextround(array_sum($meas_lse)/$srcount); ?></td>
			<td><?php echo inchtotextround(array_sum($meas_lsng)/$srcount); ?></td>
			<td><?php echo round(array_sum($meas_lsng_pct)/$srcount,2).'%'; ?></td>
		</tr>
		<tr><td>Mode</td>
			<td><?php echo array_mode($meas_valct); ?></td>
			<td><?php echo array_mode($meas_lse_valct); ?></td>
			<td><?php echo array_mode($meas_lsng_valct); ?></td>
			<td><?php echo array_mode($meas_lsng_pct_valct).'%'; ?></td>
		</tr>
	</thead>
	
	<tbody>
		<?php  $i=1;
		foreach($$meas as $key => $val) { ?>
			<tr><td><?php echo $sr[$i]; ?></td>
				<td><?php echo inchtotext($val); ?></td>
				<td><?php echo inchtotext($meas_lse[$i]); ?></td>
				<td><?php echo inchtotext($meas_lsng[$i]); ?></td>
				<td><?php echo round($meas_lsng_pct[$i]).'%'; ?></td>
			</tr>
		<?php $i++; } ?>
	</tbody>
	
</table>
</div>