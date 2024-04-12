<?php
	if (isset($_GET['svr_mode']))	{ $svr_mode=$_GET["svr_mode"];	
		if (isset($_POST['sql'])) $sql=$_POST["sql"];
		else	{ $data=json_decode(file_get_contents('php://input'), true); $sql=$data["sql"]; }
	} else {
		$svr_mode="local_kkms";		$sql="SELECT * FROM food ORDER BY food_id";
	}
	$fdir='../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	$myArr = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($myArr);
	
	$pdo=null;
?>