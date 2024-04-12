<?php
	
	$sr           = $_GET['sr'];
	$garbtype     = strtolower($_POST['garbtype']);
	$garbstyle    = strtolower($_POST['garbstyle']);
	$garbsubstyle = strtolower($_POST['garbsubstyle']);
	if     ($garbstyle=='' && $garbsubstyle=='') $garbsubstyle = '0';
	if     ($garbstyle=='')    $stylename = $garbtype.'_'.$garbsubstyle;
	elseif ($garbsubstyle=='') $stylename = $garbtype.'_'.$garbstyle;
	else					   		$stylename = $garbtype.'_'.$garbstyle.'_'.$garbsubstyle;
	
	$query_cs = "INSERT INTO style (`sr`, `stylename`, `garbtype`, `garbstyle`, `garbsubstyle`) VALUES ($sr, \"$stylename\", \"$garbtype\", \"$garbstyle\", \"$garbsubstyle\")";
	$result_cs = mysqli_query($dbc, $query_cs) or die('<b>Error customer_info.php/query_cs : </b><br/>'.mysqli_error($dbc));
	
?>