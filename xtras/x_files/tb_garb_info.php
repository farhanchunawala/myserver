<?php
	$qry='entry2';  $select='*';  $table='entry';  $order_by='ORDER BY garb_id DESC';  $limit='LIMIT 1';  $qm=1;
	$whr="WHERE sr=$sr AND (garbtype='shirt' OR garbtype='kurta' OR garbtype='kandura')";
	include $query_select_php;
	$pair = isset(${'rq_'.$qry}['pairing']) ? ord(${'rq_'.$qry}['pairing']) : 122;
	
	$garb_id0=$garb_id;
	for ($c = 1; $c <= $garbcount; $c++) {
		${'garb_id'.$c}=${'garb_id'.($c-1)}+1;
		if ($garb_category=='top') {
			if ($pair==122 || $pair=="") {
				$pair = 97;
				${'pairing'.$c} = chr($pair);
			} else {
				$pair = $pair + 1;
				${'pairing'.$c} = chr($pair);
			}
		} else ${'pairing'.$c} = "";
	}
?>
<table class="table table-borderless table-sm">
	<thead><tr><th></th></tr></thead>
	<tbody>
		<tr>   <td>Description</td>
			<?php for ($c=1; $c<=$garbcount; $c++) { ?>
			<input type="hidden" id=<?php echo "$stylename".'_garb_id'."$c"; ?> name=<?php echo "$stylename".'_garb_id'."$c"; ?> value="<?php echo ${'garb_id'.$c}; ?>">
			<td><input tabindex="<?php echo $tx.'01'; ?>" type="text" class="form-control p-2" name=<?php echo "$stylename".'_description'."$c"; ?> value="" style="width:120px" /></td>
			<?php } ?>
		</tr>
		<tr>   <td>Pairing</td>
			<?php for ($c = 1; $c <= $garbcount; $c++) { ?>
			<td><input tabindex="<?php echo $tx.'02'; ?>" type="text" class="form-control p-2" name=<?php echo "$stylename".'_pairing'."$c"; ?> value="<?php echo ${'pairing'.$c}; ?>" style="width:120px" /></td>
			<?php } ?>
		</tr>
		<tr>   <td>Submit Date</td>
			<?php for ($c = 1; $c <= $garbcount; $c++) { ?>
			<td><input tabindex="<?php echo $tx.'03'; ?>" type="text" class="form-control p-2" name=<?php echo "$stylename".'_submit_date'."$c"; ?> value="" placeholder="yyyy-mm-dd" style="width:120px" /></td>
			<?php } ?>
		</tr>
	</tbody>
</table>