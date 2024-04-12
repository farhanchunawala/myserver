<?php
	/* $qry='';  $select='*';  $table='';  $whr="";  $order_by='';  $limit='';  $qm=0;
	include $query_select_php;
	*/
	
	/* $qry		= isset($qry) ? $qry : '' ;
	$select	= isset($select) ? $select : '*' ;
	$table	= isset($table) ? $table : '' ;
	$whr		= isset($whr) ? $whr : '' ;
	$order_by= isset($order_by) ? $order_by : '' ;
	$limit	= isset($limit) ? $limit : '' ;
	$qm		= isset($qm) ? $qm : '0' ; */
	
	${'query_'.$qry} = "SELECT $select FROM $table $whr $order_by $limit";
	${'result_'.$qry} = mysqli_query($dbc, ${'query_'.$qry}) or die('<b>Error '.$filepath.'/'.${'query_'.$qry}.' : </b><br/>'.mysqli_error($dbc));
	
	if ($qm=='rq' || $qm=='fe') {
		${'rq_'.$qry} = mysqli_fetch_array(${'result_'.$qry});
		if ($qm=='fe') foreach ($$arr as $var) $$var=${'rq_'.$qry}[$var];
	}
	
	//unset($select, $whr, $order_by, $limit, $qm);
?>