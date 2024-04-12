<?php
	/*
	$qtb='';	$filepath='.php';
	${'qrys_'.$qtb} = "SELECT * FROM $qtb WHERE sr=$sr ";
	include 'sub/sub_qrys.php';
	*/
	
	${'result_'.$qtb} = mysqli_query($dbc, ${'qrys_'.$qtb}) or die('<b>Error '.$filepath.'/'.${'qrys_'.$qtb}.' : </b><br/>'.mysqli_error($dbc));
	${'rq_'.$qtb} = mysqli_fetch_array(${'result_'.$qtb});
	
	foreach (${'a_'.$qtb} as $var) $$var = ${'rq'.$qid}[$var];
	
?>