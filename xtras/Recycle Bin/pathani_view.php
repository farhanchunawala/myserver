<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 2 , alt + F -->
<head>
	<?php
		$sr=$_GET['sr'];
	?>
	<title><?php echo "$sr Pathani"?></title>
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
#mar3 {
	font-size: 24px;
	border: 2px groove;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 20px;
	padding-right: 0px;
}
#marp {
	font-size: 20px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
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
</style>
<script>
function printit() {
  window.print();
}
</script>

<a onclick="printit()">
<?php
	$mar="marx";
	$print=$_GET['print'];
	$type = 'pathani';
	
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
	function shouldertrim($x) {
		$a = $x;
		$a = str_replace(".125",".000",$a);
		$a = str_replace(".375",".250",$a);
		$a = str_replace(".625",".500",$a);
		$a = str_replace(".875",".750",$a);
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
	
	
	$query2 = "SELECT * FROM `measurement` WHERE sr=$sr";
	
	$result2 = mysqli_query($dbc, $query2)
		or die('Error querying database query2.');
	
	$rowq2 = mysqli_fetch_array($result2);
	
	
	$query3 = "SELECT * FROM style WHERE sr=$sr AND garb_type=\"pathani\" ORDER BY style_id ASC";
	
	$result3 = mysqli_query($dbc, $query3)
		or die('Error querying database query3.');
	
	
	$query4 = "SELECT * FROM entry WHERE sr=$sr AND garb_type=\"pathani\" ORDER BY garb_id ASC";
	
	$result4 = mysqli_query($dbc, $query4)
		or die('Error querying database query4.');
	
		$i=0;
		while ($rowq4 = mysqli_fetch_array($result4)) {
			$garb[$i] = $rowq4['garb_id'];
			$garb_pairing[$i] = $rowq4['garb_pairing'];
			$garb_description[$i] = $rowq4['garb_description'];
			$pathani_pana[$i] = $rowq4['garb_pana'];
			$pathani_clothln[$i] = $rowq4['garb_clothln'];
			
			$i++;
		}
		$garbcount = count($garb);
		
		$i=0;
		while ($rowq3 = mysqli_fetch_array($result3)) {
			$style[$i] = $rowq3['style_id'];
			$pathani_collartype[$i] = $rowq3['pathani_collartype'];
			$pathani_cuffln[$i] = $rowq3['pathani_cuffln'];
			$pathani_cufftype[$i] = $rowq3['pathani_cufftype'];
			$pathani_pockettype[$i] = $rowq3['pathani_pockettype'];
			$pathani_shouldertype[$i] = $rowq3['pathani_shouldertype'];
			
			$i++;
		}
	}
	
	{
		$pathani_count = $rowq2['pathani_count'];
		$pathani_type = $rowq2['pathani_type'];
		$pathani_length = $rowq2['pathani_length'];
		$pathani_shoulder = $rowq2['pathani_shoulder'];
		$pathani_sleeve = $rowq2['pathani_sleeve'];
		$pathani_chest = $rowq2['pathani_chest'];
		$pathani_stomach = $rowq2['pathani_stomach'];
		$pathani_seat = $rowq2['pathani_seat'];
		$pathani_sleevefit = $rowq2['pathani_sleevefit'];
		$pathani_biceps = $rowq2['pathani_biceps'];
		$pathani_collar = $rowq2['pathani_collar'];
		$pathani_cuffbr = $rowq2['pathani_cuffbr'];
		$pathani_pocketdown = $rowq2['pathani_pocketdown'];
		$pathani_pocket = $rowq2['pathani_pocket'];
		$pathani_hala = $rowq2['pathani_hala'];
		$pathani_t1 = $rowq2['pathani_t1'];
		$pathani_t2 = $rowq2['pathani_t2'];
		$pathani_t3 = $rowq2['pathani_t3'];
	}
	
	for($i = 0; $i < $garbcount; $i++) {
		
	{	//cloth
	$y_pana = $pathani_pana[$i];
	$x_clothln = $pathani_clothln[$i] / 2.54;
	}
	
	{	// front
	if ($pathani_type=="square") {
		$x_front_length1 = $pathani_length + 0.75 + 0.75;
	} else {
		$x_front_length1 = $pathani_length + 0.75 + 0.75;
	}
	$x_front_length2 = $pathani_length + 0.75;
	$x_front_length3 = $pathani_length + 0.75 + 0.75 - 0.5;
	$y_front_collarl = 2.25;
	
	$x_front_shoulderslope = 2;
	$y_front_shoulder = shouldertrim($pathani_shoulder) / 2;
	$y_front_shouldermcollar = $y_front_shoulder - $y_front_collarl;
	
	$x_front_markshoulder = 2.5;
	
	$x_front_hala = $pathani_hala;
	$x_front_shoulderslopetohala = $x_front_hala - $x_front_shoulderslope;
	$y_front_t1 = $pathani_t1;
	$y_front_t1mshoulder = $y_front_t1 - $y_front_shoulder;
	$x_front_halaline = $x_front_shoulderslopetohala - $y_front_t1mshoulder;
	
	$x_front_stomach2 = $pathani_shoulder;
	$x_front_halatostomach = $x_front_stomach2 - $x_front_hala;
	$y_front_t2 = $pathani_t2;
	$y_front_t2mt1 = $y_front_t2 - $y_front_t1;
	
	$x_front_stomachtolength = $x_front_length1 - $x_front_stomach2;
	$y_front_t3 = $pathani_t3;
	$y_front_t3mt2 = $y_front_t3 - $y_front_t2;
	}
	
	{	// back
	$x_back_length1 = $x_front_length1 - 2.5;
	$x_back_length2 = $x_front_length1 - 2.5 - 0.5;
	$y_back_shoulder = shouldertrim($pathani_shoulder) / 2 + 0.25;
	
	$x_back_shoulderslopetohala = $x_front_hala - $x_front_shoulderslope;
	$y_back_t1 = $y_front_t1;
	$y_back_t1mshoulder = $y_back_t1 - $y_back_shoulder;
	
	$x_back_halaline = $x_front_hala - 2.5 - $y_back_t1mshoulder;
	
	$x_back_halatostomach = $x_front_stomach2 - $x_front_hala;
	$y_back_t2 = $y_front_t2;
	$y_back_t2mt1 = $y_back_t2 - $y_back_t1;
	
	$x_back_stomachtolength = $x_front_length1 - $x_front_stomach2;
	$y_back_t3 = $y_front_t3;
	$y_back_t3mt2 = $y_back_t3 - $y_back_t2;
	}
	
	{	//backop
	$x_back_lengthop = $x_front_length1 + 2.5;
	if ($pathani_collartype=="bc") {
		$x_back_rounding = 1.125;
	} else {
		$x_back_rounding = 1.750;
	}
	$x_back_slope = 2;
	$y_back_shoulderop = $y_back_shoulder + 0.25;
	$y_back_rounding = 2.5;
	$y_back_slopemrounding = $y_back_shoulderop - $y_back_rounding;
	$x_back_lengthop2 = $x_back_lengthop - $x_back_rounding;
	
	$y_back_t1mshoulderop = $y_back_t1 - $y_back_shoulderop;
	$x_back_halalineop = $x_front_hala + 2.5 - $x_back_slope - $y_back_t1mshoulderop;
	}
	
	{	// sleeve
	$x_sleeve_length1 = $pathani_sleeve - ($pathani_cuffln[$i] - 1) + 1;
	$x_sleeve_length2 = $pathani_sleeve - ($pathani_cuffln[$i] - 1) + 1 + 0.5;
	if ($pathani_cuffbr==9) {
		$y_sleeve_cuff = 5.5;
	} elseif ($pathani_cuffbr==9.25) {
		$y_sleeve_cuff = 5.625;
	} elseif ($pathani_cuffbr==9.5) {
		$y_sleeve_cuff = 5.75;
	} elseif ($pathani_cuffbr==9.75) {
		$y_sleeve_cuff = 5.875;
	} elseif ($pathani_cuffbr==10) {
		$y_sleeve_cuff = 6;
	} elseif ($pathani_cuffbr==10.25) {
		$y_sleeve_cuff = 6.125;
	} elseif ($pathani_cuffbr==10.5) {
		$y_sleeve_cuff = 6.25;
	} else {
		$y_sleeve_cuff = $pathani_cuffbr / 2 + 0.5;
	}
	$y_sleeve_cuffx2 = $y_sleeve_cuff * 2;
	
	$x_sleeve_hala = 4.5;
	$y_sleeve_hala = $pathani_hala;
	$y_sleeve_halax2 = 2 * $y_sleeve_hala;
	
	$x_sleeve_edge = $x_sleeve_length1 - $x_sleeve_hala;
	$y_sleeve_edge = $y_sleeve_hala - $y_sleeve_cuff;
	}
	
	{	//shoulder
	$x_shoulder_length = shouldertrim($pathani_shoulder) / 2 + 0.5;
	$x_shoulder_rounding = 2.5;
	$x_shoulder_slope = $x_shoulder_length - $x_shoulder_rounding;
	$y_shoulder_height = 6;
	$y_shoulder_slope = 2;
	$y_shoulder_rounding = 1.875;
	$y_shoulder_heightmslope = $y_shoulder_height - $y_shoulder_slope;
	}
	
	}
	
	if ($print=="print3") {
		include 'print/print3.php';
	} elseif ($print=="print1") {
		include 'print/print1.php';
	} else {
		include 'print/print2.php';
	}
	
	mysqli_close($dbc);
	?>
	
</a>

</body>
</html>