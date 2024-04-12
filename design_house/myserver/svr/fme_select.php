<?php
	foreach ($$array as $ar_sub) {																							//atb_style_ptnkurta as collar_type,cuff_ln,... ?>
	<tr><td><?php echo $ar_sub; ?></td>
	<?php for ($c=0; $c<=$count; $c++) {
		
		foreach (${'ar_'.$ar_sub} as $e_sub) ${'s'.$ar_sub.$e_sub} = "";											//$a_collar_type as rmpc,bc,...
		if ($c==0 && isset(${'rq_'.$qry}[$ar_sub]))
			foreach (${'ar_'.$ar_sub} as $e_sub)
				${'s'.$ar_sub.$e_sub} = (${'rq_'.$qry}[$ar_sub]=="$e_sub") ? 'selected' : '' ;				//if bc=bc then s_collartype_bc='selected';
				//(${'rq_'.$qry}[$ar_sub]=="$e_sub") ? ${'s'.$ar_sub.$e_sub}="selected" :  ${'s'.$ar_sub.$e_sub}="";			//if bc=bc then s_collartype_bc='selected';
				
	?>
	
	<td>
	<select class="form-control p-0" tabindex="<?php echo $tx.'06'; ?>" name=<?php echo $stylename.'_'.$ar_sub.$c; ?> style="width:120px">
		<option value="default">Default</option>
		<?php foreach (${'ar_'.$ar_sub} as $e_sub) {
			$e_sub_disp = ($ar_sub=='cuff_ln') ? cmtoinchtext($e_sub) : $e_sub ;
			echo "<option value=$e_sub ".${'s'.$ar_sub.$e_sub}." >$e_sub_disp</option>";
		} ?>
	</select>
	</td>
	
	<?php } ?>
	</tr>
<?php } ?>