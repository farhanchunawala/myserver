<?php
	for ($c = 1; $c <= ${$garb_type.'_count'}; $c++) {
		
		$garb_pairing = $_POST[$garb_type.'_pairing'.$c];
		$garb_description = $_POST[$garb_type.'_description'.$c];
		$garb_book_date = date("y-m-d");
		$garb_submit_date = $_POST[$garb_type.'_submit_date'.$c];
		if ($_POST[$garb_type.'_panafd'.$c]=="")	$garb_pana = $_POST[$garb_type.'_pana'.$c];
		else										$garb_pana = $_POST[$garb_type.'_pana'.$c] * $_POST[$garb_type.'_panafd'.$c];
		if ($_POST[$garb_type.'_clothfd'.$c]=="") 	$garb_clothln = $_POST[$garb_type.'_clothln'.$c];
		else										$garb_clothln = $_POST[$garb_type.'_clothln'.$c] * $_POST[$garb_type.'_clothfd'.$c];
		if ($garb_submit_date=="")	$garb_submit_date = $_POST[$garb_type.'_submit_date1'];
		
		
		$query_entrysv = "INSERT INTO $entrytable (`sr`, `garb_type`, `garb_pairing`, `garb_description`, `garb_pana`, `garb_clothln`, `garb_book_date`, `garb_submit_date`) 
			VALUES ($sr, \"$garb_type\", \"$garb_pairing\", \"$garb_description\", \"$garb_pana\", \"$garb_clothln\", \"$garb_book_date\", \"$garb_submit_date\")";
		$result_entrysv = mysqli_query($dbc, $query_entrysv) or die('<b>pattern_sv.php/query_entrysv : </b><br/>'.mysqli_error($dbc));
		
		$query4 = "SELECT garb_id FROM $entrytable WHERE sr=$sr AND garb_type=\"$garb_type\" ORDER BY garb_id DESC LIMIT 1";
		$result4 = mysqli_query($dbc, $query4) or die('<b>Error customer_info.php/query4 : </b><br/>'.mysqli_error($dbc));
		$rowq4 = mysqli_fetch_array($result4);
		
		
		if (isset($rowq4['garb_id'])) $garb_id = $rowq4['garb_id']; else $garb_id = '';
		
		if ($garb_category==='top') {
			
			$top_collartype =	$_POST[$garb_type.'_collartype'.$c];
			$top_cufftype =		$_POST[$garb_type.'_cufftype'.$c];
			$top_cuffln =		$_POST[$garb_type.'_cuffln'.$c];
			//$top_cuffln =		texttoinch($_POST[$garb_type.'_cuffln'.$c]); //if kkms_cnv
			$top_shouldertype =	$_POST[$garb_type.'_shouldertype'.$c];
			$top_pockettype =	$_POST[$garb_type.'_pockettype'.$c];
			$top_taweeztype =	($garb_type!='shirt') ? $_POST[$garb_type.'_taweeztype'.$c] : '' ;
			
			if ($top_collartype=="default")							$top_collartype =	$_POST[$garb_type.'_collartype1'];
			if ($top_cuffln=="default")								$top_cuffln =		$_POST[$garb_type.'_cuffln1'];
			if ($top_cufftype=="default")							$top_cufftype =		$_POST[$garb_type.'_cufftype1'];
			if ($top_pockettype=="default")							$top_pockettype =	$_POST[$garb_type.'_pockettype1'];
			if ($top_shouldertype=="default")						$top_shouldertype =	$_POST[$garb_type.'_shouldertype1'];
			if ($garb_type!='shirt' && $top_taweeztype=="default")	$top_taweeztype =	$_POST[$garb_type.'_taweeztype1'];
			
			$query_stylesv = "INSERT INTO $styletable (`sr`, `style_id`, `garb_type`, `top_collartype`, `top_cuffln`, `top_cufftype`, `top_pockettype`, `top_shouldertype`, `top_taweeztype`) 
				VALUES ($sr, \"$garb_id\", \"$garb_type\", \"$top_collartype\", \"$top_cuffln\", \"$top_cufftype\", \"$top_pockettype\", \"$top_shouldertype\", \"$top_taweeztype\")";
			
		} else {
			$bottom_crease = ($garb_type=='pant' || $garb_type=='bpyjama') ? $_POST[$garb_type.'_crease'.$c] : '' ;
			if (($garb_type=='pant' || $garb_type=='bpyjama') && $bottom_crease=="default") $bottom_crease = $_POST[$garb_type.'_crease1'];
			
			$query_stylesv = "INSERT INTO $styletable (`sr`, `style_id`, `garb_type`, `bottom_crease`) 
				VALUES ($sr, \"$garb_id\", \"$garb_type\", \"$bottom_crease\")";
		}
		
		$result_stylesv = mysqli_query($dbc, $query_stylesv)
			or die('<b>pattern_sv.php/query_stylesv : </b><br/>'.mysqli_error($dbc));
	}
?>