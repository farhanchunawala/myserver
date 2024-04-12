<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 3 -->
<head>
	<?php $sr=$_GET['sr']; ?>
	<title><?php echo "$sr Entry Save"?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
th {
	padding: 5px;
	background-color: lightgrey;
	position: -webkit-sticky;
	position: sticky;
	top: 0;
	white-space: nowrap;
}
td { 
	white-space: nowrap;
}
</style>

<?php
{	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
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
	
	$shirt_count = $_GET['shirtc'];
	$kurta_count = $_GET['kurtac'];
	$pathani_count = $_GET['pathanic'];
	$kandura_count = $_GET['kandurac'];
	$pant_count = $_GET['pantc'];
	$bpyjama_count = $_GET['bpyjamac'];
	$pyjama_count = $_GET['pyjamac'];
	$salwar_count = $_GET['salwarc'];
	$aligard_count = $_GET['aligardc'];
	$churidar_count = $_GET['churidarc'];
}
	
	if ($shirt_count >= 1) {
		
		for ($c = 1; $c <= $shirt_count; $c++) {
			
			$shirt_pairing = $_POST["shirt_pairing$c"];
			$shirt_description = $_POST["shirt_description$c"];
			if ($_POST["shirt_panafd$c"]=="") {
				$shirt_pana = $_POST["shirt_pana$c"];
			} else{
				$shirt_pana = $_POST["shirt_pana$c"] * $_POST["shirt_panafd$c"];
			}
			if ($_POST["shirt_clothfd$c"]=="") {
				$shirt_clothln = $_POST["shirt_clothln$c"];
			} else{
				$shirt_clothln = $_POST["shirt_clothln$c"] * $_POST["shirt_clothfd$c"];
			}
			$shirt_book_date = date("y-m-d");
			$shirt_submit_date = $_POST["shirt_submit_date$c"];
			$shirt_collartype = $_POST["shirt_collartype$c"];
			$shirt_cuffln = texttoinch($_POST["shirt_cuffln$c"]);
			$shirt_cufftype = $_POST["shirt_cufftype$c"];
			$shirt_pockettype = $_POST["shirt_pockettype$c"];
			$shirt_shouldertype = $_POST["shirt_shouldertype$c"];
			$shirt_button = $_POST["shirt_button$c"];
			
			if ($shirt_submit_date=="") {
				$shirt_submit_date = $_POST["shirt_submit_date1"];
			}
			if ($shirt_collartype=="default") {
				$shirt_collartype = $_POST["shirt_collartype1"];
			}
			if ($shirt_cuffln=="default") {
				$shirt_cuffln = $_POST["shirt_cuffln1"];
			}
			if ($shirt_cufftype=="default") {
				$shirt_cufftype = $_POST["shirt_cufftype1"];
			}
			if ($shirt_pockettype=="default") {
				$shirt_pockettype = $_POST["shirt_pockettype1"];
			}
			if ($shirt_shouldertype=="default") {
				$shirt_shouldertype = $_POST["shirt_shouldertype1"];
			}
			
			$query_shirt1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_button`, `garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"shirt\", \"$shirt_pairing\", \"$shirt_description\", \"$shirt_pana\", \"$shirt_clothln\", \"$shirt_button\", \"$shirt_book_date\", 
				\"$shirt_submit_date\")";
			
			$result_shirt1 = mysqli_query($dbc, $query_shirt1)
				or die('<b>Error query_shirt1 : </b>'.mysqli_error($dbc));
			
			$query_shirt2 = "INSERT INTO `style` (`sr`, `garb_type`, `shirt_collartype`, `shirt_cuffln`, `shirt_cufftype`, 
				`shirt_pockettype`, `shirt_shouldertype`) 
				VALUES ($sr, \"shirt\", \"$shirt_collartype\", $shirt_cuffln, \"$shirt_cufftype\", 
				\"$shirt_pockettype\", \"$shirt_shouldertype\")";
			
			$result_shirt2 = mysqli_query($dbc, $query_shirt2)
				or die('<b>Error query_shirt2 : </b>'.mysqli_error($dbc));
		}
	
	}
	
	if ($pant_count >= 1) {
		
		for ($c = 1; $c <= $pant_count; $c++) {
			
			$pant_pairing = $_POST["pant_pairing$c"];
			$pant_description = $_POST["pant_description$c"];
			if ($_POST["pant_panafd$c"]=="") {
				$pant_pana = $_POST["pant_pana$c"];
			} else{
				$pant_pana = $_POST["pant_pana$c"] * $_POST["pant_panafd$c"];
			}
			if ($_POST["pant_clothfd$c"]=="") {
				$pant_clothln = $_POST["pant_clothln$c"];
			} else{
				$pant_clothln = $_POST["pant_clothln$c"] * $_POST["pant_clothfd$c"];
			}
			$pant_book_date = date("y-m-d");
			$pant_submit_date = $_POST["pant_submit_date$c"];
			$pant_crease = $_POST["pant_crease$c"];
			
			if ($pant_submit_date=="") {
				$pant_submit_date = $_POST["pant_submit_date1"];
			}
			if ($pant_crease=="default") {
				$pant_crease = $_POST["pant_crease1"];
			}
			
			$query_pant1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"pant\", \"$pant_pairing\", \"$pant_description\", \"$pant_pana\", \"$pant_clothln\", \"$pant_book_date\", 
				\"$pant_submit_date\")";
			
			$result_pant1 = mysqli_query($dbc, $query_pant1)
				or die('Error querying database query_pant1.');
			
			$query_pant2 = "INSERT INTO `style` (`sr`, `garb_type`, `pant_crease`) 
				VALUES ($sr, \"pant\", \"$pant_crease\")";
			
			$result_pant2 = mysqli_query($dbc, $query_pant2)
				or die('Error querying database query_pant2.');
			
		}
		
	}
	
	if ($kandura_count >= 1) {
		
		for ($c = 1; $c <= $kandura_count; $c++) {
			
			$kandura_pairing = $_POST["kandura_pairing$c"];
			$kandura_description = $_POST["kandura_description$c"];
			if ($_POST["kandura_panafd$c"]=="") {
				$kandura_pana = $_POST["kandura_pana$c"];
			} else{
				$kandura_pana = $_POST["kandura_pana$c"] * $_POST["kandura_panafd$c"];
			}
			if ($_POST["kandura_clothfd$c"]=="") {
				$kandura_clothln = $_POST["kandura_clothln$c"];
			} else{
				$kandura_clothln = $_POST["kandura_clothln$c"] * $_POST["kandura_clothfd$c"];
			}
			$kandura_book_date = date("y-m-d");
			$kandura_submit_date = $_POST["kandura_submit_date$c"];
			$kandura_collartype = $_POST["kandura_collartype$c"];
			$kandura_cuffln = texttoinch($_POST["kandura_cuffln$c"]);
			$kandura_cufftype = $_POST["kandura_cufftype$c"];
			$kandura_pockettype = $_POST["kandura_pockettype$c"];
			$kandura_shouldertype = $_POST["kandura_shouldertype$c"];
			$kandura_taweeztype = $_POST["kandura_taweeztype$c"];
			$kandura_button = $_POST["kandura_button$c"];
			
			if ($kandura_submit_date=="") {
				$kandura_submit_date = $_POST["kandura_submit_date1"];
			}
			if ($kandura_collartype=="default") {
				$kandura_collartype = $_POST["kandura_collartype1"];
			}
			if ($kandura_cuffln=="default") {
				$kandura_cuffln = $_POST["kandura_cuffln1"];
			}
			if ($kandura_cufftype=="default") {
				$kandura_cufftype = $_POST["kandura_cufftype1"];
			}
			if ($kandura_pockettype=="default") {
				$kandura_pockettype = $_POST["kandura_pockettype1"];
			}
			if ($kandura_shouldertype=="default") {
				$kandura_shouldertype = $_POST["kandura_shouldertype1"];
			}
			if ($kandura_taweeztype=="default") {
				$kandura_taweeztype = $_POST["kandura_taweeztype1"];
			}
			
			$query_kandura1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_button`, `garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"kandura\", \"$kandura_pairing\", \"$kandura_description\", \"$kandura_pana\", \"$kandura_clothln\", \"$kandura_button\", \"$kandura_book_date\", 
				\"$kandura_submit_date\")";
			
			$result_kandura1 = mysqli_query($dbc, $query_kandura1)
				or die('Error querying database query_kandura1.');
			
			$query_kandura2 = "INSERT INTO `style` (`sr`, `garb_type`, `kandura_collartype`, `kandura_cuffln`, `kandura_cufftype`, 
				`kandura_pockettype`, `kandura_shouldertype`, `kandura_taweeztype`) 
				VALUES ($sr, \"kandura\", \"$kandura_collartype\", $kandura_cuffln, \"$kandura_cufftype\", 
				\"$kandura_pockettype\", \"$kandura_shouldertype\", \"$kandura_taweeztype\")";
			
			$result_kandura2 = mysqli_query($dbc, $query_kandura2)
				or die('Error querying database query_kandura2.');
			
		}
		
	}
	
	if ($kurta_count >= 1) {
		
		for ($c = 1; $c <= $kurta_count; $c++) {
			
			$kurta_pairing = $_POST["kurta_pairing$c"];
			$kurta_description = $_POST["kurta_description$c"];
			if ($_POST["kurta_panafd$c"]=="") {
				$kurta_pana = $_POST["kurta_pana$c"];
			} else{
				$kurta_pana = $_POST["kurta_pana$c"] * $_POST["kurta_panafd$c"];
			}
			if ($_POST["kurta_clothfd$c"]=="") {
				$kurta_clothln = $_POST["kurta_clothln$c"];
			} else{
				$kurta_clothln = $_POST["kurta_clothln$c"] * $_POST["kurta_clothfd$c"];
			}
			$kurta_book_date = date("y-m-d");
			$kurta_submit_date = $_POST["kurta_submit_date$c"];
			$kurta_collartype = $_POST["kurta_collartype$c"];
			$kurta_cuffln = texttoinch($_POST["kurta_cuffln$c"]);
			$kurta_cufftype = $_POST["kurta_cufftype$c"];
			$kurta_pockettype = $_POST["kurta_pockettype$c"];
			$kurta_shouldertype = $_POST["kurta_shouldertype$c"];
			$kurta_taweeztype = $_POST["kurta_taweeztype$c"];
			$kurta_button = $_POST["kurta_button$c"];
			
			if ($kurta_submit_date=="") {
				$kurta_submit_date = $_POST["kurta_submit_date1"];
			}
			if ($kurta_collartype=="default") {
				$kurta_collartype = $_POST["kurta_collartype1"];
			}
			if ($kurta_cuffln=="default") {
				$kurta_cuffln = $_POST["kurta_cuffln1"];
			}
			if ($kurta_cufftype=="default") {
				$kurta_cufftype = $_POST["kurta_cufftype1"];
			}
			if ($kurta_pockettype=="default") {
				$kurta_pockettype = $_POST["kurta_pockettype1"];
			}
			if ($kurta_shouldertype=="default") {
				$kurta_shouldertype = $_POST["kurta_shouldertype1"];
			}
			if ($kurta_taweeztype=="default") {
				$kurta_taweeztype = $_POST["kurta_taweeztype1"];
			}
			
			$query_kurta1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_button`, `garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"kurta\", \"$kurta_pairing\", \"$kurta_description\", \"$kurta_pana\", \"$kurta_clothln\", \"$kurta_button\", \"$kurta_book_date\", 
				\"$kurta_submit_date\")";
			
			$result_kurta1 = mysqli_query($dbc, $query_kurta1)
				or die('Error querying database query_kurta1.');
			
			$query_kurta2 = "INSERT INTO `style` (`sr`, `garb_type`, `kurta_collartype`, `kurta_cuffln`, `kurta_cufftype`, 
				`kurta_pockettype`, `kurta_shouldertype`, `kurta_taweeztype`) 
				VALUES ($sr, \"kurta\", \"$kurta_collartype\", $kurta_cuffln, \"$kurta_cufftype\", 
				\"$kurta_pockettype\", \"$kurta_shouldertype\", \"$kurta_taweeztype\")";
			
			$result_kurta2 = mysqli_query($dbc, $query_kurta2)
				or die('Error querying database query_kurta2.');
			
		}
		
	}
	
	if ($pathani_count >= 1) {
		
		for ($c = 1; $c <= $pathani_count; $c++) {
			
			$pathani_pairing = $_POST["pathani_pairing$c"];
			$pathani_description = $_POST["pathani_description$c"];
			if ($_POST["pathani_panafd$c"]=="") {
				$pathani_pana = $_POST["pathani_pana$c"];
			} else{
				$pathani_pana = $_POST["pathani_pana$c"] * $_POST["pathani_panafd$c"];
			}
			if ($_POST["pathani_clothfd$c"]=="") {
				$pathani_clothln = $_POST["pathani_clothln$c"];
			} else{
				$pathani_clothln = $_POST["pathani_clothln$c"] * $_POST["pathani_clothfd$c"];
			}
			$pathani_book_date = date("y-m-d");
			$pathani_submit_date = $_POST["pathani_submit_date$c"];
			$pathani_collartype = $_POST["pathani_collartype$c"];
			$pathani_cuffln = texttoinch($_POST["pathani_cuffln$c"]);
			$pathani_cufftype = $_POST["pathani_cufftype$c"];
			$pathani_pockettype = $_POST["pathani_pockettype$c"];
			$pathani_shouldertype = $_POST["pathani_shouldertype$c"];
			$pathani_taweeztype = $_POST["pathani_taweeztype$c"];
			$pathani_button = $_POST["pathani_button$c"];
			
			if ($pathani_submit_date=="") {
				$pathani_submit_date = $_POST["pathani_submit_date1"];
			}
			if ($pathani_collartype=="default") {
				$pathani_collartype = $_POST["pathani_collartype1"];
			}
			if ($pathani_cuffln=="default") {
				$pathani_cuffln = $_POST["pathani_cuffln1"];
			}
			if ($pathani_cufftype=="default") {
				$pathani_cufftype = $_POST["pathani_cufftype1"];
			}
			if ($pathani_pockettype=="default") {
				$pathani_pockettype = $_POST["pathani_pockettype1"];
			}
			if ($pathani_shouldertype=="default") {
				$pathani_shouldertype = $_POST["pathani_shouldertype1"];
			}
			if ($pathani_taweeztype=="default") {
				$pathani_taweeztype = $_POST["pathani_taweeztype1"];
			}
			
			$query_pathani1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_button`, `garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"pathani\", \"$pathani_pairing\", \"$pathani_description\", \"$pathani_pana\", \"$pathani_clothln\", \"$pathani_button\", \"$pathani_book_date\", 
				\"$pathani_submit_date\")";
			
			$result_pathani1 = mysqli_query($dbc, $query_pathani1)
				or die('Error querying database query_pathani1.');
			
			$query_pathani2 = "INSERT INTO `style` (`sr`, `garb_type`, `pathani_collartype`, `pathani_cuffln`, `pathani_cufftype`, 
				`pathani_pockettype`, `pathani_shouldertype`, `pathani_taweeztype`) 
				VALUES ($sr, \"pathani\", \"$pathani_collartype\", $pathani_cuffln, \"$pathani_cufftype\", 
				\"$pathani_pockettype\", \"$pathani_shouldertype\", \"$pathani_taweeztype\")";
			
			$result_pathani2 = mysqli_query($dbc, $query_pathani2)
				or die('Error querying database query_pathani2.');
			
		}
		
	}
	
	if ($bpyjama_count >= 1) {
		
		for ($c = 1; $c <= $bpyjama_count; $c++) {
			
			$bpyjama_pairing = $_POST["bpyjama_pairing$c"];
			$bpyjama_description = $_POST["bpyjama_description$c"];
			if ($_POST["bpyjama_panafd$c"]=="") {
				$bpyjama_pana = $_POST["bpyjama_pana$c"];
			} else{
				$bpyjama_pana = $_POST["bpyjama_pana$c"] * $_POST["bpyjama_panafd$c"];
			}
			if ($_POST["bpyjama_clothfd$c"]=="") {
				$bpyjama_clothln = $_POST["bpyjama_clothln$c"];
			} else{
				$bpyjama_clothln = $_POST["bpyjama_clothln$c"] * $_POST["bpyjama_clothfd$c"];
			}
			$bpyjama_book_date = date("y-m-d");
			$bpyjama_submit_date = $_POST["bpyjama_submit_date$c"];
			$bpyjama_crease = $_POST["bpyjama_crease$c"];
			
			if ($bpyjama_submit_date=="") {
				$bpyjama_submit_date = $_POST["bpyjama_submit_date1"];
			}
			if ($bpyjama_crease=="default") {
				$bpyjama_crease = $_POST["bpyjama_crease1"];
			}
			
			$query_bpyjama1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"bpyjama\", \"$bpyjama_pairing\", \"$bpyjama_description\", \"$bpyjama_pana\", \"$bpyjama_clothln\", \"$bpyjama_book_date\", 
				\"$bpyjama_submit_date\")";
			
			$result_bpyjama1 = mysqli_query($dbc, $query_bpyjama1)
				or die('Error querying database query_bpyjama1.');
			
			$query_bpyjama2 = "INSERT INTO `style` (`sr`, `garb_type`, `bpyjama_crease`) 
				VALUES ($sr, \"bpyjama\", \"$bpyjama_crease\")";
			
			$result_bpyjama2 = mysqli_query($dbc, $query_bpyjama2)
				or die('Error querying database query_bpyjama2.');
			
		}
		
	}
	
	if ($pyjama_count >= 1) {
		
		for ($c = 1; $c <= $pyjama_count; $c++) {
			
			$pyjama_pairing = $_POST["pyjama_pairing$c"];
			$pyjama_description = $_POST["pyjama_description$c"];
			if ($_POST["pyjama_panafd$c"]=="") {
				$pyjama_pana = $_POST["pyjama_pana$c"];
			} else{
				$pyjama_pana = $_POST["pyjama_pana$c"] * $_POST["pyjama_panafd$c"];
			}
			if ($_POST["pyjama_clothfd$c"]=="") {
				$pyjama_clothln = $_POST["pyjama_clothln$c"];
			} else{
				$pyjama_clothln = $_POST["pyjama_clothln$c"] * $_POST["pyjama_clothfd$c"];
			}
			$pyjama_book_date = date("y-m-d");
			$pyjama_submit_date = $_POST["pyjama_submit_date$c"];
			
			if ($pyjama_submit_date=="") {
				$pyjama_submit_date = $_POST["pyjama_submit_date1"];
			}
			
			$query_pyjama1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"pyjama\", \"$pyjama_pairing\", \"$pyjama_description\", \"$pyjama_pana\", \"$pyjama_clothln\", \"$pyjama_book_date\", 
				\"$pyjama_submit_date\")";
			
			$result_pyjama1 = mysqli_query($dbc, $query_pyjama1)
				or die('Error querying database query_pyjama1.');
			
			$query_pyjama2 = "INSERT INTO `style` (`sr`, `garb_type`) 
				VALUES ($sr, \"pyjama\")";
			
			$result_pyjama2 = mysqli_query($dbc, $query_pyjama2)
				or die('Error querying database query_pyjama2.');
			
		}
		
	}
	
	if ($salwar_count >= 1) {
		
		for ($c = 1; $c <= $salwar_count; $c++) {
			
			$salwar_pairing = $_POST["salwar_pairing$c"];
			$salwar_description = $_POST["salwar_description$c"];
			if ($_POST["salwar_panafd$c"]=="") {
				$salwar_pana = $_POST["salwar_pana$c"];
			} else{
				$salwar_pana = $_POST["salwar_pana$c"] * $_POST["salwar_panafd$c"];
			}
			if ($_POST["salwar_clothfd$c"]=="") {
				$salwar_clothln = $_POST["salwar_clothln$c"];
			} else{
				$salwar_clothln = $_POST["salwar_clothln$c"] * $_POST["salwar_clothfd$c"];
			}
			$salwar_book_date = date("y-m-d");
			$salwar_submit_date = $_POST["salwar_submit_date$c"];
			
			if ($salwar_submit_date=="") {
				$salwar_submit_date = $_POST["salwar_submit_date1"];
			}
			
			$query_salwar1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"salwar\", \"$salwar_pairing\", \"$salwar_description\", \"$salwar_pana\", \"$salwar_clothln\", \"$salwar_book_date\", 
				\"$salwar_submit_date\")";
			
			$result_salwar1 = mysqli_query($dbc, $query_salwar1)
				or die('Error querying database query_salwar1.');
			
			$query_salwar2 = "INSERT INTO `style` (`sr`, `garb_type`) 
				VALUES ($sr, \"salwar\")";
			
			$result_salwar2 = mysqli_query($dbc, $query_salwar2)
				or die('Error querying database query_salwar2.');
			
		}
		
	}
	
	if ($aligard_count >= 1) {
		
		for ($c = 1; $c <= $aligard_count; $c++) {
			
			$aligard_pairing = $_POST["aligard_pairing$c"];
			$aligard_description = $_POST["aligard_description$c"];
			if ($_POST["aligard_panafd$c"]=="") {
				$aligard_pana = $_POST["aligard_pana$c"];
			} else{
				$aligard_pana = $_POST["aligard_pana$c"] * $_POST["aligard_panafd$c"];
			}
			if ($_POST["aligard_clothfd$c"]=="") {
				$aligard_clothln = $_POST["aligard_clothln$c"];
			} else{
				$aligard_clothln = $_POST["aligard_clothln$c"] * $_POST["aligard_clothfd$c"];
			}
			$aligard_book_date = date("y-m-d");
			$aligard_submit_date = $_POST["aligard_submit_date$c"];
			
			if ($aligard_submit_date=="") {
				$aligard_submit_date = $_POST["aligard_submit_date1"];
			}
			
			$query_aligard1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"aligard\", \"$aligard_pairing\", \"$aligard_description\", \"$aligard_pana\", \"$aligard_clothln\", \"$aligard_book_date\", 
				\"$aligard_submit_date\")";
			
			$result_aligard1 = mysqli_query($dbc, $query_aligard1)
				or die('Error querying database query_aligard1.');
			
			$query_aligard2 = "INSERT INTO `style` (`sr`, `garb_type`) 
				VALUES ($sr, \"aligard\")";
			
			$result_aligard2 = mysqli_query($dbc, $query_aligard2)
				or die('Error querying database query_aligard2.');
			
		}
		
	}
	
	if ($churidar_count >= 1) {
		
		for ($c = 1; $c <= $churidar_count; $c++) {
			
			$churidar_pairing = $_POST["churidar_pairing$c"];
			$churidar_description = $_POST["churidar_description$c"];
			if ($_POST["churidar_panafd$c"]=="") {
				$churidar_pana = $_POST["churidar_pana$c"];
			} else{
				$churidar_pana = $_POST["churidar_pana$c"] * $_POST["churidar_panafd$c"];
			}
			if ($_POST["churidar_clothfd$c"]=="") {
				$churidar_clothln = $_POST["churidar_clothln$c"];
			} else{
				$churidar_clothln = $_POST["churidar_clothln$c"] * $_POST["churidar_clothfd$c"];
			}
			$churidar_book_date = date("y-m-d");
			$churidar_submit_date = $_POST["churidar_submit_date$c"];
			
			if ($churidar_submit_date=="") {
				$churidar_submit_date = $_POST["churidar_submit_date1"];
			}
			
			$query_churidar1 = "INSERT INTO `entry` (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, 
				`garb_book_date`, `garb_submit_date`) 
				VALUES ($sr, \"churidar\", \"$churidar_pairing\", \"$churidar_description\", \"$churidar_pana\", \"$churidar_clothln\", \"$churidar_book_date\", 
				\"$churidar_submit_date\")";
			
			$result_churidar1 = mysqli_query($dbc, $query_churidar1)
				or die('Error querying database query_churidar1.');
			
			$query_churidar2 = "INSERT INTO `style` (`sr`, `garb_type`) 
				VALUES ($sr, \"churidar\")";
			
			$result_churidar2 = mysqli_query($dbc, $query_churidar2)
				or die('Error querying database query_churidar2.');
			
		}
		
	}
	
	mysqli_close($dbc);
?>

</body>
</html>