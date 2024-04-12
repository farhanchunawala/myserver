<?php
	//$svr_mode="local_kkms";		$srh=0;
	$svr_mode=$_REQUEST["svr_mode"];		$srh=$_REQUEST["srh"];
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	class cust {
		public $sr;
		public $name;
		public $surname;
		public $mobile_no1;
		
		function __construct($sr, $name, $surname, $mobile_no1) {
			$this->sr = $sr;
			$this->name = $name;
			$this->surname = $surname;
			$this->mobile_no1 = $mobile_no1;
		}
	}
	
	if ($srh==1) {
		$search = $_POST['search'];
		if (ctype_digit($search))		$query1 = "SELECT * FROM cust WHERE sr=$search OR mobile_no1=$search";
		elseif (strlen("$search")==1)	$query1 = "SELECT * FROM cust WHERE name LIKE \"$search%\" OR surname LIKE \"$search%\"";
		else									$query1 = "SELECT * FROM cust WHERE name LIKE \"%$search%\" OR surname LIKE \"%$search%\"";
	} else									$query1 = "SELECT * FROM cust ORDER BY sr";
	$result1 = mysqli_query($dbc, $query1) or die('Error querying database query1.');
	$i=0;
	while ($rowq1 = mysqli_fetch_array($result1)) {
		$sr			= $rowq1['sr'];
		$name			= $rowq1['name'];
		$surname		= $rowq1['surname'];
		$mobile_no1 = $rowq1['mobile_no1'];
		
		${'sr'.$sr} = new cust($sr, $name, $surname, $mobile_no1);
		$myArr[$i] = ${'sr'.$sr};
		$i=$i+1;
	}
	
	mysqli_close($dbc);
	$myJSON = json_encode($myArr);
	echo $myJSON;
?>