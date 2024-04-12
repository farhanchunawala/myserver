<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	$sr=$_GET['sr'];
	$type=$_GET['type'];
	?>
	<title><?php echo "$sr $type"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
#marx {
	font-size: 24px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	padding-right: 0px;
}
#front {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#back {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#sleeve {
	font-size: 24px;
	border-style: groove groove solid solid;
	border-width: 3px 3px 5px 5px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#shoulder {
	font-size: 24px;
	border-style: groove solid solid groove;
	border-width: 3px 5px 5px 3px;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar1 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar2 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 290px;
	margin-bottom: 10px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar3 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 480px;
	margin-bottom: 10px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar4 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 870px;
	margin-bottom: 10px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#mar5 {
	font-size: 24px;
	border: 1px solid black;
	margin-top: 1160px;
	margin-bottom: 10px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
</style>
<script>
function printit() {
  window.print();
}
</script>

	<?php
		$mar=$_GET['mar'];
		$type = 'aligard';
		
		function inchtotext($x) {
			$a = $x;
			$a = str_replace(".125","±",$a);
			$a = str_replace(".25","¼",$a);
			$a = str_replace(".375","¼±",$a);
			$a = str_replace(".5","½",$a);
			$a = str_replace(".625","½±",$a);
			$a = str_replace(".75","¾",$a);
			if(strstr($a,".875")){
				$a = $a+1;
				$a = str_replace(".875","=",$a);
			}
				return $a;
		}
		function cm($x) {
			$x = $x * 2.54;
			return $x;
		}
		function cmx2($x) {
			$x = $x * 2.54 * 2;
			return $x;
		}
		
		{ $dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
			or die('Error connecting to MySQL server.');
		
		$query = "SELECT * FROM `measurement` WHERE sr=$sr";
		
		$result = mysqli_query($dbc, $query)
			or die('Error querying database.');
		
		$row = mysqli_fetch_array($result);
		
		mysqli_close($dbc);
		}
		
		$aligard_count = $row['aligard_count'];
		$aligard_length = inchtotext($row['aligard_length']);
		$aligard_length_fix = inchtotext($row['aligard_length_fix']);
		$aligard_waist = inchtotext($row['aligard_waist']);
		$aligard_bottom = inchtotext($row['aligard_bottom']);
		$aligard_knee_length = inchtotext($row['aligard_knee_length']);
		$aligard_knee_loose = inchtotext($row['aligard_knee_loose']);
		$aligard_calf_length = inchtotext($row['aligard_calf_length']);
		$aligard_calf_loose = inchtotext($row['aligard_calf_loose']);
		$aligard_chain_pocket = inchtotext($row['aligard_chain_pocket']);
		$aligard_chain_fly = inchtotext($row['aligard_chain_fly']);
		$aligard_t1 = inchtotext($row['aligard_t1']);
		$aligard_t2 = inchtotext($row['aligard_t2']);
	?>
	<a onclick="printit()">
	<?php include 'print/print2.php'; ?>
	</a>

</body>
</html>