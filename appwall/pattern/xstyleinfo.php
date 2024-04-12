<?php
	$svr_mode="local_kkms";  $sr=37;
	// $svr_mode=$_REQUEST["svr_mode"];  $sr=$_REQUEST["sr"];
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	class myStyles {
		function __construct($stylename, $garbtype, $garbstyle, $garbsubstyle, $garbcount) {
			$this->stylename = $stylename;
			$this->garbtype = $garbtype;
			$this->garbstyle = $garbstyle;
			$this->garbsubstyle = $garbsubstyle;
			$this->garbcount = $garbcount;
		}
	}
	
	$query_sfit = "SELECT * FROM style WHERE sr=$sr";
	$result_sfit = mysqli_query($dbc, $query_sfit) or die('<b>Error customer_info.php/query_sfit : </b><br/>'.mysqli_error($dbc));
	$i=0;
	while ($rowq_sfit = mysqli_fetch_array($result_sfit)) {
		$stylename = $rowq_sfit['stylename'];
		$garbtype = $rowq_sfit['garbtype'];
		$garbstyle = $rowq_sfit['garbstyle'];
		$garbsubstyle = $rowq_sfit['garbsubstyle'];
		$garbcount = 0;
		
		$mystyles[$i] = new myStyles($stylename, $garbtype, $garbstyle, $garbsubstyle, $garbcount);
		$i++;
	}
	
	mysqli_close($dbc);
	$myJSON = json_encode($mystyles);
	echo $myJSON;
	
	// retrieving all styles from db and counting each one passed from customer_info by $_POST
	// $qry='stylefit';  $select='*';  $table='style';  $whr="WHERE sr=$sr";  $order_by='';  $limit='';  $qm=0;
	// include $query_select_php;
	// while (${'rq_'.$qry} = mysqli_fetch_array(${'result_'.$qry})) {
		// $stylename = ${'rq_'.$qry}['stylename'];
		// $a_garbstyle[$stylename]['stylename'] = ${'rq_'.$qry}['stylename'];
		// $a_garbstyle[$stylename]['garbtype']  = ${'rq_'.$qry}['garbtype'];
		// $a_garbstyle[$stylename]['garbstyle'] = ${'rq_'.$qry}['garbstyle'];
		// $a_garbstyle[$stylename]['garbsubstyle']  = ${'rq_'.$qry}['garbsubstyle'];
	// } foreach ($a_garbstyle as $var) ${$var['stylename'].'_count'} = $_POST[$var['stylename']];
	
?>