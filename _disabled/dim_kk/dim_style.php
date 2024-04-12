<?php
	$query3 = "SELECT * FROM $styletable WHERE sr=$sr AND garb_type=\"$garb_type\" ORDER BY style_id ASC";
	$result3 = mysqli_query($dbc, $query3) or die('Error querying database query3.');
	
	$i=1;
	while ($rowq3 = mysqli_fetch_array($result3)) {
		
		$style[$i] = $rowq3['style_id'];
		
		if ($garb_type=='shirt' || $garb_type=='kurta' || $garb_type=='pathani' || $garb_type=='kandura') {
			
			$collartype[$i] = $rowq3['top_collartype'];
			$cuffln[$i] = $rowq3['top_cuffln'];
			$cufftype[$i] = $rowq3['top_cufftype'];
			$pockettype[$i] = $rowq3['top_pockettype'];
			$shouldertype[$i] = $rowq3['top_shouldertype'];
			
		} elseif ($garb_type=='pant' || $garb_type=='bpyjama') {
			
			$crease[$i] = $rowq3['bottom_crease'];
			
		}
		
		$i++;
	}
?>