<?php
	$query4 = "SELECT * FROM $entrytable WHERE sr=$sr AND garb_type=\"$garb_type\" ORDER BY garb_id ASC";
	$result4 = mysqli_query($dbc, $query4) or die('Error querying database query4.');
	
	$i=1;
	while ($rowq4 = mysqli_fetch_array($result4)) {
		$garb[$i] = $rowq4['garb_id'];
		$garb_pairing[$i] = $rowq4['garb_pairing'];
		$garb_description[$i] = $rowq4['garb_description'];
		$pana[$i] = $rowq4['garb_pana'];
		$clothln[$i] = $rowq4['garb_clothln'];
		
		$i++;
	}
	$garbcount = count($garb);
?>