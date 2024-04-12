<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		//$sr=$_GET['sr'];
		//$type = $_GET['type'];
	?>
	<title><?php //echo "$sr - $count $type"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css">
	<script src="libraries/jquery.min.js"></script>
	<script src="libraries/popper.min.js"></script>
	<script src="libraries/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	function texttoinch($x) {
		$a = $x;
		/*$a = str_replace(".25",".250",$a);
		$a = str_replace(".50",".500",$a);
		$a = str_replace(".75",".750",$a);*/
		if(strstr($a,"+")){
			$a = $a+0.125;
		}
		if(strstr($a,"=")){
			$a = $a-0.125;
		}
			return $a;
	}
	function inchtotext($x) {
		$a = $x;
		$a = str_replace(".125","+",$a);
		$a = str_replace(".250",".25",$a);
		$a = str_replace(".375",".25+",$a);
		$a = str_replace(".500",".50",$a);
		$a = str_replace(".625",".50+",$a);
		$a = str_replace(".750",".75",$a);
		if(strstr($a,".875")){
			$a = $a+1;
			$a = str_replace(".875","=",$a);
		}
			return $a;
	}
	
/*	{ $dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');

	$query1 = "SELECT * FROM `customer` WHERE sr=$sr";

	$result1 = mysqli_query($dbc, $query1)
		or die('Error querying database.');
	
	$row1 = mysqli_fetch_array($result1);
	
	
	$query2 = "SELECT * FROM `measurement` WHERE sr=$sr";
	
	$result2 = mysqli_query($dbc, $query2)
		or die('Error querying database.');
	
	$row2 = mysqli_fetch_array($result2);
	
	
	$query3 = "SELECT * FROM `entry` WHERE sr=$sr";
	
	$result3 = mysqli_query($dbc, $query3)
		or die('Error querying database.');
	
	$row3 = mysqli_fetch_array($result3);
	
	mysqli_close($dbc);
	}
*/
	
	//$shirt_sr = $_POST['shirt_sr'];
	$shirt_type = $_POST['shirt_type'];
	
	$dbc = mysqli_connect('localhost', 'root', '', 'hallofbrands')
		or die('Error connecting to MySQL server.');
		
	$query = "INSERT INTO `shirts` (`shirt_print`) VALUES (\"$shirt_print\")";
	
	$result = mysqli_query($dbc, $query)
		or die('Error querying database.');
?>

mysql> select *from getLastRecord ORDER BY id DESC LIMIT 1;

</body>
</html>