<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Calculations</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
tfoot td {
		font-weight: bold;
	}
</style>
</head>
<body>

<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'kkmenswear')
		or die('Error connecting to MySQL server.');
	
	$garb_type = 'shirt';
	$meas = $_GET['meas'];
	
	if ($meas=='chest') $tt='t1';
	elseif ($meas=='stomach') $tt='t2';
	elseif ($meas=='seat') $tt='t3';
	
	include '../dimension/meas_qarr1.php';
	
	include '../function/fn_inchround.php';
	include '../function/fn_inchtotext.php';
	include '../function/fn_inchtotextround.php';
	
	function array_mode1($arr) {
		for ($i=1; $i<=3; $i++) {
			$rarr[$i] = inchround($arr[$i]);
			$sarr[$i] = "$rarr[$i]";
		}
		$count = array_count_values($sarr);
		arsort($count);
		
		return key($count);
	}
	function array_mode2($arr) {
		for ($i=1; $i<=3; $i++) {
			$rarr[$i] = round($arr[$i]);
			$sarr[$i] = "$rarr[$i]";
		}
		$count = array_count_values($sarr);
		arsort($count);
		return key($count);
	}
	function arr_str($arr) {
		foreach($arr as $x => $value){
			$rarr[$x] = inchround($value);
		}
		asort($rarr);
		foreach($rarr as $x => $value){
			$sarr[$x] = "$value";
		}
		$count = array_count_values($sarr);
		
		return $count;
	}
	
	class cl_inchtotext {
		function inchtotext($x) {
			$a = $x;
			$a = str_replace(".125","+",$a);
			$a = str_replace(".25","¼",$a);
			$a = str_replace(".375","¼+",$a);
			$a = str_replace(".5","½",$a);
			$a = str_replace(".625","½+",$a);
			$a = str_replace(".75","¾",$a);
			if(strstr($a,".875")){
				$a = $a+1;
				$a = str_replace(".875","=",$a);
			}
				return $a;
		}
	}
	
	if (isset($sr)) {
		
		$sum_meas_losing = 0;
		$sum_meas_losing_percent = 0;
		
		$i=0;
		foreach(${$meas} as $key => $val) {
			$i++;
			$measy4[$i] = $val/4;  }
		$i=0;
		foreach(${$tt} as $key => $val) {
			$i++;
			$tamda[$i] = $val;  }
		
		for ($i=1; $i<=$srcount; $i++) {
			$meas_losing[$i] = $tamda[$i] - $measy4[$i];
			$meas_losing_percent[$i] = $meas_losing[$i] * 100 / ($measy4[$i]);
			
			$sum_meas_losing = ($sum_meas_losing + $meas_losing[$i]);
			$sum_meas_losing_percent = ($sum_meas_losing_percent + $meas_losing_percent[$i]);
			$avg_meas_losing = $sum_meas_losing/($srcount);
			$avg_meas_losing_percent = $sum_meas_losing_percent/($srcount);
		}
		
		$meas_valct = arr_str(${$meas});
		$measy4_valct = arr_str($measy4);
		$tamda_valct = arr_str($tamda);
		$meas_losing_valct = arr_str($meas_losing);
		$meas_losing_percent_valct = arr_str($meas_losing_percent);
		
	}
?>

<div class="row no-gutters">
<div class="col-6">

<table class="table table-striped">
<thead>
	<tr>
		<th>Sr</th>
		<th><?php echo $meas; ?></th>
		<th><?php echo $meas.'/4'; ?></th>
		<th><?php echo $tt; ?></th>
		<th><?php echo $meas.' losing'; ?></th>
		<th><?php echo $meas.' losing %'; ?></th>
	</tr>
</thead>
<tbody>
	<?php $i=0;
	foreach(${$meas} as $key => $val) {
    	$i++;
	?>
	<tr>
		<td><?php echo $sr[$i]; ?></td>
		<td><?php echo inchtotextround($val); ?></td>
		<td><?php echo inchtotextround($measy4[$i]); ?></td>
		<td><?php echo inchtotext($tamda[$i]); ?></td>
		<td><?php echo inchtotextround($meas_losing[$i]); ?></td>
		<td><?php echo round($meas_losing_percent[$i]).'%'; ?></td>
	</tr>
	<?php } ?>
</tbody>
<tfoot>
	<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
	<tr>
		<td>Min</td>
		<td><?php echo inchtotextround(min(${$meas})); ?></td>
		<td><?php echo inchtotextround(min($measy4)); ?></td>
		<td><?php echo inchtotextround(min($tamda)); ?></td>
		<td><?php echo inchtotextround(min($meas_losing)); ?></td>
		<td><?php echo round(min($meas_losing_percent)).'%'; ?></td>
	</tr>
	<tr>
		<td>Max</td>
		<td><?php echo inchtotextround(max(${$meas})); ?></td>
		<td><?php echo inchtotextround(max($measy4)); ?></td>
		<td><?php echo inchtotextround(max($tamda)); ?></td>
		<td><?php echo inchtotextround(max($meas_losing)); ?></td>
		<td><?php echo round(max($meas_losing_percent)).'%'; ?></td>
	</tr>
	<tr>
		<td>Mid range</td>
		<td><?php echo inchtotextround((min(${$meas}) + max(${$meas}))/2); ?></td>
		<td><?php echo inchtotextround((min($measy4) + max($measy4))/2); ?></td>
		<td><?php echo inchtotextround((min($tamda) + max($tamda))/2); ?></td>
		<td><?php echo inchtotextround((min($meas_losing) + max($meas_losing))/2); ?></td>
		<td><?php echo round((min($meas_losing_percent) + max($meas_losing_percent))/2).'%'; ?></td>
	</tr>
	<tr>
		<td>Avg</td>
		<td><?php echo inchtotextround(array_sum(${$meas})/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($measy4)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($tamda)/$srcount); ?></td>
		<td><?php echo inchtotextround(array_sum($meas_losing)/$srcount); ?></td>
		<td><?php echo round(array_sum($meas_losing_percent)/$srcount).'%'; ?></td>
	</tr>
	<tr>
		<td>Mode</td>
		<td><?php echo inchtotext(array_mode1(${$meas})); ?></td>
		<td><?php echo inchtotext(array_mode1($measy4)); ?></td>
		<td><?php echo inchtotext(array_mode1($tamda)); ?></td>
		<td><?php echo inchtotext(array_mode1($meas_losing)); ?></td>
		<td><?php echo array_mode2($meas_losing_percent).'%'; ?></td>
	</tr>
</tfoot>
</table>

</div>
<div class="col-6">

<svg width="1000" height="1500" style="border: 1px solid black">
<?php
	for ($r=0; $r<=1300; $r=$r+50) {
		echo "<line  x1=$r  y1=0  x2=$r  y2=1000 stroke=grey stroke-width=1 opacity=0.4 />";
		echo "<line  x1=0  y1=$r  x2=1300  y2=$r stroke=grey stroke-width=1 opacity=0.4 />";
	}
	
	$s = 0;
	$md_inchtotext = new cl_inchtotext();
	
	$meas_cstr = 'meas_valct';
	$meas_cstr_name = "$meas";
	$md_name = "inchtotext";
	$max_valct = max($meas_valct);
	include 'dim_graph.php';
	
	$meas_cstr = 'measy4_valct';
	$meas_cstr_name = "$meas/4";
	$md_name = "inchtotext";
	$max_valct = max($measy4_valct);
	include 'dim_graph.php';
	
	$meas_cstr = 'tamda_valct';
	$meas_cstr_name = "$tt";
	$md_name = "inchtotext";
	$max_valct = max($tamda_valct);
	include 'dim_graph.php';
	
	$meas_cstr = 'meas_losing_valct';
	$meas_cstr_name = "$meas losing";
	$md_name = "inchtotext";
	$max_valct = max($meas_losing_valct);
	include 'dim_graph.php';
	
	$meas_cstr = 'meas_losing_percent_valct';
	$meas_cstr_name = "$meas losing percent";
	$md_name = "inchtotext";
	$max_valct = max($meas_losing_percent_valct);
	include 'dim_graph.php';
	
?>
</svg>

</div>
</div>

<?php
	mysqli_close($dbc);
?>
</body>
</html>