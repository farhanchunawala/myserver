<?php
	if (isset($_GET['svr_mode']))	{ $svr_mode=$_GET["svr_mode"];	$sr=$_GET["sr"];	}
	else									{ $svr_mode="local_kkms";			$sr=31;				}
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	//last entry
	$qry='entry1';  $select='*';  $table='entry';  $whr=''; $order_by='ORDER BY garb_id DESC';  $limit='LIMIT 1';  $qm='rq';
	include $query_select_php;
	$garb_id = ${'rq_'.$qry}['garb_id'];
	
	//last entry
	$qry='entry2';  $select='*';  $table='entry';  $order_by='ORDER BY garb_id DESC';  $limit='LIMIT 1';  $qm='rq';
	$whr="WHERE sr=$sr AND (garbtype='shirt' OR garbtype='kurta' OR garbtype='kandura')";
	include $query_select_php;
	if (isset(${'rq_'.$qry}['pairing'])) {
		$pairing = ord(${'rq_'.$qry}['pairing']);
		$description = ${'rq_'.$qry}['description'];
		$submit_date = ${'rq_'.$qry}['submit_date'];
	}
	else { $pairing=122;  $description='';  $submit_date=''; }
	
	class garbInfo {
		function __construct($garb_id, $description, $pairing, $submit_date) {
			$this->garb_id = $garb_id;
			$this->description = $description;
			$this->pairing = $pairing;
			$this->submit_date = $submit_date;
		}
	}
	$myObj= new garbInfo($garb_id, $description, $pairing, $submit_date);
	
	mysqli_close($dbc);
	$myJSON = json_encode($myObj);
	echo $myJSON;
?>