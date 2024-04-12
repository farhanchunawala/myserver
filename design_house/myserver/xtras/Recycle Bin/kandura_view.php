<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 2 , alt + F -->
<head>
	<?php
		$sr=$_GET['sr'];
	?>
	<title><?php echo "$sr Kandura"?></title>
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
	$type = 'kandura';
	
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
	
	
	$query3 = "SELECT * FROM style WHERE sr=$sr AND garb_type=\"kandura\" ORDER BY style_id ASC";
	
	$result3 = mysqli_query($dbc, $query3)
		or die('Error querying database query3.');
	
	
	$query4 = "SELECT * FROM entry WHERE sr=$sr AND garb_type=\"kandura\" ORDER BY garb_id ASC";
	
	$result4 = mysqli_query($dbc, $query4)
		or die('Error querying database query4.');
	
		$i=0;
		while ($rowq4 = mysqli_fetch_array($result4)) {
			$garb[$i] = $rowq4['garb_id'];
			$garb_pairing[$i] = $rowq4['garb_pairing'];
			$garb_description[$i] = $rowq4['garb_description'];
			$kandura_pana[$i] = $rowq4['garb_pana'];
			$kandura_clothln[$i] = $rowq4['garb_clothln'];
			
			$i++;
		}
		$garbcount = count($garb);
		
		$i=0;
		while ($rowq3 = mysqli_fetch_array($result3)) {
			$style[$i] = $rowq3['style_id'];
			$kandura_collartype[$i] = $rowq3['kandura_collartype'];
			$kandura_cuffln[$i] = $rowq3['kandura_cuffln'];
			$kandura_cufftype[$i] = $rowq3['kandura_cufftype'];
			$kandura_pockettype[$i] = $rowq3['kandura_pockettype'];
			$kandura_shouldertype[$i] = $rowq3['kandura_shouldertype'];
			
			$i++;
		}
	}
	
	{
		$kandura_count = $rowq2['kandura_count'];
		$kandura_length = $rowq2['kandura_length'];
		$kandura_shoulder = $rowq2['kandura_shoulder'];
		$kandura_sleeve = $rowq2['kandura_sleeve'];
		$kandura_chest = $rowq2['kandura_chest'];
		$kandura_stomach = $rowq2['kandura_stomach'];
		$kandura_seat = $rowq2['kandura_seat'];
		$kandura_sleevefit = $rowq2['kandura_sleevefit'];
		$kandura_biceps = $rowq2['kandura_biceps'];
		$kandura_collar = $rowq2['kandura_collar'];
		$kandura_cuffbr = $rowq2['kandura_cuffbr'];
		$kandura_pocketdown = $rowq2['kandura_pocketdown'];
		$kandura_pocket = $rowq2['kandura_pocket'];
		$kandura_hala = $rowq2['kandura_hala'];
		$kandura_t1 = $rowq2['kandura_t1'];
		$kandura_t2 = $rowq2['kandura_t2'];
		$kandura_t3 = $rowq2['kandura_t3'];
	}
	
	for($i = 0; $i < $garbcount; $i++) {
	
	{	//cloth
	$y_pana = $kandura_pana;
	$x_clothln = $kandura_clothln / 2.54;
	}
	
	{	// front
	$x_front_length2 = $kandura_length + 0.75;
	$x_front_length3 = $kandura_length + 0.75 + 0.75 - 0.5;
	$y_front_collarl = 2.25;
	
	$x_front_shoulderslope = 2;
	$y_front_shoulder = shouldertrim($kandura_shoulder) / 2;
	$y_front_shouldermcollar = $y_front_shoulder - $y_front_collarl;
	
	$x_front_markshoulder = 2.5;
	
	$x_front_hala = $kandura_hala;
	$x_front_shoulderslopetohala = $x_front_hala - $x_front_shoulderslope;
	$y_front_t1 = $kandura_t1;
	$y_front_t1mshoulder = $y_front_t1 - $y_front_shoulder;
	$x_front_halaline = $x_front_shoulderslopetohala - $y_front_t1mshoulder;
	
	$x_front_stomach2 = $kandura_shoulder;
	$x_front_halatostomach = $x_front_stomach2 - $x_front_hala;
	$y_front_t2 = $kandura_t2;
	$y_front_t2mt1 = $y_front_t2 - $y_front_t1;
	
	$x_front_stomachtolength = $x_front_length1 - $x_front_stomach2;
	$y_front_t3 = $kandura_t3;
	$y_front_t3mt2 = $y_front_t3 - $y_front_t2;
	}
	
	{	// back
	$x_back_length1 = $x_front_length1 - 2.5;
	$x_back_length2 = $x_front_length1 - 2.5 - 0.5;
	$y_back_shoulder = shouldertrim($kandura_shoulder) / 2 + 0.25;
	
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
	if ($kandura_collartype=="bc") {
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
	$x_sleeve_length1 = $kandura_sleeve - ($kandura_cuffln[$i] - 1) + 1;
	$x_sleeve_length2 = $kandura_sleeve - ($kandura_cuffln[$i] - 1) + 1 + 0.5;
	if ($kandura_cuffbr==9) {
		$y_sleeve_cuff = 5.5;
	} elseif ($kandura_cuffbr==9.25) {
		$y_sleeve_cuff = 5.625;
	} elseif ($kandura_cuffbr==9.5) {
		$y_sleeve_cuff = 5.75;
	} elseif ($kandura_cuffbr==9.75) {
		$y_sleeve_cuff = 5.875;
	} elseif ($kandura_cuffbr==10) {
		$y_sleeve_cuff = 6;
	} elseif ($kandura_cuffbr==10.25) {
		$y_sleeve_cuff = 6.125;
	} elseif ($kandura_cuffbr==10.5) {
		$y_sleeve_cuff = 6.25;
	} else {
		$y_sleeve_cuff = $kandura_cuffbr / 2 + 0.5;
	}
	$y_sleeve_cuffx2 = $y_sleeve_cuff * 2;
	
	$x_sleeve_hala = 4.5;
	$y_sleeve_hala = $kandura_hala;
	$y_sleeve_halax2 = 2 * $y_sleeve_hala;
	
	$x_sleeve_edge = $x_sleeve_length1 - $x_sleeve_hala;
	$y_sleeve_edge = $y_sleeve_hala - $y_sleeve_cuff;
	}
	
	{	//shoulder
	$x_shoulder_length = shouldertrim($kandura_shoulder) / 2 + 0.5;
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