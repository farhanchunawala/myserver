<!DOCTYPE html>
<html lang="en">	<!-- alt + shift + 4 -->
<head>
	<?php
		$sr=$_GET['sr'];
		$garbtype = $_GET['garbtype'];
		$garb_id = $_GET['garb_id'];
		$print=$_GET['print'];
	?>
	<title><?php echo "$sr $garbtype $print"?></title>
	<?php $svr_mode=$_GET['svr_mode'];  $fdir='../../';  include $fdir.'svr/svr_mode.php'; ?>
	<link rel="stylesheet" href="printstyles.css">
</head>
<body>

<a onclick="printit()">
<?php
	if ($print=='print_map') include $fn_x2_php;
	include $fn_inchtocm_php;
	include $fn_inchtotext_php;
	include $fn_cmtoinchtext_php;
	//include $fn_shouldertrim_php;
	
	($garbtype=='shirt' || $garbtype=='kurta' || $garbtype=='kandura') ? $garb_category='top' :  $garb_category='btm' ;
	//include $dim_entry_php;
	include $dim_style_php;
	include $dim_meas_php;
	$garbcount=1;
	
	for($i=1; $i<=$garbcount; $i++) {
		include ${'dim_'.$garb_category.'_php'};
		//include $dim_cloth_php;
	}
	if     ($print=='print_marking') include $sub_print_marking_php;
	elseif ($print=='print_marking2') include $sub_print_marking2_php;
	elseif ($print=='print_map')	 include $sub_print_map_php;
	elseif ($print=='print_cslip')	 include $sub_print_cslip_php;
	else							 include $sub_print_kslip_php;
	
	mysqli_close($dbc);
?>
</a>

<script>
loadDoc("customerlist_q1.php?srh=0", myFunction1);
function myFunction1(xhttp) {
	const myObj = JSON.parse(xhttp.responseText);
	let text = "";
	for (let x of myObj) {
		text = text + 
		"<tr>" +
			"<td><a href=customer_info.php?svr_mode=local_kkms&sr="+x.sr+"&cs=0&csv=0 >"+x.sr+"</a></td>" +
			"<td>"+x.name+"</td>" +
			"<td>"+x.surname+"</td>" +
			"<td>"+x.mobile_no1+"</td>" +
		"</tr>";
	}
	document.getElementById("tbody").innerHTML = text;
}

function loadDoc(url, cFunction) {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {cFunction(this);}
	xhttp.open("GET", url);
	xhttp.send();
}
</script>
<script>
function printit() {
	window.print();
}
</script>

</body>
</html>