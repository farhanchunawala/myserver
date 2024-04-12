<?php
	$qry='entry';  $select='*';  $table='entry';  $whr="WHERE sr=$sr AND garbtype=\"$garbtype\"";  $order_by='ORDER BY garb_id ASC';  $limit='';  $qm=0;
	include $query_select_php;
	
	$i=1;
	while (${'rq_'.$qry} = mysqli_fetch_array(${'result_'.$qry})) {
		$garb[$i] = ${'rq_'.$qry}['garb_id'];
		$stylename[$i] = ${'rq_'.$qry}['stylename'];
		$garbtype[$i] = ${'rq_'.$qry}['garbtype'];
		$garbstyle[$i] = ${'rq_'.$qry}['garbstyle'];
		$garbsubstyle[$i] = ${'rq_'.$qry}['garbsubstyle'];
		$pairing[$i] = ${'rq_'.$qry}['pairing'];
		$description[$i] = ${'rq_'.$qry}['description'];
		$submit_date[$i] = ${'rq_'.$qry}['submit_date'];
		$pana[$i] = ${'rq_'.$qry}['pana'];
		$clothln[$i] = ${'rq_'.$qry}['clothln'];
		
		$i++;
	}
	$garbcount = count($garb);
?>