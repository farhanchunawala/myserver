<!--	parent
notepad++ C:/xampp/htdocs/myserver/sub/sub_pattern_table.php
-->

<?php	/*
		forloop with 2level nested arrays for select
		1st foreach - foreach for looping sub_arrays
		2nd foreach - foreach for assigning null values to elements of sub array
		3rd foreach - foreach for assigning select to 1st column options
		4th foreach - foreach for selecting options of select list
		*/
		
	$arr = ();			//array containing sub arrays
	$ar_ar_sub = ();	//sub_array of elements
	
	foreach (${'ar_'.$arr} as $ar_sub) {																					//atb_style_ptnkurta as collar_type,cuff_ln,...
		for ($c=01; $c<=$count; $c++) {
			
			//1st option select code
			foreach (${'ar_'.$ar_sub} as $e_sub) ${'s'.$ar_sub.$e_sub} = "";												//$a_collar_type as rmpc,bc,...
			if ($c==1 && isset(${'rq_'.$qry}[$ar_sub]))
				foreach (${'ar_'.$ar_sub} as $e_sub)
					(${'rq_'.$qry}[$ar_sub]=="$e_sub") ? ${'s'.$ar_sub.$e_sub}="selected" :  ${'s'.$ar_sub.$e_sub}="";				//if bc=bc then s_collartype_bc='selected';
					
?>
	
	<select class="form-control" name=<?php echo $id.$c; ?>>
		<option value="default">Default</option>
		<?php foreach (${'ar_'.$ar_sub} as $e_sub) echo "<option value=$e_sub ".${'s'.$ar_sub.$e_sub}." >$e_sub</option>"; ?>
	</select>
	
<?php	}
	} ?>
