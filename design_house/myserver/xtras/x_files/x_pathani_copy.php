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
			$garb_color[$i] = $rowq4['garb_color'];
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
	
	{	//cloth
	$y_pana = $pathani_pana;
	$x_clothln = $pathani_clothln / 2.54;
	}
	
	for($i = 0; $i < $garbcount; $i++) {
	
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
	$x_sleeve_length1 = $pathani_sleeve - ($pathani_cuffln - 1) + 1;
	$x_sleeve_length2 = $pathani_sleeve - ($pathani_cuffln - 1) + 1 + 0.5;
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
	
	if (((2 * $y_front_t3) + (2 * $y_back_t3) + 0.5) < $y_pana) {
		$map = "map1";
	} elseif (((2 * $y_front_t3) + ($y_sleeve_halax2) + 0.5) < $y_pana) {
		$map = "map2";
	} else {
		$map = "";
	}
	
	if ($map=="map1") {
		$x_mapfront_m = 0.5;
		$y_mapfront_m = $y_pana;
		
		$x_mapback_m = 0.5;
		$y_mapback_m = 0;
		
		$x_mapsleeve_m1 = $x_clothln - $y_sleeve_hala - 1;
		$y_mapsleeve_m1 = 0;
		$x_mapsleeve_m2 = $x_clothln - $y_sleeve_hala - 1;
		$y_mapsleeve_m2 = $y_pana;
		
		$x_mapshoulder_m = $x_clothln - 1;
		$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
	?>
	<div id="marx">
	<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
		
		<path
		d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
		l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
		l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
		a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
		h<?php echo cmx2($x_front_halaline); ?>
		l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
		v<?php echo -cmx2($y_front_collarl); ?>
		v<?php echo -cmx2($y_front_collarl); ?>
		l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
		h<?php echo -cmx2($x_front_halaline); ?>
		a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
		l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
		l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
		v<?php echo cmx2($y_front_t3); ?>
		v<?php echo cmx2($y_front_t3); ?>"
		fill="teal" />
		
		<!-- backop
		<path
		d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
		v<?php echo cmx2($y_back_t3); ?>
		v<?php echo cmx2($y_back_t3); ?>
		l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
		l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
		a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulderop); ?>,<?php echo -cmx2($y_back_t1mshoulderop); ?>
		h<?php echo cmx2($x_back_halalineop); ?>
		l<?php echo cmx2($x_back_slope); ?>,<?php echo -cmx2($y_back_slopemrounding); ?>
		a30,30 0,0,1 <?php echo -cmx2($x_back_rounding); ?>,<?php echo -cmx2($y_back_rounding); ?>
		a30,30 0,0,1 <?php echo cmx2($x_back_rounding); ?>,<?php echo -cmx2($y_back_rounding); ?>
		l<?php echo -cmx2($x_back_slope); ?>,<?php echo -cmx2($y_back_slopemrounding); ?>
		h<?php echo -cmx2($x_back_halalineop); ?>
		a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulderop); ?>,<?php echo -cmx2($y_back_t1mshoulderop); ?>
		l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
		l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>"
		fill="teal" />
		-->
		
		<path
		d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
		v<?php echo cmx2($y_back_t3); ?>
		v<?php echo cmx2($y_back_t3); ?>
		l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
		l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
		a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
		h<?php echo cmx2($x_back_halaline); ?>
		v<?php echo -cmx2($y_back_shoulder); ?>
		v<?php echo -cmx2($y_back_shoulder); ?>
		h<?php echo -cmx2($x_back_halaline); ?>
		a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
		l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
		l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>"
		fill="teal" />
		
		<path
		d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
		l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
		l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
		l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
		a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>"
		fill="teal" />
		
		<path
		d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
		a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>
		l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
		l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
		l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
		fill="teal" />
		
		<path
		d="M<?php echo cmx2($x_mapshoulder_m) ?>,<?php echo cmx2($y_mapshoulder_m); ?>
		l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
		a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
		a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
		l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
		v<?php echo cmx2($y_shoulder_heightmslope); ?>
		h<?php echo cmx2($x_shoulder_length); ?>
		h<?php echo cmx2($x_shoulder_length); ?>
		v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
		fill="teal" />
	</svg>
	</div>
	
	<?php } elseif ($map=="map2") {
		$x_mapfront_m = 0.5;
		$y_mapfront_m = $y_pana;
		
		$x_mapback_m = $x_clothln - $x_back_length1 - 0.5;
		$y_mapback_m = $y_pana;
		
		$x_mapsleeve_m1 = $y_sleeve_hala + 0.5;
		$y_mapsleeve_m1 = 0;
		$x_mapsleeve_m2 = $x_clothln - $y_sleeve_hala - 1;
		$y_mapsleeve_m2 = 0;
		
		$x_mapshoulder_m = $x_clothln - 1;
		$y_mapshoulder_m = (2 * $y_sleeve_hala) + 3;
	?>
	<div id="marx">
	<svg height="<?php echo cmx2($y_pana); ?>" width="<?php echo cmx2($x_clothln); ?>" style="border: 1px solid black">
		
		<path
		d="M<?php echo cmx2($x_mapfront_m); ?>,<?php echo cmx2($y_mapfront_m); ?>
		l<?php echo cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
		l<?php echo cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
		a30,30 0,0,1 <?php echo cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
		h<?php echo cmx2($x_front_halaline); ?>
		l<?php echo cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
		v<?php echo -cmx2($y_front_collarl); ?>
		v<?php echo -cmx2($y_front_collarl); ?>
		l<?php echo -cmx2($x_front_shoulderslope); ?>,<?php echo -cmx2($y_front_shouldermcollar); ?>
		h<?php echo -cmx2($x_front_halaline); ?>
		a30,30 0,0,1 <?php echo -cmx2($y_front_t1mshoulder); ?>,<?php echo -cmx2($y_front_t1mshoulder); ?>
		l<?php echo -cmx2($x_front_halatostomach); ?>,<?php echo -cmx2($y_front_t2mt1); ?>
		l<?php echo -cmx2($x_front_stomachtolength); ?>,<?php echo -cmx2($y_front_t3mt2); ?>
		v<?php echo cmx2($y_front_t3); ?>
		v<?php echo cmx2($y_front_t3); ?>"
		fill="teal" />
		
		<path
		d="M<?php echo cmx2($x_mapback_m); ?>,<?php echo cmx2($y_mapback_m); ?>
		l<?php echo cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
		l<?php echo cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
		a36,36 0,0,1 <?php echo cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
		h<?php echo cmx2($x_back_halaline); ?>
		v<?php echo -cmx2($y_back_shoulder); ?>
		v<?php echo -cmx2($y_back_shoulder); ?>
		h<?php echo -cmx2($x_back_halaline); ?>
		a36,36 0,0,1 <?php echo -cmx2($y_back_t1mshoulder); ?>,<?php echo -cmx2($y_back_t1mshoulder); ?>
		l<?php echo -cmx2($x_back_halatostomach); ?>,<?php echo -cmx2($y_back_t2mt1); ?>
		l<?php echo -cmx2($x_back_stomachtolength); ?>,<?php echo -cmx2($y_back_t3mt2); ?>
		v<?php echo cmx2($y_back_t3); ?>
		v<?php echo cmx2($y_back_t3); ?>"
		fill="teal" />
		
		<path
		d="M<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>
		a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>
		l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
		l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
		l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>"
		fill="teal"
		transform="rotate(180,<?php echo cmx2($x_mapsleeve_m1); ?>,<?php echo cmx2($y_mapsleeve_m1); ?>)" />
		
		<path
		d="M<?php echo cmx2($x_mapsleeve_m2); ?>,<?php echo cmx2($y_mapsleeve_m2); ?>
		l<?php echo -cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
		l0,<?php echo cmx2($y_sleeve_cuffx2); ?>
		l<?php echo cmx2($x_sleeve_edge); ?>,<?php echo cmx2($y_sleeve_edge); ?>
		a1,1 0,0,0 0,<?php echo -cmx2($y_sleeve_halax2); ?>"
		fill="teal" />
		
		<path
		d="M<?php echo cmx2($x_mapshoulder_m); ?>,<?php echo cmx2($y_mapshoulder_m); ?>
		l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
		a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
		a11,11 0,0,1 <?php echo -cmx2($x_shoulder_rounding); ?>,<?php echo -cmx2($y_shoulder_rounding); ?>
		l<?php echo -cmx2($x_shoulder_slope); ?>,<?php echo cmx2($y_shoulder_rounding); ?>
		v<?php echo cmx2($y_shoulder_heightmslope); ?>
		h<?php echo cmx2($x_shoulder_length); ?>
		h<?php echo cmx2($x_shoulder_length); ?>
		v<?php echo -cmx2($y_shoulder_heightmslope); ?>"
		fill="teal" />
	</svg>
	</div>
	
	<?php }
?>

	<div id="front">
		<div class="row mb-1 no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
			
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
			
				<div class="col"></div>
				<div class="col"></div>
			
			</div>
			</div>
		</div>
		<div class="row mb-3 no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col"></div>
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t1mshoulder); ?></span> )
				</div>
			
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				<div class="col"></div>
			
			</div>
			</div>
		</div>
		<div class="row mb-5 no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
			
				<div class="col"></div>
				<div class="col"></div>
				<div class="col"></div>
			
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
				<div class="col"></div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo "0"; ?></span> )
				</div>
				
			</div>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-9">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_length1); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t3); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_stomach2); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t2); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_hala); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_t1); ?></span> )
				</div>
			
			</div>
			</div>
			<div class="col-3">
			<div class="row no-gutters">
				
				<div class="col">
					( <span style="color:blue;"><?php echo inchtotext($x_front_shoulderslope); ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_shoulder); ?></span> )
				</div>
				<div class="col">
					( <span style="color:blue;"><?php echo "0"; ?></span>, 
					<span style="color:red;"><?php echo inchtotext($y_front_collarl); ?></span> )
				</div>
			
			</div>
			</div>
		</div>
	</div>
	
	<div id="back">
		<div class="row mb-5 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo "0"; ?></span>, 
				<span style="color:red;"><?php echo "0"; ?></span> )
			</div>
			<div class="col"></div>
		</div>
		<div class="row no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo "0"; ?></span>, 
				<span style="color:red;"><?php echo inchtotext($y_back_shoulder); ?></span> )
			</div>
			<div class="col"></div>
		</div>
	</div>
	
	<div id="sleeve">
		<div class="row mb-0 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo inchtotext($x_sleeve_hala); ?></span>, 
				<span style="color:red;"><?php echo "0"; ?></span> )
			</div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
		<div class="row mb-5 no-gutters">
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo inchtotext($x_sleeve_length1); ?></span>, 
				<span style="color:red;"><?php echo "0"; ?></span> )
			</div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
		<div class="row no-gutters">
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo inchtotext($x_sleeve_length1); ?></span>, 
				<span style="color:red;"><?php echo inchtotext($y_sleeve_cuff); ?></span> )
			</div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo inchtotext($x_sleeve_hala); ?></span>, 
				<span style="color:red;"><?php echo inchtotext($y_sleeve_hala); ?></span> )
			</div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo "0"; ?></span>, 
				<span style="color:red;"><?php echo "0"; ?></span> )
			</div>
		</div>
	</div>
	
	<div id="shoulder">
		<div class="row mb-3 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo "0"; ?></span>, 
				<span style="color:red;"><?php echo "0"; ?></span> )
			</div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo inchtotext($x_shoulder_rounding); ?></span>, 
				<span style="color:red;"><?php echo "_"; ?></span> )
			</div>
		</div>
		<div class="row mb-4 no-gutters">
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo "0"; ?></span>, 
				<span style="color:red;"><?php echo inchtotext($y_shoulder_rounding); ?></span> )
			</div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo inchtotext($x_shoulder_length); ?></span>, 
				<span style="color:red;"><?php echo inchtotext($y_shoulder_rounding); ?></span> )
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo "0"; ?></span>, 
				<span style="color:red;"><?php echo "6"; ?></span> )
			</div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo "_ "; ?></span>, 
				<span style="color:red;"><?php echo "6"; ?></span> )
			</div>
			<div class="col"></div>
			<div class="col">
				( <span style="color:blue;"><?php echo inchtotext($x_shoulder_length); ?></span>, 
				<span style="color:red;"><?php echo "6"; ?></span> )
			</div>
		</div>
	</div>
	
	<div id=<?php echo "$mar" ?>>
		<div class="row mb-2 no-gutters">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"><?php echo "<b><u>&nbsp$sr&nbsp</u></b>" ?></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
		<div class="row no-gutters">
			<div class="col"><?php echo "<span class=\"border border-dark pr-1 pl-1\"><b>$pathani_count</b></span>"; ?></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"><?php echo "(".inchtotext($pathani_hala).")" ?></div>
			<div class="col"><?php echo inchtotext($pathani_t1) ?></div>
			<div class="col"><?php echo inchtotext($pathani_t2) ?></div>
			<div class="col"><?php echo inchtotext($pathani_t3) ?></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
		<div class="row no-gutters">
			<div class="col">
			<?php
				if ($pathani_type=="round") {
					echo "<span class=\"border-left border-bottom rounded-circle border-dark p-1\"><b>Pathani :</b></span>";
				} else {
					echo "<span class=\"border border-dark pr-1 pl-1\"><b>Pathani :</b></span>";
				}
			?>
			</div>
			<div class="col"><?php echo inchtotext($pathani_length) ?></div>
			<div class="col"><?php echo inchtotext($pathani_shoulder) ?></div>
			<div class="col"><?php echo inchtotext($pathani_sleeve) ?></div>
			<div class="col"><?php echo inchtotext($pathani_chest) ?></div>
			<div class="col"><?php echo inchtotext($pathani_stomach) ?></div>
			<div class="col"><?php echo inchtotext($pathani_seat) ?></div>
			<div class="col"><?php echo inchtotext($pathani_collar) ?></div>
			<div class="col">
			<?php
				if ($pathani_cuffln=="0") {
					echo "";
				} else {
					echo inchtotext($pathani_cuffbr)." x ".inchtotext($pathani_cuffln);
				}
			?>
			</div>
			<div class="col">
			<?php
				if ($pathani_pocket=="pocketa") {
					echo "4 x 4½";
				} elseif ($pathani_pocket=="pocketb") {
					echo "4¼ x 4¾";
				} elseif ($pathani_pocket=="pocketc") {
					echo "4½ x 5¼";
				} elseif ($pathani_pocket=="pocketd") {
					echo "4¾ x 5½";
				} elseif ($pathani_pocket=="pockete") {
					echo "5 x 5¾";
				} elseif ($pathani_pocket=="pocketf") {
					echo "5¼ x 6";
				} elseif ($pathani_pocket=="pocketg") {
					echo "5½ x 6¼";
				} elseif ($pathani_pocket=="pocketh") {
					echo "5¾ x 6½";
				} else {
					echo "";
				}
			?>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col">
			<?php
				if ($pathani_sleevefit=="sll") {
					echo "SLL ".inchtotext($pathani_biceps);
				} elseif ($pathani_sleevefit=="slm") {
					echo "SLM ".inchtotext($pathani_biceps);
				} elseif ($pathani_sleevefit=="slf") {
					echo "SLF ".inchtotext($pathani_biceps);
				} else {
					echo inchtotext($pathani_biceps);
				}
			?>
			</div>
			<div class="col"></div>
			<div class="col" style="font-size:20px">
			<?php
				if ($pathani_shouldertype=="noshoulder") {
					echo "NO Shoulder";
				} elseif ($pathani_shouldertype=="vshoulder") {
					echo "V Shoulder";
				} elseif ($pathani_shouldertype=="dvshoulder") {
					echo "DV Shoulder";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col"></div>
			<div class="col" style="font-size:20px">
			<?php
				if ($pathani_collartype=="lspc") {
					echo "LSPC";
				} elseif ($pathani_collartype=="rmpc") {
					echo "RMPC";
				} elseif ($pathani_collartype=="mrmpc") {
					echo "MRMPC";
				} elseif ($pathani_collartype=="bc") {
					echo "BC";
				} elseif ($pathani_collartype=="nocollar") {
					echo "NO Collar";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($pathani_cufftype=="nocuff") {
					echo "NO Cuff";
				} elseif ($pathani_cufftype=="cut") {
					echo "Cut";
				} elseif ($pathani_cufftype=="square") {
					echo "SQUARE";
				} elseif ($pathani_cufftype=="round") {
					echo "ROUND";
				} else {
					echo "";
				}
			?>
			</div>
			<div class="col" style="font-size:20px">
			<?php
				if ($pathani_pockettype=="nopocket") {
					echo "NO Pocket";
				} elseif ($pathani_pockettype=="square") {
					echo "SQUARE";
				} elseif ($pathani_pockettype=="v") {
					echo "V";
				} elseif ($pathani_pockettype=="round") {
					echo "ROUND";
				} elseif ($pathani_pockettype=="flap") {
					echo "FLAP";
				} elseif ($pathani_pockettype=="wallet") {
					echo "WALLET";
				} else {
					echo "";
				}
			?>
			</div>
		</div>
	</div>
	
</a>

</body>
</html>