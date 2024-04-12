<!--	parent
notepad++ C:/xampp/htdocs/myserver/sub/sub_pattern_table.php
-->

<?php foreach (${'atb_style_ptn'.$garbtype} as $ar_ptn) { ?>
	<tr><td><?php echo $ar_ptn; ?></td>
		
		<?php for ($c = 01; $c <= $garbcount; $c++) {
			
			foreach (${'a_'.$ar_ptn} as $var) {
				${'s_'.$ar_ptn.'_'.$var} = "";
			}
			
			if ($c==1 && isset($rowq5[$ar_ptn])) {
				foreach (${'a_'.$ar_ptn} as $var) {
					($rowq5[$ar_ptn]=="$var") ? ${'s_'.$ar_ptn.'_'.$var}="selected" :  ${'s_'.$ar_ptn.'_'.$var}="";
				}
			}
			?>
			
			<td>
				<select tabindex="<?php echo $tx.'06'; ?>" class="form-control p-0" name=<?php echo $stylename.'_'.$ar_ptn.$c; ?> style="width:120px">
				<option value="default">Default</option>
				<?php foreach (${'a_'.$ar_ptn} as $var) {
					echo "<option value=$var ".${'s_'.$ar_ptn.'_'.$var}." >$var</option>";
				} ?>
				</select>
			</td>
			
		<?php } ?>
		
	</tr>
<?php } ?>