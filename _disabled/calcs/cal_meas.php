<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$garb_type = $_GET['garb_type'];
		$meas = $_GET['meas'];
	?>
	<title><?php echo "$meas - $garb_type";?></title>
	<?php include '../plugins_n_libraries/bootstrapcdn.php'; ?>
	<style>
		thead td {
			font-weight: bold;
		}
	</style>
</head>
<body>

<?php
	
	include '../function/fn_inchround.php';
	include '../function/fn_inchtotext.php';
	include '../function/fn_inchtotextround.php';
	include '../function/fn_array_mode.php';
	include '../function/fn_arr_rdsrtstr.php';
	include '../function/fn_arr_inch_rdsrtstr.php';
	
	include 'cal_dimensions.php';
?>

<table class="table table-striped">
	<thead><?php
		echo "<tr>
			<th></th>
			<th>$meas</th>";
			if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) { echo"
				<th>$meas/4</th>
				<th>$tt</th>
				<th>$tt-dab</th>
				<th>$tt-$meas</th>
				<th>($tt-$meas)%</th>";
			}
		echo '</tr>
		<tr><td>Min</td>
			<td>'.inchtotextround(min(${$meas})).'</td>';
			if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) { echo'
				<td>'.inchtotextround(min($measy4)).'</td>
				<td>'.inchtotextround(min($tamda)).'</td>
				<td>'.inchtotextround(min($tamda_m_dab)).'</td>
				<td>'.inchtotextround(min($tamda_m_meas)).'</td>
				<td>'.round(min($tamda_m_meas_percent)).'%</td>';
			}
		echo '</tr>
		<tr><td>Max</td>
			<td>'.inchtotextround(max(${$meas})).'</td>';
			if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) { echo'
				<td>'.inchtotextround(max($measy4)).'</td>
				<td>'.inchtotextround(max($tamda)).'</td>
				<td>'.inchtotextround(max($tamda_m_dab)).'</td>
				<td>'.inchtotextround(max($tamda_m_meas)).'</td>
				<td>'.round(max($tamda_m_meas_percent)).'%</td>';
			}
		echo '</tr>
		<tr><td>Mid range</td>
			<td>'.inchtotextround((min(${$meas}) + max(${$meas}))/2).'</td>';
			if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) { echo'
				<td>'.inchtotextround((min($measy4) + max($measy4))/2).'</td>
				<td>'.inchtotextround((min($tamda) + max($tamda))/2).'</td>
				<td>'.inchtotextround((min($tamda_m_dab) + max($tamda_m_dab))/2).'</td>
				<td>'.inchtotextround((min($tamda_m_meas) + max($tamda_m_meas))/2).'</td>
				<td>'.round((min($tamda_m_meas_percent) + max($tamda_m_meas_percent))/2).'%</td>';
			}
		echo '</tr>
		<tr><td>Avg</td>
			<td>'.inchtotextround(array_sum(${$meas})/$srcount).'</td>';
			if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) { echo'
				<td>'.inchtotextround(array_sum($measy4)/$srcount).'</td>
				<td>'.inchtotextround(array_sum($tamda)/$srcount).'</td>
				<td>'.inchtotextround(array_sum($tamda_m_dab)/$srcount).'</td>
				<td>'.inchtotextround(array_sum($tamda_m_meas)/$srcount).'</td>
				<td>'.round(array_sum($tamda_m_meas_percent)/$srcount).'%</td>';
			}
		echo '</tr>
		<tr><td>Mode</td>
			<td>'.array_mode($meas_valct).'</td>';
			if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) { echo'
				<td>'.array_mode($measy4_valct).'</td>
				<td>'.array_mode($tamda_valct).'</td>
				<td>'.array_mode($tamda_m_dab_valct).'</td>
				<td>'.array_mode($tamda_m_meas_valct).'</td>
				<td>'.array_mode($tamda_m_meas_percent_valct).'%</td>';
			}
		echo '</tr>';
	?></thead>
	<tbody><?php
		$i=0;
		foreach($$meas as $key => $val) {
			$i++;
			echo "<tr>
				<td>$sr[$i]</td>
				<td>".inchtotext($val).'</td>';
				if ($garb_category==='top' && ($meas==='chest' || $meas==='stomach' || $meas==='seat')) { echo'
					<td>'.inchtotextround($measy4[$i]).'</td>
					<td>'.inchtotext($tamda[$i]).'</td>
					<td>'.inchtotextround($tamda_m_meas[$i]).'</td>
					<td>'.round($tamda_m_meas_percent[$i]).'%</td>';
				}
			echo '</tr>';
		}
	?></tbody>
</table>

<svg width="1000" height="1300" style="border: 1px solid black"><?php
	for ($r=0; $r<=1300; $r=$r+50) {
		echo "<line  x1=$r  y1=0  x2=$r  y2=1300 stroke=grey stroke-width=1 opacity=0.4 />";
		echo "<line  x1=0  y1=$r  x2=1300  y2=$r stroke=grey stroke-width=1 opacity=0.4 />";
	}
	$s = -50;
	
	$meas_cstr = 'meas_valct';
	$meas_cstr_name = "$meas";
	$max_valct = max($meas_valct);
	include 'dim_graph.php';
	
	if ($meas==='chest' || $meas==='stomach' || $meas==='seat') {
		
		$meas_cstr = 'measy4_valct';
		$meas_cstr_name = "$meas/4";
		$max_valct = max($measy4_valct);
		include 'dim_graph.php';
		
		$meas_cstr = 'tamda_valct';
		$meas_cstr_name = "$tt";
		$max_valct = max($tamda_valct);
		include 'dim_graph.php';
		
		$meas_cstr = 'tamda_m_meas_valct';
		$meas_cstr_name = "$meas losing";
		$max_valct = max($tamda_m_meas_valct);
		include 'dim_graph.php';
		
		$meas_cstr = 'tamda_m_meas_percent_valct';
		$meas_cstr_name = "$meas losing percent";
		$max_valct = max($tamda_m_meas_percent_valct);
		include 'dim_graph.php';
	}
	
?></svg>

</body>
</html>