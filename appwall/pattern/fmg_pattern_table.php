<div class="form-group form-inline"><div class="d-flex flex-nowrap bg-light">
<?php
	$qry='entry2';  $select='*';  $table='entry';  $order_by='ORDER BY garb_id DESC';  $limit='LIMIT 1';  $qm=1;
	$whr="WHERE sr=$sr AND (garbtype='shirt' OR garbtype='kurta' OR garbtype='kandura')";
	include $query_select_php;
	$pair = isset(${'rq_'.$qry}['pairing']) ? ord(${'rq_'.$qry}['pairing']) : 122;
	
	$tx = -1;
	foreach ($a_garbstyle as $var) {
		$garbcount = ${$var['stylename'].'_count'};
		$stylename = $var['stylename'];
		$garbtype  = $var['garbtype'];
		$garbstyle = $var['garbstyle'];
		$garbsubstyle  = $var['garbsubstyle'];
		if($garbcount>='0'){  $tx=$tx+1;  include $sub_pattern_table_php;  }
	}
?>
<div class="col-2 mt-2"><button type="submit" class="btn btn-info" value="save" name="submit">Save & Proceed</button></div>
</div></div>