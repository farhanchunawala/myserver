<?php
	if (!isset($fdir)) {
		$svr_mode=$_GET["svr_mode"];
		$fdir='../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
		
		$data=json_decode(file_get_contents('php://input'), true);
		$myArr[0]=$data["myArr"];  $tbl=$data["tbl"];  $whr=$data["whr"];
	}
	
	foreach($myArr as $myObj) {
		foreach($myObj as $k=>$x) if (isset($_POST[$k])) $myObj->$k = $_POST[$k];
		$sql = "UPDATE $tbl SET ";
		foreach($myObj as $k => $x) $sql .= (array_key_first((array)$myObj)==$k) ? "$k=\"$x\" " : ", $k=\"$x\" " ;
		$sql .= $whr;
	}
	$pdo->exec($sql);
	
	if (!isset($fdir)) $pdo=null;
?>