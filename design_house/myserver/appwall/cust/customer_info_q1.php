<?php
	// $svr_mode="local_kkms";  $sr=32;
	$svr_mode=$_REQUEST["svr_mode"];  $sr=$_REQUEST["sr"];
	$fdir='../../';	include $fdir.'svr/filepath.php';	include $svr_mode_php;
	
	class cust {
		public $sr;
		public $name;
		public $surname;
		public $mobile_no1;
		public $mobile_no2;
		public $mobile_no3;
		
		function __construct($sr, $name, $surname, $mobile_no1, $mobile_no2, $mobile_no3) {
			$this->sr			= $sr;
			$this->name			= $name;
			$this->surname		= $surname;
			$this->mobile_no1 = $mobile_no1;
			$this->mobile_no2 = $mobile_no2;
			$this->mobile_no3 = $mobile_no3;
		}
	}
	
	$query1 = "SELECT * FROM cust WHERE sr=$sr";
	$result1 = mysqli_query($dbc, $query1) or die('<b>Error customer_info.php/query1 : </b><br/>'.mysqli_error($dbc));
	$rowq1 = mysqli_fetch_array($result1);
	
	$sr			= $rowq1['sr'];
	$name			= $rowq1['name'];
	$surname		= $rowq1['surname'];
	$mobile_no1 = $rowq1['mobile_no1'];
	$mobile_no2 = $rowq1['mobile_no2'];
	$mobile_no3 = $rowq1['mobile_no3'];
	
	$myObj = new cust($sr, $name, $surname, $mobile_no1, $mobile_no2, $mobile_no3);
	
	mysqli_close($dbc);
	$myJSON = json_encode($myObj);
	echo $myJSON;
?>