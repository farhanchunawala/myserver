<?php
	if (isset($svr_mode))	{ $svr_mode=$_GET["svr_mode"];	$sr=$_GET["sr"];	}
	else							{ $svr_mode="local_kkms";			$sr=37;				}
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	$sql = "SELECT * FROM cust WHERE sr=$sr";
	$myArr = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
	
	$myJSON = json_encode($myArr);
	echo $myJSON;
	
	mysqli_close($dbc); $pdo=null;
?>
